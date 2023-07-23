const passwordInput = document.getElementById('passwordInput');
const submitButton = document.getElementById('submitButton');

submitButton.addEventListener('click', function(event) {

    
  event.stopPropagation();
  const enteredPassword = passwordInput.value.trim();
  const correctPassword = 'votre_mot_de_passe_correct';

  if (enteredPassword !== correctPassword) {
    submitButton.classList.add('button-esquive');
    setTimeout(function() {
      submitButton.classList.remove('button-esquive');
    }, 300);
  } else {
    // Mot de passe correct : Faites ici ce que vous voulez accomplir après une connexion réussie.
    alert('Mot de passe correct ! Vous êtes connecté.');
  }
});

document.addEventListener('click', function() {
  submitButton.classList.remove('button-esquive');
});