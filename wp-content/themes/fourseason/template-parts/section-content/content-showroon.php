<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>

     <!-- Start Visit -->
     <section id="visit " class="visit background-fullwidth background-p-bottom" style="background: url('<?php echo get_sub_field('background_shape_image'); ?>') 70% bottom no-repeat, url('<?php echo get_sub_field('background_image'); ?>') top center no-repeat; /*background-attachment: fixed !important;*/">
        <div class="container-fluid ">
            <div class="col-lg-6 col-md-6 col-sm-12 d-sm-none d-md-none d-lg-block">
            </div>
            <div class="col-lg-6 col-md-8 col-sm-12 float-right">
                <div class="news ">
                    <h4><?php echo get_sub_field('box_title'); ?></h4>
                    <p><?php echo get_sub_field('box_content'); ?></p>

                            <?php	
								if( have_rows('call_to_action') ): 
									while ( have_rows('call_to_action' ) ) : the_row();
							?>
							<a href="<?php echo get_sub_field('button_action_link'); ?>" class="button "><?php echo get_sub_field('button_label'); ?></a>
							<?php
									endwhile;
								endif;
							?>
                
                </div>
            </div>
        </div>
    </section>
    <!-- End Visit -->

