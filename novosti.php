

            <!-- content -->
            <div id="content">
                <!-- your text goes here -->
                <div id="main">
                    <div class="novosti">
                        <?php
                            $sveNovosti = glob("novosti/*.txt");
                            
                            $novosti = array();
                            
                            foreach($sveNovosti as $novost){
                            
                                array_push($novosti,file($novost));           
                            }
                            
                            foreach($novosti as $temp){
                            
                                $sadrzaj = $temp;
                                $dateTime = trim($sadrzaj[0]);
                                $imeAutora = trim($sadrzaj[1]);
                                $naslovNovosti = trim(ucfirst(strtolower($sadrzaj[2])));
                                $slika = $sadrzaj[3];
                                $opisNovosti = "";
                                $detaljniOpisNovosti = "";
                                $detaljnije = "";
                                $imaDetaljno = 0;
                                for($i = 4; $i< count($sadrzaj); $i++){
                            
                                    if($sadrzaj[$i] === "--\r\n"){
                                        $imaDetaljno = 1;
                                        continue;
                                    }
                                    else if(!$imaDetaljno) {
                                        $opisNovosti .= trim($sadrzaj[$i]);
                                    }
                                    if($imaDetaljno){
                                        $detaljniOpisNovosti .= trim($sadrzaj[$i]);
                                    }
                            
                                }
                                if($imaDetaljno){
                                 $datum = encodeURIComponent($dateTime);
                                 $autor = encodeURIComponent($imeAutora);
                                 $naslov = encodeURIComponent($naslovNovosti);
                                 $slicica = encodeURIComponent($slika);
                                 $opis = encodeURIComponent($opisNovosti);
                                 $detaljno = encodeURIComponent($detaljniOpisNovosti);
                                 $detaljnije = "<input type='button' value='detaljnije' onclick=\"fetchPage('detaljnije.php?dateTime=$datum&autor=$autor&naslov=$naslov&opis=$opis&detaljno=$detaljno&slika=$slicica');\">";
                                }
                               
                               echo ' <div class="novost">
                                    <div class="naslov_vijesti">
                                        <h3>'.$naslovNovosti.'</h3>
                                    </div>
                                    <div class="datum_objave">
                                    <p>Autor:'.$imeAutora.'</p>
                                    <p>Datum objave:'.$dateTime.'</p>
                                    </div>
                                    <div class="tekst_novosti">
                                        <p><img alt="" src='.$slika.' class="slika" />'.$opisNovosti.'
                                        </p>
                                    </div>
                                    <div class="detaljnije">'.$detaljnije.'</div>
                                </div> ';
                             }

                             function encodeURIComponent($str) {
                                $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
                                return strtr(rawurlencode($str), $revert);
}
                        ?>
                    </div>
                </div>
            </div>
