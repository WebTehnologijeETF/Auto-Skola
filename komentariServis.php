<?php
    class Novost{
    
       var $_autor;
       var $_naslov;
       var $_datum;
       var $_tekst;
       var $_komentari = array();
    
    };
    
    $id = $_REQUEST['id'];
    
    try {
    $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
    $naredba = $baza->prepare('select id,naslov,tekst,autor,slika,UNIX_TIMESTAMP(vrijeme) vrijeme1 from novosti where id=:id');
    $naredba->execute(array('id' => $id));
    $rezultat = $naredba->fetch();
    
    
    //preuzimanje komentara
    
    $komentari = $baza->query("select id, vijest,tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentari where vijest = '$id'");
    $brojKomentara = $komentari->rowCount();
    }
    catch(PDOException $e) {
    
        echo 'ERROR: ' . $e->getMessage();
     }
    
    
    
          $dateTime = date("d.m.Y. H:i:s", $rezultat['vrijeme1']);
          $id =  $rezultat['id'];
          $imeAutora = trim($rezultat['autor']);
          $naslovNovosti = trim(ucfirst(strtolower($rezultat['naslov'])));                               
          $opisNovosti = trim($rezultat['tekst']);
          $slika = $rezultat['slika'];
          //$detaljniOpisNovosti = "";
          //$detaljnije = "";
          //$indeks = strpos($opisNovosti, '--');                              
          //$pomocna = $opisNovosti;
          //$opisNovosti = substr($opisNovosti, 0 , $indeks);
          //$detaljniOpisNovosti = substr($pomocna, $indeks+2);
    
    
          $novost = new Novost;
          $novost->_autor = $imeAutora;
          $novost->_naslov = $naslovNovosti;
          $novost->_datum = $dateTime;
          $novost->_tekst = $opisNovosti;
    
          $_komentari = array();

            foreach($komentari as $komentar)
            {

            $komentarId = $komentar['id'];
            $autor = $komentar['autor'];
            $vrijeme = date("d.m.Y. H:i:s", $komentar['vrijeme2']);
            $tekst = $komentar['tekst'];
            $email = $komentar['email'];
    
    
            $_komentari[] = array('id' => $komentarId, 'autor' => $autor, 'vrijeme' => $vrijeme, 'tekst' => $tekst, 'email' => $email);
    
       }
    
       $novost->_komentari = $_komentari;
       echo json_encode(get_object_vars($novost));
?>

