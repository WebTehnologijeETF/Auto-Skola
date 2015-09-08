<?php
    
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $email = $_POST["email"];
        $broj = $_POST["broj"];
        $poruka = $_POST["poruka"];
    
        require 'PHPMailer/PHPMailerAutoload.php';
    
        $mail = new PHPMailer;    
        $mail->isSMTP();
        $mail->Host = 'smtp.live.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'auto_skola_iris@hotmail.com';
        $mail->Password = 'AutoSkolaIris';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->addReplyTo($email, $ime);  
        $mail->From = 'auto_skola_iris@hotmail.com';
        $mail->FromName = 'Auto Skola IRIS';
        $mail->addAddress('auto_skola_iris@hotmail.com', 'Auto Skola IRIS');             
        $mail->WordWrap = 50;
        $mail->isHTML(false);    
        $mail->Subject = 'Poruka';
        $mail->Body  = "Ime: ".$ime."\n"."Prezime: ".$prezime."\n"."Email: ".$email."\n"."Broj: ".$broj."\n"."Poruka: ".$poruka;
    
        if(!$mail->send()) {
           echo 'Nije moguće poslati poruku.';
           echo 'Detaljnije o grešci:' . $mail->ErrorInfo;
           echo ' <br>';
           echo '<a href="index.php">Povratak na početnu stranicu.</a>';
           exit;
        }
    
        echo 'Zahvaljujemo se što ste nas kontaktirali';
        echo '<a href="index.php">Povratak na početnu stranicu.</a>';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>

    </body>
</html>
