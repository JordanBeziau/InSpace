<div class="navbar">

    <!-- Responsive Navbar -->
    <div class="title-bar responsive-navbar" data-responsive-toggle="site-navigation" data-hide-for="large" style="display: none;">
      <a class="button-menu" data-toggle="mobile-menu" aria-expanded="false" aria-controls="mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <div class="title-bar-title">
        <a href="<?php bloginfo('url'); ?>">
          <img src="<?= wp_get_attachment_url(get_theme_mod('add-logo-customize')); ?>">
        </a>
      </div>
    </div>

    <!-- Desktop Navbar -->
    <div class="row desktop-navbar">
      <div class="title-bar-left">
        <!-- Content left -->
        <a href="<?php bloginfo('url'); ?>">
          <img src="<?= wp_get_attachment_url(get_theme_mod('add-logo-customize')); ?>" alt="Logo InSpace Institute">
        </a>
      </div>

  <!-- Content right -->
  <?php
  $args = array(
    'theme_location'  => 'main',
    'container'       => 'nav',
    'container_class' => 'title-bar-right',
    'items_wrap'      => '<ul class="dropdown menu" data-dropdown-menu>%3$s</ul>',
  );

  wp_nav_menu( $args );
  ?>

</div>
</div>
