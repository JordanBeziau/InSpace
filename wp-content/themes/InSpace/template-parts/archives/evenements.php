<section class="row archives actu-side-bar">
  <!-- MAIN PART -->
  <main class="large-9 column no-padding" id="bottom-anchor">

    <?php
      $page = get_query_var('paged') ? get_query_var('paged') : 1;
      $query = new WP_Query(array(
              'category_name'   => 'evenements',
              'posts_per_page'  => 8,
              'paged'           => $page,
      ));
      while ($query -> have_posts()) : $query -> the_post();
      $metas = get_post_custom();
    ?>
      <article class="large-12 column">
        <a href="<?php the_permalink(); ?>" class="wrapper">
          <div class="large-4 column">
            <div class="wrapper-hover">
              <!-- Image article responsive -->
              <picture>
                <source
                  media="(min-width: 1024px) and (max-width: 1200px)"
                  srcset="<?php echo get_the_post_thumbnail_url('', 'article-archive-desktop2'); ?>">
                <source
                  media="(min-width: 501px) and (max-width: 1023px)"
                  srcset="<?php echo get_the_post_thumbnail_url('', 'article-archive-large'); ?>">
                <source
                  media="(min-width: 360px) and (max-width: 500px)"
                  srcset="<?php echo get_the_post_thumbnail_url('', 'article-single-small'); ?>">
                <img src="<?php echo get_the_post_thumbnail_url('', 'article-archive-desktop'); ?>"
                    alt="<?php echo get_post_meta(get_post_thumbnail_id($query -> post -> ID), '_wp_attachment_image_alt', true); ?>"
                    title="<?php get_the_title(get_post_thumbnail_id($query -> post -> ID)); ?>"
                >
              </picture>
              <p>Voir l'événement</p>
            </div>
          </div>
          <div class="large-8 column">
            <p class="date">
              <?= isset($metas['lieu'][0]) ? '<span class="article-category">'.$metas['lieu'][0].'</span>' : ''; ?>
              <?= isset($metas['date'][0]) ? '<time>'.$metas['date'][0].'</time>' : ''; ?>
            </p>
            <h2><?php the_title(); ?></h2>
            <p><?php if (isset($metas['chapeau'][0])) :
                      echo substr($metas['chapeau'][0], 0, 138);
                      echo strlen($metas['chapeau'][0]) > 138 ? '...': '';
                    endif;
            ?></p>
          </div>
        </a>
      </article>
    <?php endwhile;

      echo pagination($query, $page);
    ?>
  </main>
