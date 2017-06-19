<?php get_header(); ?>

<main class="contact">
  <div class="row">
    <div class="medium-6 column">
      <h2>Institut InSpace</h2>
      <h3>Applications spatiales au service des territoires</h3>
      <p>10 Avenue de l'Europe<br>31520 Ramonville Saint-Agne</p>
    </div>
    <div class="medium-6 column">
      <p>
        <a id="contact-mail">
          <img src="<?php echo get_template_directory_uri() . '/img/contact-mail.svg' ?>" alt="Mail InSpace Institute">
          contact@inspace-institute.com
        </a>
      </p>
      <p>
        <a id="contact-tel">
          <img src="<?php echo get_template_directory_uri() . '/img/contact-tel.svg' ?>" alt="Mail InSpace Institute">
          05 34 32 03 95
        </a>
      </p>
      <p>
        <a class="clickable" target="_blank" href="https://www.google.fr/maps/place/CEEI+THEOGONE/@43.5662733,1.4717373,13.75z/data=!4m5!3m4!1s0x12aebdd61f2e0c1d:0xe9939f42ab41526b!8m2!3d43.5507376!4d1.4886357">
          <img src="<?php echo get_template_directory_uri() . '/img/gps-icon.svg' ?>">
          Plan d'accès
        </a>
      </p>
    </div>
  </div>
</main>

<?php get_footer(); ?>
