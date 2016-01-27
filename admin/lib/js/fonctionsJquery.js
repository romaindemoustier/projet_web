$(document).ready(function() {
   
  //VERIFIER FORMULAIRE CONTACT AVEC REGEX (nom,prenom)

  $('input#nom_client').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#nom_client').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '80%',
             'font-weight':'bold'
         }),
         $('div#error').html("Veuillez n'entrer que des lettres pour le nom et le prénom"),
         $('input#nom_client').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });
  
    $('input#prenom_client').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#prenom_client').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '80%',
             'font-weight':'bold'
         }),
         $('div#error').html("Veuillez n'entrer que des lettres pour le nom et le prénom"),
         $('input#prenom_client').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });
   
   
 //VERIFIER FORMULAIRE INSCRIPTION AVEC REGEX (nom, prenom, adresse, ville, pays)
   $('input#nom').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#nom').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '80%',
             'font-weight':'bold'
         }),
         $('div#error').html("Pour tous les champs, veuillez n'entrez que des lettres excepté pour le code postal et le numéro de téléphone"),
         $('input#nom').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });
  
    $('input#prenom').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#prenom').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '80%',
             'font-weight':'bold'
         }),
         $('div#error').html("Pour tous les champs, veuillez n'entrez que des lettres excepté pour le Code postal et le numéro de téléphone"),
         $('input#prenom').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });
 
      $('input#adresse').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#adresse').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '80%',
             'font-weight':'bold'
         }),
         $('div#error').html("Pour tous les champs, veuillez n'entrez que des lettres excepté pour le Code postal et le numéro de téléphone"),
         $('input#adresse').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });
  
      $('input#ville').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#ville').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '80%',
             'font-weight':'bold'
         }),
         $('div#error').html("Pour tous les champs, veuillez n'entrez que des lettres excepté pour le Code postal et le numéro de téléphone"),
         $('input#ville').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });
  
       $('input#pays').blur(function() {
     var regex= new RegExp(/[0-9\?!\.,;]/);
     var ch = $(this).val();
     if(regex.test(ch)){   
         $('input#pays').val('');
         $('div#error').css({
             'color':'red',
             'font-size' : '80%',
             'font-weight':'bold'
         }),
         $('div#error').html("Pour tous les champs, veuillez n'entrez que des lettres excepté pour le Code postal et le numéro de téléphone"),
         $('input#pays').focus(function() {
             $('div#error').fadeOut();
         })         
     }     
  });
  
  //cacher ou afficher une div  
  $('#cacher').click(function(){
    $('#avertisst').toggle();
    if($('#avertisst').is(':visible')){
        $(this).val('Cacher');
    }
    else {
        $(this).val('Afficher');
    }
  });
  
 //ne pas afficher div quand javascript est déjà actif.
  $('#no-js').remove();
  
  //vérifier les champs d'un formulaire
  $('#form_reservation').on('submit', function(event) { // on idem que bind
    $('[type=text]').each(function() {
       
      if(!$(this).val().length) {	
	    event.preventDefault();
        $(this).css('border', 'px solid red');
      }
    });
  });
  
 
});