<?php session_start();

$conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
$sql = "SELECT * FROM BookDetail";
$result = mysqli_query($conn, $sql);
//for( $i=0; $i<$result->num_rows; $i++){
	$row = mysqli_fetch_array($result);
	//echo $row['ISBN'];
	//echo '<br>';
//}
$sql = "SELECT * FROM Book where ISBN ='".$row['ISBN']."'";
$result2 = mysqli_query($conn,$sql);
$row2=mysqli_fetch_array($result2);
$sql = "SELECT distinct O.ISBN, Total
  FROM Order_ AS O
  JOIN (SELECT ISBN, SUM(Amount) AS Total
          FROM Order_
         GROUP BY ISBN
       ) AS s ON O.ISBN = s.ISBN order by Total desc;";
$bestresult = mysqli_query($conn,$sql);
$bestrow=mysqli_fetch_array($bestresult);
$sql = "select * from Book where ISBN = '".$bestrow['ISBN']."'";
$bestrowtitlequery = mysqli_query($conn,$sql);
$bestrowtitle = mysqli_fetch_array($bestrowtitlequery);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>KW BOOK</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!--================Top Header Area =================-->
        <div class="header_top_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="top_header_left">
                            <div class="selector">
                                <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                  <option value='yt' data-image="img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">한국어</option>
                                </select>
                            </div>
                            <select class="selectpicker usd_select">
                                <option>KRW</option>
                            </select>
                            <div class="input-group">
							<form action="./search.php" method = "post">
                                <input type="search" name="search" id="search" onkeydown="submit" class="form-control" placeholder="검색" aria-label="Search">
                                <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"><i class="icon-magnifier"></i></button>
                                </span>
                            </form>
							</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="top_header_middle">
                            <a href="#"><i class="fa fa-phone"></i> 대표자 번호 : <span>010 1234 5678</span></a>
                            <a href="#"><i class="fa fa-envelope"></i> Email : <span>wns1119@gmail.com</span></a>
                            <div style="vertical-align:middle;text-align:middle;"><img src="img/logo.png"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="top_right_header">
                            <ul class="header_social">
								<li><?php
								if($_SESSION['logged'] == "YES"){ ?>
								<a href="/do_logout.php">로그아웃</a>
								<?php
								}
								else{ ?>
								<a href="/login.php">로그인</a>
								<?php
								}
								?></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                            <ul class="top_right">
                                <?php
								if($_SESSION['logged'] == "YES"){
								?>
								<li class="user"><a href="/stat.php"><span title="내 정보"><i class="icon-user icons"></i></span></a></li>
                                <?php
								}
								?>
								<li class="cart"><a href="/cart.php"><span title="장바구니"><i class="icon-handbag icons"></i></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Top Header Area =================-->
        
        <!--================Menu Area =================-->
        <header class="shop_header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!--<ul class="navbar-nav categories">
                            <li class="nav-item">
                                <select class="selectpicker">
                                    <option>카테고리</option>
									<option>소설</option>
									<option>시/에세이</option>
									<option>경제/경영</option>
									<option>자기계발</option>
									<option>인문</option>
                                </select>
                            </li>
                        </ul>-->
                        <ul class="navbar-nav" style="margin:0 auto;">
                            <li class="nav-item dropdown submenu active">
                                <li class="nav-item"><a class="nav-link" href="/index.php">홈</a></li>
                                <!--<ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="index.html">Home Simple</a></li>
                                    <li class="nav-item"><a class="nav-link" href="home-carousel.html">Home Carousel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="home-fullwidth.html">Home Full Width</a></li>
                                    <li class="nav-item"><a class="nav-link" href="home-parallax.html">Home Parallax</a></li>
                                    <li class="nav-item"><a class="nav-link" href="home-sidebar.html">Home Boxed</a></li>
                                    <li class="nav-item"><a class="nav-link" href="home-fixed-menu.html">Home Fixed</a></li>
                                </ul>-->
                            </li>
                            <!--<li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="compare.html">Compare</a></li>
                                    <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout Method</a></li>
                                    <li class="nav-item"><a class="nav-link" href="register.html">Checkout Register</a></li>
                                    <li class="nav-item"><a class="nav-link" href="track.html">Track</a></li>
                                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-2column.html">Prodcut No Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-3column.html">Prodcut Two Column</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-4column.html">Product Grid</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-left-sidebar.html">Categories Left Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-right-sidebar.html">Categories Right Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-grid-left-sidebar.html">Categories Grid Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="product-details.html">Prodcut Details 01</a></li>
                                    <li class="nav-item"><a class="nav-link" href="product-details2.html">Prodcut Details 02</a></li>
                                    <li class="nav-item"><a class="nav-link" href="product-details3.html">Prodcut Details 03</a></li>
                                    <li class="nav-item"><a class="nav-link" href="shopping-cart.html">Shopping Cart 01</a></li>
                                    <li class="nav-item"><a class="nav-link" href="shopping-cart2.html">Shopping Cart 02</a></li>
                                    <li class="nav-item"><a class="nav-link" href="empty-cart.html">Empty Cart</a></li>
                                </ul>
                            </li>
							-->
							<li class="nav-item"><a class="nav-link" href="/category.php?category=000">소설</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=100">시/에세이</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=200">경제/경영</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=300">자기계발</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=400">인문</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--================End Menu Area =================-->
        
        <!--================Slider Area =================-->
		<section class="main_slider_area">
			<div class="container" style="margin-top:20px">
			<a style="text-align:center;"><h1> 베스트 셀러 </h1></a>
			<hr></hr>
                <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
                    <ul>
                        <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="img/thumbnail/<?php echo $bestrowtitle['ISBN'] ?>.jpg"  alt="" style="width:50%" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                            <!-- LAYER NR. 1 -->
                            <div class="slider_text_box">
                             

                                <div class="tp-caption tp-resizeme secand_text" 
                                    data-x="['right','right','right','center','center',]" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['255','255','255','230','220']"  
                                    data-fontsize="['48','48','48','48','36']"
                                    data-lineheight="['52','52','52','46']"
                                    data-width="['450','450','450','450','450']"
                                    data-height="none"
                                    data-whitespace="normal"
                                    data-type="text" 
                                    data-responsive_offset="on"
                                    data-transform_idle="o:1;"
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']"
                                    >1위<BR> <?php echo $bestrowtitle['Title']?> 
                                </div>
					
                                <div class="tp-caption tp-resizeme third_btn" 
                                    data-x="['right','right','right','center','center','center']" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['385','385','385','385','350']" 
                                    data-width="['450','450','450','auto','auto']"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-type="text" 
                                    data-responsive_offset="on" 
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']">
                                    <a class="checkout_btn" href="/bookdetail.php?ISBN=<?php echo $bestrowtitle['ISBN']?>">상세정보</a>
                                </div>
                            </div>
                        </li>
                        <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
						<?php 
								$row = mysqli_fetch_array($result);
								$sql = "SELECT * FROM Book where ISBN ='".$row['ISBN']."'";
								$result2 = mysqli_query($conn,$sql);
								$row2=mysqli_fetch_array($result2);
								$bestrow=mysqli_fetch_array($bestresult);
								$sql = "select * from Book where ISBN = '".$bestrow['ISBN']."'";
								$bestrowtitlequery = mysqli_query($conn,$sql);
								$bestrowtitle = mysqli_fetch_array($bestrowtitlequery);
								?>
                        <img src="img/thumbnail/<?php echo $bestrowtitle['ISBN'];?>.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="slider_text_box">
                                <div class="tp-caption tp-resizeme secand_text" 
                                    data-x="['right','right','right','center','center',]" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['255','255','255','230','220']"  
                                    data-fontsize="['48','48','48','48','36']"
                                    data-lineheight="['52','52','52','46']"
                                    data-width="['450','450','450','450','450']"
                                    data-height="none"
                                    data-whitespace="normal"
                                    data-type="text" 
                                    data-responsive_offset="on"
                                    data-transform_idle="o:1;"
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']"
                                    >2위<BR> <?php echo $bestrowtitle['Title']; ?>
                                </div>

                                <div class="tp-caption tp-resizeme third_btn" 
                                    data-x="['right','right','right','center','center','center']" 
                                    data-hoffset="['0','0','0','0']" 
                                    data-y="['top','top','top','top']" data-voffset="['385','385','385','385','350']" 
                                    data-width="['450','450','450','auto','auto']"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-type="text" 
                                    data-responsive_offset="on" 
                                    data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                    data-textAlign="['left','left','left','left','left','center']">
                                    <a class="checkout_btn" href="/bookdetail.php?ISBN=<?php echo $bestrowtitle['ISBN']?>">상세정보</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Slider Area =================-->
        
        <!--================Feature Add Area =================-->
        
        <!--================End Feature Add Area =================-->
        <?php
		$sql = "SELECT * FROM BookDetail";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$sql = "SELECT * FROM Book order by PublishedDate desc";
		$result2 = mysqli_query($conn,$sql);
		$row2=mysqli_fetch_array($result2);
		?>
        <!--================Our Latest Product Area =================-->
        <section class="our_latest_product">
            <div class="container">
			<hr></hr>
                <div class="s_m_title">
                    <h2>신간도서</h2>
                </div>
                <div class="l_product_slider owl-carousel">
				<?php
				for($i=0; $i<10; $i++){
				?>
                    <?php if($i%2==0) ?><div class="item">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="img/thumbnail/<?php echo $row2['ISBN'];?>.jpg" alt="">
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="/bookdetail.php?ISBN=<?php echo $row2['ISBN']?>">상세정보</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4><?php echo $row2['Title']?></h4>
                                <h5><?php echo $row2['Price']?>원</h5>
                            </div>
                        </div>
                    <?php if($i%2==0) ?></div>
					<?php 
				//$row = mysqli_fetch_array($result);
				//$sql = "SELECT * FROM Book where ISBN ='".$row['ISBN']."'";
				//$result2 = mysqli_query($conn,$sql);
				$row2=mysqli_fetch_array($result2);
				} ?>
                </div>
				<hr></hr>
                <div class="s_m_title">
                    <h2>당신이 관심을 가질만한 도서</h2>
                </div>
                <div class="l_product_slider owl-carousel">
				<?php
		if($_SESSION['logged'] != "YES"){
			echo "로그인 되어있지 않습니다. 추천도서는 로그인 사용자에게만 제공됩니다.";
			
		}
		else{
			echo "추천도서는 당신의 최근 구매내역에 따라 자동으로 분석되어 제공됩니다";
			$sql = "select count(*) as coun, ISBN from Order_ group by ISBN order by coun desc";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$sql = "select * from Book where ISBN=".$row['ISBN'];
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			$sql = "select * from Book where Category=".$row['Category'];
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
		?>
				<?php
				for($i=0; $i<5; $i++){
				?>
                    <?php if($i%2==0) ?><div class="item">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="img/thumbnail/<?php echo $row['ISBN'];?>.jpg" alt="">
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="/bookdetail.php?ISBN=<?php echo $row['ISBN']?>">상세정보</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4><?php echo $row['Title']?></h4>
                                <h5><?php echo $row['Price']?>원</h5>
                            </div>
                        </div>
                    <?php if($i%2==0) ?></div>
					<?php 
				//$row = mysqli_fetch_array($result);
				//$sql = "SELECT * FROM Book where ISBN ='".$row['ISBN']."'";
				//$result2 = mysqli_query($conn,$sql);
				$row=mysqli_fetch_array($result);
				} 
		}?>
                </div>
				
            </div>
        </section>
        <!--================End Our Latest Product Area =================-->
        
        <!--================Feature Big Add Area =================-->
        
        <!--================End Feature Big Add Area =================-->
        
        <!--================Product_listing Area =================-->
        
        <!--================End Product_listing Area =================-->
        
        <!--================Featured Product Area =================-->
        
        <!--================End Featured Product Area =================-->
        
        <!--================Form Blog Area =================-->
        <section class="from_blog_area">
            <div class="container">
                <div class="from_blog_inner">
                    <div class="c_main_title">
                        <h2>From The Blog</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="from_blog_item">
                                <img class="img-fluid" src="img/blog/from-blog/f-blog-1.jpg" alt="">
                                <div class="f_blog_text">
                                    <h5>fashion</h5>
                                    <p>Neque porro quisquam est qui dolorem ipsum</p>
                                    <h6>21.09.2017</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="from_blog_item">
                                <img class="img-fluid" src="img/blog/from-blog/f-blog-2.jpg" alt="">
                                <div class="f_blog_text">
                                    <h5>fashion</h5>
                                    <p>Neque porro quisquam est qui dolorem ipsum</p>
                                    <h6>21.09.2017</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="from_blog_item">
                                <img class="img-fluid" src="img/blog/from-blog/f-blog-3.jpg" alt="">
                                <div class="f_blog_text">
                                    <h5>fashion</h5>
                                    <p>Neque porro quisquam est qui dolorem ipsum</p>
                                    <h6>21.09.2017</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Form Blog Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="container">
                <div class="footer_widgets">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-6">
                            <aside class="f_widget f_about_widget">
                                <img src="img/logo.png" alt="">
                                <p>Persuit is a Premium PSD Template. Best choice for your online store. Let purchase it to enjoy now</p>
                                <h6>Social:</h6>
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_info_widget">
                                <div class="f_w_title">
                                    <h3>Information</h3>
                                </div>
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Delivery information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Returns & Refunds</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_service_widget">
                                <div class="f_w_title">
                                    <h3>Customer Service</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_extra_widget">
                                <div class="f_w_title">
                                    <h3>Extras</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Brands</a></li>
                                    <li><a href="#">Gift Vouchers</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Specials</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_account_widget">
                                <div class="f_w_title">
                                    <h3>My Account</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="footer_copyright">
                    <h5>© <script>document.write(new Date().getFullYear());</script> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</h5>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <script src="vendors/image-dropdown/jquery.dd.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>