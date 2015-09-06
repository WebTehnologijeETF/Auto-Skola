<?php
        session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }
        $id  = $_REQUEST['id'];
        $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
        $upit = $baza->prepare("select id,vijest,tekst,autor,UNIX_TIMESTAMP(vrijeme) vrijeme1, email from komentari where vijest =:id");
        if($upit->execute(array('id'=>$id))){
            $rezultat = $upit->fetch();
            $komentarId = $rezultat['id'];
            $imeAutora =  $rezultat['autor'];
            $dateTime = date("d.m.Y. H:i:s", $rezultat['vrijeme1']);                              
            $tekst = trim($rezultat['tekst']);
            $email = $rezultat['email'];
            $obrisi = "<input type='button' value='Obrisi' onclick=\"fetchPage('obrisiKomentar.php?id=$komentarId');\">";
            
        echo'
        <div id="main">
        <div class="novostPanel">
         <h5>'.$imeAutora.'</h5><h5>'.$dateTime.'</h5>
         <h5>'.$tekst.'</h5>
         <h5>'.$dateTime.'</h5>
         <h5>'.$email.'</h5>     
         '.$obrisi.'    
        </div>  
        </div>
    
        ';

        }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
