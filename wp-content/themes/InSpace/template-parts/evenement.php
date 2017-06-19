<?php
  /*
    Template Name: Evenement
    Template Post Type: post, product
  */

get_header();
?>

<!-- PAGE CONTENT -->
<section class="row single-post single-event actu-side-bar">
  <!-- MAIN PART -->
  <main class="large-12 column">
    <?php
    $metas = get_post_custom();
    ?>
    <article class="large-12 column">

      <p class="date">
        <?= isset($metas['lieu'][0]) ? "<span class='article-category'>".$metas['lieu'][0]."</span>" : ''; ?>
        <?= isset($metas['date'][0]) ? "<time>".$metas['date'][0]."</time>" : ''; ?>
      </p>

      <h2><?php the_title(); ?></h2>

      <?= isset($metas['chapeau'][0]) ? "<header>".$metas['chapeau'][0]."</header>" : ''; ?>

      <ul class="accordion" data-responsive-accordion-tabs="tabs small-accordion medium-tabs" data-allow-all-closed="true">

        <?php the_content(); ?>

      </ul>
    </article>

<?php

    $category = get_the_category();
?>

    <div class="large-12 column text-center redirect-btn">
      <a href="<?php echo get_category_link($category[0] -> term_id); ?>"><i class="fa fa-caret-left" aria-hidden="true"></i>Revenir aux évènements</a>
    </div>
  </main>
</section>

<?php get_footer(); ?>
