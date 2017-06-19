<!-- PAGE CONTENT -->
<section class="row single-post actu-side-bar">
  <!-- MAIN PART -->
  <main class="large-9 column">
    <?php
      $post = get_post();
      $metas = get_post_custom();
      global $cat;
      $cat = get_the_category();

      foreach ($cat as $key => $aCat) :
        if ($aCat -> name == 'InSpace News' || $aCat -> name == 'Actualités') :
          unset($cat[$key]);
          $cat = array_values($cat);
        endif;
      endforeach;
    ?>
    <article class="large-12 column">
      <p class="date">
        <span class="article-category"><?= $cat[0] -> name; ?></span>
        <?= isset($metas['date'][0]) ? '<time>'.$metas['date'][0].'</time>' : ''; ?>
      </p>
      <?php if ($cat[0] -> slug == 'edito') : ?>

        <header class="edito">
          <div class="image small-12 text-center">
            <img src="<?php echo get_the_post_thumbnail_url('', 'article-edito'); ?>"
            alt="<?php echo get_post_meta(get_post_thumbnail_id($query -> post -> ID), '_wp_attachment_image_alt', true); ?>"
            title="<?php echo get_the_title(get_post_thumbnail_id($query -> post -> ID)); ?>"
            >
          </div>
          <div class="titres">
            <h2><?php the_title(); ?></h2>
            <?= isset($metas['sous-titre'][0]) ? '<h3>'.$metas['sous-titre'][0].'</h3>' : ''; ?>
          </div>
        </header>


      <?php else : ?>

      <h2><?php the_title(); ?></h2>
      <?= isset($metas['sous-titre'][0]) ? '<h3>'.$metas['sous-titre'][0].'</h3>' : ''; ?>
      <?= isset($metas['chapeau'][0]) ? '<header>'.$metas['chapeau'][0].'</header>' : ''; ?>
      <figure>
        <picture class="featured-image">
          <source
            media="(min-width: 500px)"
            srcset="<?php echo get_the_post_thumbnail_url('', 'article-single-desktop'); ?>"
          >
          <img src="<?php echo get_the_post_thumbnail_url('', 'article-single-small') ?>"
              alt="<?php echo get_post_meta(get_post_thumbnail_id($query -> post -> ID), '_wp_attachment_image_alt', true); ?>"
              title="<?php echo get_the_title(get_post_thumbnail_id($query -> post -> ID)); ?>"
          >
        </picture>
        <?= !empty(get_post(get_post_thumbnail_id($query -> post -> ID)) -> post_excerpt) ?
        '<figcaption>'.get_post(get_post_thumbnail_id($query -> post -> ID)) -> post_excerpt.'</figcaption>' :
        '' ;
        ?>
      </figure>

      <?php
        endif;
        the_content();
      ?>

      <?php
        if ($cat[0] -> count > 1) :
          get_template_part('template-parts/single/newsletter', 'suivants');
        endif;
      ?>

    </article>
  </main>
