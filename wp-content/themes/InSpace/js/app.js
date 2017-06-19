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

});
