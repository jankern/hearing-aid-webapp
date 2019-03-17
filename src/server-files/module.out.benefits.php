<!-- *******************************************************
VORTEILE BANNER - Output
******************************************************** -->
<?php

    $templateBE = '';
    $templateFE = '';
    $templateFESlide = '';
    
    if("REX_MEDIALIST[id=1 isset=1]"){
        $templateFESlide .= '<div class="logo-stepper-container" style="width:100%; height:100px; position:relative; overflow:hidden;">
            <div class="logo-stepper">';
        
        $mediaList = [];
        $mediaList = explode(',',REX_MEDIALIST[1]);
        
        // Language suffix
        $languageSuffix = '';
        if (rex_clang::getCurrentId() == 2) {
          $languageSuffix = '_en';
        }

        foreach($mediaList as $picture){
            
            $media = rex_media::get($picture);
            if ($media instanceof rex_media) {
                $mediaTitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
                $mediaLinkText = $media->getValue('med_gallery_link_text') != '' ? str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_gallery_link_text')).$languageSuffix : '';
                $mediaLink = $media->getValue('med_gallery_link') != '' ? str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_gallery_link')) : '';
                
                $templateBE .= '<img class="content" src="index.php?rex_media_type=default&rex_media_file='.$picture.'" alt="'.$mediaLinkText.'">
                <div>'.$mediaLink.'</div>'; 

                $templateFESlide .= '<a href="'.$mediaLink.'" title="'.$mediaLinkText.'" target="_blank"><!--img style="width:280px;" class="content" src="index.php?rex_media_type=default&rex_media_file='.$picture.'" alt="'.$mediaLinkText.'"--></a>';
            }
            
        }

        $templateFESlide .= '</div></div>';
    }

    $templateFE .= '<div class="container-fluid benefits">';
    $templateFE .= '<h1>'.REX_VALUE[20].'</h1>';
    $templateFE .= '<div class="centered">';
    $templateFE .= '<div class="row">';

    if("REX_VALUE[id=2 isset=1]"){
        $templateFE .= '<div class="col s4">';
        $templateFE .= '<i class="material-icons">'.REX_VALUE[1].'</i>';
        $templateFE .= '<h3>'.REX_VALUE[2].'</h3>';
        if("REX_VALUE[id=3 isset=1]"){
            $textile = markitup::parseOutput('textile', REX_VALUE[3]);
            $templateFE .= '<p>'.$textile.'</p>';
        }
        $templateFE .= '</div>';
    }

    if("REX_VALUE[id=5 isset=1]"){
        $templateFE .= '<div class="col s4">';
        $templateFE .= '<i class="material-icons">'.REX_VALUE[4].'</i>';
        $templateFE .= '<h3>'.REX_VALUE[5].'</h3>';
        if("REX_VALUE[id=6 isset=1]"){
            $textile = markitup::parseOutput('textile', REX_VALUE[6]);
            $templateFE .= '<p>'.$textile.'</p>';
        }
        $templateFE .= '</div>';
    }

    if("REX_VALUE[id=8 isset=1]"){
        $templateFE .= '<div class="col s4">';
        $templateFE .= '<i class="material-icons">'.REX_VALUE[7].'</i>';
        $templateFE .= '<h3>'.REX_VALUE[8].'</h3>';
        if("REX_VALUE[id=9 isset=1]"){
            $textile = markitup::parseOutput('textile', REX_VALUE[9]);
            $templateFE .= '<p>'.$textile.'</p>';
        }
        $templateFE .= '</div>';
    }

    $templateFE .= '</div>';

    $columnCount= 0;
    $columnWidth = array(4=>12, 8=>6, 12=>4);

    if("REX_VALUE[11]" != ''){ $columnCount += 4;}
    if("REX_VALUE[14]" != ''){ $columnCount += 4;}
    if("REX_VALUE[17]" != ''){ $columnCount += 4;}

    $padding = '';
    if($columnCount < 12){
        $padding = 'padding-40';
    }

    if($columnCount > 0){
        $templateFE .= '<div class="row">';
        
        if("REX_VALUE[11]" != ''){
            $templateFE .= '<div class="col s'.$columnWidth[$columnCount].' '.$padding.'">';
            $templateFE .= '<i class="material-icons">'.REX_VALUE[10].'</i>';
            $templateFE .= '<h3>'.REX_VALUE[11].'</h3>';
            if("REX_VALUE[id=12 isset=1]"){
                $textile = markitup::parseOutput('textile', REX_VALUE[12]);
                $templateFE .= '<p>'.$textile.'</p>';
            }
            $templateFE .= '</div>';
        }
        
        if("REX_VALUE[14]" != ''){
            $templateFE .= '<div class="col s'.$columnWidth[$columnCount].' '.$padding.'">';
            $templateFE .= '<i class="material-icons">'.REX_VALUE[13].'</i>';
            $templateFE .= '<h3>'.REX_VALUE[14].'</h3>';
            if("REX_VALUE[id=15 isset=1]"){
                $textile = markitup::parseOutput('textile', REX_VALUE[15]);
                $templateFE .= '<p>'.$textile.'</p>';
            }
            $templateFE .= '</div>';
        }
        
        if("REX_VALUE[17]" != ''){
            $templateFE .= '<div class="col s'.$columnWidth[$columnCount].' '.$padding.'">';
            $templateFE .= '<i class="material-icons">'.REX_VALUE[16].'</i>';
            $templateFE .= '<h3>'.REX_VALUE[17].'</h3>';
            if("REX_VALUE[id=18 isset=1]"){
                $textile = markitup::parseOutput('textile', REX_VALUE[18]);
                $templateFE .= '<p>'.$textile.'</p>';
            }
            $templateFE .= '</div>';
        }
        
        $templateFE .= '</div></div>';
    }

    $templateFE .= $templateFESlide;

    $templateFE .= '</div>';
            
    if (rex::isBackend()) {

        echo $templateBE;

    } else {
        
        echo $templateFE;
    }

?>
