$('#contactform').submit(function(e){
    e.preventDefault()
  
    $.ajax({
       url: 'mail.php',
       type: 'post',
       data: $(this).serialize()
    }).done(function(response){
       alert('Votre message à bien été envoyé. \n Merci !');
       location.href = "contact.html.twig"
    });
 });
 
