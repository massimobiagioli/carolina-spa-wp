<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carolina Spa | <?php echo $title; ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

    <!-- Header -->
    <header class="site-header container">
        <div class="row justify-content-center justify-content-lg-between">
            <div class="col-8 col-lg-4">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" class="img-fluid mx-auto d-block">
                </a>
            </div>
            <div class="col-12 col-lg-4">
                <?php
                    $args = array(
                        'container_id' => 'nav',
                        'container_class' => 'socials text-center text-md-right pt-3',
                        'link_before' => '<span class="sr-only">',
                        'link_after' => '</span>',
                        'theme_location' => 'social_menu'
                    );
                    wp_nav_menu($args);
                ?>
            </div>
        </div>
    </header>

    <!-- Navigation Main Menu -->
    <div class="navigation mt-4 py-1">
        <nav class="main-nav py-1 navbar navbar-toggleable-sm navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" 
                    data-toggle="collapse" data-target="#main-navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="#" class="navbar-brand d-md-none">Carolina Spa</a>
            <div class="container">
                <?php
                    $args = array(
                        'menu_class' => 'nav nav-justified flex-column flex-sm-row',
                        'container_id' => 'main-navigation',
                        'container_class' => 'collapse navbar-collapse',
                        'theme_location' => 'main_menu'
                    );
                    wp_nav_menu($args);
                ?>
            </div>
        </nav>
    </div>

