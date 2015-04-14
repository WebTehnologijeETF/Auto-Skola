function validateForm() {
    var ime = document.kontaktforma.ime;
    var prezime = document.kontaktforma.prezime;
    var email = document.kontaktforma.email;
    var poruka = document.kontaktforma.poruka;

    if (ime.value == null || ime.value == "") {

        document.getElementById('imeError').style.visibility = 'visible';
        //return false;

    } else {
        document.getElementById('imeError').style.visibility = 'hidden';

    }

    if (prezime.value == null || prezime.value == "") {

        document.getElementById('prezimeError').style.visibility = 'visible';



    }
    else {
        document.getElementById('prezimeError').style.visibility = 'hidden';
    }

    if (email.value == null || email.value == "") {

        document.getElementById('emailError').style.visibility = 'visible';

        

    }
    else {
        document.getElementById('emailError').style.visibility = 'hidden';
    }

    if (poruka.value == "") {

        document.getElementById('porukaError').style.visibility = 'visible';

        return false;
    }


}