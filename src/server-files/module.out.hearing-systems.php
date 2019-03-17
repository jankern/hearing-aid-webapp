<!-- *******************************************************
Vdeo mit Text - Output
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
               $templateImg = 'style="background:url("index.php?rex_media_type=photos&rex_media_file=REX_MEDIA[1]"'; 
            }else{
               $templateImg = '<img class="content" src="index.php?rex_media_type=cards&rex_media_file=REX_MEDIA[1]" alt="'.$mediatitle.'">'; 
            }
        }
    }

    $templateTitle = '';
    if ('REX_VALUE[id="2" isset="1"]'){
        $templateTitle .= '<h1>'.REX_VALUE[2].'</h1>';
    }

    $templateText = '';
    if ('REX_VALUE[id="3" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[3]);
        $templateText .= '<p>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'</p>';
    }

    $templateVideo = '';
    if ('REX_VALUE[id="4" isset="1"]'){
        
        $pattern = '/v=([^&]+)/';
        $videoId = '';

        if (preg_match($pattern, REX_VALUE[4], $m)){
            $videoId = $m[1];
        }
        
        $templateVideo = '<iframe width="420" height="315" src="https://www.youtube.com/embed/'.$videoId.'" allowfullscreen="allowfullscreen"></iframe>';
    }


    // BE
    
    $templateBE .= '<div>'.$templateImg.'</div>';
    $templateBE .= '<div>'.$templateTitle.'</div>';
    $templateBE .= '<div>'.$templateText.'</div>';
    $templateBE .= '<div>'.$templateVideo.'</div>';

    // FE

    $templateFE .= '<section class="hearing-solution-container" '.$templateImg.'><div class="column-left">'.
        $templateVideo.'</div><div class="column-right">'.$templateTitle.$templateText.'</div></section>'; 

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
