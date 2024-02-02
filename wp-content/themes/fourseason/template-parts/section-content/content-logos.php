<?php
/**
*
* Simple component which spans the entire width of the page and allows for a WYSIWYG field.
*
*
**/

?>

     <!-- Start Trust Logos -->
     <section id="logos " class="logos padding-100 ">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12 col-md-12 col-sm-12 ">

                    <?php 
                        $images = get_sub_field('logo_gallery');
                        if( $images ): 
                    ?>

                        <div class="logos-slider background-fullwidth">

                                <?php foreach( $images as $image ): ?>

                                    <div class="item ">
                                        <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid mx-auto" alt="<?php echo esc_attr($image['alt']); ?>">
                                    </div>

                                <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Trust Logos  -->

