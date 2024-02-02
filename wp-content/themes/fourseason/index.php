<?php
 /* The main template file
 /**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
          
									
 <!-- Start Header -->
 <section id="hero" class="hero background-withcolor padding-150">
       
	   <div class="container-fluid">
		   <div class="row">
			   <div class="col-md-9 col-sm-12">
				   <div class="border-t-r-radius">
					   <div class="main-slider">
						   <div class="item ">
							   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-1.jpg " class="img-fluid mx-auto" alt=" ">
						   </div>
						   <div class="item ">
							   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-2.jpg " class="img-fluid mx-auto" alt=" ">
						   </div>
						   <div class="item ">
							   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-3.jpg " class="img-fluid mx-auto" alt=" ">
						   </div>
					   </div>
				   </div>
			   </div>
			   <div class="col-md-3 d-none d-md-block hero-zindex">
				   <div class="offer">
					   <div class="icon ">
						   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
					   </div>
					   <span class="icon-pallete">SUMMER SPECIAL OFFER</span>
					   <h4>get new windows today!</h4>
					   <h2>$000 OFF</h2>
					   <h3>Get Your Discount Now</h3>
					   <div class="space-25 "></div>
					  
					   <form >
						   <div class="form-row">
							   <div class="form-group col-md-12">
								   <input type="email" class="form-control" id="inputName4" placeholder="Name">
							   </div>
						   </div>
						   <div class="form-row">
							   <div class="form-group col-md-12">
								   <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
							   </div>
						   </div>
						   <div class="form-row">
							   <div class="form-group col-md-6">
								   <input type="email" class="form-control" id="inputPhone" placeholder="Phone">
							   </div>
							   <div class="form-group col-md-6">
								   <input type="email" class="form-control" id="inputZip" placeholder="Zip">
							   </div>
						   </div>
						   <div class="form-row">
							 <div class="form-group col-md-12">
							   <select id="inputState" class="form-control">
								 <option selected>Type of Project</option>
								 <option>...</option>
							   </select>
							 </div>
						   </div>
						   
						   <button type="submit" class="button">Get Your Free Estimate</button>
						 </form>
				   </div>
			   </div>

			   <div class="col-md-12">
				   <div class="col-lg-6 col-md-8 col-sm-12 offset-md-4">
					   <div class="introduction-box hero-zindex">
						   <div class="icon ">
							   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
						   </div>
						   <h4>Outdoor Livings</h4>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						   </p>
						   <a href="# " class="button ">Start Your Next Project</a>
					   </div>
				   </div>
			   </div>
		   </div>
	   </div>
  
</section>
<!-- End Header -->


<!-- Start Wat -->
<section id="products" class="products padding-100 background-p-top" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/products-shape-bg.png');">
   <div class="container-fluid">
	   <div class="row">
		   <div class="text-center col-sm-12 section-title ">
			   <div class="space-50 "></div>
			   <h3>Update Your Home With Confidence</h3>
			   <div class="space-50 "></div>

		   </div>
	   </div>
	   <div class="row">
		   <div class="col-lg-1 col-md-1"></div>
		   <div class="col-lg-11 col-md-11 col-sm-12 float-right">
			   <div class="row">
			   
					   <div class="col-lg-2 col-md-2 pl-5 pr-0">
						   <nav>
							   <div class="nav nav-tabs nav-fill d-block" id="nav-tab" role="tablist">
								   <a class="nav-item nav-link active d-block" id="nav-livings-tab" data-toggle="tab" href="#nav-livings" role="tab" aria-controls="nav-Outdoor-Livings" aria-selected="true">
									   <span class="icon ">
										   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-icon-1.png" class="img-fluid " />
									   </span>
									   Outdoor Livings
								   </a>
								   <a class="nav-item nav-link d-block" id="nav-bathroom-tab" data-toggle="tab" href="#nav-bathroom" role="tab" aria-controls="nav-Bathrooms" aria-selected="false">
									   <span class="icon ">
										   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-icon-5.png" class="img-fluid " />
									   </span>
									   Bathrooms
								   </a>
								   <a class="nav-item nav-link d-block" id="nav-windows-tab" data-toggle="tab" href="#nav-windows" role="tab" aria-controls="nav-Windows" aria-selected="false">
									   <span class="icon ">
										   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-icon-3.png" class="img-fluid " />
									   </span>
									   Windows
								   </a>
								   <a class="nav-item nav-link d-block" id="nav-doors-tab" data-toggle="tab" href="#nav-doors" role="tab" aria-controls="nav-Doors" aria-selected="false">
									   <span class="icon ">
										   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-icon-4.png" class="img-fluid " />
									   </span>
									   Doors
								   </a>
								   <a class="nav-item nav-link d-block" id="nav-sidings-tab" data-toggle="tab" href="#nav-sidings" role="tab" aria-controls="nav-Sidings" aria-selected="false">
									   <span class="icon ">
										   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-icon-5.png" class="img-fluid " />
									   </span>
									   Sidings
								   </a>
								   <a class="nav-item nav-link d-block" id="nav-gutters-tab" data-toggle="tab" href="#nav-gutters" role="tab" aria-controls="nav-Gutters" aria-selected="false">
									   <div class="icon ">
										   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-icon-6.png" class="img-fluid " />
									   </div>
									   Gutters
								   </a>
							   </div>
						   </nav>
					   </div>
					   <div class="col-lg-10 col-md-10 px-0">
						   <div class="tab-content px-sm-0" id="nav-tabContent">
							   <div class="tab-pane fade show active" id="nav-livings" role="tabpanel" aria-labelledby="nav-Outdoor-Livings-tab" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/product-tab-img.jpg);">
								   <div class="col-lg-6 col-md-8 col-sm-12">
									   <div class="product-content ">
										   <div class="icon ">
											   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
										   </div>
										   <h4>Outdoor Livings</h4>
										   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										   </p>
										   <a href="# " class="button ">Start Your Next Project</a>
									   </div>
								   </div>
							   </div>
							   <div class="tab-pane fade" id="nav-bathroom" role="tabpanel" aria-labelledby="nav-Bathrooms-tab" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/product-tab-img.jpg);">
								   <div class="col-lg-6 col-md-8 col-sm-12">
									   <div class="product-content ">
										   <div class="icon ">
											   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
										   </div>
										   <h4>Bathrooms</h4>
										   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										   </p>
										   <a href="# " class="button ">Start Your Next Project</a>
									   </div>
								   </div>
							   </div>
							   <div class="tab-pane fade" id="nav-windows" role="tabpanel" aria-labelledby="nav-Windows-tab" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/product-tab-img.jpg);">
								   <div class="col-lg-6 col-md-8 col-sm-12">
									   <div class="product-content ">
										   <div class="icon ">
											   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
										   </div>
										   <h4>Windows</h4>
										   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										   </p>
										   <a href="# " class="button ">Start Your Next Project</a>
									   </div>
								   </div>
							   </div>
							   <div class="tab-pane fade" id="nav-doors" role="tabpanel" aria-labelledby="nav-Doors-tab" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/product-tab-img.jpg);">
								   <div class="col-lg-6 col-md-8 col-sm-12">
									   <div class="product-content ">
										   <div class="icon ">
											   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
										   </div>
										   <h4>Doors</h4>
										   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										   </p>
										   <a href="# " class="button ">Start Your Next Project</a>
									   </div>
								   </div>
							   </div>
							   <div class="tab-pane fade" id="nav-sidings" role="tabpanel" aria-labelledby="nav-Sidings-tab" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/product-tab-img.jpg);">
								   <div class="col-lg-6 col-md-8 col-sm-12">
									   <div class="product-content ">
										   <div class="icon ">
											   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
										   </div>
										   <h4>Sidings</h4>
										   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										   </p>
										   <a href="# " class="button ">Start Your Next Project</a>
									   </div>
								   </div>
							   </div>
							   <div class="tab-pane fade" id="nav-gutters" role="tabpanel" aria-labelledby="nav-Gutters-tab" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/product-tab-img.jpg);">
								   <div class="col-lg-6 col-md-8 col-sm-12">
									   <div class="product-content ">
										   <div class="icon ">
											   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
										   </div>
										   <h4>Gutters</h4>
										   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										   </p>
										   <a href="# " class="button ">Start Your Next Project</a>
									   </div>
								   </div>
							   </div>
						   </div>
					   </div>

			   </div>
		   </div>
		 </div>
	   </div>
</section>
<!-- End Wat  -->

<!-- Start Watch SEO -->
<section id="watch_seo" class="watch-seo padding-100">
   <div class="container-fluid ">
	   <div class="row ">
		   <div class="space-50 "></div>
		   <div class="col-lg-6 col-md-6 offset-md-3">
			   <div class="seo-border-wrapper ">
				   <div class="seo background-fullwidth background-fixed">
					   <div class="icon ">
						   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
					   </div>
					   <h4>Seo Section</h4>
					   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						   Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut
						   perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim
						   ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
						   adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
					   <a href="# " class="button ">Learn More Today</a>
				   </div>
			   </div>
		   </div>
	   </div>
   </div>
</section>
<!-- End Watch SEO  -->


<!-- Start Boxes -->
<section id="boxes justify-content-end " class="boxes padding-100 background-p-bottom" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/why-choose-bg-shape.png);">
   <div class="container ">
	   <div class="row ">
		   <div class="text-center col-sm-12 section-title ">
			   <div class="space-50 "></div>
			   <h3>Make The Right Choice</h3>
			   <div class="space-50 "></div>

		   </div>
		   <div class="col-lg-4 col-md-4 col-sm-12 ">
			   <div class="box border-tl-radius">
				   <div class="box-image ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/integrity.jpg" class="img-fluid">
				   </div>
				   <div class="box-content">

					   <h4>Integrity</h4>
					   <div class="space-15 "></div>
					   <p>Proactively syndicate open-source e-markets after low-risk high-yield synergy.Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incidit labore lorem ipsum amet madolor sit amet.</p>
					   <a href="#" class="button">Learn More</a>
					   <div class="space-25"></div>
				   </div>
			   </div>
		   </div>
		   <div class="col-lg-4 col-md-4 col-sm-12 ">
			   <div class="box">
				   <div class=" box-image ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quality.jpg " class="img-fluid ">
				   </div>
				   <div class="box-content ">

					   <h4>Quality</h4>
					   <div class="space-15 "></div>
					   <p>Proactively syndicate open-source e-markets after low-risk high-yield synergy.Lorem ipsum madolor sit amet, consectetur adipisicingconsectetur adipisicing elit, lorem ipsum amet madolor sit amet.</p>
					   <a href="# " class="button ">Learn More</a>
					   <div class="space-25 "></div>
				   </div>
			   </div>
		   </div>
		   <div class="col-lg-4 col-md-4 col-12 ">
			   <div class="box border-br-radius">
				   <div class="box-image ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/innovations.jpg " class="img-fluid ">
				   </div>
				   <div class="box-content ">

					   <h4>Innovations</h4>
					   <div class="space-15 "></div>
					   <p>Proactively syndicate open-source e-markets after low-risk high-yield synergy.Lorem ipsum madolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor coli incidit labore lorem ipsum amet madolor sit amet.</p>
					   <a href="# " class="button ">Learn More</a>
					   <div class="space-25 "></div>
				   </div>
			   </div>
		   </div>
	   </div>
   </div>
</section>
<!-- End Boxes -->


<!-- Gallery -->
<section id="portfolio" class="position-relative padding-100">
	   <div class="container">
		   <div class="row">
			   <div class="col-md-12 text-center">
				   <div class="text-center col-sm-12 section-title ">
					   <div class="space-50 "></div>
					   <div class="icon ">
						   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
					   </div>
					   <div class="space-15"></div>
					   <h3>Explore Your Possibilities</h3>
					   <div class="space-50"></div>

				   </div>
			   </div>
		   </div>
		   <div class="row">
			   <div class="col-lg-12">
				   <div id="mosaic-filter" class="cbp-l-filters bottom30 text-center">
					   <div data-filter="*" class="cbp-filter-item">
						   <span>All</span>
					   </div>
					   <div data-filter=".outdoor-livings" class="cbp-filter-item">
						   <span>Outdoor Livings</span>
					   </div>
					   <div data-filter=".bathrooms" class="cbp-filter-item">
						   <span>Bathrooms</span>
					   </div>
					   <div data-filter=".windows" class="cbp-filter-item">
						   <span>Windows</span>
					   </div>
					   <div data-filter=".doors" class="cbp-filter-item">
						   <span>Doors</span>
					   </div>
					   <div data-filter=".sidings" class="cbp-filter-item">
						   <span>Sidings</span>
					   </div>
					   <div data-filter=".gutters" class="cbp-filter-item">
						   <span>Gutters</span>
					   </div>
				   </div>
			   </div>
		   </div>
	   </div> 
	   <div class="container-fluid">
		   <div class="row">  
			   <div class="col-lg-12 px-5">
				   <div class="space-50"></div>
				   <div id="grid-mosaic" class="cbp cbp-l-grid-mosaic-flat">
					   <!--Item 1-->
					   <div class="cbp-item windows outdoor-livings doors">
						   <img src="http://themesindustry.com/html/trax-2020/images/gallery-5.jpg" alt="">
						   <div class="gallery-hvr whitecolor">
							   <div class="center-box">
								   <a href="http://themesindustry.com/html/trax-2020/images/gallery-5.jpg" class="opens" data-fancybox="gallery" title="Zoom In"> 
									   <i class="fa fa-search"></i>
								   </a>
							   </div>
						   </div>
					   </div>
					   <!--Item 2-->
					   <div class="cbp-item bathrooms outdoor-livings design">
						   <img src="http://themesindustry.com/html/trax-2020/images/gallery-7.jpg" alt="">
						   <div class="gallery-hvr whitecolor">
							   <div class="center-box">
								   <a href="http://themesindustry.com/html/trax-2020/images/gallery-7.jpg" class="opens" data-fancybox="gallery" title="Zoom In"> 
									   <i class="fa fa-search"></i>
								   </a>
							   </div>
						   </div>
					   </div>
					   <!--Item 3-->
					   <div class="cbp-item sidings gutters outdoor-livings windows doors">
						   <img src="http://themesindustry.com/html/trax-2020/images/gallery-11.jpg" alt="">
						   <div class="gallery-hvr whitecolor">
							   <div class="center-box">
								   <a href="http://themesindustry.com/html/trax-2020/images/gallery-11.jpg" class="opens" data-fancybox="gallery" title="Zoom In"> 
									   <i class="fa fa-search"></i>
								   </a>
							   </div>
						   </div>
					   </div>
					   <!--Item 4-->
					   <div class="cbp-item bathrooms doors gutters">
						   <img src="http://themesindustry.com/html/trax-2020/images/gallery-6.jpg" alt="">
						   <div class="gallery-hvr whitecolor">
							   <div class="center-box">
								   <a href="http://themesindustry.com/html/trax-2020/images/gallery-6.jpg" class="opens" data-fancybox="gallery" title="Zoom In"> 
									   <i class="fa fa-search"></i>
								   </a>
							   </div>
						   </div>
					   </div>
					   <!--Item 5-->
					   <div class="cbp-item outdoor-livings sidings windows">
						   <img src="http://themesindustry.com/html/trax-2020/images/gallery-8.jpg" alt="">
						   <div class="gallery-hvr whitecolor">
							   <div class="center-box">
								   <a href="http://themesindustry.com/html/trax-2020/images/gallery-8.jpg" class="opens" data-fancybox="gallery" title="Zoom In"> 
									   <i class="fa fa-search"></i>
								   </a>
							   </div>
						   </div>
					   </div>
					   <!--Item 6-->
					   <div class="cbp-item bathrooms gutters sidings windows">
						   <img src="http://themesindustry.com/html/trax-2020/images/gallery-9.jpg" alt="">
						   <div class="gallery-hvr whitecolor">
							   <div class="center-box">
								   <a href="http://themesindustry.com/html/trax-2020/images/gallery-9.jpg" class="opens" data-fancybox="gallery" title="Zoom In"> 
									   <i class="fa fa-search"></i>
								   </a>
							   </div>
						   </div>
					   </div>
				   </div>
				   <div class="col-lg-12">
					   
				   </div>
			   </div>
		   </div>
	   </div>
   </section>
<!-- Gallery ends -->


<!-- Start Visit -->
<section id="visit " class="visit background-fullwidth background-p-bottom" style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/showroom-bg-shape.png) 70% bottom no-repeat, url(<?php echo get_template_directory_uri(); ?>/assets/images/showroom-bg.jpg) top center no-repeat; /*background-attachment: fixed !important;*/">
   <div class="container-fluid ">
	   <div class="col-lg-6 col-md-6 col-sm-12 d-sm-none d-md-none d-lg-block">
	   </div>
	   <div class="col-lg-6 col-md-8 col-sm-12 float-right">
		   <div class="news ">
			   <h4>Come Visit Our Showroom</h4>
			   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			   </p>
			   <a href="# " class="button ">Visit Our Showroom</a>
		   </div>
	   </div>
   </div>
