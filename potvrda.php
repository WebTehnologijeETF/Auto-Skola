<?php
    
    
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $email = $_POST["email"];
    $broj = $_POST["broj"];
    $poruka = $_POST["poruka"];
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Potvrda kontakt forme</title>
        <link href="style.css" media="screen" rel="stylesheet" />
    </head>
    <body>
        <div id="wrapper">

            <!-- header image -->
            <div><img alt="" src="images/head.jpg" class="glavnaSlika" />
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
                            <a>Teorijski ispit</a>
                            <a>Prakticni ispit</a>
                            <a>Prva pomoc</a>
                        </div>
                    </li>
                </ul>
            </div>


            <div id="pregledPodataka">
                <form id="emailForma" method="POST" action="slanjeMaila.php">
                    <h3>Provjerite da li ste ispravno popunili kontakt formu</h3>
                    <p>Ime: <?php echo $ime?></p><br>
                    <p>Prezime: <?php echo $prezime?></p><br>
                    <p>Email: <?php echo $email?></p><br>
                    <p>Broj: <?php echo $broj?></p><br>
                    <p>Poruka: <?php echo $poruka?></p><br>
                    <h3>Da li ste sigurni da želite poslati ove podatke?</h3>
                    <input type="button" value="Siguran sam" onclick="var e = document.getElementById('editForma'); e.action='sendGridPhp.php'; e.submit();">
                </form>
            </div>
            <div class="kontaktforma">
                <h3>Ako ste pogrešno popunili formu, možete ispod prepraviti unesene podatke</h3>
                <form name="kontaktforma" id="editForma" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <p><span class="required">* </span>Ime:</p>
                    <input type="text" id="ime" name="ime" class="input1" value="<?php
                                       if(isset($_REQUEST['ime']))
                                       print $_REQUEST['ime']; ?>">
                    <p><span class="required">* </span>Prezime:</p>
                    <input type="text" id="prezime" name="prezime" class="input1" value="<?php
                                         if(isset($_REQUEST['prezime']))
                                       print $_REQUEST['prezime'];
                                                    ?>" />
                    <p><span class="required">* </span>E-mail:</p>
                    <input type="text" id="email" name="email" class="input1" value="<?php
                                        if(isset($_REQUEST['email']))
                                        print $_REQUEST['email'];
                                                 ?>" />
                    <p>Broj telefona:</p>
                    <input type="text" id="broj" name="broj" class="input1" value="<?php
                                        if(isset($_REQUEST['broj']))
                                        print $_REQUEST['broj'];
                                                     ?>" />
                    <p><span class="required">* </span>Poruka:</p>
                    <textarea rows="4" id="poruka" cols="50" name="poruka" class="input1"><?php
                        if(isset($_REQUEST['poruka']))
                        print $_REQUEST['poruka'];
                        ?></textarea>
                    <br />
                    <input type="submit" value="Posalji" />
                    <input type="reset" value="Poništi" />
                </form>
            </div>

            <!-- footer -->
            <div id="footer">
                <div id="copyright">Copyright &copy; 2015 <a href="#">Auto škola "Iris"</a>. All Rights Reserved.
                    <br />
                    <p>
                        <a href="http://validator.w3.org/check?uri=referer">
                            <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <script src="showMenu.js" type="text/javascript"></script>

    </body>
</html>
