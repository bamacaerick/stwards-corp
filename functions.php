<?php


function custom_get_page_id($nicename)
{
    global $wpdb;
    $the_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$nicename' and post_type='page' AND post_status='publish'");
    return $the_id;
}

$HOMEID = custom_get_page_id('inicio');


add_action('after_setup_theme', 'generic_setup');
function generic_setup()
{
    load_theme_textdomain('generic', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array( 'search-form' ));
    add_theme_support('woocommerce');
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(
        array(
            'main-menu' => esc_html__('Main Menu', 'generic'),
            'sidebar-boxes' => esc_html__('Sidebar Boxes', 'generic')
        )
    );
}
add_action('wp_enqueue_scripts', 'generic_enqueue');
function generic_enqueue()
{
    wp_enqueue_style('dm-sans-font', '
https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap
');

    wp_enqueue_style('generic-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    // wp_register_script('generic-videos', get_template_directory_uri() . '/js/videos.js');
    // wp_enqueue_script('generic-videos');
    // wp_add_inline_script('generic-videos', 'jQuery(document).ready(function($){$("#wrapper").vids();});');

    // if(is_page_template('page-home.php')){
    //     wp_enqueue_style('swiper-css', get_template_directory_uri() . '/css/swiper.min.css', false, '1.1', '');
    //     wp_register_script('swiper-custom', get_template_directory_uri() . '/js/swiper.min.js');
    //     wp_enqueue_script('swiper-custom');
    // }
    wp_register_script('general', get_template_directory_uri() . '/js/general.js');
    wp_enqueue_script('general');

}
add_action('wp_footer', 'generic_footer');
function generic_footer()
{
    ?>
<script>
jQuery(document).ready(function($) {
    var deviceAgent = navigator.userAgent.toLowerCase();
    if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios");
    }
    if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
    } else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
    } else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
    } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
    } else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
    }
    $(".menu-toggle").on("keypress click", function(e) {
        if (e.which == 13 || e.type === "click") {
            e.preventDefault();
            $("#menu").toggleClass("toggled");
        }
    });
    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            if ($("#menu").hasClass("toggled")) {
                $("#menu").toggleClass("toggled");
            }
        }
    });
    $("img.no-logo").each(function() {
        var alt = $(this).attr("alt");
        $(this).replaceWith(alt);
    });
});
</script>
<?php
}
add_filter('document_title_separator', 'generic_document_title_separator');
function generic_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}
add_filter('the_title', 'generic_title');
function generic_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}
function generic_schema_type()
{
    $schema = 'https://schema.org/';
    if (is_single()) {
        $type = "Article";
    } elseif (is_author()) {
        $type = 'ProfilePage';
    } elseif (is_search()) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }
    echo 'itemscope itemtype="' . $schema . $type . '"';
}
add_filter('nav_menu_link_attributes', 'generic_schema_url', 10);
function generic_schema_url($atts)
{
    $atts['itemprop'] = 'url';
    return $atts;
}
if (!function_exists('generic_wp_body_open')) {
    function generic_wp_body_open()
    {
        do_action('wp_body_open');
    }
}
add_action('wp_body_open', 'generic_skip_link', 5);
function generic_skip_link()
{
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'generic') . '</a>';
}
add_filter('the_content_more_link', 'generic_read_more_link');
function generic_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'generic'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'generic_image_insert_override');
function generic_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}
add_action('widgets_init', 'generic_widgets_init');
function generic_widgets_init()
{
    register_sidebar(array(
    'name' => esc_html__('Sidebar Widget Area', 'generic'),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ));
}
add_action('wp_head', 'generic_pingback_header');
function generic_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'generic_enqueue_comment_reply_script');
function generic_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function generic_custom_pings($comment)
{
    ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url(comment_author_link()); ?>
</li>
<?php
}
add_filter('get_comments_number', 'generic_comment_count', 0);
function generic_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

/* ----------- // CUSTOM PANELS // ----------- */
/* ----------- // ====== ====== // ----------- */

add_action('init', 'themePostTypes');

function themePostTypes()
{
    $services = array(
            'name' => _x('Services', 'post type general name'),
            'singular_name' => _x('Services', 'post type singular name'),
            'add_new' => _x('Add new', 'Service'),
            'add_new_item' => __('Add new Service'),
            'edit_item' => __('Edit Service'),
            'new_item' => __('Add Service'),
            'view_item' => __('Seen Service'),
            'search_items' => __('Search Service'),
            'not_found' =>  __('Service Not Found'),
            'not_found_in_trash' => __('No se encontraron Especialidad en la papelera.'),
            'parent_item_colon' => '',
            'menu_name' => 'Services'
        );

    register_post_type(
        'Services',
        array('labels' => $services,
            'description' => 'Services',
            'publicly_queryable' => true,
            'public' => true,
            'show_ui' => true,
            'hierarchical' => false, // like posts
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'page-attributes',
                'editor',
                'thumbnail',
            ),
        )
    );


    $homebanner = array(
            'name' => _x('Banner Home', 'post type general name'),
            'singular_name' => _x('Banner', 'post type singular name'),
            'add_new' => _x('Añadir Nuevo', 'Banner'),
            'add_new_item' => __('Añadir Nuevo Banner'),
            'edit_item' => __('Editar Banner'),
            'new_item' => __('Añadir Banner'),
            'view_item' => __('Ver Banner'),
            'search_items' => __('Buscar Banner'),
            'not_found' =>  __('Banner no existente.'),
            'not_found_in_trash' => __('No se encontraron Banners en la papelera.'),
            'parent_item_colon' => '',
            'menu_name' => 'Banner Home'
        );

    register_post_type(
        'Banner Home',
        array('labels' => $homebanner,
            'description' => 'Banner',
            'publicly_queryable' => true,
            'public' => true,
            'show_ui' => true,
            'hierarchical' => false, // like posts
            'supports' => array(
                'title',
                'page-attributes',
                'editor',
                'thumbnail',
            ),
        )
    );

}