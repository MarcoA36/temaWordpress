<?php

function mipagina_estilos()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    // wp_enqueue_style('normalize', get_stylesheet_directory_uri().'/css/normalize.css', array(), '8.0.1');
    wp_enqueue_style('boostrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css");
    wp_enqueue_script('boostrapjs', "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js");
    // wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap'); 
}

add_action('wp_enqueue_scripts', 'mipagina_estilos');
add_theme_support('post-thumbnails');

// require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';


// function cargar_scripts() {
//     wp_enqueue_script( 'script-menu', get_stylesheet_directory_uri() . '/js/menu.js', array(), '1.0', true );
// }
// add_action( 'wp_enqueue_scripts', 'cargar_scripts' );

register_nav_menus(
    array(
        'menu_principal' => __('Menu Principal', 'pagepost')
    ));



function mi_sidebar()
{
    register_sidebar(
        array(
            'name' => 'Sidebar 1',
            'id' => 'mi_sidebar',
            'description' => 'Esta es el área de widgets para la sidebar',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>'
        ));
}
add_action('widgets_init', 'mi_sidebar');


function mi_widget_contacto() {
    register_sidebar( array(
        'name'          => 'Widget Contacto',
        'id'            => 'widget_contacto',
        'description'   => 'Widget de formulario de contacto personalizado',
        'before_widget' => '<div class="widget-contacto">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mi_widget_contacto' );


// function register_my_menu() {
//     register_nav_menu('primary-menu', __( 'Primary Menu' ));
//     register_nav_menu('secondary-menu', __( 'Secondary Menu' ));
//   }
//   add_action( 'init', 'register_my_menu' );

//   function add_submenu_to_nav( $items, $args ) {
//     if ( $args->theme_location == 'primary-menu' ) {
//       foreach ( $items as $key => $item ) {
//         if ( $item->menu_item_parent ) {
//           $parent_id = $item->menu_item_parent;
//           foreach ( $items as $sub_key => $sub_item ) {
//             if ( $sub_item->ID == $parent_id ) {
//               $items[$sub_key]->children[] = $item;
//               unset( $items[$key] );
//               break;
//             }
//           }
//         }
//       }
//     }
//     return $items;
//   }
//   add_filter( 'wp_nav_menu_objects', 'add_submenu_to_nav', 10, 2 );

//   class Submenu_Walker_Nav_Menu extends Walker_Nav_Menu {
//     function start_lvl( &$output, $depth = 0, $args = array() ) {
//       $indent = str_repeat( "\t", $depth );
//       $output .= "\n$indent<ul class=\"sub-menu\">\n";
//     }
//   }




// function custom_pagination() {
//     global $wp_query;

//     $big = 999999999; // Número grande para asegurarnos de tener suficientes números de página

//     $paginate_links = paginate_links(array(
//         'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
//         'format' => '?paged=%#%',
//         'current' => max(1, get_query_var('paged')),
//         'total' => $wp_query->max_num_pages,
//         'type' => 'array',
//         'prev_text' => __('&laquo; Anterior'),
//         'next_text' => __('Siguiente &raquo;'),
//     ));

//     if ($paginate_links) {
//         echo '<nav class="pagination">';
//         foreach ($paginate_links as $link) {
//             echo '<div class="page-link">' . $link . '</div>';
//         }
//         echo '</nav>';
//     }
// }


///////////////// PAGINACION
function custom_posts_per_page($query)
{
    if (!is_admin() && $query->is_category()) {
        $query->set('posts_per_page', 6);
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');


///////////////// ENVIAR FORMULARIO
function enviar_formulario()
{
    if (isset($_POST['enviar_formulario_nonce']) && wp_verify_nonce($_POST['enviar_formulario_nonce'], 'enviar_formulario_nonce')) {
        $nombre = sanitize_text_field($_POST['nombre']);
        $email = sanitize_email($_POST['email']);
        $mensaje = sanitize_text_field($_POST['mensaje']);
        $to = 'marco_95_5@yahoo.com'; // Reemplaza con tu correo electrónico
        $subject = 'Mensaje enviado desde el formulario de contacto de mi sitio web';
        $body = 'Nombre: ' . $nombre . "\n\n" . 'Email: ' . $email . "\n\n" . 'Mensaje: ' . $mensaje;
        $headers = array('From: ' . $nombre . ' <' . $email . '>');
        wp_mail($to, $subject, $body, $headers);
    }
}
add_action('admin_post_nopriv_enviar_formulario', 'enviar_formulario');
add_action('admin_post_enviar_formulario', 'enviar_formulario');



?>