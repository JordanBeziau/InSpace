<section class="row archives actu-side-bar">
  <!-- MAIN PART -->
  <main class="large-9 column no-padding" id="bottom-anchor">

    <?php
      $page = get_query_var('paged') ? get_query_var('paged') : 1;
      $query = new WP_Query(array(
              'category_name'  => $GLOBALS['category'][0] -> slug,
              'posts_per_page' => 8,
              'paged'          => $page,
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
                <img src="<?php echo get_the_post_thumbnail_url('', 'article-archive-desktop'); ?>" alt="Image à la une">
              </picture>
              <p>Lire l'article</p>
            </div>
          </div>
          <div class="large-8 column">
            <p class="date">
              <span class="article-category"><?= $GLOBALS['category'][0] -> name ?></span>
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
