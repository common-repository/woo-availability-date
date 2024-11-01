<?php
/**
 * Plugin Name: Product Availability Date for woocommerce
 * Plugin URI: https://troplr.com/
 * Description: Show availibilty date for woocommerce products.
 * Version: 1.0.1
 * Author: Troplr
 * Author URI: https://troplr.com
 * Requires at least: 4.5
 * Tested up to: 4.7
 *
 * Text Domain: troplr
 *
 */

require_once('titan-framework/titan-framework-embedder.php');
add_action( 'tf_create_options', 'wad_metabox_options' );
function wad_metabox_options() {
// Initialize Titan & options here

 $titan = TitanFramework::getInstance( 'wsd-date' );

 $aa_metbox = $titan->createMetaBox( array(
        'name'      => 'Product Availability Date', // Name the options menu.
        'post_type' => array( 'product' ) // Can be a string or array.
    ) );

 $aa_metbox->createOption( array(
    'id'   => 'woo_date', // The id which will be used to get the value of this option.
    'type' => 'date', // Type of option we are creating.
    'name' => 'Add Date', // Name of the option which will be displayed in the admin panel.
    'time' => false
) );

 $aa_metbox->createOption(  array(
'name' => 'Before date text',
'id' => 'before_text',
'type' => 'text',
'desc' => 'E.g: Get it by ',
) );
 

}


add_action( 'tf_create_options', 'wpad_opt' );
function wpad_opt() {
// Initialize Titan & options here

 $titan = TitanFramework::getInstance( 'wpad-opt' );

 $panel = $titan->createAdminPanel( array(
'name' => 'Woocommerce Availability Date',
) );

$generalTab = $panel->createTab( array(
'name' => 'Settings',
) );

$generalTab->createOption(  array(
'name' => 'Before Text Color',
'id' => 'before_text_color',
'type' => 'color',

) );

$generalTab->createOption(  array(
'name' => 'Date Color',
'id' => 'date_color',
'type' => 'color',

) );

$generalTab->createOption( array(

'name' => '',

'id' => 'pay',

'type' => 'note',

'desc' => 'Thankyou for installing Product Availability Plugin for woocommerce.<br><b>You may want to support my development: <a target="_blank" href="https://paypal.me/sandeeptete">Pay a tip</a>'

) );


$generalTab->createOption( array(
'type' => 'save'
) );

$generalTab->createOption( array(
'name' => '',
'id' => 'wadpay',
'type' => 'note',
'desc' => 'Thankyou for using <b>Woocommerce Availabilty Date</b>.<br>You may want to support my development: <a target="_blank" href="https://paypal.me/sandeeptete">Paypal me a tip</a>'
) );

$generalTab->createOption(  array(
'name' => '',
'id' => 'wad_message_grid',
'type' => 'note',
'desc' => 'You may find other plugins from us to be useful below.<br><div class="autowide">
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/categories-gallery/">Bootstrap Categories Gallery</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/custom-scroll-bar-designer/">Custom Scrollbar Designer</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/custom-text-selection-colors/">Custom Text Selection Colors</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/disable-image-right-click/">Disable Image Right Click</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/easy-gallery-slideshow/">Easy Gallery Slideshow</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/exit-popup-show/">Exit Popup Show</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/popup-modal-for-youtube/">Popup Modal For Youtube</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/woo-availability-date/">Product Limited Time Availability Date for woocommerce</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/email-my-posts/">Share Posts To Email</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/custom-scroll-bar-designer/">Share Woocommerce to Email</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/share-woocommerce-email/">Custom Scrollbar Designer</a></b></p>
  </div>
  <div class="module">
    <p><b><a href="https://wordpress.org/plugins/total-sales-for-woocommerce/">Total Sales For Woocommerce</a></b></p>
  </div>
</div>'
) );
}

