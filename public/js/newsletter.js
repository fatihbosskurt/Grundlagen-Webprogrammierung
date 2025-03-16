//code wird erst ausgeführt wenn dom vollständig geladen ist
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.newsletter-form');
    const popup = document.getElementById('newsletter-popup');
    const close = popup.querySelector('.close');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); //verhindert neu laden
        popup.style.display = 'block'; //css eigenschaft display wird auf block gesetzt
    });

    close.addEventListener('click', function() { //pop-up wird ausgeblendet mit klick auf close
        popup.style.display = 'none'; //css eigenschaft display wird auf none gesetzt
    });

    window.addEventListener('click', function(event) {
        if (event.target === popup) { //überprüft ob click aussherhalb des pop-ups ist
            popup.style.display = 'none'; //css eigenschaft display wird auf none gesetzt
        }
    });
});
