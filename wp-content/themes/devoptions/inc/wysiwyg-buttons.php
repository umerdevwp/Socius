<?php

function get_form_shortcodes() {
    global $shortcode_tags;
    if( $shortcode_tags ) {
        $output = array();
        foreach( $shortcode_tags as $shortcode_key => $shortcode_value ) {
            if (strpos($shortcode_key, 'form-') !== false) {
                $key_without_prefix = str_replace("form-","",$shortcode_key);
                $key_label = str_replace("-"," ",$key_without_prefix);
                $key_label = str_replace("_"," ",$key_label);
                $key_label = ucwords($key_label);
                $output[$shortcode_key] = $key_label . ' Form';
            }
        }
        return json_encode( $output );
    }
}

add_action('admin_head','sm_add_scripts_admin');
function sm_add_scripts_admin() {
    if (is_admin()) { ?>
        <script type="text/javascript">
        var form_shortcode_object = <?php echo json_encode(get_form_shortcodes()); ?>;
        </script>
        <?php
    }
}

function my_mce_buttons_2( $buttons ) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'superscript';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

 // hooks your functions into the correct filters
function sm_add_mce_button()
{
    // check user permissions
    if (!current_user_can('edit_posts') &&  !current_user_can('edit_pages')) {
        return;
    }
    // check if WYSIWYG is enabled
    if ('true' == get_user_option('rich_editing')) {
        add_filter('mce_external_plugins', 'sm_add_tinymce_plugin');
        add_filter('mce_buttons', 'sm_register_mce_button');
    }
}
add_action('admin_head', 'sm_add_mce_button');

// register new button in the editor
function sm_register_mce_button($buttons)
{
    array_push($buttons, 'sm_mce_dropbutton');
    return $buttons;
}


// declare a script for the new button
// the script will insert the shortcode on the click event
function sm_add_tinymce_plugin($plugin_array) {
    $plugin_array[ 'sm_mce_dropbutton'] = get_template_directory_uri() . '/js/wysiwyg-buttons.js';
    return $plugin_array;
}

// Create "tabs" wrapper shortcode
$sm_tabs = array();
function sm_mce_tabs( $params, $content = null ) {
    global $sm_tabs;
    extract(shortcode_atts(array(
        'id' => count($sm_tabs),
        'class' => ''
    ), $params));
    $sm_tabs[$id] = array();
    do_shortcode($content);
    $scontent = 
    '<ul class="nav nav-tabs">' . implode('', $sm_tabs[$id]['tabs']) . '</ul>
    <div class="tab-content">' . implode('', $sm_tabs[$id]['panes']) . '</div>';
    if( trim($scontent) != "" ) {
        $output = '<div class="' . $class . ' sm-tabs">' . $scontent . '</div>';

        return $output;
    }else {
        return "";
    }
}
add_shortcode('tabs', 'sm_mce_tabs');

// Create "tab" shortcode
function sm_tab_pane($params, $content = null) {
    global $sm_tabs;
    extract(shortcode_atts(array(
        'title' => '',
        'active' => '',
    ), $params));

    $index = count($sm_tabs) - 1;
    if( !isset($sm_tabs[$index]['tabs']) ) {
        $sm_tabs[$index]['tabs'] = array();
    }
    $pane_id = 'pane-' . $index . '-' .  count($sm_tabs[$index]['tabs']);
    $selected = false;
    $active_classes = '';
    if( $active =='active' ) {
        $selected = 'true';
        $active_classes = 'show active';
    }
    $title_slug = strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $title))))), '-'));
    $sm_tabs[$index]['tabs'][] = '<li class="nav-item"><a href="#' . $pane_id . '" data-toggle="tab" role="tab" aria-controls="' . $title_slug . '" aria-selected="' . $selected . '" class="' . $active . '">' . $title . '</a></li>';
    $trimmed_content = trim($content);
    $cleaned_content = preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $trimmed_content);
    $sm_tabs[$index]['panes'][] =
        '<div class="tab-pane fade ' . $active_classes . '" id="' . $pane_id . '" role="tabpanel" aria-labelledby="' . $title_slug . '-tab">'
            . do_shortcode($cleaned_content) . 
        '</div>';
}
add_shortcode('tab', 'sm_tab_pane');


