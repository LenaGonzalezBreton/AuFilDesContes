 $('#popup-modal').hide();
var idCaverne;
var idMotClef;

function GetIdCaverne(id) {

//   sessionStorage.setItem("id", id);
  idCaverne = id;
  console.log(idCaverne + ' idCaverne');
  $('#popup-modal').modal('show');


}

function destroyCaverne(){
  // Récupérer le jeton CSRF depuis la balise meta
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  // Envoi de l'ID au serveur via une requête fetch
  fetch('/caverne/' + idCaverne, {
      method: 'DELETE',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken // Ajouter le jeton CSRF dans les en-têtes de la requête
      },
      body: JSON.stringify({id: idCaverne})
  })
  .then(response => {
      if (response.ok) {
          console.log('ID envoyé avec succès au serveur');
          location.reload();
      } else {
          console.error('Erreur lors de l\'envoi de l\'ID au serveur');
      }
  })
  .catch(error => {
      console.error('Erreur lors de l\'envoi de l\'ID au serveur:', error);
  });
}


function img_pathUrl(input){
    $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
}

 function GetIdMotClef(id) {
//   sessionStorage.setItem("id", id);
     idMotClef = id;
     console.log(idMotClef + '= idMotClef');
     $('#popup-modal').show();
 }

 function destroyMotClef(){
     // Récupérer le jeton CSRF depuis la balise meta
     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

     // Envoi de l'ID au serveur via une requête fetch
     fetch('motcle/' + idMotClef, {
         method: 'DELETE',
         headers: {
             'Content-Type': 'application/json',
             'X-CSRF-TOKEN': csrfToken // Ajouter le jeton CSRF dans les en-têtes de la requête
         },
         body: JSON.stringify({id: idMotClef})
     })
         .then(response => {
             console.log(response);
             if (response.ok) {
                 console.log('ID envoyé avec succès au serveur');
                 // document.getElementById(""popup-modal").style.display="none";
                 document.querySelector('[data-modal-hide="popup-modal"]').click();
             } else {
                 console.error('Erreur lors de l\'envoi de l\'ID au serveur');
             }
         })
         .catch(error => {
             console.error('Erreur lors de l\'envoi de l\'ID au serveur:', error);
         });
 }
