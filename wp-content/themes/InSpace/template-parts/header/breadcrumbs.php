<nav class="expanded breadcrumbs-wrapper show-for-medium" aria-label="You are here:" role="navigation">
  <div class="row column">
    <ul class="breadcrumbs">
      <?php
      if (have_posts()) :
        the_post();
      endif;
      if(function_exists('bcn_display')) :
          bcn_display();
      endif; ?>
    </ul>
  </div>
</nav>
