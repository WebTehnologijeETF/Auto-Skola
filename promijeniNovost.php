<?php
    
    $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
    $upit = $baza->query("select id,naslov,tekst,autor,slika,UNIX_TIMESTAMP(vrijeme) vrijeme1 from novosti");
    
    foreach($upit as $novost){
    
            $id =  $novost['id'];
            $imeAutora = trim($novost['autor']);
            $naslovNovosti = trim(ucfirst(strtolower($novost['naslov']))); 
            $dateTime = date("d.m.Y. H:i:s", $novost['vrijeme1']);                              
            $opisNovosti = trim($novost['tekst']);
            $slika = $novost['slika'];
            $obrisi = "<input type='button' value='Obrisi' onclick=\"fetchPage('obrisiNovost.php?id=$id');\">";
            $izmijeni = "<input type='button' value='Izmijeni' onclick=\"fetchPage('izmijeniNovost.php?id=$id');\">";
            $urediKomentare = "<input type='button' value='urediKomentare' onclick=\"fetchPage('urediKomentare.php?id=$id');\">";
        echo'
        <div id="main">
        <div class="novostPanel">
         <h5>'.$imeAutora.'</h5><h5>'.$dateTime.'</h5>
         <h5>'.$naslovNovosti.'</h5>
         <h5>'.$opisNovosti.'</h5>
         <h5>'.$slika.'</h5>         
         '.$izmijeni.'
         '.$obrisi.'
         '.$urediKomentare.'
        </div>  
        </div>
    
        ';
    }
    
    
?>