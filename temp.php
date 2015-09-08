<?php

#echo $listaNovosti;
        $promjena=true;
        $listaNovosti = '';
        $fajloviNovosti = glob("novosti/*.txt");
    
        $niz = array();
        foreach ($fajloviNovosti as $fajl)
        {
                $sadrzajFajla = file($fajl);
            array_push($niz, $sadrzajFajla);
    
        }
    //var_dump($niz);
    
    
    function sortFunction( $a, $b ) {
    
            $date1=explode('.', $a[0]);
            $date1[3]=trim($date1[3]);
            $date2=explode('.', $b[0]);
            $date2[3]=trim($date2[3]);
            if($date1[2]==$date2[2])
            {
                    if($date1[1]==$date2[1])
                    {
                            if($date1[0]==$date2[0])
                            {
                                    if($date1[3]==$date2[3])
                                    {
                                            return 1;
                                    }
                                    else if($date1[3]<$date2[3])
                                    {
                                            return 1;
                                    }
                                    else return -1;
                            }
                            else if($date1[0]<$date2[0])
                            {
                                    return 1;
                            }
                            else return -1;
    
                    }
                    else if($date1[1]<$date2[1])
                    {
                            return 1;
                    }
                    else return -1;
            }
    
    
            }
    
            for($i=0;$i<count($fajloviNovosti)-1;$i++)
            {
                    for($j=0;$j<count($fajloviNovosti)-1;$j++)
                    {
                            if(sortFunction($niz[$j],$niz[$j+1])==1)
                            {
                            $v = $niz[$j + 1];
                            $niz[$j + 1] = $niz[$j];
                            $niz[$j] = $v;
                            $v = $fajloviNovosti[$j + 1];
                            $fajloviNovosti[$j + 1] = $fajloviNovosti[$j];
                            $fajloviNovosti[$j] = $v;
    
                            }
    
                    }
    
    
    
            }
    
         $brojac=true;
        foreach ($fajloviNovosti as $file)
        {
            if($brojac==false)
            {
                    $brojac=true;
                    continue;
            }
            $opsirnije="";
                $content = file($file);
                $opisNovosti = "";
                $detaljanOpisNovosti = "";
                $bool = false;
    
                for($i = 4; $i < count($content); $i++)
                {
                        if($content[$i] === "--\r\n")
                        {
                                $bool = true;
                                continue;
                        }
    
                        if($bool == false)
                        {
                                $opisNovosti .= trim($content[$i]);
                        }
                        else if ($bool == true)
                        {
                                $detaljanOpisNovosti .= trim($content[$i]);
                        }
                }
                //varijable
                $dateTime = "";
                $autorNovosti = "";
                $naslovNovosti = "";
                $slikaNovosti = "";
                //popunjavanje varijabli if fajla
                $dateTime = trim($content[0]);
                $autorNovosti = trim($content[1]);
                $naslovNovosti = trim(ucfirst(strtolower($content[2])));
                $slikaNovosti = trim($content[3]);
    
                if($bool == true)//ima detaljan
                {
                    $opsirnije = "<a onclick=\"loadPage('detaljanprikaz.php?dateTime=$dateTime&autor=$autorNovosti&naslov=$naslovNovosti&opis=$opisNovosti&detOpis=$detaljanOpisNovosti&slika=$slikaNovosti');\" >Opsirnije...</a>";
    
                }
    
                echo '<div class = "Ponuda">
                        <h1> '.$naslovNovosti. '<span>(by '.$autorNovosti.')</span></h1>
                        <img src = "'.$slikaNovosti.'" alt="Smiley face">
                    <div class="ukratko">
                    <p>'.$opisNovosti.'</p>
                    <h3>15 KM</h3>
                    <div class="kupi"><a >Kupi</a></div>
                    <div class="detaljnije">'.$opsirnije.'</div>
                    </div>
                    <div><p id="datumObjave">Datum objave: '.$dateTime.'</p></div>
    
                    <div class="cleaner">&nbsp;</div>
    
                        </div>';
    
                    if($promjena==true)
                    {
                            //echo '<div class="cleaner_with_width">&nbsp;</div>';
                            $promjena=false;
    
                    }
                    else
                    {
                            //echo '<div class="cleaner_with_height">&nbsp;</div>';
                            $promjena=true;
                    }
    
    
                    $brojac=false;
        }
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