function wad_customcss()
{
  $wadcss = '<style>.autowide {
  margin: 0 auto;
  width: 98%;
}
.autowide img {
  float: left;
  margin: 0 .75rem 0 0;
}
.autowide .module {
  xbackground-color: lightgrey;
  border-radius: .25rem;
  margin-bottom: 1rem;
  color: #0f8cbb;
}
.autowide .module p {
  padding: 4px 0px;
}

/* 2 columns: 600px */
@media only screen and (min-width: 600px) {
  .autowide .module {
    float: left;
    margin-right: 2.564102564102564%;
    width: 48.717948717948715%;
  }
  .autowide .module:nth-child(2n+0) {
    margin-right: 0;
  }
}

/* 3 columns: 768px */
@media only screen and (min-width: 768px) {
  .autowide .module {
    width: 31.623931623931625%;
  }
  .autowide .module:nth-child(2n+0) {
    margin-right: 2.564102564102564%;
  }
  .autowide .module:nth-child(3n+0) {
    margin-right: 0;
  }
}

/* 4 columns: 992px and up */
@media only screen and (min-width: 992px) {
  .autowide .module {
    width: 23.076923076923077%;
  }
  .autowide .module:nth-child(3n+0) {
    margin-right: 2.564102564102564%;
  }
  .autowide .module:nth-child(4n+0) {
    margin-right: 0;
  }
}</style>';
echo $wadcss;

}
add_action('admin_head','wad_customcss');

  
  function wpad_date()
  {
    if ( !class_exists('TitanFramework') ) {
return false;
}
    $titan = TitanFramework::getInstance( 'wsd-date' ); 
    $woo_date = $titan->getOption( 'woo_date',get_the_ID());
   
   
if ( ! empty( $woo_date ) ) {
$dt = new DateTime("@$woo_date");  // convert UNIX timestamp to PHP DateTime
$tt = $dt->format('l j'); // output = 2017-01-01 00:00:00
}
   return $tt;
}

function wpad_before_text(){
  if ( !class_exists('TitanFramework') ) {
return false;
}
$titan = TitanFramework::getInstance( 'wpad-opt' );
$before_text_color = $titan->getOption( 'before_text_color');
return $before_text_color;
}

function wpad_date_colors(){
  if ( !class_exists('TitanFramework') ) {
return false;
}
$titan = TitanFramework::getInstance( 'wpad-opt' );
$date_color = $titan->getOption( 'date_color');
return $date_color;
}


function wpad_display_date()
{
  if ( !class_exists('TitanFramework') ) {
return false;
}
    $titan = TitanFramework::getInstance( 'wsd-date' );
    //$titan = TitanFramework::getInstance( 'wpad-opt' ); 
    $before_text = $titan->getOption( 'before_text',get_the_ID());
   

    echo '<div id="datt" style="text-align: center;
    margin-top: 18px;
    margin-bottom: 15px;padding:10px;
    width: 300px;">'.'<span style="color:'.wpad_before_text().'">'.$before_text.'</span>'." ".'<span style="color:'.wpad_date_colors().'">'.wpad_date().'</span>'.'</div>';

}
add_action( 'woocommerce_after_shop_loop_item', 'wpad_display_date', 10);
add_action('woocommerce_after_add_to_cart_button', 'wpad_display_date',5);

function wpad_expire(){
  
if ( !class_exists('TitanFramework') ) {
return false;
}
    $titan = TitanFramework::getInstance( 'wsd-date' ); 
    $woo_date = $titan->getOption( 'woo_date',get_the_ID());
   
   
if ( ! empty( $woo_date ) ) {
$wds_newdate = new DateTime("@$woo_date");  // convert UNIX timestamp to PHP DateTime
$wds_final = $wds_newdate->format("Y-m-d"); // output = 2017-01-01 00:00:00
}

  $currentdate = date("Y-m-d");
  //$id = get_the_ID();
  if ( ! empty( $woo_date ) ) {
    
    if ($wds_final == $currentdate){
        $proid = get_the_ID();
$update_post->$proid;
$update_post['post_status'] = 'draft';
wp_update_post( $update_post);
    }


  }

}
add_action('save_post','wpad_expire',1);




?>