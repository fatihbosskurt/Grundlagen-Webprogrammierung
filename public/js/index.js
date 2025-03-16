const karussellBilder = document.querySelector('.karussell-bilder');
const zurueckBtn = document.querySelector('.zurueck');
const weiterBtn = document.querySelector('.weiter');
const bildWidth = document.querySelector('.bild').offsetWidth;
const totalBilder = karussellBilder.children.length;

let slideIndex = 0; // aktuelle Position im Karussell
let direction = 1; // 1 für vorwärts, -1 für rückwärts

// bilder bewegen funktion
function moveSlides(n) {
  slideIndex += n;
  if (slideIndex < 0) {
    slideIndex = 0; // zurück zu den ersten 3
    direction = 1; // Richtung ändern
  } else if (slideIndex > totalBilder - 3) {
    slideIndex = totalBilder - 3; // bleibt bei letzten 3 bildern
    direction = -1; // richtung ändern
  }
  karussellBilder.style.transform = `translateX(-${(slideIndex * bildWidth)}px)`;
  updateButtons();
}

// sichtbarkeit der buttons in bezug zu den sichtbaren bildern
function updateButtons() {
  if (slideIndex === 0) {
    zurueckBtn.style.visibility = 'hidden';
  } else {
    zurueckBtn.style.visibility = 'visible';
  }

  if (slideIndex >= totalBilder - 3) {
    weiterBtn.style.visibility = 'hidden';
  } else {
    weiterBtn.style.visibility = 'visible';
  }
}

updateButtons();

// automatischer Wechsel
setInterval(() => {
  moveSlides(3 * direction); // 3 Bilder in die aktuelle Richtung
}, 6000); // 6 Sekunden intervall

zurueckBtn.addEventListener('click', () => moveSlides(-3));
weiterBtn.addEventListener('click', () => moveSlides(3));
