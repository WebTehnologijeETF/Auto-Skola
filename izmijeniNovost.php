<?php
    session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }
     
      $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
      
       if($_SERVER["REQUEST_METHOD"] == "POST"){
           
           $id = htmlspecialchars($_POST['id']);
           $autor = htmlspecialchars($_POST['autor']);
           $naslov = htmlspecialchars($_POST['naslov']);
           $tekst = htmlspecialchars($_POST['tekst']);
           $izmjena = $baza->prepare("update novosti set naslov = :naslov, tekst = :tekst, autor=:autor where id =:id");
           if($izmjena->execute(array('naslov'=>$naslov,'tekst'=>$tekst, 'autor'=>$autor, 'id'=>$id))){
               
              echo "<script>alert('Uspjesno ste izmijenili novost!');
                    window.location.href='adminPanel.php';</script>";
           }

       }
      
      
        
          $id = htmlspecialchars($_REQUEST['id']);
          $upit = $baza->prepare("select id,naslov,tekst,autor,slika,UNIX_TIMESTAMP(vrijeme) vrijeme1 from novosti where id=:id");
          $upit->execute(array('id'=>$id));
          $rezultat= $upit->fetch();
          $autor = $rezultat['autor'];
          $naslov = $rezultat['naslov'];
          $tekst = $rezultat['tekst'];
         
         
      

?>

<div id="main">
<form id="izmjenaNovosti" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h5>Autor:</h5> <input type="text" name="autor" value="<?php echo $autor?>"><br>
    <h5>Naslov:</h5> <input type="text" name="naslov" value="<?php echo $naslov?>"><br>
    <h5>Naslov:</h5> <textarea rows="5" cols="40" name="tekst" ><?php echo $tekst?></textarea>
    <input type="hidden" value="<?php echo $id;?>" name="id">
    <input type="submit" value="Izmijeni" name="Izmijeni">
</form>

</div>