<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>

    <!-- Start Deals -->
    <section id="deal " class="deal">
        <div class="container-fluid">
            <div class="row">
                
                    <div class="col-lg-11 col-md-11 col-sm-12">
                        <div class="deals-bg" style="background-image: url('<?php echo get_sub_field('background_image'); ?>');">
                            <div class="deals float-right">
                                <div class="icon ">
                                    <img src="<?php echo get_sub_field('box_icon_image'); ?>" class="img-fluid " />
                                </div>
                                <span class="icon-pallete"><?php echo get_sub_field('box_icon_pallet'); ?></span>
                                <h4><?php echo get_sub_field('box_deal_caption'); ?></h4>
                                <h2><?php echo get_sub_field('box_deal_offer'); ?></h2>
                                <h3><?php echo get_sub_field('box_discount'); ?></h3>
                                <div class="space-20 "></div>
                                
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
                    <div class="col-2 col-md-2 col-sm-12 d-md-none d-sm-none d-lg-block"></div>
            </div>
        </div>
    </section>
    <!-- End Deals -->

