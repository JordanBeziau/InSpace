<?php get_header(); ?>

  <main class="row homepage">

    <h2>Notre site est en cours de refonte</h2>
    <p>Les rubriques actualités restent actives, le reste du contenu sera en ligne en septembre 2017.</p>

    <div class="medium-12 column">
        <div class="small-6 medium-4 medium-offset-2 column wrap-image">
          <a href="<?php echo bloginfo('url') . '/category/actualites/newsletter'; ?>">
            <img src="<?php echo get_template_directory_uri() . '/img/newsletter.svg' ?>" alt="InSpace News" title="InSpace News">
            <h4>Newsletter</h4>
          </a>
        </div>
        <div class="small-6 medium-4 column wrap-image">
          <a href="<?php echo bloginfo('url') . '/category/actualites/evenements'; ?>">
            <img src="<?php echo get_template_directory_uri() . '/img/evenement.svg' ?>" alt="Evénements InSpace" title="Evénements InSpace">
            <h4>Événements</h4>
          </a>
        </div>
    </div>

  </main>

  <section class="expanded inspace">
    <div class="row">
      <div class="medium-8 column">
        <h3>Institut InSpace</h3>
        <p>
          L’Institut InSpace a pour mission d’accompagner les collectivités territoriales dans l’adoption de solutions innovantes intégrant des données spatiales (géolocalisation, observation de la Terre, météo, télécommunications). Ces applications sont identifiées et proposées en fonction des besoins de chaque échelon de l’organisation territoriale -de la commune à la Région-, dans l’objectif d’optimiser et/ou améliorer certains aspects liés à l’administration de leur territoire, qu’il soit urbain, rural, côtier ou de montagne. Le champ d’application de ces solutions concerne différents domaines : aménagement du territoire, suivi environnemental et climatique, gestion de risques, fonctionnalités autour de la smart city & de la mobilité, problématiques liées à la ruralité, e-tourisme…
  InSpace fonctionne sous la forme d’association Loi 1901 : les applications proposées sont fournies principalement par les membres de l’Institut (de la TPE au Grand Groupe ou à l’Organisme d’Etat). En cas d’absence de solution mature répondant aux besoins de la collectivité, l’Institut peut accompagner les différents acteurs (utilisateurs & fournisseurs) dans l’obtention d’un système opérationnel, ou participer à la conception et au déploiement de démonstrateurs thématiques sur des territoires pilotes.
        </p>
      </div>
      <div class="medium-4 column show-for-medium">
        <img src="<?php echo get_template_directory_uri() . '/img/inspace-forme.svg' ?>" alt="">
      </div>
    </div>
  </section>

<?php get_footer(); ?>
