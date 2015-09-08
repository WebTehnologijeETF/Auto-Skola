<?php
      session_start();
    
    if(!isset($_SESSION['username'])){
        header("Location: admin.php");
    }
      $id  = $_REQUEST['id'];
      $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
      $upit = $baza->prepare("select id,vijest,tekst,autor,UNIX_TIMESTAMP(vrijeme) vrijeme1, email from komentari where vijest =:id");
      if($upit->execute(array('id'=>$id))){
    
    
          $rezultat = $upit->fetchAll();
    
          foreach($rezultat as $komentar){
          $komentarId = $komentar['id'];
          $imeAutora =  $komentar['autor'];
          $dateTime = date("d.m.Y. H:i:s", $komentar['vrijeme1']);                              
          $tekst = trim($komentar['tekst']);
          $email = $komentar['email'];
          $obrisi = "<input type='button' value='Obrisi' onclick=\"fetchPage('obrisiKomentar.php?id=$komentarId');\">";
    
      echo'
      <div id="main">
      <div class="novostPanel">
       <h5>'.$imeAutora.'</h5><h5>'.$dateTime.'</h5>
       <h5>'.$tekst.'</h5>
       <h5>'.$email.'</h5>     
       '.$obrisi.'    
      </div>  
      </div>
    
      ';
    
      }
      }
?>

