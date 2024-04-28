/***************** * Menu burger *************************/

let sidenav = document.getElementById("mySidenav");
let openBtn = document.getElementById("openBtn");
let closeBtn = document.getElementById("closeBtn");
openBtn.onclick = openNav;
closeBtn.onclick = closeNav;
function openNav() {
  sidenav.classList.add("active");
}
function closeNav() {
  sidenav.classList.remove("active");
}
/******************* slider ******************************/

// Sélection des boutons de navigation
let btnRight = document.querySelector(".right");
let btnLeft = document.querySelector(".left");

btnRight.addEventListener("click", tapeRight);
btnLeft.addEventListener("click", tapeLeft);

// Sélection de toutes les diapositives
let slides = document.querySelectorAll(".slide");
let currentIndex = 0;

// Masquage de toutes les diapositives sauf la première
for (let i = 1; i < slides.length; i++) {
  slides[i].classList.add("hidden");
}

function tapeLeft() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex);
}

function tapeRight() {
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex);
}
function showSlide(index) {
  slides.forEach((slide) => {
    slide.classList.add("hidden");
  });
  slides[index].classList.remove("hidden");
}

// ****************************slide2*********************************

let secondBtnRight = document.querySelector(".second-right");
let secondBtnLeft = document.querySelector(".second-left");

secondBtnRight.addEventListener("click", secondTapeRight);
secondBtnLeft.addEventListener("click", secondTapeLeft);

let secondSlides = document.querySelectorAll(".second-slide");
let secondCurrentIndex = 0;

for (let i = 1; i < secondSlides.length; i++) {
  secondSlides[i].classList.add("second-hidden");
}

function secondTapeLeft() {
  secondCurrentIndex =
    (secondCurrentIndex - 1 + secondSlides.length) % secondSlides.length;
  showSecondSlide(secondCurrentIndex);
}

function secondTapeRight() {
  secondCurrentIndex = (secondCurrentIndex + 1) % secondSlides.length;
  showSecondSlide(secondCurrentIndex);
}
function showSecondSlide(index) {
  secondSlides.forEach((slide) => {
    slide.classList.add("second-hidden");
  });
  secondSlides[index].classList.remove("second-hidden");
}

// *************************API Comic Vince ***********************/
function openModal(event) {
  // affiche la modalBox
  document.getElementById("myModal").style.display = "block";
  updateModal();
}

function updateModal() {
  fetch(
    "https://corsproxy.io/?" +
      encodeURIComponent(
        "https://comicvine.gamespot.com/api/characters/?format=json&filter=id:" 
        + sharedObject.characters[sharedObject.index].id_extern
        + "&api_key=fa45fd1edfe8eed491dafab0900da5089ad6d846"

      ),
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  )
    .then((response) => response.json())
    .then((data) => {
      // Vérifie si les données sont disponibles
      if (data && data.results && data.results.length > 0) {
        // Récupére les informations du personnage à l'index courant
        const character = data.results[0];
        document.querySelector("#modalImage").src = character.image.original_url;
        document.querySelector("#modalAlias").innerHTML = character.aliases;
        document.querySelector("#modalDescription").innerHTML = character.deck;
        document.querySelector("#modalRealName").innerHTML = character.real_name;
        // mettre à jour l'index suivant
        sharedObject.index = ((parseInt(sharedObject.index) + sharedObject.characters.length + 1) % sharedObject.characters.length);
      } else {
        console.log("Aucune donnée de personnage disponible.");
      }
    })
    .catch((error) =>
      console.error("Erreur lors de la récupération des informations:", error)
    );
}

// Fonction pour fermer la boîte modale
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}
//***********************Cookie********************************
function cookiePopup() {
  if (!cookie()) {
    document.getElementById("cookie-popup").style.display = "block";
  } else {
    document.getElementById("cookie-popup").style.display = "none";
  }
}

function acceptCookies() {
  document.getElementById("cookie-popup").style.display = "none";
  document.cookie =
    "cookieConsent=accepted; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
}

function refuseCookies() {
  document.getElementById("cookie-popup").style.display = "none";
  document.cookie =
    "cookieConsent=refused; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
}

function cookie() {
  return document.cookie.includes("cookieConsent=accepted");
}

window.addEventListener("load", cookiePopup);

document
  .getElementById("accept-cookies")
  .addEventListener("click", acceptCookies);
document
  .getElementById("refuse-cookies")
  .addEventListener("click", refuseCookies);