</section>
<!-- End Visit -->


<!-- Start Deals -->
<section id="deal " class="deal ">
   <div class="container-fluid">
	   <div class="row">
		   
			   <div class="col-lg-11 col-md-11 col-sm-12">
				   <div class="deals-bg">
					   <div class="deals float-right">
						   <div class="icon ">
							   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
						   </div>
						   <span class="icon-pallete">SUMMER SPECIAL OFFER</span>
						   <h4>get new windows today!</h4>
						   <h2>$000 OFF</h2>
						   <h3>Get Your Discount Now</h3>
						   <div class="space-20 "></div>
						   <a href="# " class="button ">Get This Deal Today</a>
					   </div>
				   </div>
			   </div>
			   <div class="col-2 col-md-2 col-sm-12 d-md-none d-sm-none d-lg-block"></div>
	   </div>
   </div>
</section>
<!-- End Deals -->


<!-- Start Trust Logos -->
<section id="logos " class="logos padding-100 ">
   <div class="container-fluid ">
	   <div class="row ">
		   <div class="col-lg-12 col-md-12 col-sm-12 ">
			   <div class="logos-slider background-fullwidth">
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-1.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-2.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-3.jpg " class="img-fluid mx-auto " alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-4.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-5.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-6.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-7.jpg " class="img-fluid mx-auto " alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-1.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-2.jpg " class="img-fluid mx-auto " alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-3.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-4.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-5.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-6.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>
				   <div class="item ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/trust-logo-7.jpg " class="img-fluid mx-auto" alt=" ">
				   </div>

			   </div>
		   </div>
	   </div>
   </div>
