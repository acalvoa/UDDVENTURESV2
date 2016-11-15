<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'create_postulaciones'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_quehacemos'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'create_emprendedor');
add_action('init', 'create_eventos');
add_action('init', 'create_redes');
add_action('init', 'create_recursos');
add_action('init', 'create_noticias');
add_action('init', 'create_faqs');
add_action('init', 'create_vitrina');
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
add_filter('acf/settings/show_admin', '__return_false');
// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// CREAMOS EL ESPACIO PAR LAS POSTULACIONES
function create_postulaciones() {
    register_post_type( 'convocatorias',
        array(
          'labels' => array(
            'name' => __( 'Convocatorias' ),
            'singular_name' => __( 'Convocatorias' )
          ),
        'public' => true,
        'menu_position' => 2,
        'rewrite' => array( 'slug' => 'convocatorias' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
}
function create_quehacemos() {
    register_post_type( 'quehacemos',
        array(
          'labels' => array(
            'name' => __( 'Que Hacemos' ),
            'singular_name' => __( 'QueHacemos' )
          ),
        'public' => true,
        'menu_position' => 3,
        'rewrite' => array( 'slug' => 'Que Hacemos' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
}
function create_emprendedor() {
    register_post_type( 'emprendedores',
        array(
          'labels' => array(
            'name' => __( 'Emprendedores' ),
            'singular_name' => __( 'Emprendedores' )
          ),
        'public' => true,
        'menu_position' => 5,
        'rewrite' => array( 'slug' => 'emprendedores' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
    register_taxonomy( 'emprendedores-tipo',
        'emprendedores',
        array(
          'hierarchical' => false,
          'label'        => __( 'Tipo' ),
          'rewrite'      => array( 'slug' => 'emprendedores-tipo' )
        )
    );
}
function create_eventos() {
    register_post_type( 'eventos',
        array(
          'labels' => array(
            'name' => __( 'Eventos' ),
            'singular_name' => __( 'Eventos' )
          ),
        'public' => true,
        'menu_position' => 6,
        'rewrite' => array( 'slug' => 'eventos' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
    register_taxonomy( 'eventos-tipo',
        'eventos',
        array(
          'hierarchical' => false,
          'label'        => __( 'Tipo' ),
          'rewrite'      => array( 'slug' => 'eventos-tipo' )
        )
    );
}
function create_redes() {
    register_post_type( 'redes',
        array(
          'labels' => array(
            'name' => __( 'Redes' ),
            'singular_name' => __( 'Redes' )
          ),
        'public' => true,
        'menu_position' => 7,
        'rewrite' => array( 'slug' => 'redes' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
    register_taxonomy( 'redes-tipo',
        'redes',
        array(
          'hierarchical' => false,
          'label'        => __( 'Tipo' ),
          'rewrite'      => array( 'slug' => 'redes-tipo' )
        )
    );
}
function create_recursos() {
    register_post_type( 'recursos',
        array(
          'labels' => array(
            'name' => __( 'Recursos' ),
            'singular_name' => __( 'Recursos' )
          ),
        'public' => true,
        'menu_position' => 8,
        'rewrite' => array( 'slug' => 'recursos' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
    register_taxonomy( 'recursos-tipo',
        'recursos',
        array(
          'hierarchical' => false,
          'label'        => __( 'Tipo' ),
          'rewrite'      => array( 'slug' => 'recursos-tipo' )
        )
    );
}
function create_noticias() {
    register_post_type('noticias',
        array(
          'labels' => array(
            'name' => __( 'Noticias' ),
            'singular_name' => __( 'Noticia' )
          ),
        'public' => true,
        'menu_position' => 4,
        'rewrite' => array( 'slug' => 'noticias' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
}
function create_faqs() {
    register_post_type('faqs',
        array(
          'labels' => array(
            'name' => __( 'FAQS' ),
            'singular_name' => __( 'Faq' )
          ),
        'public' => true,
        'menu_position' => 9,
        'rewrite' => array( 'slug' => 'faqs' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
}
function create_vitrina() {
    register_post_type('vitrina',
        array(
          'labels' => array(
            'name' => __( 'Vitrina' ),
            'singular_name' => __( 'Vitrina' )
          ),
        'public' => true,
        'menu_position' => 1,
        'rewrite' => array( 'slug' => 'vitrina' ),
        'capability_type'     => 'page',
        'has_archive' => true,
        )
    );
}
/* ADMIN PANEL */
function edit_admin_menus() {
    global $menu;
    // remove_menu_page('index.php');
    // remove_menu_page('edit.php?post_type=page');
    // remove_menu_page('upload.php');
    // remove_menu_page('edit.php');
    // remove_menu_page('edit-comments.php');
    // remove_menu_page('edit.php?post_type=acf');
    // remove_menu_page('tools.php');
}
add_action( 'admin_menu', 'edit_admin_menus' );
function remove_acf_menu()
{

    // // provide a list of usernames who can edit custom field definitions here
    // $admins = array( 
    //     'admin'
    // );

    // // get the current user
    // $current_user = wp_get_current_user();

    // // match and remove if needed
    // if( !in_array( $current_user->user_login, $admins ) )
    // {
    //     remove_menu_page('edit.php?post_type=acf');
    // }

}
add_action( 'admin_menu', 'remove_acf_menu', 999 );
//INDEX ADICIONAL DATA
function FESaddpost_id($document, $post){
    $metadata = get_field_objects($post->ID);
    //CREAMOS LA INDEXACION REQUERIDA POR ELASTIC SEARCH
    $post_type = $post->post_type;
    // ID de la entrada
    $post_id   = $post->ID;
    // URL del sitio (sin protocolo).
    // Si el sitio está en un directorio, se debe incluir la ruta
    $site_id   = parse_url( get_bloginfo('url'), PHP_URL_HOST );
    $_id = sha1( $post_type . $post_id . $site_id );
    //INGRESAMOS LA INFORMACIÓN BASICA DEL DOCUMENTO
    //$document['_id'] = $_id;
    $document['_index'] = "udd";
    $document['_type'] = get_cat_name($post->post_category);
    $document['_parent_version'] = 2;
    $document['_new_udd_ventures'] = true;
    $document['_version'] = 12;
    $document['_exists'] = true;
    $document['_source'] = array();
    //AGREGAMOS LAS IMAGENES
    $document['_source']['thumbnail'] = null;
    if(array_key_exists('imagen_postulacion', $metadata)) $document['_source']['thumbnail'] = $metadata['imagen_postulacion']['value']['sizes']['thumbnail'];
    if(array_key_exists('imagen_evento', $metadata)) $document['_source']['thumbnail'] = $metadata['imagen_evento']['value']['sizes']['thumbnail'];
    if(array_key_exists('imagen_postulacion', $metadata)) $document['_source']['thumbnail'] = $metadata['imagen_postulacion']['value']['sizes']['thumbnail'];
    if(array_key_exists('imagen', $metadata)) $document['_source']['thumbnail'] = $metadata['imagen']['value']['sizes']['thumbnail'];
    //INTEGRAMOS LA FECHA
    $document['_source']['start_date'] = $post->post_date;
    //INTEGRAMOS ELA AUTOR
    $document['_source']['author'] = array();
    $document['_source']['author']['n'] = array();
    $document['_source']['author']['n']['given-name'] = get_the_author_meta('first_name', $post->post_author);
    $document['_source']['author']['n']['family-name'] = get_the_author_meta('last_name', $post->post_author);
    $document['_source']['author']['email'] = get_the_author_meta('user_email', $post->post_author);
    $document['_source']['author']['login'] = get_the_author_meta('user_login', $post->post_author);
    $document['_source']['author']['id'] = $post->post_author;
    // INTEGRAMOS LOS OTROS CAMPOS
    $document['_source']['status'] = $post->post_status;
    $document['_source']['parent'] = $post->parent;
    $document['_source']['post_type'] = $post->post_status;
    $document['_source']['updated'] = $post->post_modified;
    $document['_source']['entry_id'] = $post->ID;
    $document['_source']['bookmark'] = get_permalink($post->ID);
    $document['_source']['published'] = $post->post_date;
    $document['_source']['taxonomies'] = array();
    //INTEGRAMOS LAS TAXONOMIAS
    $taxonomias = wp_get_post_terms($post->ID);
    foreach($taxonomias as $key => $value){
        $temp = array();
        $temp["taxonomy"] = $value->taxonomy;
        $temp["term_id"] = $value->term_id;
        $temp["term_taxonomy_id"] = $value->term_taxonomy_id;
        $temp["slug"] = $value->slug;
        $temp["name"] = $value->name;
        $document['_source']['taxonomies'][] = $temp;
    }
    $document['_source']['entry_title'] = $post->post_title;
    $document['_source']['entry_content'] = $post->post_content;
    $document['_source']['entry_summary'] = substr($post->post_content, 0, 500)."...";
    if(array_key_exists('resumen_noticia', $metadata)) $document['_source']['entry_summary'] = $metadata['resumen_noticia']['value'];
    if(array_key_exists('resumen_postulacion', $metadata)) $document['_source']['entry_summary'] = $metadata['resumen_postulacion']['value'];
    if(array_key_exists('fecha_evento', $metadata)) $document['_source']['fecha_evento'] = $metadata['fecha_evento']['value'];
    $document['_source']['site'] = array();
    $document['_source']['site']['id'] = "www.uddventures.cl/aceleradora";
    $document['_source']['site']['url'] = "http://www.uddventures.cl/aceleradora";
    $document['_source']['site']['name'] = "UDD Ventures - Aceleradora";
    // RETORNAMOS EL OBJETO
    return $document;
}
add_filter('elasticsearch_indexer_build_document', 'FESaddpost_id', 10, 2);
?>
