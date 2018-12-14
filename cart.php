<?php session_start();
    $conn = mysqli_connect(
  '35.236.158.28',
  'root',
  '12341234',
  'dbproject');
    if( $_SESSION['logged'] == "YES" )
    {
        $USER_N = $_SESSION['user_n'];
        $sql = 'SELECT * FROM Order_ WHERE CustomerNumber='.$USER_N.' AND State=0';
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    }
    else
    {
        header("Location: /index.php"); 
    }
    $Total = 0;

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
                        <a class="navbar-brand" href="/"><img src="img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href="/index.php">홈</a></li>
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
        
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>장바구니</h3> 
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_100">
            <div class="container">
                <div class="row">               
                    <div class="col-lg-8">
                        <div class="cart_items">
                            <h3>장바구니 목록</h3>
                            
                        
                    <?php
                    for($i = 0; $i<$result->num_rows;$i++){
                        $sql2 = 'SELECT * FROM Book WHERE ISBN = \''.$row['ISBN'].'\''; //isbn으로 북정보
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_array($result2);
                        ?>
                        <div class="table-responsive-md">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <img src="img/icon/close-icon.png" alt="">
                                            </th>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="img/thumbnail/<?php echo $row2['ISBN'] ?>.jpg" alt=""
                                                        width="150" height="200">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $row2['Title'];?></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p class="red"><?php echo $row2['Price'];?>원</p></td>
                                            <td>
                                                <td><p><?php echo $row['Amount'];?>개</p></td>
                                            </td>
                                            <td><p><?php echo $row2['Price']*$row['Amount'];
                                            $Total+=$row2['Price']*$row['Amount'];?>원</p></td>
                                        </tr>   
                                    </tbody>
                                </table>
                            </div>
                        <?php
                        $row=mysqli_fetch_array($result);
                    }?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart_totals_area">
                            <div class="cart_t_list">
                                <div class="media">
                                    <div class="d-flex">
                                        <h5>총 상품 가격</h5>
                                    </div>
                                    <div class="media-body">
                                        <h6><?php echo $Total?>원</h6>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <h5>배송료</h5>
                                    </div>
                                    <div class="media-body">
                                        <h6>5000원</h6>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="d-flex">
                                        <h5>합계</h5>
                                    </div>
                                    <div class="media-body">
                                        <h6 style="color:red"> <?php echo $Total+5000;?>원</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" value="submit" class="btn subs_btn form-control" onclick="location.href = '/buy.php'">구매</button>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Shopping Cart Area =================-->       
        
        
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