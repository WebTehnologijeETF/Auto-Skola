function potvrda(ime,prezime,email,broj,poruka)
{
    //var COOKIES = {};
    //var cookieStr = document.cookie;
    //cookieStr.split(/; /).forEach(function (keyValuePair)
    //{ // not necessarily the best way to parse cookies
    //    var cookieName = keyValuePair.replace(/=.*$/, ""); // some decoding is probably necessary
    //    var cookieValue = keyValuePair.replace(/^[^=]*\=/, ""); // some decoding is probably necessary
    //    COOKIES[cookieName] = cookieValue;
    //});

    //var ime = getCookie("ime");
    //var prezime = getCookie("prezime");
    //var email = getCookie("email");
    //var poruka = getCookie("poruka");
    //alert("Uspjesna validacija!");

    document.getElementById('ime').value = ime;
    document.getElementById('prezime').value = prezime;
    document.getElementById('email').value = email;
    document.getElementById('broj').value = broj;
    document.getElementById('poruka').value = poruka;

    function getCookie(cname)
    {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++)
        {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }
}

function updateFormu()
{
    document.getElementById('imeConfirm').innerHTML = "Ime:" + document.getElementById('ime').value;
    
    document.getElementById('prezimeConfirm').innerHTML = "Prezime:" + document.getElementById('prezime').value;
    
    document.getElementById('emailConfirm').innerHTML = "Email:" + document.getElementById('email').value;
    
    document.getElementById('brojConfirm').innerHTML = "Broj:" + document.getElementById('broj').value;
    
    document.getElementById('porukaConfirm').innerHTML = "Poruka:" + document.getElementById('poruka').value;

    return false;
}