<?php

$form_icons = [];
$form_options = get_field('form_select_options', 'product-options');

function get_options()
{
    global $form_options;

    if ($form_options) {
        foreach ($form_options as $option) {
            $value = $option['form_product_name']['value'];
            $label = $option['form_product_name']['label'];
            // var_dump($option);
            echo '<option data-name="' . $value . '" value="' . $label . '">' . $label . '</option>';
        }
    }
}

if ($form_options) {
    foreach ($form_options as $option) {
        $label = $option['form_product_name']['label'];
        $icon = (object) $option['form_product_icon'];

        if ($icon && isset($icon->url)) {
            $form_icons[$label] = $icon->url;
        }
    }
}

function display_stickyform()
{
    $num = 'formtest';
    $action = 'https://sociusmarketing.wufoo.com/forms/dfgdfgdfgd/';
    $idstamp = 'szduifhft7er98jt=0rqwdfqwefk340gijfgw0efw0e=';

    ob_start(); ?>

<form name="<?php echo $num; ?>" class="wufoo" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate="" data-action="<?php echo base64_encode($action); ?>" action="" data-idstamp="<?php echo $idstamp; ?>">
    <div class="form-group">
        <input name="Field1" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Full Name" data-bvalidator-msg="Please enter your full name.">
    </div>
    <div class="form-group">
        <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" type="tel" value="" placeholder="Phone" data-bvalidator-msg="Please enter your phone number." autocomplete="off" maxlength="14">
    </div>
    <div class="form-group">
        <input name="Field3" class="form-control" data-bvalidator="email,required" type="email" value="" placeholder="Email" data-bvalidator-msg="Please enter your email address.">
    </div>
    <div class="form-group select">
        <select name="Field4" class="form-control" data-bvalidator="required" data-bvalidator-msg="Please select an option.">
            <option value="" selected="" disabled="">Product</option>
            <option value="Roofing">Roofing</option>
            <option value="Siding">Siding</option>
            <option value="Gutters">Gutters</option>
            <option value="Windows">Windows</option>
            <option value="Insulation">Insulation</option>
        </select>
    </div>
    <div class="form-group submit">
        <button name="saveForm" class="btn btn-dark" type="submit" value="Submit">Get A Quote</button>
    </div>
    <div class="d-none">
        <label>Do Not Fill This Out</label>
        <input type="hidden" name="idstamp" value="">
        <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
    </div>
</form>

<?php $output = ob_get_clean();

    return $output;
}
add_shortcode('form-stickyform', 'display_stickyform');

// Centennial HI - Hero Quickform
function display_quickform()
{
    $num = 'formtest';
    $action = 'https://sociusmarketing.wufoo.com/forms/dfgdfgdfgd/';
    $idstamp = 'szduifhft7er98jt=0rqwdfqwefk340gijfgw0efw0e=';

    ob_start(); ?>

<form name="<?php echo $num; ?>" class="wufoo multi-select" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate="" data-action="<?php echo base64_encode($action); ?>" action="" data-idstamp="<?php echo $idstamp; ?>">
    <div class="form-row justify-content-center">
        <div class="form-group select special-select whole">
            <select name="Field4" multiple="multiple" class="form-control" data-bvalidator="required" data-bvalidator-msg="Please select an option.">
                <?php echo get_options(); ?>
            </select>
            <input class="select-hidden" style="height:0;opacity:0;position:absolute;" type="text" name="Field7" maxlength="255" value="" data-bvalidator="required" data-bvalidator-msg="Please select an option." />
        </div>
        <div class="form-group whole">
            <input name="Field1" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Full Name" data-bvalidator-msg="Please enter your full name.">
        </div>
        <div class="form-group half">
            <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" type="tel" value="" placeholder="Your Phone" data-bvalidator-msg="Please enter your phone number." autocomplete="off" maxlength="14">
        </div>
        <div class="form-group half">
            <input name="Field3" class="form-control" data-bvalidator="email,required" type="email" value="" placeholder="Your Email" data-bvalidator-msg="Please enter your email address.">
        </div>
        <div class="form-group whole">
            <input name="Field9" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Street Address" data-bvalidator-msg="Please enter your street address.">
        </div>
        <div class="form-group half">
            <input name="Field10" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="State" data-bvalidator-msg="Please enter your state.">
        </div>
        <div class="form-group half">
            <input name="Field11" class="form-control zip_us" data-mask="00000" data-bvalidator="minlength[5],required" type="tel" value="" placeholder="ZIP Code" data-bvalidator-msg="Please enter your zip code." autocomplete="off" maxlength="5">
        </div>
        <div class="form-group submit whole">
            <button name="saveForm" class="btn btn-primary" type="submit" value="Submit">Get Started</button>
        </div>
        <div class="d-none">
            <label>Do Not Fill This Out</label>
            <input type="hidden" name="idstamp" value="">
            <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
        </div>
    </div>
</form>

<?php $output = ob_get_clean();

    return $output;
}
//Create short code for use in WP editor
add_shortcode('form-quickform', 'display_quickform');

