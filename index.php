<?php
    session_start();
    $loggedUser = "Anonimus";
    if(isset($_SESSION['username'])){
        $loggedUser = $_SESSION['username'];
        
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


            <!-- content -->
            <div id="content">
                <!-- your text goes here -->
                <div id="main">


                    <div class="intro">
                        <h2>Ko smo mi?</h2>
                        <p class="intro_aside">
                        Dobrodošli u Auto školu "Iris", jednu od vodećih firmi u regionu koje se bave obukom kandidata za upravljanje motornim vozilima...
                            <a onclick="fetchPage('aboutUs.html')"><input type="button" class="read_more" value="Pročitaj više" /></a>
                        </p>


                    </div>

                    <div class="intro">
                        <h2>Šta nudimo?</h2>
                        <p class="intro_aside">
                        Auto škola "Iris" svojim kandidatima nudi vrhunsku obuku uz prijatnu atmosferu i moderno okruženje. Kandidati se osposobljavaju za...
                            <a onclick="fetchPage('aboutUs.html')"><input type="button" class="read_more" value="Pročitaj više" /></a>
                        </p>
                    </div>

                    <div class="intro">
                        <h2>Zašto baš mi?</h2>
                        <p class="intro_aside">
                        Visoko stručni kadar i izuzetan kvalitet nastave čine našu firmu idealnom za sve one koji žele da na najbolji i najbrži način dođu do vozačke dozvole...
                            <a onclick="fetchPage('aboutUs.html')"><input type="button" class="read_more" value="Pročitaj više" /></a>
                        </p>
                    </div>

                    <div id="bottom">
                        <div class="sub_title">Novosti</div>
                        <div id="divider"></div>
                    </div>
                    <div id="novostiPocetna">
                        <div class="novosti">
                            <?php
                                 $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
                            
                            $baza->exec("set names utf8");
                            $rezultat = $baza->query("select id,naslov,tekst,autor,slika,UNIX_TIMESTAMP(vrijeme) vrijeme1 from novosti order by vrijeme1");
                            
                            if(!$rezultat){
                                $greska = $veza->errorInfo();
                                print "SQL greska:".$greska[2];
                                exit();
                            }
                            
                            
                            foreach($rezultat as $temp){                            
                                $imaDetaljno = 0;
                                $sadrzaj = $temp;
                                $dateTime = date("d.m.Y. H:i:s", $sadrzaj['vrijeme1']);
                                $id =  $sadrzaj['id'];
                                $imeAutora = trim($sadrzaj['autor']);
                                $naslovNovosti = trim(ucfirst(strtolower($sadrzaj['naslov'])));                               
                                $opisNovosti = trim($sadrzaj['tekst']);
                                $slika = $sadrzaj['slika'];
                                $detaljniOpisNovosti = "";
                                $detaljnije = "";
                            
                                $indeks = strpos($opisNovosti, '--');
                                if($indeks !== FALSE){
                                    $imaDetaljno = 1;
                                    $pomocna = $opisNovosti;
                                    $opisNovosti = substr($opisNovosti, 0 , $indeks);
                                    $detaljniOpisNovosti = substr($pomocna, $indeks);
                                }
                            
                               
                                 $detaljnije = "<input type='button' value='Idi na vijest' onclick=\"fetchPage('detaljnije.php?id=$id');\">";
                            
                                
                                //dobijanje broja komentara 
                                $komentari = $baza->query("select id, vijest,tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentari where vijest = '$id'");
                                $brojKomentara = $komentari->rowCount();
                            
                               echo ' <div class="novost">
                                    <div class="naslov_vijesti">
                                        <h3>'.$naslovNovosti.'</h3>
                                    </div>
                                    <div class="datum_objave">
                                    <p>Autor: '.$imeAutora.'</p>
                                    <p>Datum objave: '.$dateTime.'</p>
                                    </div>
                                    <div class="tekst_novosti">
                                        <p><img alt="" src='.$slika.' class="slika" />'.$opisNovosti.'
                                        </p>
                                    </div>
                                    <p>Broj komentara:'.$brojKomentara.'</p>
                                    <div class="detaljnije">'.$detaljnije.'</div>
                                </div> ';  
                             }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div id="sidebar">
                    Prijavljeni ste kao <span class="bold"><?php echo $loggedUser; ?></span>  <a href="odjava.php">Odjavi se</a>
                    <h4>Uloguj se</h4>
                    <div class="login">
                        <form class="login-forma" action="">
                            <fieldset>
                            username:
                                <br />
                                <input type="text" name="username" />
                                <br />password:
                                <br />
                                <input type="text" name="password" />
                                <br />
                                <input type="button" id="loginButton" name="login" value="Uloguj se" />
                                <a href="registracija.php"><p>Nemaš nalog? Registruj se.</p></a>

                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="partneri">
                    <h3>Partneri</h3>
                    <ul>
                        <li><a href="https://www.raiffeisenbank.ba">
                                <img alt="Raiffeisen banka" src="images/raiffeisen.jpg" height="30" width="90">
                            </a>
                        </li>
                        <li><a href="http://www.bihamk.ba">
                                <img alt="Bihamk" src="images/bihamk.png" height="30" width="100" />
                            </a></li>
                    </ul>
                </div>
                <div style="clear:both;"></div>
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
                </div>

            </div>
        </div>

    </body>

</html>