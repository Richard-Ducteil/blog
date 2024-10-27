import './bootstrap'
import Alpine from 'alpinejs'

Alpine.start();


// Sélection des éléments du DOM
const preloader = document.getElementById("preloader");
const content = document.getElementById("content");
const logo = preloader.querySelector("img"); // Sélection du logo dans le préchargeur

// Fonction d'animation de zoom
function animateLogo() {
    let scale = 1;
    let growing = true;
    setInterval(() => {
        if (growing) {
            scale += 0.01;
            if (scale >= 1.2) growing = false; // Rétrécit une fois qu'il atteint la taille max
        } else {
            scale -= 0.01;
            if (scale <= 1) growing = true; // Grandit à nouveau à partir de la taille initiale
        }
        logo.style.transform = `scale(${scale})`;
    }, 20); // Intervalle de l'animation
}

// Fonction pour masquer le préchargeur et afficher le contenu
function hidePreloader() {
    preloader.style.display = "none"; // Masque le préchargeur
    content.style.display = "block"; // Affiche le contenu principal
}

// Lancement de l'animation de zoom et écouteur pour masquer le préchargeur après le chargement
window.addEventListener("load", () => {
    animateLogo(); // Démarre l'animation
    setTimeout(hidePreloader, 1000); // Attendre 1 seconde avant de masquer le préchargeur
});

