<?php
        
 session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }
      else{
          $id = htmlspecialchars($_REQUEST['id']);
          $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
          $upit = $baza->prepare("delete from komentari where id=:id");
          if($upit->execute(array('id'=>$id)))
          {
    
       
          echo 'Uspjesno ste obrisali komentar!';
      }
    
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
