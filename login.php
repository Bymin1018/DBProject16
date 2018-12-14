<?php session_start(); ?>
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
        <?php
		if($_SESSION['logged'] == "YES"){
			?>
			<script>
			alert("이미 로그인되어있습니다.");
			history.back();
			</script>
			<?php
		}
		?>
        <!--================Menu Area =================-->
        <header class="shop_header_area carousel_menu_area">
            <div class="carousel_top_header row m0">
                <div class="container">
                    <div class="carousel_top_h_inner">
                        <div class="float-md-left">
                            <div class="top_header_left">
                                <div class="selector">
                                    <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                      <option value='yt' data-image="img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                                      <option value='yu' data-image="img/icon/flag-1.png" data-imagecss="flag yu" data-title="Bangladesh">Bangla</option>
                                      <option value='yt' data-image="img/icon/flag-1.png" data-imagecss="flag yt" data-title="English">English</option>
                                      <option value='yu' data-image="img/icon/flag-1.png" data-imagecss="flag yu" data-title="Bangladesh">Bangla</option>
                                    </select>
                                </div>
                                <select class="selectpicker usd_select">
                                    <option>USD</option>
                                    <option>$</option>
                                    <option>$</option>
                                </select>
                            </div>
                        </div>
                        <div class="float-md-right">
                            <div class="top_header_middle">
                                <a href="#"><i class="fa fa-phone"></i> Call Us: <span>+84 987 654 321</span></a>
                                <a href="#"><i class="fa fa-envelope"></i> Email: <span>support@yourdomain.com</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel_menu_inner">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        
                    </nav>
                </div>
            </div>
        </header>
        <!--================End Menu Area =================-->
        
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>LOgin</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="track.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================login Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="login_title">
                                <h2>log in your account</h2>
                                <p>Log in to your account to discovery all great features in this template.</p>
                            </div>
                            <form action = "/do_login.php" method = "post" class="login_form row">
                                <div class="col-lg-12 form-group">
                                    <input name="id" id = "id" class="form-control" type="id" placeholder="ID">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input name="pwd" id = "pwd" class="form-control" type="password" placeholder="Password">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Keep me logged in</label>
                                        <div class="check"></div>
                                    </div>
                                    <h4>Forgot your password ?</h4>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <button type="submit" value="submit" class="btn update_btn form-control">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-8">
                            <div class="login_title">
                                <h2>회원가입</h2>
                            </div>
                            <form class="login_form row" action="./create_account.php" method="post">
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="이름" name="name">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="ID" name="id">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="주소" name="address">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="나이" name="age">
                                </div>
                                <div class="col-lg-6 form-group">
								<select name="sex" style="width:100%;height:100%">
									<option value="">성별선택</option>
									<option value="M">남자</option>
									<option value="W">여자</option>
								</select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" placeholder="비밀번호" name="pw">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" placeholder="비밀번호 확인">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button type="submit" value="submit" class="btn subs_btn form-control">register now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="container">
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