</section>
<!-- End Trust Logos  -->


<!-- Start Screenshots -->
<section id="screenshots " class="screenshots extend">
   <div class="container-fluid ">
	   <div class="row">
		   <div class="col-lg-4 col-md-4 col-sm-12 ">
			   <div class="news">
				   <div class="icon ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/seo-icon.jpg " class="img-fluid " />
				   </div>
				   <h4>Keep Up With Four Seasons News</h4>
				   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
				   </p>
				   <a href="# " class="button ">Check Out Our Blog</a>
			   </div>
		   </div>
		   <div class="col-lg-8 col-md-8 col-sm-12 ">
			   <div class="screenshots-slider">
				   <div class="item person text-center ">
					   <div class="img-box ">
						   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/integrity.jpg " class="img-fluid " alt=" ">
					   </div>
					   <div class="box-contents ">
						   <div class="space-20 "></div>
						   <h3>4 Ways to Maximize Enjoyment of Your Sunroom</h3>

						   <div class="space-20 "></div>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo
							   consequat.
						   </p>
						   <a href="# " class="button ">Read More</a>
					   </div>
				   </div>
				   <div class="item person text-center ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quality.jpg " class="img-fluid d-block mx-auto " alt=" ">
					   <div class="box-contents ">
						   <div class="space-20 "></div>
						   <h3>Building a Sunroom? Choose the Perfect Ceiling Style</h3>
						   <div class="space-20 "></div>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo
							   consequat.
						   </p>
						   <a href="# " class="button ">Read More</a>
					   </div>
				   </div>
				   <div class="item person text-center ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/innovations.jpg " class="img-fluid d-block mx-auto " alt=" ">
					   <div class="box-contents ">
						   <div class="space-20 "></div>
						   <h3>Important Details in a Home Improvment Contracts</h3>
						   <div class="space-20 "></div>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo
							   consequat.
						   </p>
						   <a href="# " class="button ">Read More</a>
					   </div>
				   </div>
				   <div class="item person text-center ">
					   <div class="img-box ">
						   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/integrity.jpg " class="img-fluid " alt=" ">
					   </div>
					   <div class="box-contents ">
						   <div class="space-20 "></div>
						   <h3>4 Ways to Maximize Enjoyment of Your Sunroom</h3>

						   <div class="space-20 "></div>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo
							   consequat.
						   </p>
						   <a href="# " class="button ">Read More</a>
					   </div>
				   </div>
				   <div class="item person text-center ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/quality.jpg " class="img-fluid d-block mx-auto " alt=" ">
					   <div class="box-contents ">
						   <div class="space-20 "></div>
						   <h3>Building a Sunroom? Choose the Perfect Ceiling Style</h3>
						   <div class="space-20 "></div>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo
							   consequat.
						   </p>
						   <a href="# " class="button ">Read More</a>
					   </div>
				   </div>
				   <div class="item person text-center ">
					   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/innovations.jpg " class="img-fluid d-block mx-auto " alt=" ">
					   <div class="box-contents ">
						   <div class="space-20 "></div>
						   <h3>Important Details in a Home Improvment Contracts</h3>
						   <div class="space-20 "></div>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo
							   consequat.
						   </p>
						   <a href="# " class="button ">Read More</a>
					   </div>
				   </div>


			   </div>
		   </div>
	   </div>
   </div>
