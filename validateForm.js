function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function validateForm() {
    var ime = document.kontaktforma.ime;
    var prezime = document.kontaktforma.prezime;
    var email = document.kontaktforma.email;
    var poruka = document.kontaktforma.poruka;
    var broj = document.kontaktforma.broj;
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

    if(broj.value != "")
    {
        if(!isNumeric(broj.value))
        {
        document.getElementById('brojError').style.visibility = 'visible';
        return false;
        }
        else
        {
            document.getElementById('brojError').style.visibility = 'hidden';
        }
    }
    else
    {
        document.getElementById('brojError').style.visibility = 'hidden';
    }

    if (poruka.value == "") {

        document.getElementById('porukaError').style.visibility = 'visible';
        return false;
       
    }
    else {
        document.getElementById('porukaError').style.visibility = 'hidden';
    }


}

function validirajDodavanjeNovosti()
{
    var autor = document.dodajNovost.autor;
    var naslov = document.dodajNovost.naslov;
    var tekst = document.dodajNovost.tekst;

    var valid = 1;
    if(autor.value == "") valid = 0;
    if(naslov.value == "") valid = 0;
    if(tekst.value == "") valid = 0;

    var x = document.getElementById('dodajNovost');
    
    if(!valid)
    {
        
        alert("Provjerite jesu li sva polja popunjena");
            }
     else 
     {
        x.action = "adminPanel.php";
        x.method = "POST";
        x.submit();   
     }
}

function validirajDodavanjeKorisnika()
{
    var username = document.dodajKorisnika.username;
    var password = document.dodajKorisnika.password;
    var email = document.dodajKorisnika.email;

    var valid = 1;
    if(username.value == "") valid = 0;
    if(password.value == "") valid = 0;
    if(email.value == "") valid = 0;

    var x = document.getElementById('dodajKorisnika');
    
    if(!valid)
    {
        
        alert("Provjerite jesu li sva polja popunjena");
        return false;
            }
     else 
     {
        x.action = "adminPanel.php";
        x.method = "POST";
        x.submit();   
     }
}