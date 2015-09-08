prikaziKomentare = function ()
{
    if (document.getElementById('komentarNaredba').innerHTML === "Prikazi sve komentare")
    {
        document.getElementById('komentari').style.visibility = 'visible';
        document.getElementById('komentari').style.height = '400px';
        document.getElementById('komentarNaredba').innerHTML = "Sakrij sve komentare";
    }
    else
    {
        document.getElementById('komentari').style.visibility = 'hidden';
        document.getElementById('komentari').style.height = '5px';
        document.getElementById('komentarNaredba').innerHTML = "Prikazi sve komentare"
    }

}

noviKomentar = function ()
{
    document.getElementById('dodajKomentar').style.visibility = 'visible';
}