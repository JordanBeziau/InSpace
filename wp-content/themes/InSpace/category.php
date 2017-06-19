<?php get_header(); ?>

<!-- PAGE CONTENT -->
<?php
  if (!is_category('newsletter') && get_cat_name($category[0] -> parent, 'category') == 'InSpace News') :
    get_template_part('template-parts/archives/newsletter', 'subcategory');
  else :
    get_template_part('template-parts/archives/' . $category[0] -> slug);
  endif;
 ?>

  <!-- SIDE BAR -->
  <?php get_sidebar(); ?>

<?php get_footer(); ?>
