$(document).ready( function(e) {

	/*--------------------- Validation du formulaire de contact -----------------------*/


  $('.url,.telephone').on('change', function(e) {
    var regex;
    var element = $(this).attr('class');

    switch(element) {
      case "url":
          regex = /^(http:\/\/www\.|https:\/\/www\.|ftp:\/\/www.|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
          message_yes = "votre adresse web est valide";
          message_no = "Une adresse web est requis pour ce champ";
          break;
      case "telephone":
          regex = /^(\+33\.|0)[0-9]{9}$/;
          message_yes = "votre téléphone est valide";
          message_no = "Un numéro de téléphone est requis pour ce champ";
          break;
    }

    if(!$(this).val().match(regex)){

      $('.sub_rn').attr('disabled','disabled');
      $('.sub_rn').css("background-color", "#B8B7B7");
      $(this).css("border-bottom", "1px solid #F75D59");
      $('.' + element + '_rn').text(message_no);
      $('.' + element + '_rn').removeClass('message_yes');
      $('.' + element + '_rn').addClass('message_no');
    }
    else{
      $('.sub_rn').removeAttr('disabled');
      $('.sub_rn').css("background-color", "#F75D59");
      $(this).css("border-bottom", "1px solid #8ED1D4");
      $('.' + element + '_rn').text(message_yes);
      $('.' + element + '_rn').removeClass('message_no');
      $('.' + element + '_rn').addClass('message_yes');
    }
    if($(this).val() == ""){
      $('.sub_rn').removeAttr('disabled');
      $('.sub_rn').css("background-color", "#F75D59");
      $(this).css("border-bottom", "1px solid #8ED1D4");
      $('.' + element + '_rn').empty();
    }

  });

  $('.nom,.prenom,.mail').on('change', function(e) {
    var regex;
    var element = $(this).attr('class');

    switch(element) {
      case "nom":
          regex = /^([a-zA-Z0-9]){1,20}$/;
          message_yes = "Votre nom est valide";
          message_no = "Un nom est requis pour ce champ";
          break;
      case "prenom":
          regex = /^([a-zA-Z0-9]){1,20}$/;
          message_yes = "Votre pénom est valide";
          message_no = "Un prénom est requis pour ce champ";
          break;
      case "mail":
          regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
          message_yes = "Votre E-mail est valide";
          message_no = "Un E-mail est requis pour ce champ";
          break;
    }

    if(!$(this).val().match(regex) || $(this).val() == ""){

      $('.sub_rn').attr('disabled','disabled');
      $('.sub_rn').css("background-color", "#B8B7B7");
      $(this).css("border-bottom", "1px solid #F75D59");
      $('.' + element + '_rn').text(message_no);
      $('.' + element + '_rn').removeClass('message_yes');
      $('.' + element + '_rn').addClass('message_no');
    }
    else{
      $('.sub_rn').removeAttr('disabled');
      $('.sub_rn').css("background-color", "#F75D59");
      $(this).css("border-bottom", "1px solid #8ED1D4");
      $('.' + element + '_rn').text(message_yes);
      $('.' + element + '_rn').removeClass('message_no');
      $('.' + element + '_rn').addClass('message_yes');
    }
  });

  $("#commentaire").submit(function(event){

     event.preventDefault();

    if(!$('.nom').val().match(/^([a-zA-Z0-9]){1,10}$/) || $('.nom').val() == "" 
      && !$('.mail').val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/) || $('.mail').val() == "" 
      && !$('.url').val().match(/^(http:\/\/www\.|https:\/\/www\.|ftp:\/\/www.|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/) 
      && $('.message').val() == ""){

      $('.form_rn').text("Les champs de ce formulaire requièrent toute votre attention, pour l'envoi de votre commentaite !");
      $('.form_rn').addClass('message_no');
    }
    else{
      
      $.ajax({
          type : "POST",
          url: $(this).attr("action"),
          data: $(this).serialize(),
          beforeSend : function() { // traitements JS &agrave; faire AVANT l'envoi
            $(".form_rn").html('<img src="http://www.jophafreddy.fr/img/main/loader.gif" alt="loader" />');
          },
          success : function(data) {
            $(".form_rn").html();
            $(".content_post:first").before($(data).fadeIn(1600));
            /*$('.sub_rn').attr('disabled','disabled');
            $('.sub_rn').css("background-color", "#B8B7B7");*/
            $(".content_post:first").css("background-color","#ececec");

            /*on fait un scrollTop sur le bloc commentaire*/
            var duree = 600;
            var paddingTop = 120;
            $('html, body').animate( { scrollTop: ($('#commentaires').offset().top)-paddingTop }, duree, "easeOutBack");
            
          },
          error: function() {
            $(".form_rn").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
          }
        });
    }
  });

  $("#contact").submit(function(event){

    event.preventDefault();

    if(!$('.nom').val().match(/^([a-zA-Z0-9]){3,10}$/) || $('.nom').val() == "" 
      && !$('.prenom').val().match(/^([a-zA-Z0-9]){3,10}$/) || $('.prenom').val() == "" 
      && !$('.mail').val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/) || $('.mail').val() == "" 
      && !$('.url').val().match(/^(http:\/\/www\.|https:\/\/www\.|ftp:\/\/www.|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/) 
      && !$('.telephone').val().match(/^(\+33\.|0)[0-9]{9}$/) && $('.message').val() == ""){

      $('.form_rn').text("Les champs de ce formulaire requièrent toute votre attention, pour l'envoi de votre message !");
      $('.form_rn').addClass('message_no');
    }
    else{

      $.ajax({
        type : "POST",
        url: $(this).attr("action"),
        data: $(this).serialize(),
        beforeSend : function() { // traitements JS à faire AVANT l'envoi
        $(".good_form").html('<img src="http://www.jophafreddy.fr/img/main/loader.gif" alt="loader" />');
        },
        success : function(data) {
          $(".good_form").html(data);
          $('.sub_rn').attr('disabled','disabled');
          $('.sub_rn').css("background-color", "#B8B7B7");

          
            $(function(){
              var durrest = 5;
              $(function compte(){
                  var rebour = durrest + ' secondes avant refraichissement...';
                  $(".redir").text(rebour);
                  durrest--;
                  setTimeout(compte, 1000);

                  if(durrest == 0)
                  {

                    location.reload();
                  }
              });

            });
        },
        error: function() {
          $(".good_form").html("<p>Erreur d'appel, le formulaire ne peut pas fonctionner</p>");
        }
        });

    }

  });

  

});
