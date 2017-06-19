<?php
  get_header();

  if (has_category('newsletter')) :
    get_template_part('template-parts/single/newsletter');
  endif;

  get_sidebar();

  get_footer();
  ?>
