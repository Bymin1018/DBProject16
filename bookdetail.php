<?php
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
        <title>Persuit</title>

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
                        <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown submenu">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Home <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="index.html">Home Simple</a></li>
                                        <li class="nav-item"><a class="nav-link" href="home-carousel.html">Home Carousel</a></li>
                                        <li class="nav-item"><a class="nav-link" href="home-fullwidth.html">Home Full Width</a></li>
                                        <li class="nav-item"><a class="nav-link" href="home-parallax.html">Home Parallax</a></li>
                                        <li class="nav-item"><a class="nav-link" href="home-sidebar.html">Home Boxed</a></li>
                                        <li class="nav-item"><a class="nav-link" href="home-fixed-menu.html">Home Fixed</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown submenu">
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
                                <li class="nav-item dropdown submenu active">
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
                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            </ul>
                            <ul class="navbar-nav justify-content-end">
                                <li class="search_icon"><a href="#"><i class="icon-magnifier icons"></i></a></li>
                                <li class="user_icon"><a href="#"><i class="icon-user icons"></i></a></li>
                                <li class="cart_cart"><a href="#"><i class="icon-handbag icons"></i></a></li>
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
                                <div class="custom">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                    <input type="text" name="qty" id="sst" maxlength="12" value="01" title="Quantity:" class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                </div>
                                <a class="add_cart_btn" href="#">add to cart</a>
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
                        <h4>Rocky Ahmed</h4>
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
                                                <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="/bookdetail.php?ISBN=<?php echo $row3['ISBN']?>">상세정보</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
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