<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <base href="<?=base_url()?>">
		<title>Sundarbans GmbH | <?=$page_title?></title>
		<meta name="description" content="Imsufex">
		<meta name="author" content="Imsufex">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
                <link rel="shortcut icon" href="uploads/extra/logo/<?=$site->front_favicon?>">
		
		    	
		<!-- CSS StyleSheets -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&amp;amp;subset=latin,latin-ext">
		<link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/frontend/css/animate.css">
		<link rel="stylesheet" href="assets/frontend/css/prettyPhoto.css">
		<link rel="stylesheet" href="assets/frontend/css/slick.css">
		<link rel="stylesheet" href="assets/frontend/rs-plugin/css/settings.css">
                

                <!-- Gallery CSS -->
		<link rel="stylesheet" href="assets/frontend/css/gallery.css">
		<!-- End of Gallery CSS -->
                
		<link rel="stylesheet" href="assets/frontend/css/style.css">
		<link rel="stylesheet" href="assets/frontend/css/responsive.css">
		<!--[if lt IE 9]>
	    	<link rel="stylesheet" href="assets/frontend/css/ie.css">
	    	<script type="text/javascript" src="assets/frontend/js/html5.js"></script>
	    <![endif]-->


		<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
		<link rel="stylesheet" href="assets/frontend/css/skins/skin5.css">
                <style>
                    header.top-head .logo {
                        margin-top: 0px;
                    }
                    .sticky .logo {
                        margin-top: 0px !important;
                    }
                    .logo  img{
                        width: 200px;
                    }
                    .sticky .logo  img{
                        width: 155px;
                    }
                    header.top-head .logo a, .foot-logo {
                        background: transparent;
                    }
                    .sticky .top-nav > ul > li > a span:hover{
                        color: #00c136;
                    }
                    .widget-content .active a{
                        color: #00c136;
                    }
                </style>
	
	</head>
	<body>
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">

			<!-- Header Start -->
			<div id="headWrapper" class="clearfix">
		    	
		    	<!-- top bar start -->
		    	<div class="top-bar">
				    <div class="container">
						<div class="row">
							<div class="cell-5">
							    <ul>
								    <li><a href="#"><i class="fa fa-envelope"></i>info@sundarbans-gmbh.eu</a></li>
								    <li><span><i class="fa fa-phone"></i> Telefone: +49123456789</span></li>
							    </ul>
							</div>
						</div>
				    </div>
			    </div>
			    <!-- top bar end -->
			    
			    <!-- Logo, global navigation menu and search start -->
			    <header class="top-head" data-sticky="true">
				    <div class="container">
					    <div class="row">
					    	<div class="logo cell-3">
                                                    <a href=""><img src="uploads/extra/logo/<?=$site->front_logo?>"></a>
                                                </div>
                                                <div class="cell-9 top-menu">
                                                        <!-- top navigation menu start -->
                                                        <nav class="top-nav mega-menu">
                                                            <ul>
                                                              <li class="<?=($controller == 'home')?'selected':''?>"><a href="home"><i class="fa fa-home"></i><span>Home</span></a>
                                                              </li>
                                                              <li class="<?=($controller == 'about')?'selected':''?>"><a href="about"><i class="fa fa-info"></i><span>About Us</span></a>
                                                              </li>
                                                              <li class="<?=($controller == 'products')?'selected':''?>"><a href="products"><i class="fa fa-suitcase"></i><span>Products</span></a>
                                                              </li>
                                                              <li class="<?=($controller == 'data_protection')?'selected':''?>"><a href="data_protection"><i class="fa fa-check-circle"></i><span>Data Protection</span></a>
                                                              </li>
                                                              <li class="<?=($controller == 'contact')?'selected':''?>"><a href="contact"><i class="fa fa-envelope-o"></i><span>Contact</span></a>
                                                              </li>
                                                            </ul>
                                                        </nav>
                                                        <!-- top navigation menu end -->
                                                    </div>
					    </div>
				    </div>
			    </header>
			    <!-- Logo, Global navigation menu and search end -->
			</div>
			<!-- Header End -->
			
