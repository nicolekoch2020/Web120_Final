<?php

// Enqueue Scripts & Styles
function ryu_scripts() {
	// Register
	wp_register_style( 'ryu-style', get_template_directory_uri() . '/style.min.css');
	wp_register_script( 'ryu-main', get_template_directory_uri() . '/menu.min.js', array( 'jquery' ), '', true );
	// Enqueue
	wp_enqueue_style( 'ryu-style' );
    wp_enqueue_script( 'ryu-main' );
}
add_action('wp_enqueue_scripts', 'ryu_scripts');

// Remove Emoji CSS and JS and Prefetch URL from header
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_filter( 'emoji_svg_url', '__return_false' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

// Remove Shortlink From Header
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Get rid of WP version footprint throughout site
function buso_remove_version() {
return '';
}
add_filter('the_generator', 'buso_remove_version');

// Remove stuff from wp_head function
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Stop Empty Search Requests Redirecting to Homepage
function ryu_stop_search_redirect( $vars ) {
	if( isset( $_GET['s'] ) && empty( $_GET['s'] ) )
		$vars['s'] = " ";
	 return $vars;
}
add_filter( 'request', 'ryu_stop_search_redirect' );

// Change Excerpt Length from Default of 55 Words
function ryu_custom_excerpt_length( $length ) {
    return 75;
}
add_filter( 'excerpt_length', 'ryu_custom_excerpt_length', 999 );

// Remove WP Version Parameter from Enqueued Scripts
function ryu_remove_wpversion_cssjs( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'ryu_remove_wpversion_cssjs', 999 );
add_filter( 'script_loader_src', 'ryu_remove_wpversion_cssjs', 999 );

// Change Dashboard Footer Text
function buso_change_footer_admin() { 
  echo '<span id="footer-thankyou">Theme design courtesy of <a href="http://www.buildersociety.com" target="_blank">Builder Society</a></span>'; 
}  
add_filter('admin_footer_text', 'buso_change_footer_admin');

// Add a Dashboard Widget for Designer Contact Information
function buso_add_dashboard_widgets() {
  wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'buso_theme_info');
}
add_action('wp_dashboard_setup', 'buso_add_dashboard_widgets');
function buso_theme_info() {
  echo "<ul>
  <li><strong>Developed By:</strong> Builder Society</li>
  <li><strong>Website:</strong> <a href='http://www.buildersociety.com' target='_blank'>www.buildersociety.com</a></li>
  <li><strong>Contact:</strong> <a href='mailto:contact@buildersociety.com'>contact@buildersociety.com</a></li>
  </ul>";
}

// Add a Dashboard Widget for Helpful Resources
function buso_add_dashboard_widgets2() {
  add_meta_box('wp_dashboard_widget2', 'Helpful Resources', 'buso_resources', 'dashboard', 'side', 'high');
}
add_action('wp_dashboard_setup', 'buso_add_dashboard_widgets2');
function buso_resources() {
  echo '<ul>
  <li>- Come join us at <a href="http://www.buildersociety.com" target="_blank">Builder Society</a> to talk about all aspects of digital entrepreneurship.</li>
  <li>- Enable God Mode with <a href="https://www.serpwoo.com/#Lightning" target="_blank">SerpWoo</a> and dominate your niche.</li>
  <li>- Need new hosting? <a href="http://www.anrdoezrs.net/click-8328150-12752420" target="_blank">KnownHost</a> are the trusted VPS and Dedi kings.</li>
  </ul>';
}

// Remove replacement "fancy" quotations, etc. added by Wordpress
remove_filter ('single_post_title', 'wptexturize');
remove_filter ('bloginfo', 'wptexturize');
remove_filter ('wp_title', 'wptexturize');  
remove_filter ('category_description', 'wptexturize');
remove_filter ('list_cats', 'wptexturize');
remove_filter ('comment_author', 'wptexturize');
remove_filter ('comment_text', 'wptexturize');
remove_filter ('the_title', 'wptexturize');
remove_filter ('the_content', 'wptexturize');
remove_filter ('the_excerpt', 'wptexturize');

