<!DOCTYPE html>
<html>
    <head>
        <title>INERRE interior <?php echo $title;?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Hans Hartono">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- Favicons -->
        <link rel="shortcut icon" href="/assets/images/favicon.png">
        <link rel="apple-touch-icon" href="/assets/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/apple-touch-icon-114x114.png">
        <!-- CSS -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/style-responsive.css">
        <link rel="stylesheet" href="/assets/css/animate.min.css">
        <link rel="stylesheet" href="/assets/css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="/assets/css/magnific-popup.css">
        <!-- Load Google Analytic Code -->
        <?php //$this->load->view('public_template/analyticstracking');?>
    </head>

    <body class="appear-animate">
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
        <!-- Page Wrap -->
        <div class="page" id="top">
        <?php 
            $uri_satu = $this->uri->segment(1);
            if(($uri_satu=="") || (isset($homeactive)) || (isset($showroomactive))){
                $classNavOption = "transparent stick-fixed"; 
            }else{
                $classNavOption = "js-stick";
            }
        ?>
            <!-- Navigation panel -->
            <nav class="main-nav transparent stick-fixed <?php //echo $classNavOption;?>">
                <div class="full-wrapper relative clearfix">
                    <?php 
                        /*
                         * jika bukan halaman home
                         * munculkan logo
                         */
                        if((isset($homeactive)) || ($uri_satu=="")){

                            // echo nothing
                        ?>
                            <!-- Logo ( * your text or image into link tag *) -->
                            <div class="hidden-lg hidden-md nav-logo-wrap local-scroll">
                                <a href="/home" class="logo">
                                    <img src="/assets/images/logo-white-2.png" width="177" height="40.5" alt="" />
                                </a>
                            </div>
                        <?php
                        }else{
                    ?>
                            <!-- Logo ( * your text or image into link tag *) -->
                            <div class="nav-logo-wrap local-scroll">
                                <a href="/home" class="logo">
                                    <img src="/assets/images/logo-white-2.png" width="177" height="40.5" alt="" />
                                </a>
                            </div>
                    <?php
                        }
                    ?>

                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist">
                            <!-- Home -->
                            <li>
                                <a href="<?php echo (isset($homeactive)) ? "#" : "/home" ;?>" class="<?php echo (isset($homeactive)) ? $homeactive : "";?>">Home</a>
                            </li>
                            <!-- End Home -->
                            <!-- Showroom -->
                            <li>
                                <a href="<?php echo (isset($showroomactive)) ? "#" : "/showroom";?>" class="<?php echo (isset($showroomactive)) ? $showroomactive : "";?>">Showroom</a>
                            </li>
                            <!-- End Showroom -->
                            <!-- Portfolio -->
                            <li>
                                <a href="<?php echo (isset($portfolioactive)) ? "#" : "/portfolio";?>" class="<?php echo (isset($portfolioactive)) ? $portfolioactive : "";?>">Portfolio</a>
                            </li>
                            <!-- End Portfolio -->
                            <!-- About Us -->
                            <li>
                                <a href="<?php echo (isset($aboutactive)) ? "#" : "/about";?>" class="<?php echo (isset($aboutactive)) ? $aboutactive : "";?>">About</a>
                            </li>
                            <!-- End About Us -->
                            <!-- Contact Us -->
                            <li>
                                <a href="<?php echo (isset($contactactive)) ? "#" : "/contact";?>" class="<?php echo (isset($contactactive)) ? $contactactive : "";?>">Contact</a>
                            </li>
                            <!-- End Contact Us -->
                            <!-- Search -->
                            <!--
                            <li>
                                <a href="#" class="mn-has-sub"><i class="fa fa-search"></i> Search</a>
                                <ul class="mn-sub">
                                    <li>
                                        <div class="mn-wrap">
                                            <form method="post" class="form">
                                                <div class="search-wrap">
                                                    <button class="search-button animate" type="submit" title="Start Search">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                    <input type="text" class="form-control search-field" placeholder="Search...">
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            -->
                            <!-- End Search -->
                            <!-- Cart -->
                            <!--
                            <li>
                                <a href="#"><i class="fa fa-shopping-cart"></i> Cart(0)</a>
                            </li>
                            -->
                            <!-- End Cart -->
                        </ul>
                    </div>
                    <!-- End Main Menu -->
                </div>
            </nav>
            <!-- End Navigation panel -->