// Create "accordion" wrapper shortcode
$sm_accordion = array();
function sm_mce_accordion($params, $content = null) {
    global $sm_accordion;
    extract(shortcode_atts(array(
        'id' => count($sm_accordion),
        'class' => ''
    ), $params));
    $sm_accordion[$id] = array();
    do_shortcode($content);
    $scontent =implode('', $sm_accordion[$id]['cards']);
    if( trim($scontent) != "") {
        $output = '<div class="' . $class . ' sm-accordion" id="' . count($sm_accordion) . '">' . $scontent . '</div>';

        return $output;
    }else {
        return "";
    }
}
add_shortcode('accordion', 'sm_mce_accordion');

// Create "card" shortcode
function sm_toggle($params, $content = null) {
    global $sm_accordion;
    extract(shortcode_atts(array(
        'title' => '',
        'show' => '',
    ), $params));

    $index = count($sm_accordion) - 1;
    if (!isset($sm_accordion[$index]['cards'])) {
        $sm_accordion[$index]['cards'] = array();
    }
    $pane_id = 'card-' . $index . '-' .  count($sm_accordion[$index]['cards']);

    $trimmed_content = trim($content);
    $cleaned_content = preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $trimmed_content);
    $cleaned_content = trim( $cleaned_content);
    $sm_accordion[$index]['cards'][] =
        '<div class="card">' .
            '<div class="card-header" id="heading-' . $pane_id . '">
                <h5>
                    <button data-toggle="collapse" data-target="#' . $pane_id . '" aria-expanded="true" aria-controls="' . $pane_id . '">
                    ' . $title . '
                    <span class="accordion-icon"></span>
                    </button>
                </h5>
            </div>
            <div id="' . $pane_id . '" class="collapse ' . $show . '" aria-labelledby="heading-' . $pane_id . '" data-parent="#' . count($sm_accordion) . '">
                <div class="card-body">
                    ' . $cleaned_content . '
                </div>
            </div>
        </div>';
}
add_shortcode('toggle', 'sm_toggle');

// Create "row" wrapper shortcode
function sm_mce_row($params, $content = null) {
    $trimmed_columns = trim(do_shortcode($content));
    $cleaned_columns =str_replace(array('<br />'), ' ', $trimmed_columns);
    $output = '<div class="row">' . $cleaned_columns . '</div>';
    return $output;
}
add_shortcode('row', 'sm_mce_row');

// Create "column" shortcode
function sm_mce_column($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => '',
    ), $params));
    $trimmed_content = trim(do_shortcode($content));
    $cleaned_content = preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $trimmed_content);
    $cleaned_content = trim( $cleaned_content);
    
    $output = '<div class="' . $class . '">' . $cleaned_content . '</div>';

    return $output;
}
add_shortcode('column', 'sm_mce_column');


// Create "card-deck" wrapper shortcode
function sm_mce_card_deck($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => '',
    ), $params));
    $trimmed_columns = trim(do_shortcode($content));
    $cleaned_columns =str_replace(array('<br />'), ' ', $trimmed_columns);
    $output = '<div class="sm-card-deck card-deck ' . $class . '">' . $cleaned_columns . '</div>';
    return $output;
}
add_shortcode('card-deck', 'sm_mce_card_deck');

// Create "card" shortcode
function sm_mce_card($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => '',
    ), $params));
    $trimmed_content = trim(do_shortcode($content));
    $cleaned_content = preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $trimmed_content);
    $cleaned_content = trim( $cleaned_content);
    
    $output = '
    <div class="card' . $class . '">
        ' . $cleaned_content . '
    </div>';

    return $output;
}
add_shortcode('card', 'sm_mce_card');

// Create "card" shortcode
function sm_mce_card_body($params, $content = null) {
    $trimmed_content = trim(do_shortcode($content));
    $cleaned_content = preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $trimmed_content);
    $cleaned_content = trim( $cleaned_content);
    
    $output = '
    <div class="card-body">
        ' . $cleaned_content . '
    </div>';

    return $output;
}
add_shortcode('body', 'sm_mce_card_body');

// Create "card" shortcode
function sm_mce_card_footer($params, $content = null) {
    $trimmed_content = trim(do_shortcode($content));
    $cleaned_content = preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $trimmed_content);
    $cleaned_content = trim( $cleaned_content);
    
    $output = '
    <div class="card-footer">
        ' . $cleaned_content . '
    </div>';

    return $output;
}
add_shortcode('footer', 'sm_mce_card_footer');