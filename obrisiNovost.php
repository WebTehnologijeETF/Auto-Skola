<?php
    
    session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }
      else{
          $id = htmlspecialchars($_REQUEST['id']);
          $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
          $upit = $baza->prepare("delete from novosti where id=:id");
          if($upit->execute(array('id'=>$id)))
          {
    
       
          echo 'Uspjesno ste obrisali novost!';
      }
    
      }
    
?>

