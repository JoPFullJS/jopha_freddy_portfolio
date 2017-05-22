$(document).ready(function () {

  /*-----------------------------------------------------*/

  /* Gestion de la navigation desktop */
  //on initialise les variables demanière preferentielle

  $('#services').mouseover(function (event) {
    $('.survol-services').show();
    $(this).addClass('active-sub');

  });

  $('#services').mouseout(function (event) {
    $('.survol-services').hide();
    $(this).removeClass('active-sub');
  });

  $('#blog').mouseover(function (event) {
    $('.survol-blog').show();
    $(this).addClass('active-sub');
  });

  $('#blog').mouseout(function (event) {
    $('.survol-blog').hide();
    $(this).removeClass('active-sub');
  });

  $('.survol-services').mouseover(function (event) {
    $(this).show();
    $('#services').addClass('active-sub');
  });

  $('.survol-services').mouseleave(function (event) {
    $(this).hide();
    $('#services').removeClass('active-sub');
  });

  $('.survol-blog').mouseover(function (event) {
    $(this).show();
    $('#blog').addClass('active-sub');
  });

  $('.survol-blog').mouseleave(function (event) {
    $(this).hide();
     $('#blog').removeClass('active-sub');
  });

  /*----------------------------------------------------------*/

  /* Gestion de la navigation mobile */

  $('#services-mobile').click(function (event) {

    event.preventDefault();

    $(this).toggleClass('deplier-categorie');
    $('.services-mobile-sub').animate({height: "toggle"}, 500,"easeOutBack");
  });

  $('#blog-mobile').click(function (event) {

    event.preventDefault();

    $(this).toggleClass('deplier-categorie');
    $('.blog-mobile-sub').animate({height: "toggle"}, 500,"easeOutBack");
  });

  /* Gestion animation panneau menu mobile */

  $('#cross,.background-mobile').click(function () {
    $('.menu-mobile,.chapeau,.group-mobile-reseaux').animate({left: "-250px"}, 200,"easeOutCubic");
    $('.services-mobile-sub').hide();
    $('.blog-mobile-sub').hide();
    $('#services-mobile').removeClass('deplier-categorie');
    $('#blog-mobile').removeClass('deplier-categorie');
    $('.background-mobile').hide();
    $('body').css('overflow-y','scroll');
  });

  $('#hamburger').click(function () {
    $('.menu-mobile,.chapeau,.group-mobile-reseaux').animate({left: "0px"}, 400,"easeOutBack");
    $('.services-mobile-sub').hide();
    $('.blog-mobile-sub').hide();
    $('#services-mobile').removeClass('deplier-categorie');
    $('#blog-mobile').removeClass('deplier-categorie');
    $('.background-mobile').show();
    $('body').css('overflow-y','hidden');
  });

  /* Gestion du bouton des reseaux sociaux */

  $('.icon-share').mouseover(function (event) {
    $('.block-share').show();
    $(this).addClass('icon-share-hover');
  });

  $('.icon-share').mouseout(function (event) {
    $('.block-share').hide();
     $(this).removeClass('icon-share-hover');
  });

  $('.block-share').mouseover(function (event) {
    $(this).show();
    $('.icon-share').addClass('icon-share-hover');
  });

  $('.block-share').mouseout(function (event) {
    $(this).hide();
     $('.icon-share').removeClass('icon-share-hover');
  });

  /* Scroll down de la page d'accueil */

  $('.scroll-down').click(function (event) {

      event.preventDefault();
      var section = $(this).attr('href');
      var duree = 600;
      var paddingTop = 60;
      $('html, body').animate( { scrollTop: ($(section).offset().top)-paddingTop }, duree, "easeOutBack");
  });

  /* -------------- Sous menu description travaux -------------------- */

  $('.projet,.env-techn,.comp-fonct,.sources').click(function (event) {

    event.preventDefault();
    var principal = $('#projet').offset().left;
    var page = $(this).attr('href');
    var Height = $(page).outerHeight(true);
    var speed = 600;
    $('.content-travaux').animate( 
      { 
        scrollLeft: ($(page).offset().left)-principal,
        height: Height

      }, 
      speed, 
      "easeInOutExpo");
  });

  $(window).on('load resize',function(){
    var hauteur = $('#projet').outerHeight(true);
    $('.content-travaux').animate( { height: hauteur }, 600,"easeInOutExpo");

    var largeur = $('#projet').outerWidth(true);

    $('#env-techn').css('left', largeur);
    $('#comp-fonct').css('left', largeur*2);
    $('#sources').css('left', largeur*3);
  });

 /* on selectionne une categorie dans travaux*/

 $('#list-choix').change(function () {
    var choix = "";
    choix = $(this).val();

    switch(choix) {
      case "front-end":
          window.location.href = '../';
          break;
      case "back-end":
          window.location.href = '../';
          break;
      case "ui-design":
          window.location.href = '../';
          break;
      case choix:
          redir(choix);
          break;
      default:
          window.location.href = '../';
    }

    function redir(lien){

      if(lien == "html-css" || lien == "jquery-js" || lien == "angular-js" || lien == "ionic"){

        window.location.href = 'http://jophafreddy.fr/travaux/front-end/' + lien + '/';

      }
      else if(lien == "php-mysql" || lien == "node-js" || lien == "javaee"){

        window.location.href = 'http://jophafreddy.fr/travaux/back-end/' + lien + '/';

      }
      else if(lien == "logo" || lien == "prestashop" || lien == "design-pattern" || lien == "illustrator" || lien == "photoshop"){

        window.location.href = 'http://jophafreddy.fr/travaux/ui-design/' + lien + '/';
      }
      else{
         window.location.href = '../';
      }
    }

 });
/*--------------------------------------------------------------*/

/*-------------------------------*/

/*-------- Gestion menu travaux ----------------*/

$('.menu-article').click(function (event) {

  $('.menu-article').removeClass('scroll-select');
  $(this).addClass('scroll-select');
});


/*  suppression block alert */

  $('.alert').click(function(event) {
      $(this).fadeOut(1000);
   });
});
