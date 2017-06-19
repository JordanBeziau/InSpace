<header class="expanded no-home">
  <picture class="featured-image">
    <source
    media="(min-width: 1200px)"
    srcset="<?php echo get_the_post_thumbnail_url($post_thumbnail_ID, 'header-desktop'); ?>"
    >
    <source
    media="(min-width: 500px)"
    srcset="<?php echo get_the_post_thumbnail_url($post_thumbnail_ID, 'header-medium'); ?>"
    >
    <img src="<?php echo get_the_post_thumbnail_url($post_thumbnail_ID, 'header-small'); ?>" alt="Description de l'image">
  </picture>
  <div class="row column">
    <div class="title">
      <?php echo $post -> post_content; ?>
    </div>
  </div>
</header>
