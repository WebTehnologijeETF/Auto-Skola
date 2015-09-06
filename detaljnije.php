
<?php
    
          $id = $_REQUEST['id'];
    
          try {
          $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
          $naredba = $baza->prepare('select id,naslov,tekst,autor,slika,UNIX_TIMESTAMP(vrijeme) vrijeme1 from novosti where id=:id');
          $naredba->execute(array('id' => $id));
          $rezultat = $naredba->fetch();
          
          
          //preuzimanje komentara

          $komentari = $baza->query("select id, vijest,tekst, autor, UNIX_TIMESTAMP(vrijeme) vrijeme2, email from komentari where vijest = '$id'");
          $brojKomentara = $komentari->rowCount();
          }
          catch(PDOException $e) {
    
              echo 'ERROR: ' . $e->getMessage();
           }
    
    
    
                $dateTime = date("d.m.Y. H:i:s", $rezultat['vrijeme1']);
                $id =  $rezultat['id'];
                $imeAutora = trim($sadrzaj['autor']);
                $naslovNovosti = trim(ucfirst(strtolower($rezultat['naslov'])));                               
                $opisNovosti = trim($rezultat['tekst']);
                $slika = $rezultat['slika'];
                $detaljniOpisNovosti = "";
                $detaljnije = "";
                $indeks = strpos($opisNovosti, '--');                              
                $pomocna = $opisNovosti;
                $opisNovosti = substr($opisNovosti, 0 , $indeks);
                $detaljniOpisNovosti = substr($pomocna, $indeks+2);
    
    echo '
    
        <div id="main">
        <div class="novosti">
        <div class="novost">
                     <div class="naslov_vijesti">
                         <h3>'.$naslovNovosti.'</h3>
                     </div>
                     <div class="datum_objave">
                     <p>Autor:'.$imeAutora.'</p>
                     <p>Datum objave:'.$dateTime.'</p>
                     </div>
                     <div class="tekst_novosti">
                         <p><img alt="" src='.$slika.' class="slika" />'.$opisNovosti.$detaljniOpisNovosti.'
                         </p>
                     </div>
                     <div>
                     <p>Broj komentara: '.$brojKomentara.'</p>
                     <a id="komentarNaredba" onclick="prikaziKomentare();">Prikazi sve komentare</a>
    
                    </div>
                    <div id = "komentari">';
                     foreach($komentari as $komentar){
                     $autor = $komentar['autor'];
                     $vrijeme = date("d.m.Y. H:i:s", $komentar['vrijeme2']);
                     $tekst = $komentar['tekst'];
                     $email = $komentar['email'];
    
                     echo '
                     <div class="komentar">
                      <p class="imeKomentar">'.$autor.'</p>
                      <p class="imeKomentar"><span class="ravnanjeDesno">'.$vrijeme.'</span></p>
                      <p>'.$tekst.'</p>
                      <a href="mailto:'.$email.'">'.$email.'</a>
    
                     </div>          
    
                     ';
                     } 
                     echo '
                     </div>
                 </div>
                 <input type="button" onclick="noviKomentar();" value="Komentarisi">
    
                 </div>
    
                 <div id="dodajKomentar">
                 <form id="FdodajKomentar" name = "noviKomentarForma" method="POST" action="dodajKomentar.php">
                 <p>Ime:</p>
                 <input type="text" name="ime">
                 <p>Komentar:</p>
                 <input type="text" name="tekst">
                 <p>Email:</p>
                 <input type="text" name="email">
                 <input type="hidden" value='.$id.' name="id">
                 <input type ="submit"  value="Dodaj komentar">
    
                 </form>
    
    
                 </div>
                 </div> ';
    
    
    
    
    
?>
              