</section>
<!-- End Screenshots -->



<!-- Start  Git in touch -->
<section id="git_in_touch " class="git-in-touch padding-150 ">
   <div class="container ">
	   <div class="row ">
		   <div class="col-lg-6 col-md-6 col-sm-12 px-0">
			   <!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/map.jpg" class="img-fluid"> -->
			   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55251.37709962986!2d31.22344494535329!3d30.059483810352845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1540147674461 " style="border:0 " allowfullscreen></iframe>
		   </div>
		   <div class="col-lg-6 col-md-6 col-sm-12 px-0">
			   <div class="">
				   <div class="reviews-slider">
					   <div class="item">
						   <h4>Surviving Your Area With Superior Service</h4>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						   </p>
						   <span class="by">- Ashley Andrews</span>
						   <a href="# " class="button ">View All Reviews</a>
					   </div>
					   <div class="item">
						   <h4>Surviving Your Area With Superior Service</h4>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						   </p>
						   <span class="by">- Jhon Carter</span>
						   <a href="# " class="button ">View All Reviews</a>
					   </div>
					   <div class="item">
						   <h4>Surviving Your Area With Superior Service</h4>
						   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis. nostrexercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						   </p>
						   <span class="by">- Mike Pompe</span>
						   <a href="# " class="button ">View All Reviews</a>
					   </div>
				   </div>
			   </div>
		   </div>
	   </div>
   </div>
</section>
<!-- End  Git in touch  -->

<!-- Start  Map -->
<!--  <section class="map ">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55251.37709962986!2d31.22344494535329!3d30.059483810352845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2sCairo%2C+Cairo+Governorate!5e0!3m2!1sen!2seg!4v1540147674461 "
	   style="border:0 " allowfullscreen></iframe>
</section> -->
<!-- End  Map  -->
                                            
<?php
get_footer();
