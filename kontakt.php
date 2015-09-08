<?php
    
    
      $ime = $prezime = $email = $broj = $poruka = $unos = "";
      $imeErr = $prezimeErr = $emailErr = $brojErr = $porukaErr = $unosErr = "";
    
    
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
             $valid = 1;
    
          if(empty($_POST["ime"])){
             $imeErr = '<style type="text/css">
              #imeError {
              visibility: visible;
              }
              </style>'; 
              $valid = 0; 
          }
          else{
    
               $ime = test_input($_POST["ime"]);
               if(validateName($ime)){}
               else
               {
                    $imeErr = '<style type="text/css">
                    #imeError {
                    visibility: visible;
                    }
                    </style>';  
                     $valid = 0; 
               }
          }
    
          if(empty($_POST["prezime"]))
          {
             $prezimeErr = '<style type="text/css">
              #prezimeError {
              visibility: visible;
              }
              </style>';  
               $valid = 0; 
          }
          else{
    
               $prezime = test_input($_POST["prezime"]);
               if(validateName($prezime)){}
               else{
                   $prezimeErr = '<style type="text/css">
                    #prezimeError {
                    visibility: visible;
                    }
                    </style>';  
                     $valid = 0; 
               }
          }
    
          if(empty($_POST["email"]))
          {
              $emailErr = '<style type="text/css">
              #emailError {
              visibility: visible;
              }
              </style>';  
               $valid = 0; 
          }
          else{
    
               $email = test_input($_POST["email"]);
              if(validateEmail($email)){
    
               }
               else {
                    $emailErr = '<style type="text/css">
                    #emailError {
                    visibility: visible;
                    }
                    </style>'; 
                     $valid = 0; 
               }
          }
    
          if(!empty($_POST["broj"])){
    
              $broj = test_input($_POST["broj"]);
              if(validateNumber($broj)){
    
              }
              else{
                  $brojErr = '<style type="text/css">
                    #brojError {
                    visibility: visible;
                    }
                    </style>'; 
                     $valid = 0; 
              }
          }
    
          if(empty($_POST["poruka"])){
             $porukaErr = '<style type="text/css">
              #porukaError {
              visibility: visible;
              }
              </style>';  
               $valid = 0; 
          }
          else{
    
               $poruka = test_input($_POST["poruka"]);
          }
          if(empty($_POST["unos"])){
             $unosErr = '<style type="text/css">
              #unosError {
              visibility: visible;
              }
              </style>';  
               $valid = 0; 
          }
          else{
              $unos = test_input($_POST["unos"]);
                if($unos != "gGphJD"){
              $unosErr = '<style type="text/css">
              #unosError {
              visibility: visible;
              }
              </style>';  
               $valid = 0; 
                    }
    
          }
    
          }
    
      function test_input($data) 
      {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
      }
      function validateEmail($email){
          $regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,6})$";
          if(eregi($regexp,$email)) return 1;
          else return 0;
      }
    
      function validateNumber($number){
          if(!is_nan($number) && is_finite($number)) return 1;
          else return 0;
      }
    
      function validateName($name){
          $regexp1 = "^[A-Z]'?[-a-zA-Z]([a-zA-Z])*$";
          if(eregi($regexp1,$name)) return 1;
          else return 0;
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


                    <div class="informacije">
                        <h1> Informacije</h1>
                        <p>Adresa: Ul. Rifata Budzevica, Sarajevo 71000</p>
                        <p>Tel/fax: +387 33 288 277</p>
                        <p>Mob: +387 66 899 254</p>
                        <p>E-mail: autoskolairis@gmail.com</p>
                    </div>

                    <div class="kontaktforma">
                        <form name="kontaktforma" id="kontaktForma" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <p><span class="required">* </span>Ime:</p>
                            <input type="text" id="ime" name="ime" class="input1" value="<?php
                                       if(isset($_REQUEST['ime']))
                                       print $_REQUEST['ime'];
                                   ?>" /> <span><?php echo $imeErr ?></span>
                            <img src="images/error.jpg" id="imeError" />
                            <p><span class="required">* </span>Prezime:</p>
                            <input type="text" id="prezime" name="prezime" class="input1" value="<?php
                                         if(isset($_REQUEST['prezime']))
                                       print $_REQUEST['prezime'];
                                                    ?>" />
                            <span><?php echo $prezimeErr ?></span>
                            <img src="images/error.jpg" id="prezimeError" />
                            <p><span class="required">* </span>E-mail:</p>
                            <input type="text" id="email" name="email" class="input1" value="<?php
                                        if(isset($_REQUEST['email']))
                                        print $_REQUEST['email'];
                                                 ?>" />
                            <span><?php echo $emailErr ?></span>
                            <img src="images/error.jpg" id="emailError" />
                            <p>Broj telefona:</p>
                            <input type="text" id="broj" name="broj" class="input1" value="<?php
                                        if(isset($_REQUEST['broj']))
                                        print $_REQUEST['broj'];
                                                     ?>" />
                            <span><?php echo $brojErr ?></span>
                            <img src="images/error.jpg" id="brojError" />
                            <p><span class="required">* </span>Poruka:</p>
                            <textarea rows="4" id="poruka" cols="50" name="poruka" class="input1"><?php
                                if(isset($_REQUEST['poruka']))
                                print $_REQUEST['poruka'];
                                ?></textarea>
                            <span><?php echo $porukaErr ?></span>
                            <img src="images/error.jpg" id="porukaError" />
                            <br />
                            <img src="images/captcha.jpg" id="captcha"><br />
                            <p><span class="required">* </span>Unesite tekst sa slike:</p>
                            <input type="text" id="unos" name="unos" class="input1" value="<?php
                                        if(isset($_REQUEST['unos']))
                                        print $_REQUEST['unos'];
                                                     ?>">
                            <span><?php echo $unosErr ?></span>
                            <img src="images/error.jpg" id="unosError" /><br>
                            <input type="submit" value="Posalji" onclick="validateForm();" />
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


        <script src="validateForm.js" type="text/javascript"></script>
        <script src="showMenu.js" type="text/javascript"></script>
        <script src="fetchPage.js" type="text/javascript"></script>
        <script src="prikaziKomentare.js" type="text/javascript"></script>
    </body>

</html>
<?php
    if($valid){
    
          echo "
           <script type=\"text/javascript\">
           var e = document.getElementById('kontaktForma'); e.action='potvrda.php'; e.submit();
           </script>
           ";
          }   
?>