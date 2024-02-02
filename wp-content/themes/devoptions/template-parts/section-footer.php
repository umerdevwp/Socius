<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

$service_menu = get_field('ftr_services_menu', 'general-options') ? get_field('ftr_services_menu', 'general-options') :'';
$company_menu = get_field('ftr_company_menu', 'general-options') ? get_field('ftr_company_menu', 'general-options') :'';
$ftr_logo = get_field('ftr_logo', 'general-options') ? get_field('ftr_logo', 'general-options') :'';

$rows = get_field('info_location_info', 'general-options');
$name = $rows[0]['name'] ? $rows[0]['name'] : '';
$address = $rows[0]['address'] ? $rows[0]['address'] : '';
$city = $rows[0]['city'] ? $rows[0]['city'] : '';
$state = $rows[0]['state'] ? $rows[0]['state'] : '';
$state_abbr = $rows[0]['state_abbr'] ? $rows[0]['state_abbr'] : '';
$zip = $rows[0]['zip'] ? $rows[0]['zip'] : '';
$phone = $rows[0]['phone'] ? $rows[0]['phone'] : '';
$directions_link = 'https://www.google.com/maps/dir/Current+Location/'.$address.',+'.$city.',+'.$state.'+'.$zip.'';
$directions_link = str_replace(' ', '+', $directions_link);
$directions = $rows[0]['directions'] ? $rows[0]['directions'] : '';
?>

<footer class="site-footer d-block w-100 bg-blue">
	<div class="ftr-top">
        <div class="container-fluid col-lg-10">
            <div class="row">
                <div class="ftr-logo col-12 col-lg-4 to-animate fadeInUp">
                    <div class="logobox">
                        <a class="logo" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img class="lazyload" data-src="<?php echo $ftr_logo['url']; ?>" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="<?php bloginfo( 'name' ); ?>">
                        </a>
                    </div>
                </div>
                <div class="ftr-info-box col-6 col-lg-4 to-animate fadeInUp delay-200ms">
                    <div class="ftr-info">
                        <div class="ftr-phone"><a href="tel:<?php echo strip_phone_number(''.$phone.''); ?>"><?php echo $phone; ?></a></div>
                        <div class="ftr-address"><?php echo $address; ?> <br class="d-sm-none" /><?php echo $city; ?>, <?php echo $state_abbr; ?> <?php echo $zip; ?></div>
                    </div>
                    <div class="ftr-directions"><a href="<?php echo $directions_link; ?>" target="_blank"><i class="fas fa-map-marker-alt"></i> <span><?php echo $directions; ?></span></a></div>
                    <div class="ftr-social">
                        <?php get_template_part( 'template-parts/content-social' ); ?>
                    </div>
                </div>
                <div class="ftr-menu col-3 col-lg-2 to-animate fadeInUp delay-400ms">
                    <?php echo $service_menu; ?>
                </div>
                <div class="ftr-menu col-3 col-lg-2 to-animate fadeInUp delay-600ms">
                    <?php echo $company_menu; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="ftr-bottom bg-blue-dark to-animate fadeInUp delay-400ms">
		<div class="site-info">Copyright <?php echo date('Y'); ?> - <?php bloginfo( 'name' ); ?> <span> All Rights Reserved.</span></div>
	</div>
</footer>
