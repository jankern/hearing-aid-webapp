<!-- *******************************************************
Store-Teaser - Output
******************************************************** -->

<?php

    $templateBE = '';
    $templateFE = '';

    $article = rex_article::get(REX_ARTICLE_ID, $this->getClang());

    $templateImg = '';
    if ('REX_MEDIA[id="1" isset="1"]'){
        $media = rex_media::get("REX_MEDIA[1]");
        if ($media instanceof rex_media) {
            $mediatitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
            if(!rex::isBackend()){
               $templateImg = '<img class="content" src="index.php?rex_media_type=cards&rex_media_file=REX_MEDIA[1]" alt="'.$mediatitle.'">'; 
            }else{
               $templateImg = '<img class="content" src="index.php?rex_media_type=cards&rex_media_file=REX_MEDIA[1]" alt="'.$mediatitle.'">'; 
            }
        }
    }

    $templateTitle = '';
    if ('REX_VALUE[id="1" isset="1"]'){
        $templateTitle .= '<h1>'.REX_VALUE[1].'</h1>';
    }

    $templateTitleText = '';
    if ('REX_VALUE[id="2" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[2]);
        $templateTitleText = '<p>'.str_replace(array('<i>', '</i>'), array('<span>', '</span>'), $textile).'</p>';
    }

    $templateText = '';
    if ('REX_VALUE[id="3" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[3]);
        $templateText .= '<p>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'</p>';
    }

    $templateNumber = '';
    if ('REX_VALUE[id="4" isset="1"]'){
        $templateNumber = '<i class="material-icons inverse">local_phone</i><p>'.REX_VALUE[4].'</p><br>';
    }

    $templateAddress = '';
    if ('REX_VALUE[id="5" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[5]);
        $templateAddress .= '<i class="material-icons inverse">location_on</i><p>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'</p><br>';
    }

    $templateBussinessHours = '';
    if ('REX_VALUE[id="6" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[6]);
        $templateBussinessHours .= '<i class="material-icons inverse">access_time</i><p>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'</p>';
    }

    $templateUrl = '';
    if ('REX_VALUE[id="7" isset="1"]'){
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $templateUrl = $protocol.REX_VALUE[7].'/store';
    }else{
        $templateUrl = '#';
    }

    // BE
    
    $templateBE .= '<div>'.$templateImg.'</div>';
    $templateBE .= '<div>'.$templateTitle.'</div>';
    $templateBE .= '<div>'.$templateTitleText.'</div>';
    $templateBE .= '<div>'.$templateText.'</div>';
    $templateBE .= '<div>'.$templateNumber.'</div>';
    $templateBE .= '<div>'.$templateAddress.'</div>';
    $templateBE .= '<div>'.$templateBussinessHours.'</div>';
    $templateBE .= '<div>'.$templateUrl.'</div>';

    // FE

    $templateFE .= '<div class="card">
        <div class="card-image">
          '.$templateImg.'
        </div>
        <div class="card-content">
          '.$templateTitle.'
          '.$templateNumber.'
          '.$templateAddress.'
          '.$templateBussinessHours.'
        </div>
        <div class="card-action">
          <a href="'.$templateUrl.'" target="_blank" class="waves-effect btn">Zum Store</a>
        </div>
    </div>';

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
