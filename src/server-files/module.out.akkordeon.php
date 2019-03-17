<?php
    if (rex::isBackend()) {
        
        if ('REX_VALUE[id=2 isset=1]') {
            $listType = ['1'=>'Akkordeon', '2'=>'Tab'];
            $listSelected = ['1'=>'Nein', '2'=>'Ja'];
            echo '<div class="panel panel-default"><header class="panel-heading collapsed"><div class="panel-title">Typ: '.$listType[REX_VALUE[2]].', ausgwählter Bereich: '.$listSelected[REX_VALUE[5]].'</div></header></div>';
        }

        if ('REX_VALUE[id=3 isset=1]') {
            echo '<h2>REX_VALUE[3]</h2>';
        }

        if ("REX_MEDIA[1]" != '') {
            $media = rex_media::get("REX_MEDIA[1]");
            if ($media instanceof rex_media) {
                $mediatitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
                $img = '<p><img class="content" src="index.php?rex_media_type=content&rex_media_file=REX_MEDIA[1]" alt="'.$mediatitle.'"></p>';
            }
            
            echo $img;
        }

        if ('REX_VALUE[id=4 isset=1]') {
            echo '<p>REX_VALUE[4]</p>';
        }

    } 
?>