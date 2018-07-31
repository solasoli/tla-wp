<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}

if(function_exists('acf_add_options_page') && function_exists('acf_add_options_sub_page') ) {
    
    acf_add_options_page();
    
    acf_add_options_sub_page('Homepage Editor');
    acf_add_options_sub_page('Service Editor');
    acf_add_options_sub_page('Contact Editor');

    // $parent = acf_add_options_page(array(
    //     'page_title' => 'Site Editor',
    //     'menu_title' => 'Site Editor',
    //     'menu_slug' => 'site-editor',
    //     'capability' => 'edit_posts',
    //     'parent_slug' => '',
    //     'position' => false,
    //     'icon_url' => false,
    // ));

    // acf_add_options_sub_page(array(
    //     'page_title' => 'Homepage Editor',
    //     'menu_title' => 'Homepage Editor',
    //     'menu_slug' => $parent['menu_slug'],
    //     'capability' => 'edit_post',
    //     'parent_slug' => $parent,
    //     'position' => false,
    //     'icon_url' => false,
    //     'redirect' => false,
    // ));

    

    
}

   

function loadscript()
{
    wp_register_script( 'bootstrap.js', get_template_directory_uri(). '/js/bootstrap.js' );
    wp_enqueue_script( 'bootstrap.js' );

    wp_register_script( 'styles.js', get_template_directory_uri(). '/js/styles.js' );
    wp_enqueue_script( 'styles.js' );
wp_enqueue_script( 'styles.js' );
}

add_action( 'bootstrap.js', 'styles.js' );

function loadstyle() {

    wp_register_style( 'styles.css', get_template_directory_uri(). '/css/styles.css' );
    wp_enqueue_style( 'styles.css' );

    wp_register_style( 'bootstrap.css', get_template_directory_uri(). '/css/bootstrap.css' );
    wp_enqueue_style( 'bootstrap.css' );

    wp_register_style( 'bootstrap.min.css', get_template_directory_uri(). '/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min.css' );

    wp_register_style( 'custom.css', get_template_directory_uri(). '/css/custom.css' );
    wp_enqueue_style( 'custom.css' );

    wp_register_style( 'font-awesome.min.css', get_template_directory_uri(). '/css/font-awesome.min.css' );
    wp_enqueue_style( 'font-awesome.min.css' );

    wp_register_style( 'select2.min.css', get_template_directory_uri(). '/css/select2.min.css' );
    wp_enqueue_style( 'select2.min.css' );

    wp_register_style( 'swiper.min.css', get_template_directory_uri(). '/css/swiper.min.css' );
    wp_enqueue_style( 'swiper.min.css' );
}

add_action('styles.css', 'bootstrap.css', 'bootstrap.min.css', 'font-awesome.min.css', 'custom.min.css', 'select2.min.css', 'swiper.min.css');

add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}