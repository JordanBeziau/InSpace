<header class="expanded no-home">
  <?php
    if (is_single() && has_category('evenements')) :
      $post = get_page_by_path('evenements');
      if ($post) :
        $post_thumbnail_ID = $post -> ID;
      endif;

    elseif (is_single() && has_category('newsletter')) :
      $post = get_page_by_path('newsletter');
      if ($post) :
        $post_thumbnail_ID = $post -> ID;
      endif;


    elseif (is_category()) :
      $category_ID = get_query_var('cat');
      $category_name = get_the_category_by_ID($category_ID);
      global $category;
      $category = get_categories(array(
        "name"       => $category_name,
        "hide_empty" => false
      ));
      $post = get_page_by_path($category[0] -> slug);
      if (!is_category('newsletter') && get_cat_name($category[0] -> parent, 'category') == 'InSpace News') :
        $post = get_page_by_path('newsletter');
      endif;
      if ($post) :
        $post_thumbnail_ID = $post -> ID;
      endif;

    else :
      $post = get_post();
      $post_thumbnail_ID = $post -> ID;
    endif;
  ?>
  <picture class="featured-image">
    <source
    media="(min-width: 1200px)"
    srcset="<?php echo get_the_post_thumbnail_url($post_thumbnail_ID, 'header-desktop'); ?>"
    >
    <source
    media="(min-width: 500px)"
    srcset="<?php echo get_the_post_thumbnail_url($post_thumbnail_ID, 'header-medium'); ?>"
    >
    <img src="<?php echo get_the_post_thumbnail_url($post_thumbnail_ID, 'header-small'); ?>"
        alt="<?php echo get_post_meta(get_post_thumbnail_id($post_thumbnail_ID), '_wp_attachment_image_alt', true); ?>"
    >
  </picture>
  <div class="row column">
    <div class="title">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</header>