// Widgetizing Theme
function buso_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
		'name' => 'Footer - Left',
		'id' => 'footer-left',
		'before_widget' => '<div class="widget-wrap-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
		'name' => 'Footer - Middle',
		'id' => 'footer-middle',
		'before_widget' => '<div class="widget-wrap-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
		'name' => 'Footer - Right',
		'id' => 'footer-right',
		'before_widget' => '<div class="widget-wrap-footer">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'buso_widgets_init' );

// Register Wordpress Menu Function
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'buso' ),
      'top-menu' => __( 'Top Menu', 'buso' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Enable WordPress Features (Must Haves)
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_theme_support( 'automatic-feed-links' );

// Create Thumbnails and Crop Images
set_post_thumbnail_size( 425, 280, true );

// Set Up 'Read More' Link for Excerpts
function buso_new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More &raquo;', 'buso') . '</a>';
}
add_filter( 'excerpt_more', 'buso_new_excerpt_more' );

// Add Editor Style
add_editor_style( 'style.css' );

// Text Domain - Language Issues for Wordpress
add_action('after_setup_theme', 'buso_crucial_setup');
function buso_crucial_setup(){
    load_theme_textdomain('buso', get_template_directory() . '/languages');
}

// Selling my Soul to the Customizer
function buso_customize_register( $wp_customize ) {
    $colors = array();
    $colors[] = array(
       'slug' => 'content_link_color', 
       'default' => '#4582BF',
       'label' => __('Content Link Color', 'buso')
    );
    foreach( $colors as $color ) {
      // SETTINGS
      $wp_customize->add_setting(
        $color['slug'], array(
          'default' => $color['default'],
          'type' => 'option', 
          'capability' > 
          'edit_theme_options'
        )
      );
      // CONTROLS
      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          $color['slug'], 
          array('label' => $color['label'], 
          'section' => 'colors',
          'settings' => $color['slug'])
        )
      );
      // Regaining Some Dignity By Removing Sections
      $wp_customize->remove_section('themes');
      $wp_customize->remove_section('title_tagline');
      $wp_customize->remove_section('header_image');
      $wp_customize->remove_section('background_image');
      $wp_customize->remove_section('static_front_page');
      $wp_customize->remove_panel('widgets');
      $wp_customize->remove_control('header_textcolor');
      $wp_customize->remove_control('background_color');
    }
}
add_action( 'customize_register', 'buso_customize_register' );
add_action( 'customize_register', function( $wp_customize ) {
        /** @var WP_Customize_Manager $wp_customize */
        remove_action( 'customize_controls_enqueue_scripts', array( $wp_customize->nav_menus, 'enqueue_scripts' ) );
        remove_action( 'customize_register', array( $wp_customize->nav_menus, 'customize_register' ), 11 );
        remove_filter( 'customize_dynamic_setting_args', array( $wp_customize->nav_menus, 'filter_dynamic_setting_args' ) );
        remove_filter( 'customize_dynamic_setting_class', array( $wp_customize->nav_menus, 'filter_dynamic_setting_class' ) );
        remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'print_templates' ) );
        remove_action( 'customize_controls_print_footer_scripts', array( $wp_customize->nav_menus, 'available_items_template' ) );
        remove_action( 'customize_preview_init', array( $wp_customize->nav_menus, 'customize_preview_init' ) );
}, 10 );

// Add Options to the Theme Menu
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 
function theme_options_init(){
 register_setting( 'buso_options', 'buso_theme_options');
} 

function theme_options_add_page() {
    add_theme_page( __('Theme Options', 'lightning-theme'), __('Theme Options', 'lightning-theme'),
        'edit_theme_options', 'theme_options', 'theme_buso_settings');
    }

