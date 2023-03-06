<?php 
    // Ajoute la prise en charge des images de mises en avant
    add_theme_support( "post-thumbnails" );
    // Ajoute automatiquement le titre du site dans l'en-tête des pages.
    add_theme_support( "title-tag" );

    add_action( "wp_enqueue_scripts", "dwwm_register_assets" );

    function dwwm_register_assets()
    {
        wp_enqueue_style("dwwm", get_stylesheet_uri(  ));
        // wp_enqueue_script("nom", "lien" );
        wp_enqueue_style("header", get_template_directory_uri()."styles/header.css", ["dwwm"], "0.1");
    }
?>