// Centennial HI - Sidebar Form
function sidebar_form()
{
    $num = 'formtest';
    $action = 'https://sociusmarketing.wufoo.com/forms/dfgdfgdfgd/';
    $idstamp = 'szduifhft7er98jt=0rqwdfqwefk340gijfgw0efw0e=';

    ob_start(); ?>

<form name="<?php echo $num; ?>" class="wufoo" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate="" data-action="<?php echo base64_encode($action); ?>" action="" data-idstamp="<?php echo $idstamp; ?>">
    <div class="form-row justify-content-center">
        <div class="form-group select special-select whole">
            <select name="Field4" multiple class="form-control" data-bvalidator="required" data-bvalidator-msg="Please select an option.">
                <?php echo get_options(); ?>
            </select>
            <input class="select-hidden" style="height:0;opacity:0;position:absolute;" type="text" name="Field7" maxlength="255" value="" data-bvalidator="required" data-bvalidator-msg="Please select an option." />
        </div>
        <div class="form-group whole">
            <input name="Field1" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Full Name" data-bvalidator-msg="Please enter your full name.">
        </div>
        <div class="form-group whole">
            <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" type="tel" value="" placeholder="Your Phone" data-bvalidator-msg="Please enter your phone number." autocomplete="off" maxlength="14">
        </div>
        <div class="form-group whole">
            <input name="Field3" class="form-control" data-bvalidator="email,required" type="email" value="" placeholder="Your Email" data-bvalidator-msg="Please enter your email address.">
        </div>
        <div class="form-group whole">
            <input name="Field9" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Street Address" data-bvalidator-msg="Please enter your street address.">
        </div>
        <div class="form-group half">
            <input name="Field10" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="State" data-bvalidator-msg="Please enter your state.">
        </div>
        <div class="form-group half">
            <input name="Field11" class="form-control zip_us" data-mask="00000" data-bvalidator="minlength[5],required" type="tel" value="" placeholder="ZIP Code" data-bvalidator-msg="Please enter your zip code." autocomplete="off" maxlength="5">
        </div>
        <div class="form-group submit whole">
            <button name="saveForm" class="btn btn-primary" type="submit" value="Submit">Get It Now</button>
        </div>
        <div class="d-none">
            <label>Do Not Fill This Out</label>
            <input type="hidden" name="idstamp" value="">
            <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
        </div>
    </div>
</form>

<?php $output = ob_get_clean();

    return $output;
}
//Create short code for use in WP editor
add_shortcode('sidebar-form', 'sidebar_form');

