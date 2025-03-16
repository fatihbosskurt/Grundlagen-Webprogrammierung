    <html lang="de">

    <head>
      <meta charset="utf-8">
      <title>F A B E</title>
        <link rel="stylesheet" type="text/css" href="styles/global.css">
      <link rel="stylesheet" href="styles/index.css">
    </head>

    <body>
      <div id="navbar">
      <?php require_once('frontend/components/navbar.php'); ?>
      </div>


      <div id="landing">
        <h1>Sommer 2024</h1>
        <button type="button" onclick="scrollToContent()">Erfahre mehr</button>
      </div>
      <div id="content">
        <h1>FABE Mode in Lübeck durch und durch</h1>
        <div id="Vorstellung-1">
          <div><img src="assets/images/index3.jpg"></div>
          <p>Qualität und Handwerk zu bezahlbaren Preisen.
             Unser erfahrenes Team liefert erstklassige Ergebnisse.
              Vertrauen Sie uns für zuverlässige Lösungen.</p>
        </div>
        <div id="Vorstellung-2">
          <p>Druch lokale Handwerksarbeit und Rohstoffe
            aus der Umgebung ermöglichen wir einen
            sehr niedrigen Co2 Fußabdruck.
            Aus Liebe für UNSERE Nachkommenschaft.
            Wir von Fabe legen sehr viel Wert auf die Umwelt,
            das spiegelt sich in der lokalen Produktion
            und der Herkunft der Rohstoffe</p>
          <div id="Vorstellung-2-Bild"><img src="assets/images/index1.jpg"></div>
        </div>
        <div id="Vorstellung-3">
          <div id="Vorstellung-3-Bild"><img src="assets/images/index2.jpg"></div>
          <p>Gegründet auf Basis jahrelanger Arbeit und Erfahrung.
             Qualität und Zuverlässigkeit stehen bei uns an erster Stelle.
              Vertrauen Sie auf unser Know-how.</p>
        </div>
        <h1>Unser Team</h1>
        <div class="karussell-container">
          <div class="karussell-bilder">
            <div class="bild">
              <img src="assets/images/karussel1.jpg" alt="Bild 1">
              <div class="bild-text">Otto<br>Geschäftsführer</div>
            </div>
            <div class="bild">
              <img src="assets/images/karussel2.jpg" alt="Bild 2">
              <div class="bild-text">Harald<br>Designer</div>
            </div>
            <div class="bild">
              <img src="assets/images/karussel3.jpg" alt="Bild 3">
              <div class="bild-text">Sandra<br>Näherin</div>
            </div>
            <div class="bild">
              <img src="assets/images/karussel4.jpg" alt="Bild 4">
              <div class="bild-text">Peter<br>Lederexperte</div>
            </div>
            <div class="bild">
              <img src="assets/images/karussel5.jpg" alt="Bild 5">
              <div class="bild-text">Thomas<br>Modedesigner</div>
            </div>
            <div class="bild">
              <img src="assets/images/karussel7.jpg" alt="Bild 5">
              <div class="bild-text">Michael<br>Modedesigner</div>
            </div>
          </div>
          <div class="karussell-kontrolle">
            <button class="zurueck"><img src="assets/images/arrowLeft.png"></button>
            <button class="weiter"><img src="assets/images/arrowRight.png"></button>
          </div>
        </div>
      </div>
      <script src="js/index.js"></script>
      <script>
        function scrollToContent() {
          var contentElement = document.getElementById('content');
          var offset = -30 ;
          var elementPosition = contentElement.getBoundingClientRect().top;
          var offsetPosition = elementPosition + window.pageYOffset + offset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
          });
        }
      </script>
    </body>
    <footer>
    <?php require_once('frontend/components/footer.php'); ?>
    </footer>

    </html>