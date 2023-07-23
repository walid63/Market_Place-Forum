// JavaScript
document.getElementById("themeSelector").addEventListener("change", function() {
    var selectedTheme = this.value;
    changeTheme(selectedTheme);
  });
  



// JavaScript
// JavaScript
function changeTheme(theme) {
    document.body.classList.remove('theme1', 'theme2'); // Supprime toutes les classes de thème existantes
    document.body.classList.add(theme); // Ajoute la classe de thème sélectionnée
  }
  