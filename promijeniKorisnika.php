<?php
    session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }
    
      $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
      $upit = $baza->query("select * from korisnici");
    
      foreach($upit as $korisnik){
    
            $username = $korisnik['username'];
            $password = $korisnik['password'];
            $email = $korisnik['email'];
            $obrisi = "<input type='button' value='Obrisi korisnika' onclick=\"fetchPage('obrisiKorisnika.php?id=$username');\">";
            $izmijeni = "<input type='button' value='Izmijeni korisnika' onclick=\"fetchPage('izmijeniKorisnika.php?id=$username');\">";
    
        echo'
        <div id="main">
        <div class="novostPanel">
         <h5>Username:'.$username.'</h5>
         <h5>Password:'.$password.'</h5>
         <h5>Email:'.$email.'</h5>         
         '.$izmijeni.'
         '.$obrisi.'
         </div>  
        </div>
    
        ';
    }
    
?>
