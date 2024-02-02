<?php if(have_rows('social_media', 'general-options')): ?>
    
    <ul class="smedia">

        <?php while(have_rows('social_media', 'general-options')): the_row();
    
            $social_icon = get_sub_field('social_icon') ? get_sub_field('social_icon') : '';
            $social_link = get_sub_field('social_link') ? get_sub_field('social_link') : '';
            ?>
            <li class="social">
                <a href="<?php echo $social_link; ?>" target="_blank" class="<?php echo $social_icon; ?>"><i class="fab fa-<?php echo $social_icon; ?>"></i></a>
            </li>
    
        <?php endwhile; ?>
        
    </ul>
    
<?php endif; ?>
