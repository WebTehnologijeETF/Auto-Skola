
function validateRegistration() {
    var ime = document.registracija.ime;
    var prezime = document.registracija.prezime;
    var email = document.registracija.email;
    var broj = document.registracija.broj;
    var adresa = document.registracija.adresa;
    var opcina = document.registracija.opcina;
    var mjesto = document.registracija.mjesto;
    
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

    if (adresa.value == "") {

        document.getElementById('adresaError').style.visibility = 'visible';
        return false;
       
    }
    else {
        document.getElementById('adresaError').style.visibility = 'hidden';
    }
    if (opcina.value == "")
    {
        document.getElementById('opcinaError').style.visibility = 'visible';
        return false;
    }
    else
    {
        document.getElementById('opcinaError').style.visibility = 'hidden';
    }
       if (mjesto.value == "")
    {
        document.getElementById('mjestoError').style.visibility = 'visible';
        return false;
    }
    else
    {
        document.getElementById('mjestoError').style.visibility = 'hidden';
    }
    
     ajaxValidacija(opcina.value,mjesto.value);
     
     
      
}
function mjestoEnable()
{
    if(document.getElementById('opcina').value=="")
    {
        document.getElementById('mjesto').disabled=true;
        return;
    }
    document.getElementById('mjesto').disabled=false;
   
}

function ajaxValidacija(opcina,mjesto)
{
    var ajax = new XMLHttpRequest();
    var _opcina = encodeURIComponent(opcina);
    var _mjesto = encodeURIComponent(mjesto);
     ajax.onreadystatechange = function()
    {
      if(ajax.readyState == 4 && ajax.status == 200)
      {
         
             document.getElementById('ajaxStatus').innerHTML = ajax.responseText;
      }
     
    }
    ajax.open("GET","http://zamger.etf.unsa.ba/wt/mjesto_opcina.php?opcina="+ _opcina + "&mjesto="+_mjesto,true);
    ajax.send();
    
}
