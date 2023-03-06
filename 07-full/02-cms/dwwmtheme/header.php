<!DOCTYPE html>
<html <?php language_attributes( ) ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
    <?php wp_body_open() ?>
<header class="header">
    <a href="<?php echo home_url("/") ?>">
        <img style="width: 200px;" src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="logo">
    </a>
</header>