<?php session_start();
    $conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
	if( $_SESSION['logged'] == "YES" )
    {
        $USER_N = $_SESSION['user_n'];
        //$sql = 'SELECT * FROM Order_ WHERE CustomerNumber='.$USER_N.' AND State=0';
		$sql = "select count(*) as coun, ISBN from Order_ where CustomerNumber='".$USER_N."' AND State>0 group by ISBN order by coun desc";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    }
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
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', '제목');
        data.addColumn('number', '개수');
        data.addRows([
		<?php
		for($i=0;$i<$result->num_rows;$i++){
		$sql2='select * from Book where ISBN='.$row['ISBN'];
		$result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($result2);
		if($i+1!=$result->num_rows) echo "['".$row2['Title']."',".$row['coun']."],";
		else echo "['".$row2['Title']."',".$row['coun']."]";
		$row = mysqli_fetch_array($result);
		}
		?>
        ]);

        // Set chart options
        var options = {'title':'구매한 책의 이름과 개수',
                       'width':1000,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

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
            </div>
        </header>
        <!--================End Menu Area =================-->
        
        <!--================Product Details Area =================-->
        <section class="product_details_area">
            <div class="container">
			<h2>나의 통계보기</h2>
			<hr></hr>
                <div class="row">
				<?php
				if( $_SESSION['logged'] == "YES" ) echo "<div id='chart_div'></div>";
				else echo "통계는 로그인 해야만 볼 수 있습니다";
				?>
                    
                </div>
				<hr></hr>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Product Description Area =================-->
        <!--================End Product Details Area =================-->
        
        <!--================End Related Product Area =================-->
        <!--================End Related Product Area =================-->
                
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