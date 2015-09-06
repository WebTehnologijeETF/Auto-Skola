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
