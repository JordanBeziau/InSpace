<nav class="off-canvas position-left anim-scroll is-transition-push" id="mobile-menu" data-off-canvas="q8ckjs-off-canvas" data-position="left" role="navigation" aria-hidden="true">

<?php
  $args = array(
    'theme_location' => 'main',
    'container'      => '',
    'items_wrap'     => '<ul class="dropdown menu vertical" data-accordion-menu data-multi-open="false">%3$s</ul>',
  );

  wp_nav_menu( $args );
 ?>
 
</nav>
