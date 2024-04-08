$('#popup-modal').hide();
var RecupId;

function GetId(id) {
  RecupId = id;
  console.log(RecupId + ' = Id');
  $('#popup-modal').modal('show');
}

function destroyCaverne(){
  // Récupérer le jeton CSRF depuis la balise meta
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  console.log(csrfToken)

  // Envoi de l'ID au serveur via une requête fetch
  fetch('/caverne/' + RecupId, {
      method: 'DELETE',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken // Ajouter le jeton CSRF dans les en-têtes de la requête
      },
      body: JSON.stringify({id: RecupId})
  })
  .then(response => {
      if (response.ok) {
          console.log('ID envoyé avec succès au serveur');
          document.getElementById("caverne_"+RecupId).style.display="none";
          document.querySelector('[data-modal-hide="popup-modal"]').click();
      } else {
          console.error('Erreur lors de l\'envoi de l\'ID au serveur');
      }
  })
  .catch(error => {
      console.error('Erreur lors de l\'envoi de l\'ID au serveur:', error);
  });
}

function destroyConte(){
    // Récupérer le jeton CSRF depuis la balise meta
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  
    // Envoi de l'ID au serveur via une requête fetch
    fetch('/conte/' + RecupId, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Ajouter le jeton CSRF dans les en-têtes de la requête
        },
        body: JSON.stringify({id: RecupId})
    })
    .then(response => {
        if (response.ok) {
            console.log('ID envoyé avec succès au serveur');
            document.getElementById("conte_"+RecupId).style.display="none";
            document.querySelector('[data-modal-hide="popup-modal"]').click();
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


function playIntro(id){
    console.log(id);
    if(document.getElementById('logo_play_'+ id).classList.contains('uil-play')){
        document.getElementById('logo_play_' + id).classList.remove('uil-play');
        document.getElementById('logo_play_' +id).classList.add('uil-pause');
        document.getElementById('intro_'+id).play();
    }
    else{
        document.getElementById('logo_play_' + id).classList.remove('uil-pause');
        document.getElementById('logo_play_' + id).classList.add('uil-play');
        document.getElementById('intro_'+id).pause();

    }


}