const form_rechnung_admin = document.getElementById('form_rechnung_admin');
const selector_rechnung = document.getElementById("rechnungen_liste_admin");

form_rechnung_admin.addEventListener('submit', (e) => {
    e.preventDefault();

    checkRechnung_admin();
});

function checkRechnung_admin() {

    if (selector_rechnung.value === '') {
        document.getElementById("rechnungen_liste_error_admin").style.visibility = "visible";
        return false;
    } else {
        document.getElementById("rechnungen_liste_error_admin").style.visibility = "hidden";
    }

    if (selector_rechnung.value != '') {
        document.getElementById("form_rechnung_admin").submit();
    }
}