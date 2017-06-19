<?php
$query = new WP_Query(array(
    'category_name' => $GLOBALS['cat'][0] -> slug,
    'post_status'   => 'publish',
    'post__not_in'  => array($post -> ID),
));
if ($query -> have_posts()) :
  if ($query -> found_posts > 1) : ?>

    <div class="large-12 column">
      <div class="articles-suivants">
        <h4 class="titre-trait">Articles suivants</h4>
        <div class="trait"></div>
        <div class="row">

<?php $random = rand(0, $query -> found_posts - 1);
    for ($i = 0; $i < 2; $i++) :
      do {
        $count = rand(0, $query -> found_posts - 1);
      } while ($random == $count);
      $random = $count;
      $otherPost = $query -> posts [$random];
      $metas = get_post_meta($otherPost -> ID); ?>

            <div class="medium-6 column">
              <a href="<?php echo get_post_permalink($otherPost -> ID); ?>" class="wrapper">
                <div class="large-12 wrapper-hover">
                  <picture>
                    <source
                    media="(min-width: 1024px)"
                    srcset="<?php echo get_the_post_thumbnail_url($otherPost -> ID, 'article-single-suivant'); ?>"
                    >
                    <img class="large-12 small-12" src="<?php echo get_the_post_thumbnail_url($otherPost -> ID, 'article-single-small'); ?>"
                        alt="<?php echo get_post_meta(get_post_thumbnail_id($otherPost -> ID), '_wp_attachment_image_alt', true); ?>"
                        title="<?php get_the_title(get_post_thumbnail_id($otherPost -> ID)); ?>"
                    >
                  </picture>
                  <p>Lire l'article</p>
                </div>
                <div class="large-12 inner-main">
                  <p class="date">
                    <span class="article-category"><?= $GLOBALS['cat'][0] -> name; ?></span>
                    <?= isset($metas['date'][0]) ? '<time>'.$metas['date'][0].'</time>' : ''; ?>
                  </p>
                  <h5><?= $otherPost -> post_title; ?></h5>
                  <p><?php if (isset($metas['chapeau'][0])) :
                            echo substr($metas['chapeau'][0], 0, 130);
                            echo strlen($metas['chapeau'][0]) > 130 ? '...': '';
                          endif;
                  ?></p>
                </div>
              </a>
            </div>

    <?php endfor; ?>
    </div>
    </div>
    </div>
  <?php endif;
 endif; ?>
