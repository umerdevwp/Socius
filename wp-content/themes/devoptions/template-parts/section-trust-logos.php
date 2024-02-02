<?php
$home_dir = get_home_url();
$theme_dir = get_template_directory_uri();
?>
<?php if ( !'hide' == get_field('hide_logos') ): ?>
    
<div class="section section-trust-logos">
    <div class="container-fluid">
        <div class="logo-container to-animate fadeInUp">
            
            <?php if( have_rows('trust_logos', 'cta-options') ): ?>
        	<div class="logos">
        	<?php while( have_rows('trust_logos', 'cta-options') ): the_row();
        		$trust_img = get_sub_field('trust_img');
                $image = isset($trust_img['sizes']['medium_large']) ? $trust_img['sizes']['medium_large'] : '';
            	$link = get_sub_field('trust_link');
        		?>
                <div class="logo-box">
                    <?php if($link){ echo '<a href="'.$link.'" target="_blank">'; } ?>
                    <img class="lazyload" data-src="<?php echo $image; ?>" src="<?php echo $theme_dir; ?>/images/dummy.png" alt="<?php echo $trust_img['alt']; ?>">
                    <?php if($link){ echo '</a>'; } ?>
                </div>
        	<?php endwhile; ?>
        	</div>
            <?php endif; ?>
            
        </div>
    </div>
</div>

<?php endif; ?>
