<nav class="large-3 medium-8 medium-centered column side-bar actu" data-sticky-container>
  <div class="wrapper" id="top-anchor">
    <div class="large-12 title">
      <h3>Trier par thème</h3>
      <?php
        $args = array(
          'theme_location'  => 'category',
          'container'       => '',
          'container_class' => '',
          'items_wrap'      => '<ul class="vertical newsletter">%3$s</ul>',
          'link_before'     => '<span class="article-category"></span>'
        );

        wp_nav_menu( $args );
      ?>
    </div>
  </div>
  <div class="wrapper newsletter">
    <div class="large-12 title">
      <h3>InSpace News</h3>
      <p>Restez informé des actualités d'InSpace en recevant notre newsletter.</p>
      <!--<a class="news-button" href="https://docs.google.com/forms/d/e/1FAIpQLScxTLdgGPy4F4d94OTwkPUbpvdSulWlxdHl6zfpYnQ_Pzsrsg/viewform?c=0&w=1" target="_blank">je m'abonne</a>-->
      <form action="<?php echo get_template_directory_uri(); ?>/forms/test.php" method="post" id="newsletter-form">
        <input id="nom" type="text" name="nom" class="newsletter-form" placeholder="NOM Prénom">
        <input id="mail" type="text" name="mail" class="newsletter-form" placeholder="E-mail">
        <input id="societe" type="text" name="societe" class="newsletter-form" placeholder="Société/Organisme">
        <input id="fonction" type="text" name="fonction" class="newsletter-form" placeholder="Fonction">
        <input id="telephone" type="tel" name="telephone" class="newsletter-form" placeholder="Téléphone">
        <input type="submit" value="je m'abonne">
      </form>
    </div>
  </div>
</nav>
</section>
