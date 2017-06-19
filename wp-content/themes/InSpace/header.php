<!doctype html>
<html class="no-js" lang="fr" dir="ltr">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>

    <div class="off-canvas-wrapper">
  	<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <!-- Responsive menu -->

      <?php get_template_part('template-parts/header/menu', 'responsive'); ?>

    <div class="off-canvas-content" data-off-canvas-content>
    <!-- Contenu du site -->
    <!-- Navbar -->

      <?php get_template_part('template-parts/header/menu', 'main'); ?>

    <!-- HEADER -->
    <?php
      is_home() || is_front_page() ?
      get_template_part('template-parts/header/home/home', 'header') :
      get_template_part('template-parts/header/header');
    ?>

    <!-- BREADCRUMBS -->
<?php if (!is_home() && !is_front_page()) :
        get_template_part('template-parts/header/breadcrumbs');
      endif; ?>
