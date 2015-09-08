<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Auto-Skola Iris</title>
        <link href="style.css" media="screen" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">

            <!-- header image -->
            <div>
                <img alt="" src="images/head.jpg" class="glavnaSlika" />
            </div>

            <!-- menu -->
            <div id="menu">
                <ul>
                    <li>
                        <a href="index.php">Početna</a>
                    </li>
                    <li>
                        <a onclick="fetchPage('aboutUs.html')">O nama</a>
                    </li>
                    <li>
                        <a onclick="fetchPage('kalendar.html')">Kalendar</a>
                    </li>
                    <li>
                        <a href="novosti.php">Novosti</a>
                    </li>
                    <li>
                        <a href="kontakt.php">Kontakt</a>
                    </li>

                    <li onmouseover="showMenu();" onmouseout="hideMenu();"><a>Uputstva</a>
                        <div id="drop_down">
                            <a onclick="fetchPage('teorija.html')">Teorijski ispit</a>
                            <a onclick="fetchPage('prakticni.html')">Prakticni ispit</a>
                            <a onclick="fetchPage('prvaPomoc.html')">Prva pomoc</a>
                        </div>
                    </li>
                    <li>
                        <a href="admin.php">Admin Panel</a>
                    </li>
                </ul>
            </div>


            <!-- content -->
            <div id="content">



<?php
        session_start();

        if(!isset($_SESSION['username'])){
         
         
         if(isset($_POST['username'])){
             

             $username = htmlspecialchars($_POST['username']);
             $password = htmlspecialchars($_POST['password']);
             $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
             $upit = $baza->prepare("select * from korisnici where username =:username");
             $upit->execute(array('username'=>$username));
             $rezultat = $upit->fetch();
             if($rezultat['password'] !== $password){
                echo '<p>Pogresno korisnicko ime ili lozinka. </p>';
                echo'<a href="">Zaboravio si sifru?</a>';
             }
             else{
                 echo 'Uspjesno ste prijavljeni';
                 $_SESSION['username'] = $username;
                 header("Location: adminPanel.php");
               
             }
         }  
         else {
              include 'login.html';
         }
        }
        else{
        
         header("Location: adminPanel.php");
        }




?>


</div>
<div id="footer">
                <div id="copyright">
                Copyright &copy; 2015 <a href="#">Auto škola "Iris"</a>. All Rights Reserved.
                    <br />
                    <p>
                        <a href="http://validator.w3.org/check?uri=referer">
                            <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
                        </a>
                    </p>

                    <script src="showMenu.js"></script>
                    <script src="fetchPage.js"></script>
                    <script src="prikaziKomentare.js"></script>
                </div>

            </div>
        </div>

    </body>

</html>