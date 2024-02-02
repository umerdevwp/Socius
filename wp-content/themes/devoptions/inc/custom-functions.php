<?php

/********************
 * Web Personalization *
 ********************/
global $current_interest;
if(isset($_COOKIE['interest'])) {
    $current_interest = $_COOKIE['interest'];
}else{
    $current_interest = '';
}
// Web Personalization - No caching on certain pages
$uris = []; // No cache by the page's URI
$ids = [156]; // No cache by the page's post ID
$uri = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
$id = url_to_postid($url);
if (is_front_page() || is_home() || in_array($uri, $uris) || in_array($id, $ids)) {
  nocache_headers();
}


function strip_phone_number($phone = ''){
    return preg_replace('/\D+/', '', $phone);
}

function first_image_in_post($post_id = null) {
    global $post, $posts;
    $post = $post_id ? get_post($post_id) : $post;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if($output){
        $first_img = $matches[1][0];
    }
    if(empty($first_img)) {
        $first_img = "";
    }
    return $first_img;
}

// This is to populate the "Parent Product" in Sub Products
function acf_load_product_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();
    if( have_rows('products', 'product-options') ) {
        while( have_rows('products', 'product-options') ) {
            the_row();
            $value = get_sub_field('main_product_label');
            $label = get_sub_field('main_product_name');
            $field['choices'][ $value ] = $label;
        }
    }
    return $field;
}
add_filter('acf/load_field/key=field_5cd16ca30e2ba', 'acf_load_product_field_choices');// On each page => Content Section => Select Product Category
add_filter('acf/load_field/key=field_5cd17b4165afb', 'acf_load_product_field_choices');// Theme Options => Product Info => Product Galleries => Galleries => Product Type
add_filter('acf/load_field/key=field_5d07b97bd7e59', 'acf_load_product_field_choices');// Theme Options => Home Hero Options => Hero Personalized Slides => Product Type
add_filter('acf/load_field/key=field_5d000d3ecb3bb', 'acf_load_product_field_choices');// Theme Options => CTA & Callout Options => Product CTAs => Product Type
add_filter('acf/load_field/key=field_5c7c83003f0d7', 'acf_load_product_field_choices');// Testimonial type
add_filter('acf/load_field/key=field_5d150fe417ae2', 'acf_load_product_field_choices');// Theme Options => Product Info => Form Select Options => Product Name

function reviews() { ?>
	<?php
    $page_product_type = get_field_object('page_product_selector');
    $pvalue = $page_product_type['value'];
    $plabel = $page_product_type['choices'][ $pvalue ];

    $review_cat = get_field('testimonial_type');
    if(!empty($review_cat)) {
    	$args=array(
            'post_type' => 'testimonial',
            'orderby'=> 'rand',
            'posts_per_page' => 1,
            'meta_key'		=> 'testimonial_type',
	        'meta_value'	=> $pvalue,
        );
    }
    $default_args=array(
            'post_type' => 'testimonial',
            'orderby'=> 'rand',
            'posts_per_page' => 1
        );
    if(empty($args)) {
        $args = $default_args;
    }
    var_dump($args);
	if(!display_reviews($args))
        display_reviews($default_args);
	?>
<?php }

function display_reviews($args) {
    $wp_query = null;
    $wp_query = new WP_Query($args);
    if( $wp_query->have_posts() ) {
    while ($wp_query->have_posts()) : $wp_query->the_post();
    $review_stars = get_field('testimonial_stars');
    $review_title = get_field('testimonial_title');
    $review_excerpt = get_field('testimonial_excerpt');
    ?>
    <div class="review-body-wrap text-center fade fadeInUp delay-400ms">
        <?php if($review_title){ echo '<div class="review-title h1 upper">' . $review_title . '</div>'; } ?>
        
        <?php
        if($review_excerpt) {
            echo '<div class="review-text black" itemprop="reviewBody">'.$review_excerpt.'</div>';
        } else {
            $content = wp_trim_words( get_the_content(), 275, '...' );
            $content = '<div class="review-text black" itemprop="reviewBody">'.$content.'</div>';
            echo apply_filters('the_content', $content);
        }
        ?>
        
        <div class="review-author upper blue bold"><?php the_title(); ?></div>
        <div class="review-stars yellow">
            <?php if($review_stars) { for($i = 0; $i < $review_stars; ++$i){ echo '<i class="fas fa-star"></i>'; } }?>
        </div>
        <span class="average d-none" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
            <meta itemprop="worstRating" content="1">
            <meta itemprop="ratingValue" content="<?php echo $review_stars; ?>">
            <meta itemprop="bestRating" content="5">
            <meta itemscope="" itemprop="name" content="<?php bloginfo( 'name' ); ?>" itemtype="http://schema.org/Organization">
        </span>
    </div>
    <?php
      endwhile;
      wp_reset_query();  // Restore global post data stomped by the_post().
    }
    else {
    wp_reset_query();  // Restore global post data stomped by the_post().
        return false;
    }
}

