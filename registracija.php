<?php
 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="UTF-8">
        <title>Auto-Skola Iris</title>
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
                        <a onclick="fetchPage('novosti.php');">Novosti</a>
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
                </ul>
            </div>

            <!-- content -->
            <div id="content">
                <!-- your text goes here -->
                <div id="main">


                    <div class="registracija">
                        <h1> Registracija</h1>
                    </div>

                    <div class="registracijaForma">
                        <form name="registracija" >
                            <p><span class="required">* </span>Ime:</p>
                            <input type="text" id="ime" name="ime" class="input1"/>
                            <img src="images/error.jpg" id="imeError" />
                            <p><span class="required">* </span>Prezime:</p>
                            <input type="text" id="prezime" class="input1" />
                            <img src="images/error.jpg" id="prezimeError" />
                            <p><span class="required">* </span>E-mail:</p>
                            <input type="text" id="email" class="input1" />
                            <img src="images/error.jpg" id="emailError" />
                            <p>Broj telefona:</p>
                            <input type="text" id="broj" class="input1" />
                            <img src="images/error.jpg" id="brojError" />
                            <p><span class="required">* </span>Adresa:</p>
                            <input type="text" id="adresa" class="input1">
                            <img src="images/error.jpg" id="adresaError" />
                            <p><span class="required">* </span>Opcina:</p>
                            <input type="text" id="opcina" class="input1" oninput="mjestoEnable()">
                            <img src="images/error.jpg" id="opcinaError">
                            <p><span class="required">* </span>Mjesto</p>
                            <input type="text" id="mjesto" class="input1" disabled>
                            <img src="images/error.jpg" id="mjestoError">
                            <div id="ajaxStatus"></div>
                            <br /> <br />
                            <input type="button" value="Posalji" onclick="validateRegistration()" />
                            <input type="reset" value="Poništi" />
                        </form>
                    </div>
                </div>
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
        <script src="validateRegistration.js" type="text/javascript"></script>
         <script src="fetchPage.js" type="text/javascript"></script>
    </body>
</html>