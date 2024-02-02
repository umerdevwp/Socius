<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>
	<!-- Start Watch SEO -->
	<section id="watch_seo" class="watch-seo padding-100">
        <div class="container-fluid ">
            <div class="row ">
                <div class="space-50 "></div>
                <div class="col-lg-6 col-md-6 offset-md-3">
                    <div class="seo-border-wrapper ">
                        <div class="seo background-fullwidth background-fixed" style="background-image: url('<?php echo get_sub_field('background_image'); ?>');">
                            <div class="icon ">
                                <img src="<?php echo get_sub_field('icon_image'); ?>" class="img-fluid " />
                            </div>
                            <h4><?php echo get_sub_field('title'); ?></h4>
							<p><?php echo get_sub_field('content'); ?></p>
							<?php	
								if( have_rows('call_to_action') ): 
									while ( have_rows('call_to_action' ) ) : the_row();
							?>
							<a href="<?php echo get_sub_field('button_link'); ?>" class="button "><?php echo get_sub_field('button_label'); ?></a>
							<?php
									endwhile;
								endif;
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Watch SEO  -->

