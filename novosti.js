function dobaviNovosti()
{
    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            var json = ajax.responseText;
            var obj = JSON.parse(json);
            ispisiNovosti(obj);

        }
    }

    ajax.open("GET", "novostiServis.php", true);
    ajax.send();
}


function ispisiNovosti(obj)
{
    for (var i = 0; i < obj.length; i++)
    {
        var div = document.createElement("div");
        div.setAttribute('class', 'novost');
        var div1 = document.createElement("div");
        div1.setAttribute('class', 'naslov_vijesti');
        var h3 = document.createElement("h3");
        var datum = document.createTextNode(obj[i].naslov);
        h3.appendChild(datum);
        var div2 = document.createElement("div");
        div2.setAttribute('class', 'datum_objave');
        var p = document.createElement("p");
        var autor = document.createTextNode(obj[i].imeAutora);
        p.appendChild(autor);
        var p1 = document.createElement("p");
        var autor = document.createTextNode(obj[i].dateTime);
        p1.appendChild(autor);
        var div3 = document.createElement("div");
        div3.setAttribute('class', 'tekst_novosti');
        var p2 = document.createElement("p");
        var opis = document.createTextNode(obj[i].opis);
        p2.appendChild(opis);
        var p3 = document.createElement("p");
        var brKomentara = document.createTextNode("Broj komentara:"+obj[i].brojKomentara);
        var a = document.createElement("a");
        a.setAttribute("onclick", "dobaviKomentare("+obj[i].id+");");
        p3.appendChild(a);
        a.appendChild(brKomentara);
        var dugme = document.createElement("input");
        dugme.setAttribute("type", "button");
        dugme.setAttribute("value", "detaljnije");
        dugme.setAttribute("onclick", "fetchPage('detaljnije.html'); dobaviKomentare("+obj[i].id+");");




        document.getElementById('target').appendChild(div);
        div.appendChild(div1);
        div1.appendChild(h3);
        div.appendChild(div2);
        div2.appendChild(p);
        div2.appendChild(p1);
        div.appendChild(div3);
        div3.appendChild(p2);
        div.appendChild(p3);
        div.appendChild(dugme);
    }
}


function dobaviKomentare(id)
{

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            var obj = ajax.responseText;
            var vijest = JSON.parse(obj);
            ispisiVijest(vijest,id);
        }
    }

    ajax.open("GET", "komentariServis.php?id=" + id, true);
    ajax.send();
    
}

