<?php
if (is_category('evenements')) :
  get_template_part('template-parts/sidebar/category', 'evenements');
endif;

if (is_category('newsletter') ||
    get_cat_name($GLOBALS['category'][0] -> category_parent, 'category') == 'InSpace News' || 
    (is_single() && has_category('newsletter'))) :
  get_template_part('template-parts/sidebar/category', 'newsletter');
endif;
?>
