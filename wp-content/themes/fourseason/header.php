<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <!-- Place favicon.ico in the root directory -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="img/x-icon" rel="shortcut icon">
    <!-- Font css files are included here. -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100&display=swap" rel="stylesheet">

    
	<?php wp_head(); ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
</head>

<body <?php body_class(); ?> >  
<?php wp_body_open(); ?>

    <!-- Start Preloader -->
    <!--  <div class="preloader">
        <div class="loader-wrapper">
            <div class="loader"></div>
        </div>
    </div> -->
    <!-- End Preloader -->



    <!-- Start Header -->
    <header class="fshp-header">
        
        <nav class="navbar navbar-expand-lg navbar-light" id="fshp_menu">
            
					<div class="col-md-4 col-sm-6">
						<a class=" navbar-brand " href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png " class="img-fluid " alt=" ">
						</a>
					</div>

                    <div class="col-md-8 col-sm-6">
                        <div class="top-bar d-block">
                            <ul class="nav justify-content-end">
                                <li class="nav-item d-none d-md-block"><a class="nav-link" href="# ">Contact Us</a></li>
                                <li class="nav-item d-none d-md-block"><a class="nav-link" href="# ">Free Estimate </a></li>
                                <li style="margin-top:-15px;"><a class="nav-link p-number" href="# ">816.524.2770 </a></li>
                            </ul>
                            <!--  <span class="p-number">816.524.2770</span> -->
                        </div>
                        <div class="bottom-bar">
                            <button class="navbar-toggler " type="button " data-toggle="collapse " data-target="#main_menu " aria-controls="main_menu" aria-expanded="false " aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                            </button>
                            <div class="collapse navbar-collapse " id="main_menu">
                                <ul class="navbar-nav ml-auto ">
                                    <li class="nav-item ">
                                        <a class="nav-link anchor active " href="# ">Outdoor Living</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link anchor " href="# ">Bathrooms</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link anchor " href="# ">Windows</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link anchor " href="# ">Doors</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link anchor " href="# ">Siding</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link anchor " href="# ">Gutters</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link anchor " href="# ">About Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

             
        </nav>
          
    </header>
    <!-- End Header -->