function ispisiVijest(obj,id)
{
     

        var div = document.createElement("div");
        div.setAttribute('class', 'novost');
        var div1 = document.createElement("div");
        div1.setAttribute('class', 'naslov_vijesti');
        var h3 = document.createElement("h3");
        var datum = document.createTextNode(obj._naslov);
        h3.appendChild(datum);
        var div2 = document.createElement("div");
        div2.setAttribute('class', 'datum_objave');
        var p = document.createElement("p");
        var autor = document.createTextNode(obj._autor);
        p.appendChild(autor);
        var p1 = document.createElement("p");
        var autor = document.createTextNode(obj._datum);
        p1.appendChild(autor);
        var div3 = document.createElement("div");
        div3.setAttribute('class', 'tekst_novosti');
        var p2 = document.createElement("p");
        var opis = document.createTextNode(obj._tekst);
        p2.appendChild(opis);
        var p3 = document.createElement("p");
        var brKomentara = document.createTextNode("Broj komentara:"+obj._komentari.length);
        var a = document.createElement("a");
       
        p3.appendChild(a);
        a.appendChild(brKomentara);
        var a1= document.createElement("a");
        a1.setAttribute("id","komentarNaredba");
        a1.setAttribute("onclick","prikaziKomentare();");
        var a1_text = document.createTextNode("Prikazi sve komentare.");
        a1.appendChild(a1_text);
        var div_kom = document.createElement("div");
        div_kom.setAttribute("id","komentari");
        
        document.getElementById('target').appendChild(div);
        div.appendChild(div1);
        div1.appendChild(h3);
        div.appendChild(div2);
        div2.appendChild(p);
        div2.appendChild(p1);
        div.appendChild(div3);
        div3.appendChild(p2);
        div.appendChild(p3);
        div.appendChild(a1);
        div.appendChild(div_kom);

         for(var i = 0; i< obj._komentari.length; i++)
        {
            var div_kom1 = document.createElement("div");
            div_kom1.setAttribute("class","komentar");
            var p_ime = document.createElement("p");
            p_ime.setAttribute("class","imeKomentar");
            p_ime.appendChild(document.createTextNode(obj._komentari[i].autor));
            var p_vr = document.createElement("p");
            p_vr.setAttribute("class","imeKomentar");
            p_vr.appendChild(document.createTextNode(obj._komentari[i].vrijeme));
            var p_email = document.createElement("p");
            p_email.appendChild(document.createTextNode(obj._komentari[i].email));
            var p_tekst = document.createElement("p");
            p_tekst.appendChild(document.createTextNode(obj._komentari[i].tekst));

            
            div_kom.appendChild(div_kom1);
            div_kom1.appendChild(p_ime);
            div_kom1.appendChild(p_vr);
            div_kom1.appendChild(p_email);
            div_kom1.appendChild(p_tekst);



        }

        var input = document.createElement("input");
        input.setAttribute("type", "button");
        input.setAttribute("onclick", "noviKomentar();");
        input.setAttribute("value", "Komentarisi");
        div.appendChild(input);


        var div_dodajKom = document.createElement("div");
        div_dodajKom.setAttribute("id", "dodajKomentar");
        var forma = document.createElement("form");
        forma.setAttribute("id", "FdodajKomentar");
        forma.setAttribute("name", "noviKomentarForma");
        //forma.setAttribute("method", "POST");
        //forma.setAttribute("action", "dodajKomentar.php");
        var u_ime = document.createElement("p");
        u_ime.appendChild(document.createTextNode("Ime: "));
        var inp_ime = document.createElement("input");
        inp_ime.setAttribute("type", "text");
        inp_ime.setAttribute("name", "ime");
        var u_kom = document.createElement("p");
        u_kom.appendChild(document.createTextNode("Komentar: "));
        var inp_komentar = document.createElement("input");
        inp_komentar.setAttribute("type", "text");
        inp_komentar.setAttribute("name", "tekst");
        var u_email = document.createElement("p");
        u_email.appendChild(document.createTextNode("Email: "));
        var inp_email = document.createElement("input");
        inp_email.setAttribute("type", "text");
        inp_email.setAttribute("name", "email");
        var inp_hidden = document.createElement("input");
        inp_hidden.setAttribute("type", "hidden");
        inp_hidden.setAttribute("value", id);
        inp_hidden.setAttribute("name", "id");
        var br = document.createElement("br");
        var inp_submit = document.createElement("input");
        inp_submit.setAttribute("type", "button");
        inp_submit.setAttribute("onclick","dodajKomentar();")
        inp_submit.setAttribute("value", "Dodaj Komentar");

        document.getElementById('target').appendChild(div_dodajKom);
        div_dodajKom.appendChild(forma);
        forma.appendChild(u_ime);
        forma.appendChild(inp_ime);
        forma.appendChild(u_kom);
        forma.appendChild(inp_komentar);
        forma.appendChild(u_email);
        forma.appendChild(inp_email);
        forma.appendChild(inp_hidden);
        forma.appendChild(br);
        forma.appendChild(inp_submit);

    
}

function dodajKomentar()
{
    var ime = document.noviKomentarForma.ime.value;
    var text = document.noviKomentarForma.tekst.value;
    var email = document.noviKomentarForma.email.value;
    var id = document.noviKomentarForma.id.value;

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function ()
    {
        if (ajax.readyState == 4 && ajax.status == 200)
        {
            document.getElementById('target').innerHTML = "";
            dobaviKomentare(id);
            
            
        }
    }

    ajax.open("GET","dodajKomentar.php?id="+id+"&ime="+ime+"&tekst="+text+"&email="+email,true);
    ajax.send();
}