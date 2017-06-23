<?php

  if (isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['societe']) && isset($_POST['fonction']) && isset($_POST['telephone'])) :
    if (!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['societe']) && !empty($_POST['fonction']) && !empty($_POST['telephone'])) :

      if (!preg_match('/^[a-zA-Zàâéèëêïîôùüç -]{1,60}$/', $_POST['nom'])) :
        echo 'bad input';
        return;
      endif;

      if (!preg_match('/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i', $_POST['mail'])) :
        echo 'bad input';
        return;
      endif;

      if (!preg_match('/^[a-zA-Zàâéèëêïîôùüç -]{1,100}$/', $_POST['fonction'])) :
        echo 'bad input';
        return;
      endif;

      if (!preg_match('/^\+?([0-9]{3})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/', $_POST['telephone'])
      && !preg_match('/^\d{10}$/', $_POST['telephone'])) :
        echo 'bad input';
        return;
      endif;

      $file = '../csv/newsletter.csv';

      header('Content-Type: text/csv');
      header('Content-Disposition: attachment; filename='. $file);
      header('Pragma: no-cache');
      header("Expires: 0");

      if (!file_exists($file)) :
        $source = fopen($file, 'w');
        fputcsv($source, array('nom', 'mail', 'societe', 'fonction', 'telephone'));
        fclose($source);
      endif;

      $postArray = array($_POST['nom'], $_POST['mail'], $_POST['societe'], $_POST['fonction'], $_POST['telephone']);
      $source = fopen($file, 'a');
      fputcsv($source, $postArray);
      fclose($source);

      echo 'success';

    endif;
  endif;

 ?>