// Contact Info - "The Options => Company Info => Location Info"
function contact_info() {
    $rows = get_field('info_location_info', 'general-options');
    
    $phone = $rows[0]['phone'] ? $rows[0]['phone'] :'';
    $phone_label = $rows[0]['name'] ? $rows[0]['name'] :'';
    $phone2 = $rows[1]['phone'] ? $rows[1]['phone'] :'';
    $phone_label2 = $rows[1]['name'] ? $rows[1]['name'] :'';
    
    $email = $rows[0]['email'] ? $rows[0]['email'] :'';
    
    $street = $rows[0]['address'] ? $rows[0]['address'] :'';
    $city = $rows[0]['city'] ? $rows[0]['city'] :'';
    $state = $rows[0]['state_abbr'] ? $rows[0]['state_abbr'] :'';
    $zip = $rows[0]['zip'] ? $rows[0]['zip'] :'';
    
    $hours = $rows[0]['hours'] ? $rows[0]['hours'] :'';
    
    ob_start(); ?>
  
    <div class="company-info row">
        <div class="company-address col-12">
            <strong>Address</strong><br />
            <div class="address-text info-text"><?php echo $street; ?></div>
            <div class="address-text info-text"><?php echo $city; ?>, <?php echo $state; ?> <?php echo $zip; ?></div>
        </div>
        <div class="company-email col-12">
            <strong>Email Address</strong><br />
            <div class="email-text info-text"><a class="black" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
        </div>
        <div class="company-phone col-12">
            <strong>Phone</strong><br />
            <div class="phone-text info-text"><?php echo $phone_label; ?>: <a class="black" href="tel:<?php echo strip_phone_number(''.$phone.''); ?>"><?php echo $phone; ?></a></div>
            <div class="phone-text info-text"><?php echo $phone_label2; ?>: <a class="black" href="tel:<?php echo strip_phone_number(''.$phone2.''); ?>"><?php echo $phone2; ?></a></div>
        </div>
        <div class="company-hours col-12">
            <div class="info-text">
                <strong>Business Hours</strong><br />
                <?php echo $hours; ?>
            </div>
        </div>
        
    </div>
    
    <?php $output = ob_get_clean();
    
    return $output;
}
add_shortcode('contact-info','contact_info');


// Reviews page - https://centennialhic.com/testimonials/
function reviews_page() {
    ob_start();
    ?>
    <?php $args=array(
        'post_type' => 'testimonial',
        'order' => 'DESC',
        'posts_per_page' => -1
    );
    
    $wp_query = null;
    $wp_query = new WP_Query($args);
    if( $wp_query->have_posts() ) {
    
    echo '<div class="all-reviews">';
    
    while ($wp_query->have_posts()) : $wp_query->the_post();
    $review_title = get_field('testimonial_title');
    ?>
  
    <div class="review-body">
        <?php if($review_title){ echo '<div class="review-title h4 upper">' . $review_title . '</div>'; } ?>
        
        <div class="review-text black" itemprop="reviewBody">
            <?php $content = get_the_content();
            $content = '<span class="open-quote"><i class="fas fa-quote-left"></i></span>'.$content.'<span class="close-quote"><i class="fas fa-quote-right"></i></span>';
            echo apply_filters('the_content', $content); ?>
        </div>
        
        <div class="review-author"><p><?php the_title(); ?></p></div>
    </div>
    
    <?php
    endwhile;
    }
    wp_reset_query();
    echo '</div>';
    ?>
    
    <?php return ob_get_clean();
}
add_shortcode('reviews','reviews_page');

/**
 * 3) Map Form to Session (optional)
 * ----------------------------------------------------------
 * Handles saving form submissions to the session.
 * Only needed, for example, if you want to display custom thank you pages.
 */
$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
$ips = ['72.77.204.14', '47.206.125.165'];

$is_socius = $ip && in_array($ip, $ips);

// Save form to session
if (isset($_POST['action'])) {
  if ($_POST['action'] === 'save-form' && isset($_POST['data'])) {
    $form = [];
    $mapping = isset($_POST['mapping']) ? preg_split('/\s*,\s*/', $_POST['mapping']) : [];
    $data = $_POST['data'];
    parse_str($data, $form);
    
    if ($mapping) {
      foreach ($mapping as $rule) {
        $rule = trim($rule);
        $rule =  preg_split('/\s*=\s*/', $rule);
        
        if (count($rule) === 2) {
          $field = trim($rule[0]);
          $name = trim($rule[1]);
          $value = isset($form[$field]) ? $form[$field] : null;
          
          $form[$name] = $value;
        }
      }
    }
    
    $_SESSION['form'] = $form;
    
    die('<pre>' . print_r($form, 1) . '</pre>');
  }
}

// Testing session
if (isset($_GET['session']) && $is_socius) {
  if (isset($_SESSION['form'])) {
    $form = $_SESSION['form'];
    
    echo('<pre>' . print_r($form['Name'], 1) . '</pre>');
    echo('<pre>' . print_r($form['Product'], 1) . '</pre>');
    die('<pre>' . print_r($form, 1) . '</pre>');
  }
}