// Create the Theme Options Page
function theme_buso_settings() { 

// Check that the user is allowed to update options
if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}

// Define the Variables from Saved Data
$use_logo_image = get_option("buso_use_logo_image");
$logo_pic = get_option("buso_logo_pic");
$show_post_image = get_option("buso_show_post_image");
$use_top_menu = get_option("buso_use_top_menu");
$use_cat_descrip = get_option("buso_use_cat_descrip");
$use_footer_link = get_option("buso_use_footer_link");
?>
   <div class="wrap">
        <h2>Lightning Theme Options</h2>
        <h3>Logo Instructions</h3>
        <ul>
           <li>- Use a full URL including https:// for any images.</li>
           <li>- To revert from Logo Image back to text, uncheck the box. You can change your site's title under Settings -> General.</li>
        </ul>
        <h3>Featured Image Instructions</h3>
        <ul>
           <li>- Use 800px in width and 500px in height for your featured images.</li>
        </ul>
        <h3>Category Descriptions Instructions</h3>
        <ul>
           <li>- This refers to the title and description on category pages only, above the posts roll.  They are enabled by default.</li>
        </ul>
    
<?php if(isset($_POST["update_settings"])) {
    // Do the saving if form is submitted

// For Use Logo Image
$use_logo_image = $_POST["use_logo_image"];
update_option("buso_use_logo_image", $use_logo_image);
// For Logo URL
$logo_pic = $_POST["logo_pic"];	
update_option("buso_logo_pic", $logo_pic);
// For Featured Image on Post
$show_post_image = $_POST["show_post_image"];	
update_option("buso_show_post_image", $show_post_image);
// For Top Menu
$use_top_menu = $_POST["use_top_menu"];	
update_option("buso_use_top_menu", $use_top_menu);
// For Category Description
$use_cat_descrip = $_POST["use_cat_descrip"];
update_option("buso_use_cat_descrip", $use_cat_descrip);
// For Footer Link
$use_footer_link = $_POST["use_footer_link"];
update_option("buso_use_footer_link", $use_footer_link);
// Let people know their changes were saved
?>
<div id="message" class="updated">Your New Settings Have Been Saved</div>
<?php } ?>

<br /><hr />

        <form method="POST" action="">

<h3>Logo</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="use_logo_image">
                           Use an Image for Logo? :
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="use_logo_image" value="1" <?php if( $use_logo_image == true ) { ?>checked="checked"<?php } ?> />
                    </td>
                </tr>
            </table>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="logo_pic">
                           Logo Image URL :
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="logo_pic" value="<?php echo $logo_pic; ?>" size="70" />
                    </td>
                </tr>
            </table>

<br /><hr />

<h3>Featured Images</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="show_post_image">
                           Show on Post Page? :
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="show_post_image" value="1" <?php if( $show_post_image == true ) { ?>checked="checked"<?php } ?> />
                    </td>
                </tr>
            </table>

<br /><hr />

<h3>Top Menu</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="use_top_menu">
                           Disable the Top Menu? :
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="use_top_menu" value="1" <?php if( $use_top_menu == true ) { ?>checked="checked"<?php } ?> />
                    </td>
                </tr>
            </table>

<br /><hr />

<h3>Category Descriptions</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="use_cat_descrip">
                           Disable the Category Title & Descriptions? :
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="use_cat_descrip" value="1" <?php if( $use_cat_descrip == true ) { ?>checked="checked"<?php } ?> />
                    </td>
                </tr>
            </table>

<br /><hr />

<h3>Footer Link</h3>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="use_footer_link">
                           Disable the Footer Link? :
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="use_footer_link" value="1" <?php if( $use_footer_link == true ) { ?>checked="checked"<?php } ?> />
                    </td>
                </tr>
            </table>

<br /><hr />

	 <input type="hidden" name="update_settings" value="Y" />  
	 <p><input type="submit" value="Save settings" class="button-primary"/></p>
        </form>
    </div>
<?php
}

?>