<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title><?php echo $title;?></title>
    <link rel="shortcut icon" href="/assets_admin/img/favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="/assets_admin/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets_admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assets_admin/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/assets_admin/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/assets_admin/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="/assets_admin/css/style.css" rel="stylesheet">
    <link href="/assets_admin/css/style-responsive.css" rel="stylesheet">
    <link href="/assets_admin/css/table-responsive.css" rel="stylesheet">
    <link href="/assets_admin/css/jquery.dataTables.min.css" rel="stylesheet" >
    <link href="/assets_admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets_admin/css/chosen.min.css">

    <!--script src="/assets_admin/js/chart-master/Chart.js"></script-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .bolder{font-weight: bolder;}
        .content-panel{
            padding-left:20px;
            padding-right:20px;
        }
        .dataTables_messagefil, .dataTables_tgl{
            float:left;
        }
        .chosen-container-single .chosen-single{
           border:1px solid #ccc;
        }
        .cart-toggle{
            margin-top:15px;
        }
        .cart-dropdown-list{
            top:57px !important;
            margin: 2px -180px 0px;
        }
        .cart-notify{
            left: 197px;
        }
        .cart-item{
            padding: 15px 10px; 
            border-bottom:1px solid #EBEBEB; 
            font-size:12px;
        }
        .cart-item-product .amount{
            float:right;
        }
    </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      	<header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/administrator" class="logo"><b>I&nbsp;N&nbsp;E&nbsp;R&nbsp;R&nbsp;E</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-divya.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-danro.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-sherman.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu ">
            	<ul class="nav pull-right top-menu">

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle cart-toggle" href="#">
                            <i class="fa fa-shopping-cart"></i>
                            <?php
                            if(isset($loadCartbyUser)){
                                $totalitem = '';
                                foreach ($loadCartbyUser as $lcbu) {
                                    $totalitem = $totalitem + $lcbu->amount;
                                }
                            ?>
                                <span class="badge bg-theme"><?php echo $totalitem;?></span>
                            <?php
                            }else{
                            ?>
                                <span class="badge bg-theme">0</span>
                            <?php    
                            }
                            ?>
                            
                        </a>
                        <ul class="dropdown-menu extended tasks-bar cart-dropdown-list">
                            <div class="notify-arrow notify-arrow-green cart-notify"></div>
                            <li>
                                <p class="green">Cart</p>
                            </li>
                            <?php
                            if(isset($loadCartbyUser)){
                                foreach ($loadCartbyUser as $row) {
                            ?>
                                <li>
                                    <div class="cart-item">
                                        <span class="cart-item-product ">
                                            <span class="product"><?php echo $row->nama_barang;?> </span>
                                            <span class="amount"><?php echo $row->amount;?></span>
                                        </span>
                                    </div>
                                </li>
                            <?php
                                }
                            
                            }else{
                            ?>
                                <li>
                                    <div class="cart-item" >
                                        <span class="cart-item-product  ">
                                            Cart Empty
                                        </span>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                            <li>
                                
                            </li>
                            <li class="external">
                                <a href="/administrator/cart">View Cart Detail</a>
                            </li>
                        </ul>
                    </li>

                    <li><a class="logout" href="/auth/logout">Logout</a></li>

            	</ul>
            </div>
        </header>
      <!--header end-->