function validateFormWithService()
{
    var ajax = new XMLHttpRequest();

    var ime = document.getElementById('ime').value;
    var prezime = document.getElementById('prezime').value;
    var email = document.getElementById('email').value;
    var poruka = document.getElementById('poruka').value;
    var broj = document.getElementById('broj').value;
    var unos = document.getElementById('unos').value;



    var valid = 1;
    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {

            var json = ajax.responseText;
            var obj = JSON.parse(json);
            if (obj.ime)
            {
                document.getElementById('imeError').style.visibility = 'visible';
                valid = 0;
            } else document.getElementById('imeError').style.visibility = 'hidden';
            if (obj.prezime)
            {
                document.getElementById('prezimeError').style.visibility = 'visible';
                valid = 0;
            } else document.getElementById('prezimeError').style.visibility = 'hidden';
            if (obj.email)
            {
                document.getElementById('emailError').style.visibility = 'visible';
                valid = 0;
            } else document.getElementById('emailError').style.visibility = 'hidden';
            if (obj.broj)
            {
                document.getElementById('brojError').style.visibility = 'visible';
                valid = 0;
            } else document.getElementById('brojError').style.visibility = 'hidden';
            if (obj.poruka)
            {
                document.getElementById('porukaError').style.visibility = 'visible';
                valid = 0;
            } else document.getElementById('porukaError').style.visibility = 'hidden';
            if (obj.unos)
            {
                document.getElementById('unosError').style.visibility = 'visible';
                valid = 0;
            } else document.getElementById('unosError').style.visibility = 'hidden';
            if (!valid) return false;
            else
            {

                //var d = new Date();
                //d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
                //var expires = "expires=" + d.toUTCString();
                //document.cookie = "ime=" + ime + ";" + expires;
                //document.cookie = "prezime=" + prezime + ";" + expires;
                //document.cookie = "email=" + email + ";" + expires;
                //document.cookie = "broj=" + broj + ";" + expires;
                //document.cookie = "poruka" + poruka + ";" + expires;
                //if (fetchPage('potvrda.html'))
                //{
                //    potvrda(ime, prezime, email, broj, poruka);

                //}
                //updateFormu();
                var ajax1 = new XMLHttpRequest();
                ajax1.onreadystatechange = function ()
                {
                    if (ajax1.readyState == 4 && ajax1.status == 200)
                    {
                        document.getElementById('content').innerHTML = ajax1.responseText;
                        potvrda(ime, prezime, email, broj, poruka);
                        updateFormu();
                    }


                }
                ajax1.open("GET", 'potvrda.html', true);
                ajax1.send();
            }
        }

    }


    ajax.open("GET", "kontaktValidacija.php?ime=" + ime + "&prezime=" + prezime + "&email=" + email + "&broj=" + broj + "&poruka=" + poruka + "&unos=" + unos, true);
    ajax.send();




}


