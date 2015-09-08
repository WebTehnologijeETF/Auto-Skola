<?php
    
    $ime = $prezime = $email = $broj = $poruka = $unos = "";
    $imeErr = $prezimeErr = $emailErr = $brojErr = $porukaErr = $unosErr = "";  //ako ne prodje validaciju postavlja se na 'true', u suprotnom je ""
    
   
           $valid = 1;
    
            if(empty($_REQUEST["ime"])){
             $imeErr = true;
              $valid = 0; 
          }
          else{
    
               $ime = test_input($_REQUEST["ime"]);
               if(validateName($ime)){}
               else
               {
                    $imeErr = true;
                     $valid = 0; 
               }
          }
    
          if(empty($_REQUEST["prezime"]))
          {
             $prezimeErr = true;
               $valid = 0; 
          }
          else{
    
               $prezime = test_input($_REQUEST["prezime"]);
               if(validateName($prezime)){}
               else{
                   $prezimeErr = true;
                     $valid = 0; 
               }
          }
    
          if(empty($_REQUEST["email"]))
          {
              $emailErr = true;
               $valid = 0; 
          }
          else{
    
               $email = test_input($_REQUEST["email"]);
              if(validateEmail($email)){
    
               }
               else {
                    $emailErr = true;
                     $valid = 0; 
               }
          }
    
          if(!empty($_REQUEST["broj"])){
    
              $broj = test_input($_REQUEST["broj"]);
              if(validateNumber($broj)){
    
              }
              else{
                  $brojErr = true;
                     $valid = 0; 
              }
          }
    
          if(empty($_REQUEST["poruka"])){
             $porukaErr = true;
               $valid = 0; 
          }
          else{
    
               $poruka = test_input($_REQUEST["poruka"]);
          }
          if(empty($_REQUEST["unos"])){
             $unosErr = true;
               $valid = 0; 
          }
          else{
              $unos = test_input($_REQUEST["unos"]);
                if($unos != "gGphJD"){
                  $unosErr = true;
                   $valid = 0; 
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
    
          //vracamo rezultat validiranja, varijabla koja nije prosla validaciju ima vrijednost true

          $rezultat = array('ime'=> $imeErr, 'prezime'=>$prezimeErr, 'email'=>$emailErr, 'broj'=>$brojErr, 'poruka'=>$porukaErr, 'unos'=>$unosErr);
    
          header("content-type: application/json");
          echo json_encode($rezultat);
    
    
    
?>

