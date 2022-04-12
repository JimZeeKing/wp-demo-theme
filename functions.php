<?php // Lier la feuille de style et les fonts au projet







function simplenews_enqueue_styles()

{
    wp_enqueue_style('latofont', 'https://fonts.googleapis.com/css2?family=Lato&display=swap');
    wp_enqueue_style('merrifont', 'https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap');

    wp_enqueue_style('maincss', get_template_directory_uri() . '/styles/main.css', array('latofont', 'merrifont'));

    wp_enqueue_style('splidecss', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/splide.min.css');
    wp_enqueue_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js');

    wp_enqueue_style('lightboxcss',  get_template_directory_uri() . '/vendors/simpleLightbox.min.css');
    wp_enqueue_script("lightbox", get_template_directory_uri() . '/vendors/simpleLightbox.min.js');


    wp_enqueue_script("tooltip", 'https://tim.cgmatane.qc.ca/libs/ToolTip.min.js');


    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('splide', 'lightbox', 'tooltip'));

    wp_dequeue_style('global-styles');
}



add_action('wp_enqueue_scripts', 'simplenews_enqueue_styles');

// Supports de thème



function simplenews_add_theme_support()
{

    add_theme_support('post-thumbnails');

    add_theme_support('title-tag');
}


add_action('after_setup_theme', 'simplenews_add_theme_support');





// Déclarer un menu



function simplenews_register_menus()

{



    register_nav_menus(array('main-menu' => __('Menu principal')));
}



add_action('after_setup_theme', 'simplenews_register_menus');





// Widgets



function simplenews_widgets_init($id)

{



    register_sidebar(array( // Ici on déclare le nom du widget. C'est celui-ci qui sera visible dans l'admin de WordPress

        'name' => 'Widget 1',

        // Ici on déclare l'identifiant du widget. On l'utilisera pour afficher le widget dans le thème.

        'id' => 'widget-1',

        'description' => 'Widget afficher en haut du sidebar',

        // Ici on déclare la balise devant englober le widget

        'before_widget' => '<div class="side-widget">',

        'after_widget' => '</div>'



    ));



    register_sidebar(array( // Ici on déclare le nom du widget. C'est celui-ci qui sera visible dans l'admin de WordPress

        'name' => 'Widget 2',

        // Ici on déclare l'identifiant du widget. On l'utilisera pour afficher le widget dans le thème.

        'id' => 'widget-2',

        'description' => 'Widget afficher au bas du sidebar',

        // Ici on déclare la balise devant englober le widget

        'before_widget' => '<div class="side-widget">',

        'after_widget' => '</div>'



    ));
}



add_action('widgets_init', 'simplenews_widgets_init');


//Entrevue post type
function simplenews_register_entrevue_post_type()
{
    $labels = [
        'name'                     => __("Entrevues", "simplenews"),
        'singular_name'            => __("Entrevue", "simplenews"),
        'add_new'                  => __("Ajouter", "simplenews"),
        'add_new_item'             => __("Ajouter une entrevue", "simplenews"),
        'edit_item'                => __("Modifier l'entrevue", "simplenews"),
        'new_item'                 => __("Nouveau entrevue", "simplenews"),
        'view_item'                => __("Afficher le entrevue", "simplenews"),
        'view_items'               => __("Afficher les entrevues", "simplenews"),
        'search_items'             => __("Rechercher les entrevue", "simplenews"),
        'not_found'                => __("Aucun entrevue n'a été trouvée", "simplenews"),
        'not_found_in_trash'       => __("Aucun entrevue n'a été trouvée dans la corbeille", "simplenews"),
        'all_items'                => __("Toutes les Entrevues", "simplenews"),
        'archives'                 => __("Archives des entrevues", "simplenews"),
        'attributes'               => __("Attributs du entrevue", "simplenews"),
        'insert_into_item'         => __("Insérer dans l'entrevue", "simplenews"),
        'uploaded_to_this_item'    => __("Téléverser dans l'entrevue", "simplenews"),
        'featured_image'           => __("Image de l'entrevue", "simplenews"),
        'set_featured_image'       => __("Assigner l'image à l'entrevue", "simplenews"),
        'remove_featured_image'    => __("Retirer l'image de l'entrevue", "simplenews"),
        'use_featured_image'       => __("Utiliser l'image de l'entrevue", "simplenews"),
        'filter_items_list'        => __("Filtrer la liste des entrevues", "simplenews"),
        'items_list_navigation'    => __("Liste de navigation des entrevues", "simplenews"),
        'items_list'               => __("Liste des entrevues", "simplenews"),
        'item_published'           => __("L'entrevue a été publiée", "simplenews"),
        'item_published_privately' => __("L'entrevue a été publiée en privé", "simplenews"),
        'item_reverted_to_draft'   => __("L'entrevue a été remise en brouillon", "simplenews"),
        'item_scheduled'           => __("L'entrevue a été planifiée", "simplenews"),
        'item_updated'             => __("L'entrevue a été mise à jour", "simplenews")
    ];

    $args = [
        'labels'              => $labels,
        'description'         => __("Contenu de type entrevue", "simplenews"),
        'public'              => true,
        'menu_icon'           => 'dashicons-microphone',
        'menu_position'       => 9,
        'supports'            => ['title', 'editor', 'thumbnail'],
        'rewrite'             => ['slug' => 'entrevues']
    ];

    register_post_type("Entrevues", $args);
}

add_action('init', 'simplenews_register_entrevue_post_type');


function simplenews_register_entrevue_taxonomies()
{
    $labels = [
        "name"          => __("Types", "simplenews"),
        "singular_name" => __('Type', 'simplenews'),
        "menu_name"     => __('Types', 'simplenews'),
        "all_items"     => __("Toutes les types", "simplenews"),
        "edit_item"     => __("Modifier le type", "simplenews"),
        "view_item"     => __("Afficher le type", "simplenews"),
        "update_item"   => __('Mettre à jour le type', "simplenews"),
        "add_new_item"  => __("Ajouter un type", "simplenews"),
        "new_item_name" => __("Nouveau nom du type", "simplenews"),
        "search_items"  => __("Rechercher des types", "simplenews"),
        "popular_items" => __("Types populaires", "simplenews"),
        "back_to_items" => __("Revenir aux types", "simplenews")
    ];

    $args = [
        "hierarchical"      => true,
        "labels"            => $labels,
        "show_ui"           => true,
        "show_in_menu"      => true,
        "show_admin_column" => true,
        "query_var"         => true,
        "rewrite"           => [
            "slug" => "types"
        ]
    ];

    register_taxonomy("types_entrevue", ["entrevues"], $args);
}

add_action('init', 'simplenews_register_entrevue_taxonomies');


include_once("includes/clean.php");