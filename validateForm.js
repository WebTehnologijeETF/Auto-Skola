function validateForm() {
    var ime = document.kontaktforma.ime;
    var prezime = document.kontaktforma.prezime;
    var email = document.kontaktforma.email;
    var poruka = document.kontaktforma.poruka;
    var pattern = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;
    if (ime.value == null || ime.value == "") {

        document.getElementById('imeError').style.visibility = 'visible';
        return false;

    } else {
        document.getElementById('imeError').style.visibility = 'hidden';

    }

    if (prezime.value == null || prezime.value == "") {

        document.getElementById('prezimeError').style.visibility = 'visible';
        return false;


    }
    else {
        document.getElementById('prezimeError').style.visibility = 'hidden';
    }

    if (!pattern.test(email.value) || email.value == "") {

        document.getElementById('emailError').style.visibility = 'visible';
        return false;
        

    }
    else {
        document.getElementById('emailError').style.visibility = 'hidden';
    }

    if (poruka.value == "") {

        document.getElementById('porukaError').style.visibility = 'visible';
        return false;
       
    }
    else {
        document.getElementById('porukaError').style.visibility = 'hidden';
    }


}
