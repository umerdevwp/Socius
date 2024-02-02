<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();

$custom_img = get_field('why_choose_bg_img', 'cta-options');
$bgimg = isset($custom_img['sizes']['extra_large']) ? $custom_img['sizes']['extra_large'] : '';
$title = get_field('why_choose_title', 'cta-options');
$subtitle = get_field('why_choose_subtitle', 'cta-options');
$text = get_field('why_choose_text', 'cta-options');

?>
<div class="section section-why-choose bg-white">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="why-choose-content section-content center-all to-animate fadeInUp">
                    <div class="section-header">
                        <img class="heading-icon blue-icon lazyload" data-src="<?php echo $theme_dir; ?>/images/roof-icon-blue.svg" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="">
                        <div class="section-title black upper"><?php echo $title; ?></div>
                        <div class="section-subtitle blue upper"><?php echo $subtitle; ?></div>
                    </div>
                    <div class="section-text normal-text black"><?php echo $text; ?></div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center with-bg">
            <div class="col-12">
                <?php $rows = get_field('why_choose', 'cta-options');
                if($rows)
                {
                	echo '<div class="cta-nav d-md-none to-animate fadeInUp">';

                	foreach($rows as $row)
                	{
                		echo '<div class="cta-title black upper">' . $row['why_title'] . '</div>';
                	}

                	echo '</div>';
                } ?>
                
                <?php if( have_rows('why_choose', 'cta-options') ): ?>
            	<div id="circle-cta" class="circle-cta-container to-animate fadeInUp delay-200ms">
            	<?php $i=1; while( have_rows('why_choose', 'cta-options') ): the_row();
                    $select = get_sub_field('why_link_select');
            		$page_link = get_sub_field('why_link');
                	$text_link = get_sub_field('why_text_link');
            		$title = get_sub_field('why_title');
            		$btn_text = get_sub_field('why_btn_text');
            		$image = get_sub_field('why_img');
                    $img = isset($image['sizes']['large']) ? $image['sizes']['large'] : '';
                    
                    if($select == 'page') {
                        $link = $page_link;
                    } else {
                        $link = $text_link;
                    }
            		?>
                    <div class="cta-box">
                        <a class="cta cta-<?php echo $i; ?> lazyload"  data-toggle="modal" href="<?php echo $link; ?>" data-bg="<?php echo $img; ?>" style="background-image:url(<?php echo $theme_dir; ?>/images/dummy.png)">
                            <div class="cta-inner">
                                <div class="plus-icon">+</div>
                                <div class="inner-text upper"><?php echo $title; ?></div>
                                <span class="btn btn-primary sm-btn"><?php echo $btn_text; ?></span>
                            </div>
                        </a>
                    </div>
            	<?php $i++; endwhile; ?>
            	</div>
                <?php endif; ?>
            </div>

            <div class="angle-bg lazyload" data-bg="<?php echo $bgimg; ?>"></div>
        </div>
    </div>
</div>
