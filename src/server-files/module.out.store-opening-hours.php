<!-- *******************************************************
STORE Opening Hours - Output
******************************************************** -->
<?php

    $templateBE = '';
    $templateFE = '';

    $template = '';

    // Language suffix
    $languageSuffix = '';
    if (rex_clang::getCurrentId() == 2) {
        $languageSuffix = 'en';
    }else{
        $languageSuffix = 'de'; 
    }

    // TODO add a addon class where holidays are stored (static data, can be lateron changed to a server to server api call)
    // Source from https://feiertage-api.de/api/?jahr=2016&nur_land=NW
    $json = file_get_contents('resources/json/holidays.json');
    $stateName = rex::getProperty('stateName');

    $time = date('i') >= 30 ? date('H')+0.5 : date('H');
    $day = date('D');
    $date = date('Y-m-d');
    $year = date('Y');

    //echo  $stateName.' '.$year;

/*

"BE": {
        "2018": {
            "Neujahrstag": {
                "datum": "2018-01-01",
                "hinweis": ""
            },
            "Karfreitag": {
                "datum": "2018-03-30",
                "hinweis": ""
            },

*/

    echo '<br>';
    $file = json_decode($json, TRUE);
    foreach($file as $key => $value){
//        echo $key.' - '.$value['2018'].'<br>';
        foreach($value['2018'] as $key => $value){
             echo $key.' - '.$value['datum'].'<br>';
        }
        //echo $key.' '.$value['2018'].'<br>';
    }
    
    $jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($json, TRUE)), RecursiveIteratorIterator::SELF_FIRST);

    foreach ($jsonIterator as $key => $val) {
        if(is_array($val)) { // objects / lists
            //echo "$key:*\n";
        } else { // key / value
            //echo "$key =+> $val\n";
        }
    }

    $hours = array(
            '0'=>' ',
            '48'=>'00:00','1'=>'00:30',
            '2'=>'01:00','3'=>'01:30',
            '4'=>'02:00','5'=>'02:30',
            '6'=>'03:00','7'=>'03:30',
            '8'=>'04:00','9'=>'04:30',
            '10'=>'05:00','11'=>'05:30',
            '12'=>'06:00','13'=>'06:30',
            '14'=>'07:00','15'=>'07:30',
            '16'=>'08:00','17'=>'08:30',
            '18'=>'09:00','19'=>'09:30',
            '20'=>'10:00','21'=>'10:30',
            '22'=>'11:00','23'=>'11:30',
            '24'=>'12:00','25'=>'12:30',
            '26'=>'13:00','27'=>'13:30',
            '28'=>'14:00','29'=>'14:30',
            '30'=>'15:00','31'=>'15:30',
            '32'=>'16:00','33'=>'16:30',
            '34'=>'17:00','35'=>'17:30',
            '36'=>'18:00','37'=>'18:30',
            '38'=>'19:00','39'=>'19:30',
            '40'=>'20:00','41'=>'20:30',
            '42'=>'21:00','43'=>'21:30',
            '44'=>'22:00','45'=>'22:30',
            '46'=>'23:00','47'=>'23:30'
        );
    
    $days = array('de'=>array('Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'), 'en'=>array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'));

    $a = 0;
    $b = 0;
    $c = 0;
    $d = 0;

    $e = 0;
    $f = 0;
    $g = 0;
    $h = 0;

    foreach($days[$languageSuffix] as $value){

        $i = 0;
        $j = 0;
        $templateTmp = '';
        $isSat = 0;

        if($value != 'Sa' && $value != 'Sat'){

            if(REX_VALUE[2] != '0'){
                $aList = explode(":", $hours[REX_VALUE[2]]);
                if($aList[1] == '30'){
                    $aList[1] = '50';  
                }
                $a = floatval($aList[0].'.'.$aList[1]);

                $templateTmp .= $hours[REX_VALUE[2]];
                $i += 1;
            }

            if(REX_VALUE[3] != '0'){
                $bList = explode(":", $hours[REX_VALUE[3]]);
                if($bList[1] == '30'){
                    $bList[1] = '50';  
                }
                $b = floatval($bList[0].'.'.$bList[1]);

                $templateTmp .= '-'.$hours[REX_VALUE[3]];
                $i += 1;
            }

            if(REX_VALUE[4] != '0'){
                $cList = explode(":", $hours[REX_VALUE[4]]);
                if($cList[1] == '30'){
                    $cList[1] = '50';  
                }
                $c = floatval($cList[0].'.'.$cList[1]);

                $templateTmp .= ' &mdash; '.$hours[REX_VALUE[4]];
                $j += 1;
            }

            if(REX_VALUE[5] != '0'){
                $dList = explode(":", $hours[REX_VALUE[5]]);
                if($dList[1] == '30'){
                    $dList[1] = '50';  
                }
                $d = floatval($dList[0].'.'.$dList[1]);

                $templateTmp .= '-'.$hours[REX_VALUE[5]];
                $j += 1;
            }
            
        }else{
            
            if(REX_VALUE[6] != '0'){
                $eList = explode(":", $hours[REX_VALUE[6]]);
                if($eList[1] == '30'){
                    $eList[1] = '50';  
                }
                $e = floatval($eList[0].'.'.$eList[1]);

                $templateTmp .= $hours[REX_VALUE[6]];
                $i += 1;
                $isSat += 1;
            }

            if(REX_VALUE[7] != '0'){
                $fList = explode(":", $hours[REX_VALUE[7]]);
                if($fList[1] == '30'){
                    $fList[1] = '50';  
                }
                $f = floatval($fList[0].'.'.$fList[1]);

                $templateTmp .= '-'.$hours[REX_VALUE[7]];
                $i += 1;
                $isSat += 1;
            }

            if(REX_VALUE[8] != '0'){
                $gList = explode(":", $hours[REX_VALUE[8]]);
                if($gList[1] == '30'){
                    $gList[1] = '50';  
                }
                $g = floatval($cList[0].'.'.$gList[1]);

                $templateTmp .= ' &mdash; '.$hours[REX_VALUE[8]];
                $j += 1;
                $isSat += 1;
            }

            if(REX_VALUE[9] != '0'){
                $hList = explode(":", $hours[REX_VALUE[9]]);
                if($hList[1] == '30'){
                    $hList[1] = '50';  
                }
                $h = floatval($hList[0].'.'.$hList[1]);

                $templateTmp .= '-'.$hours[REX_VALUE[9]];
                $j += 1;
                $isSat += 1;
            }
        }
        
        // 1 1 = a bis d
        // 2 2 = a bis b und c bis d
        // 0-2 = c bis d
        // 2-0 = a bis b
        
        $openingStatus = array('de'=>array('geöffnet', 'geschlossen', 'schließt'), 'en'=>array('open', 'closed', 'closing'));
        $openingStatusStr = "";
        $class = '';
        
        $k = 0;
        foreach($days['en'] as $valueSub){ 
            if($valueSub == $day){
                if($days[$languageSuffix][$k] == $value){
                    // Set a marker for the html row with the current day 
                    $class = 'class="current-day"';  
                    // Create an opening status for the current day
                    if($i == 1 && $j == 1){
                        if($time >= $a && $time < $d){
                            if($d - $time <= 0.5 && $d - $time > 0){
                                $openingStatusStr = $openingStatus[$languageSuffix][2];
                            }else{
                                $openingStatusStr = $openingStatus[$languageSuffix][0];
                            }
                        }else{
                            $openingStatusStr = $openingStatus[$languageSuffix][1];
                        }
                    }elseif($i == 2 && $j == 2){
                        if(($time >= $a && $time < $b) || ($time >= $c && $time < $d)){
                            if(($b - $time <= 0.5 && $b - $time > 0) || ($d - $time <= 0.5 && $d - $time > 0)){
                                $openingStatusStr = $openingStatus[$languageSuffix][2];
                            }else{
                                $openingStatusStr = $openingStatus[$languageSuffix][0];
                            }
                        }else{
                            $openingStatusStr = $openingStatus[$languageSuffix][1];
                        }

                    }elseif($i == 2 && $j == 0){
                        if($time >= $a && $time < $b){
                            if($b - $time <= 0.5 && $b - $time > 0){
                                $openingStatusStr = $openingStatus[$languageSuffix][2];
                            }else{
                                $openingStatusStr = $openingStatus[$languageSuffix][0];
                            }
                        }else{
                            $openingStatusStr = $openingStatus[$languageSuffix][1];
                        }
                    }elseif($i == 0 && $j == 2){
                        if($time >= $c && $time < $d){
                            if($d - $time <= 0.5 && $d - $time > 0){
                                $openingStatusStr = $openingStatus[$languageSuffix][2];
                            }else{
                                $openingStatusStr = $openingStatus[$languageSuffix][0];
                            }
                        }else{
                            $openingStatusStr = $openingStatus[$languageSuffix][1];
                        }
                    }
                }
            }
            $k++;
        }

        if(($value != 'Sa' && $value != 'Sat')||(($value == 'Sa' || $value == 'Sat') && $isSat > 0)){
            $template .= '<p '.$class.'><b>'.$value.'</b>';
            if($openingStatusStr != ''){
                $badgeClass = '';
                $l = 0;
                foreach($openingStatus[$languageSuffix] as $colorValue){
                    if($colorValue == $openingStatusStr){
                        $badgeClass = $openingStatus['en'][$l];
                    }
                    $l++;
                }
                $template .= $templateTmp.' <span class="badge '.$badgeClass.'">'.$openingStatusStr.'</span>' ;
            }else{
                 $template .= $templateTmp;
            }
            $template .= '</p>';
        }
        
    }

    $templateBE .= '<div>';
    $templateBE .= 'REX_VALUE[id=10" isset="1"]' ? '<h3>'. REX_VALUE[10].'</h3>' : '' ;
    $templateBE .= $template;
    $templateBE .= '</div>';

    $templateFE .= '<div class="store-address opening-hours">';
    $templateFE .= 'REX_VALUE[id=10" isset="1"]' ? '<h3>'. REX_VALUE[10].'</h3>' : '' ;
    $templateFE .= $template; // '.$time.' '.$day.' '.$date;
    $templateFE .= '</div>';


    if (rex::isBackend()) {

        echo $templateBE;

    } else {
        
        echo $templateFE;
    }

?>
