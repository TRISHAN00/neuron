<?php

// My Theme Functions --------------------------------

// nuron_theme_files CSS/JS
function website_theme_files()
{
    wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0', 'all');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootsnav', get_template_directory_uri() . '/assets/css/bootsnav.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('website-style', get_stylesheet_uri());


    // JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootsnav', get_template_directory_uri() . '/assets/js/bootsnav.js', array('jquery'), '1.0', true);
    wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('website-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'website_theme_files');


// theme support functions
function neuron_theme_supports()
{
    // multi language support
    load_theme_textdomain('neuron', get_template_directory() . '/languages');

    // automatic generate feed links
    add_theme_support('automatic-feed-links');

    // header html title
    add_theme_support('title-tag');

    // post thumbnail support
    add_theme_support('post-thumbnails');

    // nav menu register
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'neuron'),
        )
    );

    // HTML 5 support
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');


    // LOGO ADD SUPPORT
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'neuron_theme_supports');

// widget shorcode filtering
add_filter('widget_text', 'do_shortcode');

// custom post register
add_action('init', 'neuron_theme_custom_register');
function neuron_theme_custom_register()
{
    // slider post
    register_post_type(
        'slide',
        array(
            'labels' => array(
                'name' => __('Slides'),
                'singular_name' => __('Slide')
            ),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true
        )
    );
    // feature post
    register_post_type(
        'feature',
        array(
            'labels' => array(
                'name' => __('Features'),
                'singular_name' => __('Feature')
            ),
            'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true
        )
    );
    // Services 
    register_post_type(
        'service',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service')
            ),
            'supports' => array('title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes'),
            'public' => false,
            'show_ui' => true
        )
    );
};

// custom widget setup
function neuron_widgets_init()
{
    // Footer One
    register_sidebar(
        array(
            'name'          => esc_html__('Footer one', 'neuron'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Add footer widget one here.', 'neuron'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    // Footer Two
    register_sidebar(
        array(
            'name'          => esc_html__('Footer two', 'neuron'),
            'id'            => 'footer-2',
            'description'   => esc_html__('Add footer widget two here.', 'neuron'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    // Footer Three
    register_sidebar(
        array(
            'name'          => esc_html__('Footer three', 'neuron'),
            'id'            => 'footer-3',
            'description'   => esc_html__('Add footer widget three here.', 'neuron'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    // Footer Four
    register_sidebar(
        array(
            'name'          => esc_html__('Footer four', 'neuron'),
            'id'            => 'footer-4',
            'description'   => esc_html__('Add footer widget four here.', 'neuron'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'neuron_widgets_init');

function thumbpost_list_shortcode($atts)
{
    extract(shortcode_atts(
        array(
            'count' => 3,
        ),
        $atts
    ));

    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => 'post')
    );

    $list = '<ul>';
    while ($q->have_posts()) : $q->the_post();
        $idd = get_the_ID();
        $list .= '
        <li>
            ' . get_the_post_thumbnail($idd, 'thumbnail') . '
            <p><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>
            <span>' . get_the_date('d F Y', $idd) . '</span>
        </li>
            ';
    endwhile;
    $list .= '</ul>';
    wp_reset_query();
    return $list;
}
add_shortcode('thumb_posts', 'thumbpost_list_shortcode');