// Centennial HI - Hero Quickform (on mobile under hero)
function lightbox_form()
{
    $num = 'formtest';
    $action = 'https://sociusmarketing.wufoo.com/forms/dfgdfgdfgd/';
    $idstamp = 'szduifhft7er98jt=0rqwdfqwefk340gijfgw0efw0e=';

    ob_start(); ?>

<form name="<?php echo $num; ?>" class="wufoo" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate="" data-action="<?php echo base64_encode($action); ?>" action="" data-idstamp="<?php echo $idstamp; ?>">
    <div class="form-row justify-content-center">
        <div class="form-group select special-select whole">
            <select name="Field4" multiple="multiple" class="form-control" data-bvalidator="required" data-bvalidator-msg="Please select an option.">
                <?php echo get_options(); ?>
            </select>
            <input class="select-hidden" style="height:0;opacity:0;position:absolute;" type="text" name="Field7" maxlength="255" value="" data-bvalidator="required" data-bvalidator-msg="Please select an option." />
        </div>
        <div class="form-group whole">
            <input name="Field1" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Full Name" data-bvalidator-msg="Please enter your full name.">
        </div>
        <div class="form-group half">
            <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" type="tel" value="" placeholder="Your Phone" data-bvalidator-msg="Please enter your phone number." autocomplete="off" maxlength="14">
        </div>
        <div class="form-group half">
            <input name="Field3" class="form-control" data-bvalidator="email,required" type="email" value="" placeholder="Your Email" data-bvalidator-msg="Please enter your email address.">
        </div>
        <div class="form-group whole">
            <input name="Field9" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Street Address" data-bvalidator-msg="Please enter your street address.">
        </div>
        <div class="form-group half">
            <input name="Field10" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="State" data-bvalidator-msg="Please enter your state.">
        </div>
        <div class="form-group half">
            <input name="Field11" class="form-control zip_us" data-mask="00000" data-bvalidator="minlength[5],required" type="tel" value="" placeholder="ZIP Code" data-bvalidator-msg="Please enter your zip code." autocomplete="off" maxlength="5">
        </div>
        <div class="form-group submit whole">
            <button name="saveForm" class="btn btn-primary" type="submit" value="Submit">Get Started</button>
        </div>
        <div class="d-none">
            <label>Do Not Fill This Out</label>
            <input type="hidden" name="idstamp" value="">
            <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
        </div>
    </div>
</form>

<?php $output = ob_get_clean();

    return $output;
}

// Centennial HI - Product Selector Form (any changes here must be made in template-parts/section-product-selector.php)
function lightbox_product_form()
{
    $num = 'formtest';
    $action = 'https://sociusmarketing.wufoo.com/forms/dfgdfgdfgd/';
    $idstamp = 'szduifhft7er98jt=0rqwdfqwefk340gijfgw0efw0e=';

    ob_start(); ?>

<form name="<?php echo $num; ?>" class="wufoo" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate data-action="<?php echo base64_encode($action); ?>" action="" data-idstamp="<?php echo $idstamp; ?>">
    <div class="row form-row justify-content-center">
        <div class="form-group select special-select col-12">
            <select name="Field4" multiple="multiple" class="form-control" data-bvalidator="required" data-bvalidator-msg="Please select an option.">
                <?php echo get_options(); ?>
            </select>
            <input class="select-hidden" style="height:0;opacity:0;position:absolute;" type="text" name="Field7" maxlength="255" value="" data-bvalidator="required" data-bvalidator-msg="Please select an option." />
        </div>
        <div class="form-group name col-12">
            <input name="Field1" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Full Name" data-bvalidator-msg="Please enter your full name.">
        </div>
        <div class="form-group phone col-12 col-sm-6">
            <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" type="tel" value="" placeholder="Phone" data-bvalidator-msg="Please enter your phone number." autocomplete="off" maxlength="14">
        </div>
        <div class="form-group email col-12 col-sm-6">
            <input name="Field3" class="form-control" data-bvalidator="email,required" type="email" value="" placeholder="Email" data-bvalidator-msg="Please enter your email address.">
        </div>
        <div class="form-group name street col-12">
            <input name="Field9" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Street Address" data-bvalidator-msg="Please enter your street address.">
        </div>
        <div class="form-group phone state col-12 col-sm-6">
            <input name="Field10" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="State" data-bvalidator-msg="Please enter your state.">
        </div>
        <div class="form-group email zip col-12 col-sm-6">
            <input name="Field11" class="form-control zip_us" data-mask="00000" data-bvalidator="minlength[5],required" type="tel" value="" placeholder="ZIP Code" data-bvalidator-msg="Please enter your zip code." autocomplete="off" maxlength="5">
        </div>
        <div class="form-group submit col-12">
            <button name="saveForm" class="btn btn-primary" type="submit" value="Submit">Get Started</button>
        </div>
        <div class="d-none">
            <label>Do Not Fill This Out</label>
            <input type="hidden" name="idstamp" value="">
            <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
        </div>
    </div>
</form>

<?php $output = ob_get_clean();

    return $output;
}

