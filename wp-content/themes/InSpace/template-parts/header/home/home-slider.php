<!-- SLIDER -->
<div class="orbit homepage" role="region" aria-label="Favorite Space Pictures" data-orbit data-pause-on-hover="false" data-timer-delay="8000">
  <ul class="orbit-container">

    <!-- SLIDE 1 -->
    <li class="is-active orbit-slide">
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
      <div class="orbit-caption row">
        <div class="title">
          <?php echo $post -> post_content; ?>          
        </div>
      </div>
    </li>

    <?php
      # Slides 2 +
      $query = new WP_Query( array(
          'category_name' => 'home-slider'
      ));

      if ($query -> have_posts()) :
        while ($query -> have_posts()) : $query -> the_post();
        $metas = get_post_custom();
    ?>
    <li class="orbit-slide event">
      <picture class="featured-image">
        <source
        media="(min-width: 1200px)"
        srcset="<?php echo get_the_post_thumbnail_url($query -> ID, 'header-desktop'); ?>"
        >
        <source
        media="(min-width: 500px)"
        srcset="<?php echo get_the_post_thumbnail_url($query -> ID, 'header-medium'); ?>"
        >
        <img src="<?php echo get_the_post_thumbnail_url($query -> ID, 'header-small'); ?>" alt="Description de l'image">
      </picture>
      <div class="orbit-caption row">
        <div class="large-4 medium-6 small-11 column">
          <h2><?php the_title(); ?></h2>
          <p>
            <?= isset($metas['lieu'][0]) ? $metas['lieu'][0] : ''; ?>,
            <?= isset($metas['date'][0]) ? $metas['date'][0] : ''; ?>
          </p>
          <a href="<?php the_permalink(); ?>">en savoir plus</a>
        </div>
      </div>
    </li>
    <?php
        endwhile;
      endif;
      ?>
  </ul>
  <!-- SLIDER NAV (BULLES) -->
  <nav class="orbit-bullets">
    <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
<?php if ($query -> have_posts()) :
        while ($query -> have_posts()) : $query -> the_post(); ?>
          <button data-slide="<?php echo $query -> current_post + 1 ?>"><span class="show-for-sr"></span></button>
  <?php endwhile;
      endif; ?>
  </nav>
</div>
