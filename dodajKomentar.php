<?php
    
    
        $location = $_SERVER['HTTP_REFERER'];
        $ime = htmlspecialchars($_REQUEST['ime']);
        $noviKomentar = htmlspecialchars($_REQUEST['tekst']);
        $emailTemp = htmlspecialchars($_REQUEST['email']);
        $vijest = htmlspecialchars($_REQUEST['id']);
    try{
        echo $location.$ime.$noviKomentar.$emailTemp.$vijest;
        $baza = new PDO("mysql:dbname=wtbaza;host=localhost;charset=utf8","wtuser","wtuser");
        $ubaci = $baza->prepare("insert into komentari (vijest,tekst,autor,email) values(:id,:noviKomentar,:ime,:email)");
        if( $ubaci->execute(array('id'=>$vijest,'noviKomentar'=>$noviKomentar, 'ime'=>$ime, 'email'=>$emailTemp))){
    
           echo "uspjesno!";
        }
        else echo 'Neeee';
    
    
        //header("Location: novosti.html");
    }
    catch(PDOException $e){
    
       echo 'ERROR'.$e->getMessage();
    }
    
       
    
?>