// Centennial HI - Contact Form
function contact_form()
{
    $num = 'formtest';
    $action = 'https://sociusmarketing.wufoo.com/forms/dfgdfgdfgd/';
    $idstamp = 'szduifhft7er98jt=0rqwdfqwefk340gijfgw0efw0e=';

    ob_start(); ?>

<form name="<?php echo $num; ?>" class="wufoo" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate="" data-action="<?php echo base64_encode($action); ?>" action="" data-idstamp="<?php echo $idstamp; ?>">
    <div class="form-row justify-content-center">
        <div class="form-group col-12">
            <input name="Field1" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Full Name" data-bvalidator-msg="Please enter your full name.">
        </div>
        <div class="form-group col-12">
            <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" type="tel" value="" placeholder="Your Phone" data-bvalidator-msg="Please enter your phone number." autocomplete="off" maxlength="14">
        </div>
        <div class="form-group col-12">
            <input name="Field3" class="form-control" data-bvalidator="email,required" type="email" value="" placeholder="Your Email" data-bvalidator-msg="Please enter your email address.">
        </div>
        <div class="form-group col-12">
            <input name="Field9" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="Street Address" data-bvalidator-msg="Please enter your street address.">
        </div>
        <div class="form-group col-12 col-sm-6">
            <input name="Field10" class="form-control" data-bvalidator="minlength[2],required" type="text" value="" placeholder="State" data-bvalidator-msg="Please enter your state.">
        </div>
        <div class="form-group col-12 col-sm-6">
            <input name="Field11" class="form-control zip_us" data-mask="00000" data-bvalidator="minlength[5],required" type="tel" value="" placeholder="ZIP Code" data-bvalidator-msg="Please enter your zip code." autocomplete="off" maxlength="5">
        </div>
        <div class="form-group textarea col-12">
            <textarea class="form-control textarea" name="Field7" spellcheck="true" rows="3" cols="50" placeholder="Message" required=""></textarea>
        </div>
        <div class="form-group submit col-12">
            <button name="saveForm" class="btn btn-primary" type="submit" value="Submit">Submit</button>
        </div>
        <div class="d-none">
            <label>Do Not Fill This Out</label>
            <input type="hidden" name="idstamp" value="">
            <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
        </div>
    </div>
</form>

<?php $output = ob_get_clean();

    return $output;
}
add_shortcode('contact-form', 'contact_form');

