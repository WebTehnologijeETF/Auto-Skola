<?php
    
    session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }
    
          $username = htmlspecialchars($_REQUEST['id']);
          $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
          $upit1 = $baza->query("select * from korisnici");
    
          $brojKorisnika = $upit1->rowCount();
          
          if($brojKorisnika <=2){
             echo "Nije moguce obrisati korisnika ukoliko je taj korisnik jedini administrator!";
          }
          else {
          $upit = $baza->prepare("delete from korisnici where username=:id");
          if($upit->execute(array('id'=>$username)))
          {
        
                    echo 'Uspjesno ste obrisali korisnika!';
                    
            }
          }
               
               
    
    
?>


