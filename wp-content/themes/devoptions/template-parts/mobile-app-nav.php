<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();
?>
<div class="mobile-app-nav d-lg-none bg-red">
    <?php if( have_rows('mobile_app_repeater','general-options') ): while( have_rows('mobile_app_repeater','general-options') ): the_row();
		$app_icon = get_sub_field('app_icon') ? get_sub_field('app_icon') :'';
    	$app_text = get_sub_field('app_text') ? get_sub_field('app_text') :'';
    	$app_class = get_sub_field('app_class') ? get_sub_field('app_class') :'';
		$app_link = get_sub_field('app_link') ? get_sub_field('app_link') :'';
		$app_link_off = get_sub_field('app_link_off');
		$link_select = get_sub_field('app_link_select');
        if($link_select == 'off') {
            $link = $app_link_off;
            $target = 'target="_blank"';
        } else {
            $link = $app_link;
            $target = '';
        }
		?>
        <div class="mobile-button <?php echo $app_class; ?>-button bg-red">
            <?php if($link){ echo '<a href="'.$link.'" '.$target.'>'; } ?>
                <img class="icon-small lazyload" data-src="<?php echo $app_icon['url']; ?>" src="<?php echo $theme_dir; ?>/images/dummy.png" width="20" alt="<?php echo $app_icon['alt']; ?>"> <span class="upper"><?php echo $app_text; ?></span>
            <?php if($link){ echo '</a>'; } ?>
        </div>
	<?php endwhile; endif; ?>
    
    <?php if( have_rows('products','product-options') ): ?>
	<div class="mobile-app-services bg-blue">
	<?php $i = 1; while( have_rows('products','product-options') ): the_row();
		$icon = get_sub_field('main_product_icon') ? get_sub_field('main_product_icon') :'';
		$name = get_sub_field('main_product_name') ? get_sub_field('main_product_name') :'';
		$link = get_sub_field('main_product_link') ? get_sub_field('main_product_link') :'';
		?>
        <a class="mobile-button mobile-button-<?php echo $i; ?>" href="<?php echo $link; ?>">
            <img class="icon-small lazyload" data-src="<?php echo $icon['url']; ?>" src="<?php echo $theme_dir; ?>/images/dummy.png" width="26" alt="<?php echo $icon['alt']; ?>">
            <div class="mobile-button-text"><?php echo $name; ?></div>
        </a>
	<?php $i++; endwhile; ?>
	</div>
    <?php endif; ?>
</div>
