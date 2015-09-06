<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['dodajNovost'])){
    
        $autor = htmlspecialchars($_POST['autor']);
        $naslov = htmlspecialchars($_POST['naslov']);
        $tekst = htmlspecialchars($_POST['tekst']);
    
        if(!empty($autor) && !empty($naslov) && !empty($tekst)){
    
    
    
         $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
         $upit = $baza->prepare("insert into novosti (naslov,tekst,autor) values (:naslov,:tekst,:autor)");
    
         if($upit->execute(array('naslov'=>$naslov, 'autor'=>$autor, 'tekst'=>$tekst))){
             echo "<script type='text/javascript'>alert('Uspjesno ste dodali novost!');</script>";
    
         }
         }
    
    
    
    
    
    
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['dodajKorisnika'])){
    
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
    
        if(!empty($username) && !empty($password) && !empty($email)){
    
    
    
         $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
         $upit = $baza->prepare("insert into korisnici values (:username,:password,:email)");
    
         if($upit->execute(array('username'=>$username, 'password'=>$password, 'email'=>$email))){
             echo "<script type='text/javascript'>alert('Uspjesno ste dodali korisnika!');</script>";
    
         }
         }
    
    
    
    
    
    
    }
    
?>

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

            <div id="menu1">
                <ul>
                    <li>
                        <a onclick="fetchPage('dodajNovost.html')">Dodaj novost</a>
                    </li>
                    <li>
                        <a onclick="fetchPage('promijeniNovost.php')">Uredi novost</a>
                    </li>
                    <li>
                        <a onclick="fetchPage('dodajKorisnika.html')">Dodaj korisnika</a>
                    </li>
                    <li>
                        <a onclick="fetchPage('promijeniKorisnika.php')">Uredi korisinka</a>
                    </li>
                    
                </ul>

            </div>

            <div id="content">

            </div>




            <!-- footer -->
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
                    <script src="validateForm.js"></script>
                </div>

            </div>
        </div>

    </body>

</html>

