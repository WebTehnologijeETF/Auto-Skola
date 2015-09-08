<?php
   
                require('sendgrid-php/sendgrid-php.php');
                ini_set('display_errors', 'On');
                error_reporting(E_ALL);
                if($_POST)
                    {
    
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $email = $_POST['email'];
                    $poruka = $_POST['poruka'];
                   
                    $eol = PHP_EOL;
                    $message = "Ime i prezime : " .$ime." ".$prezime."\r\n"."Email : ".$email."\r\n Poruka : ".$poruka;
    
                       // $service_plan_id = "sendgrid"; 
                        $sendgrid = new SendGrid('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');
                        $Email    = new SendGrid\Email();
                        $Email->addTo("auto_skola_iris@hotmail.com")
                                    ->addCc("kmahmutovi1@etf.unsa.ba")
                                    ->setReplyTo($email)
                                    ->setFrom($email)
                                    ->setSubject("Poruka sa stranice")
                                    ->setText($message);
                        try
                        {
                        $sendgrid->send($Email);


                        $obavjestenje = "Uspjesno ste poslali mejl!";
                        echo "<script type='text/javascript'>alert('$obavjestenje');
                        window.location = \"index.php\";
                        </script>";
                        }
                        catch (\SendGrid\Exception $e)
                        {
                                echo $e->getCode();
                            foreach($e->getErrors() as $er) {
                                echo $er;
                            }
                        }
    
    
                            }
?>