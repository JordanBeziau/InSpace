$(document).foundation();

document.addEventListener('DOMContentLoaded', function() {

  var clientW = window.innerWidth;
  if (clientW < 640) {
    // Repli l'onglet actif sur mobile (single-event)
    $('.is-active .accordion-content').toggle();
    $('.accordion-item.is-active').removeClass('is-active');

    // Replace le scroll à hauteur des onglets (single-event) sur mobile
    $('a.accordion-title').each(function() {
      $(this).on('click', function() {
        var position = $('ul.accordion').position().top - 100;
        console.log('pop');
        $('html, body').animate({
          scrollTop : position
        }, 200);
      });
    });
  } else {
    var firstTab = $('ul.tabs li.tabs-title:first-of-type'),
      firstContentTab = $('div.tabs-content > div:first-of-type');
    var isFirstTabOpen = false;
    // toggle la first tab au chargement
    firstTab.addClass('is-active');
    firstContentTab.toggle();
    // event qui masque la first tab quand click sur autre onglet
    $('ul.tabs li.tabs-title:not(:first-of-type)').on('click', function() {
      if (!isFirstTabOpen) {
        firstContentTab.toggle();
        isFirstTabOpen = true;
      }
    });
    // event qui affiche la first tab quand on clique sur son onglet
    firstTab.on('click', function() {
      if (isFirstTabOpen) {
        firstContentTab.toggle();
        isFirstTabOpen = false;
      }
    });
  }

  if (clientW < 1024) {
    var scrollPosition, isOpen = false;
    $('.button-menu').on('click', function() {
      scrollPosition = $(window).scrollTop();
      scrollPosition == 0 ? scrollPosition = -76 : scrollPosition -= 76;
      $('div.navbar').css('top', scrollPosition);
      isOpen = !isOpen;
    });
    $('.js-off-canvas-overlay').on('click', function() {
      setTimeout(function() {
        $('div.navbar').css('top', 0);
      }, 510);
      isOpen = !isOpen;
    });

    $(window).on('scroll', function() {
      if (isOpen) {
        scrollPosition = $(window).scrollTop() - 76;
        $('div.navbar').css('top', scrollPosition);
      }
    });

    $('#contact-mail').attr('href', 'mailto:' + $('#contact-mail').text());
    $('#contact-tel').attr('href', 'tel:' + $('#contact-tel').text());
  }


  // Vérification formulaire newsletters
  $('.newsletter-form').each(function() {
    $(this).on('keyup', function() {checkInputFormLive($(this))});
    $(this).on('blur', function() {checkInputFormLive($(this))});
  });

  $('#newsletter-form').on('submit', function(event) {
    event.preventDefault();
    check = true;
    $('.newsletter-form').each(function() {
      checkInputFormLive($(this));
    });
    if (check) {
      // Show loading...
      const nom = $('#nom').val(),
            mail = $('#mail').val(),
            societe = $('#societe').val(),
            fonction = $('#fonction').val(),
            telephone = $('#telephone').val();

      const url = $(this).attr('action');

      $.post(url, {
        nom: nom,
        mail: mail,
        societe: societe,
        fonction: fonction,
        telephone: telephone
      }, function(status) {
        if (status == 'success') {
          infoBox('Merci '+nom+', votre abonnement à la newsletter a bien été pris en compte !');
        } else {
          infoBox(nom+', votre abonnement n\'a pas fonctionné. Vérifiez si les champs sont valides sinon merci de retenter ultérieurement.');
        }
      });
    } else {
      infoBox('Veuillez remplir les champs correctement s.v.p.');
    }
  });

  function checkInputFormLive(element) {
    let condition, el;
    element ? el = element : el = $(this);
    switch (el.attr('name')) {
      case 'nom':
      condition = el.val().match(/^[a-zA-Zàâéèëêïîôùüç -]{1,60}$/);
      break;
      case 'mail':
      condition = el.val().match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
      break;
      case 'societe':
      condition = el.val().length > 0;
      break;
      case 'fonction':
      condition = el.val().match(/^[a-zA-Zàâéèëêïîôùüç -]{1,100}$/);
      break;
      case 'telephone':
      condition = el.val().match(/^\+?([0-9]{3})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/) || el.val().match(/^\d{10}$/);
      break;
    }
    if (condition) {
      el.addClass('valid-input').removeClass('bad-input');
    } else {
      el.addClass('bad-input').removeClass('valid-input');
      return check = false;
    }
  }

  function infoBox(message) {
    // créer la div
    let box = '<div class="info-box"><p>' + message + '</p><div class="close-info-box">x</div></div>';
    // apparition de la div
    $('body').append(box);
    $('.info-box').fadeIn('fast');
    // gérer la fermeture
    boxDie = setTimeout(infoBoxDie, 10000);
    // dispartition
    $('.close-info-box').on('click', () => {
      clearTimeout(boxDie);
      infoBoxDie();
    });
    // gérer hover
    $('.info-box').on('mouseover', () => {
      console.log('event');
      clearTimeout(boxDie);
      boxDie = setTimeout(infoBoxDie, 10000);
    });

    function infoBoxDie() {
      $('.info-box').fadeOut();
      setTimeout(() => {
        $('.info-box').remove();
      }, 400);
    }

  }

});
