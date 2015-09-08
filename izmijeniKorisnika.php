<?php

        session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }
     
      $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
      
       if($_SERVER["REQUEST_METHOD"] == "POST"){
           
           $username = htmlspecialchars($_POST['username']);
           $usernameEx = htmlspecialchars($_POST['usernameEx']);
           $password = htmlspecialchars($_POST['password']);
           $email = htmlspecialchars($_POST['email']);
          
           $izmjena = $baza->prepare("update korisnici set username = :username, password = :password, email=:email where username =:usernameEx");
           if($izmjena->execute(array('username'=>$username,'password'=>$password, 'email'=>$email, 'usernameEx'=>$usernameEx))){
               
              echo "<script>alert('Uspjesno ste izmijenili korisnika!');
                    window.location.href='adminPanel.php';</script>";
           }

       }
      
      
        
          $usernameEx= htmlspecialchars($_REQUEST['id']);
          $username = $usernameEx;
          $upit = $baza->prepare("select * from korisnici where username=:username");
          $upit->execute(array('username'=>$usernameEx));
          $rezultat= $upit->fetch();
          $password = $rezultat['password'];
          $email = $rezultat['email'];
         

?>

<div id="main">
<form id="izmjenaKorisnika" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h5>Username:</h5> <input type="text" name="username" value="<?php echo $username?>"><br>
    <h5>Password:</h5> <input type="text" name="password" value="<?php echo $password?>"><br>
    <h5>Email:</h5> <textarea rows="5" cols="40" name="email" ><?php echo $email?></textarea>
    <input type="hidden" value="<?php echo $usernameEx;?>" name="usernameEx">
    <input type="submit" value="Izmijeni" name="Izmijeni">
</form>

</div>