// Centennial HI - Financing Form
function display_financing()
{
    $num = 'formtest';
    $action = 'https://sociusmarketing.wufoo.com/forms/dfgdfgdfgd/';
    $idstamp = 'szduifhft7er98jt=0rqwdfqwefk340gijfgw0efw0e=';
    ob_start(); ?>

<form name="<?php echo $num; ?>" class="wufoo" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate data-action="<?php echo base64_encode($action); ?>" action="" data-idstamp="<?php echo $idstamp; ?>">
    <div class="row">
        <div class="form-group col-12 col-sm-6">
            <label class="bold">Name<span class="highlight">*</span></label>
            <input name="Field9" class="form-control" data-bvalidator="minlength[2],required" value="" type="text" placeholder="" data-bvalidator-msg="Please enter your first name.">
            <label class="sub-label">First</label>
        </div>
        <div class="form-group col-12 col-sm-6">
            <label>&nbsp;</label>
            <input name="Field10" class="form-control" data-bvalidator="minlength[2],required" value="" type="text" placeholder="" data-bvalidator-msg="Please enter your last name.">
            <label class="sub-label">Last</label>
        </div>
        <div class="form-group col-12 col-sm-6">
            <label class="bold">Email Address<span class="highlight">*</span></label>
            <input name="Field3" class="form-control" data-bvalidator="email,required" value="" type="email" placeholder="" data-bvalidator-msg="Please enter your email address.">
        </div>
        <div class="form-group col-12 col-sm-6">
            <label class="bold">Phone Number<span class="highlight">*</span></label>
            <input name="Field2" class="form-control phone_us" data-mask="000/000/0000" data-bvalidator="minlength[14],required" value="" type="tel" placeholder="" data-bvalidator-msg="Please enter your phone number.">
        </div>
        <div class="form-group col-12">
            <label class="bold">Address<span class="highlight">*</span></label>
            <input name="Field11" class="form-control" value="" type="text">
            <label class="sub-label">Street Address</label>
        </div>
        <div class="form-group col-12">
            <input name="Field12" class="form-control" value="" type="text">
            <label class="sub-label">Address Line 2</label>
        </div>
        <div class="form-group col-12 col-md-6">
            <input name="Field13" class="form-control" value="" type="text">
            <label class="sub-label">City</label>
        </div>
        <div class="form-group col-12 col-sm-6 col-md-4">
            <input name="Field14" class="form-control" value="" type="text">
            <label class="sub-label">State</label>
        </div>
        <div class="form-group col-12 col-sm-6 col-md-2">
            <input name="Field15" class="form-control" value="" type="tel" maxlength="5">
            <label class="sub-label">ZIP Code</label>
        </div>
        <div class="form-group col-12 col-sm-6">
            <label class="bold">&nbsp;</label>
            <select name="Field16" class="form-control field text addr" value="">
                <option value="United States" selected="selected">United States</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Australia">Australia</option>
                <option value="Canada">Canada</option>
                <option value="France">France</option>
                <option value="New Zealand">New Zealand</option>
                <option value="India">India</option>
                <option value="Brazil">Brazil</option>
                <option value="----">----</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="British Virgin Islands">British Virgin Islands</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Caribbean Netherlands">Caribbean Netherlands</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo - Brazzaville">Congo - Brazzaville</option>
                <option value="Congo - Kinshasa">Congo - Kinshasa</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Côte d’Ivoire">Côte d’Ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaçao">Curaçao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czechia">Czechia</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard &amp; McDonald Islands">Heard &amp; McDonald Islands</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong SAR China">Hong Kong SAR China</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kosovo">Kosovo</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau SAR China">Macau SAR China</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="North Korea">North Korea</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territories">Palestinian Territories</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn Islands">Pitcairn Islands</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Réunion">Réunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="São Tomé &amp; Príncipe">São Tomé &amp; Príncipe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Sint Maarten">Sint Maarten</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia &amp; South Sandwich Islands">South Georgia &amp; South Sandwich Islands</option>
                <option value="South Korea">South Korea</option>
                <option value="South Sudan">South Sudan</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="St. Barthélemy">St. Barthélemy</option>
                <option value="St. Helena">St. Helena</option>
                <option value="St. Kitts &amp; Nevis">St. Kitts &amp; Nevis</option>
                <option value="St. Lucia">St. Lucia</option>
                <option value="St. Martin">St. Martin</option>
                <option value="St. Pierre &amp; Miquelon">St. Pierre &amp; Miquelon</option>
                <option value="St. Vincent &amp; Grenadines">St. Vincent &amp; Grenadines</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard &amp; Jan Mayen">Svalbard &amp; Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks &amp; Caicos Islands">Turks &amp; Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="U.S. Outlying Islands">U.S. Outlying Islands</option>
                <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Wallis &amp; Futuna">Wallis &amp; Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
            <label class="sub-label">Country</label>
        </div>
        <div class="form-group col-12 col-sm-6">
            <label class="bold">Select Your Service<span class="highlight">*</span></label>
            <ul class="checkboxes two-columns">
                <li>
                    <input name="Field17" type="checkbox" class="field checkbox" value="Roofing" tabindex="0" />
                    <label class="choice">
                        <span class="choice__text notranslate">Roofing</span>
                </li>
                <li>
                    <input name="Field18" type="checkbox" class="field checkbox" value="Siding" tabindex="0" />
                    <label class="choice">
                        <span class="choice__text notranslate">Siding</span>
                </li>
                <li>
                    <input name="Field19" type="checkbox" class="field checkbox" value="Windows" tabindex="0" />
                    <label class="choice">
                        <span class="choice__text notranslate">Windows</span>
                </li>
                <li>
                    <input name="Field20" type="checkbox" class="field checkbox" value="Gutters" tabindex="0" />
                    <label class="choice">
                        <span class="choice__text notranslate">Gutters</span>
                </li>
                <li>
                    <input name="Field21" type="checkbox" class="field checkbox" value="Gutter Protection" tabindex="0" />
                    <label class="choice">
                        <span class="choice__text notranslate">Gutter Protection</span>
                </li>
                <li>
                    <input name="Field22" type="checkbox" class="field checkbox" value="Attic Insulation" tabindex="0" />
                    <label class="choice">
                        <span class="choice__text notranslate">Attic Insulation</span>
                </li>
            </ul>
        </div>
        <div class="d-none hidden-inputs">
            <input class="ppc-source" type="text" name="Field5" maxlength="255" value="">
        </div>
        <div class="form-group col-12 col-md-6 col-xl-3 submit">
            <button name="saveForm" class="btn btn-primary" type="submit" value="Submit">Submit</button>
        </div>
        <div class="d-none">
            <label>Do Not Fill This Out</label>
            <input type="hidden" name="idstamp" value="" />
        </div>
    </div>
</form>

<?php $output = ob_get_clean();

    return $output;
}
add_shortcode('financing-form', 'display_financing');
