<?php session_start();
    $conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
    $ISBN = $_GET['ISBN'];
    $sql = 'SELECT * FROM Book WHERE ISBN=\''.$ISBN.'\'';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $sql2 = 'SELECT * FROM BookDetail WHERE ISBN=\''.$ISBN.'\'';
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);

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
        <link href="vendors/jquery-ui/jquery-ui.css" rel="stylesheet">
        
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
        
        <!--================Menu Area =================-->
        <header class="shop_header_area carousel_menu_area">
            <div class="carousel_top_header row m0">
                <div class="container">
                    <div class="carousel_top_h_inner">
                        <div class="float-md-left">
                            <div class="top_header_left">
                                <div class="selector">
                                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                        <option value='yt' data-image="img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">한국어</option>
                                    </select>
                                </div>
                                <select class="selectpicker usd_select">
                                    <option>KRW</option>
                                </select>
                            </div>
                        </div>
                        <div class="float-md-right">
                            <div class="top_header_middle">
                                <a href="#"><i class="fa fa-phone"></i> 대표자 번호 : <span>010 1234 5678</span></a>
                                <a href="#"><i class="fa fa-envelope"></i> Email : <span>wns1119@gmail.com</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_menu_inner">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav" style="margin:0 auto;">
                            <li class="nav-item dropdown submenu active">
                                <li class="nav-item"><a class="nav-link" href="/index.php">홈</a></li>
                               
                            </li>
                            
							<li class="nav-item"><a class="nav-link" href="/category.php?category=000">소설</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=100">시/에세이</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=200">경제/경영</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=300">자기계발</a></li>
							<li class="nav-item"><a class="nav-link" href="/category.php?category=400">인문</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            <ul class="navbar-nav justify-content-end">
                                <li class="user_icon"><a href="/stat.php"><i class="icon-user icons"></i></a></li>
                                <li class="cart_cart"><a href="/cart.php"><i class="icon-handbag icons"></i></a></li>
                            </ul>
                        </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!--================End Menu Area =================-->
        
        <!--================Product Details Area =================-->
        <section class="product_details_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="product_details_slider">
                            <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                                <ul>    
                                        <img src="img/thumbnail/<?php echo $row2['Image'] ?>.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="product_details_text">
                            <h1><B><?php echo $row['Title'];?></h1><br>
                            <h6>저자 <B><?php echo $row['Author'];?></B><t>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</t>
                                <t>출판사 <strong><?php echo $row['Publisher'];?></strong></t><t>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</t>
                                <t><?php echo $row['PublishedDate'];?></t>
                            </h6>
                            
                            <h6>ISBN <B><?php echo $ISBN;?></h6><br>
                            <h2><?php echo $row['Price'];?>원</h2>
                            <div class="quantity">
                                <a class="add_cart_btn" href="/addtocart.php?ISBN=<?php echo $ISBN?>">add to cart</a>
                            </div>
                            <div class="shareing_icon">
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Product Description Area =================-->
        <section class="product_description_area">
            <div class="container">
                <nav class="tab_menu">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">책소개</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">독자 리뷰</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <h5><?php echo $row2['Summary']?></h5>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<?php
					$sql3 = 'SELECT * FROM ReviewBoard WHERE ISBN=\''.$ISBN.'\'';
					$result3 = mysqli_query($conn, $sql3);
					$row3 = mysqli_fetch_array($result3);
					if($result3->num_rows==0) {
							?>
							<h4 style="text-align:center">아직 작성된 리뷰가 없습니다.</h4>
							<?php
						}
					for($i = 0; $i<$result3->num_rows;$i++){
					?>
						<a style="color:#BBBBBB"><h6>작성자 : <?php echo $row3['ID']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row3['Date_']?></h6></a><BR>
						<h4><?php echo $row3['Title']?></h4><BR>
						<h6><?php echo $row3['Body']?></h6><BR>
						<hr></hr>
					<?php
					$row3 = mysqli_fetch_array($result3);
					}
					?>
                    <?php
					if( $_SESSION['logged'] == "YES" ){
					?>
					<hr></hr>
					<form action="/do_review.php?ISBN=<?php echo $_GET["ISBN"]?>" method="post">
					<input type=text name="title"id="title" style="border:none;text-align:center;width:15%;" placeholder = "제목" >
					<input type=text name="body" id="body" style="border:none;text-align:center;width:70%;" placeholder = "이 책에 대한 리뷰가 있으신가요? 당신의 리뷰를 작성해 주세요." >
					<input class="add_cart_btn" style="width:14%;text-align:center;" type = "submit" value="리뷰작성"/>
					</form>
					<?php
					}
					?>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================End Related Product Area =================-->
        <section class="related_product_area">
            <div class="container">
                <div class="related_product_inner">
                    <h2 class="single_c_title"><B>같은 분야의 인기 도서</h2>
                    <div class="row">
                        <?php
                            $sql3 = 'SELECT Title,Price,ISBN FROM Book WHERE Category=\''.$row['Category'].'\'';
                            $result3 = mysqli_query($conn, $sql3);

                            for($i = 0; $i<4; $i++){
                                $row3 = mysqli_fetch_array($result3);
                                $sql4 = 'SELECT Image FROM BookDetail WHERE ISBN=\''.$row3['ISBN'].'\'';
                                $result4 = mysqli_query($conn, $sql4);
                                $row4 = mysqli_fetch_array($result4);
                                ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <img class="img-fluid" src="img/thumbnail/<?php echo $row4['Image'] ?>.jpg" alt="">
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li><a class="add_cart_btn" href="/bookdetail.php?ISBN=<?php echo $row3['ISBN']?>">상세정보</a></li>
                                            </ul>
                                            <h4><?php echo $row3['Title'];?></h4>
                                            <h5><?php echo $row3['Price'];?>원</h5>
                                        </div>
                                     </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Related Product Area =================-->
                
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>                                   
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