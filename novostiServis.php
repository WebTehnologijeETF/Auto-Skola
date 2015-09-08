<?php
    
    $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
    
    $baza->exec("set names utf8");
    $rezultat = $baza->query("select id,naslov,tekst,autor,slika,UNIX_TIMESTAMP(vrijeme) vrijeme1 from novosti order by vrijeme1");
    
    if(!$rezultat){
        $greska = $veza->errorInfo();
        print "SQL greska:".$greska[2];
        exit();
    }
    
    $list = array();
    foreach($rezultat as $temp){                            
        $imaDetaljno = 0;
        $sadrzaj = $temp;
        $dateTime = date("d.m.Y. H:i:s", $sadrzaj['vrijeme1']);
        $id =  $sadrzaj['id'];
        $imeAutora = trim($sadrzaj['autor']);
        $naslovNovosti = trim(ucfirst(strtolower($sadrzaj['naslov'])));                               
        $opisNovosti = trim($sadrzaj['tekst']);
        $slika = $sadrzaj['slika'];
        $detaljniOpisNovosti = "";
        $detaljnije = "";
    
        $indeks = strpos($opisNovosti, '--');
        if($indeks !== FALSE){
            $imaDetaljno = 1;
            $pomocna = $opisNovosti;
            $opisNovosti = substr($opisNovosti, 0 , $indeks);
            $detaljniOpisNovosti = substr($pomocna, $indeks);
        }
    
        //dobijanje broja komentara 
        $komentari = $baza->query("select id, vijest,tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentari where vijest = '$id'");
        $brojKomentara = $komentari->rowCount();

         $list[] = array('id' => $id, 'imeAutora' => $imeAutora, 'dateTime' => $dateTime, 'naslov' => $naslovNovosti, 'opis' => $opisNovosti,
                        'detaljniOpis' => $detaljniOpisNovosti, 'slika' => $slika, 'brojKomentara' => $brojKomentara);
    
    
     }

     echo json_encode($list);
    
?>