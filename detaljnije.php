
<?php
    
    
     $dateTime = $_GET['dateTime'];
     $imeAutora = $_GET['autor'];
     $naslovNovosti = $_GET['naslov'];
     $slika = $_GET['slika'];
     $opisNovosti = $_GET['opis'];
     $detaljniOpisNovosti = $_GET['detaljno'];
     $opis = $opisNovosti.$detaljniOpisNovosti;
     
    
    
    
    echo '
        <head>
            <meta charset="utf-8" />
            <title>Auto-Skola Iris</title>
            <link href="style.css" media="screen" rel="stylesheet" />
        </head>
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
                         <p><img alt="" src='.$slika.' class="slika" />'.$opis.'
                         </p>
                     </div>
                 </div>
                 </div>
                 </div> ';
    
?>
              