<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

// Theme Options => Mobile Area
$title1 = get_field('sticky_menu_title_1', 'general-options') ? get_field('sticky_menu_title_1', 'general-options') :'';
$title2 = get_field('sticky_menu_title_2', 'general-options') ? get_field('sticky_menu_title_2', 'general-options') :'';

// Theme Options => Company Info => Location Info
$rows = get_field('info_location_info', 'general-options');
$name = $rows[0]['name'] ? $rows[0]['name'] : '';
$address = $rows[0]['address'] ? $rows[0]['address'] : '';
$city = $rows[0]['city'] ? $rows[0]['city'] : '';
$state = $rows[0]['state'] ? $rows[0]['state'] : '';
$state_abbr = $rows[0]['state_abbr'] ? $rows[0]['state_abbr'] : '';
$zip = $rows[0]['zip'] ? $rows[0]['zip'] : '';
$phone = $rows[0]['phone'] ? $rows[0]['phone'] : '';
$email = $rows[0]['email'] ? $rows[0]['email'] : '';
?>

<div class="sticky-menu-lightbox">
    <div class="lightbox-inner">
        <button type="button" class="close upper" data-dismiss="modal" aria-label="Close">
          <span class="" aria-hidden="true">Close Menu <i class="fas fa-times"></i></span>
        </button>
        <div class="d-flex flex-row flex-wrap justify-content-center">
            <div class="lightbox-column menu-column col-7 col-md-5 col-lg-4">
                <div class="row">
                    <div class="h1 white semi-bold col-12"><?php echo $title1; ?></div>
                    <div class="menu-main col-12 col-sm-6"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class'   => 'sticky-menu-nav', 'menu_class' => 'menu main-menu' ) ); ?></div>
                    <div class="menu-top col-12 col-sm-6"><?php wp_nav_menu( array( 'theme_location' => 'top', 'container_class'   => 'sticky-menu-nav', 'menu_class' => 'menu top-menu' ) ); ?></div>
                </div>
            </div>
            <div class="lightbox-column contact-column col-7 col-md-5 col-lg-4">
                <div class="row">
                    <div class="h1 white semi-bold col-12"><?php echo $title2; ?></div>
                    <div class="lightbox-info col-12">
                        <div class="address"><?php echo $address; ?> <br /><?php echo $city; ?>, <?php echo $state_abbr; ?> <?php echo $zip; ?></div>
                        <div class="phone"><a href="tel:<?php echo strip_phone_number(''.$phone.''); ?>"><?php echo $phone; ?></a></div>
                        <div class="email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
