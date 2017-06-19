<header class="expanded no-home">
  <?php

    $slider = get_category_by_slug('home-slider');
    $slide_number = $slider -> category_count;

    global $post;
    global $post_thumbnail_ID;
    $post = get_page_by_path('accueil');
    $post_thumbnail_ID = $post -> ID;

    if ($slide_number > 0) :
      get_template_part('template-parts/header/home/home', 'slider');
    else :
      get_template_part('template-parts/header/home/home', 'basic');
    endif;

  ?>
</header>
