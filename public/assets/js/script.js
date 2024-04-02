$('#popup-modal').hide();
var idCaverne;

function GetId(id) {

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