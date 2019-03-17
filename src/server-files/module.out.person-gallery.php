<!-- *******************************************************
Store Personen-Gallerie - Output
******************************************************** -->

<?php

    $templateFE = '';
    $templateBE = '';

    if ("REX_MEDIALIST[1]" != '') {
        
        // List of pictures
        $pictureList = explode(',', "REX_MEDIALIST[1]");
        
        // Gallery title
        $galleryTitle = REX_VALUE[1];
            
        // Language suffix
        $languageSuffix = '';
        if (rex_clang::getCurrentId() == 2) {
          $languageSuffix = '_en';
        }
        
        $templateFE .= REX_VALUE[1] != '' ? '<div class="container-fluid person-galery"><h2>'.REX_VALUE[1].'</h2>' : '<div class="container-fluid person-galery">';
        
        $borderShape = REX_VALUE[2] == '1'?'circle':'';
        $itemPosition =  REX_VALUE[3] == '1'?'left':(REX_VALUE[3] == '2'?'center':'right');
        $templateFE .= '<div class="row" style="text-align:'.$itemPosition.';">'; 
        
        foreach ($pictureList as $picture) {
            $media = rex_media::get($picture);
            if ($media instanceof rex_media) {

                // Media fields
                $mediaDesc = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description' . $languageSuffix));
                $mediaGalleryTitle = $media->getValue('med_gallery_title'. $languageSuffix);
                $mediaGalleryText = $media->getValue('med_gallery_text'. $languageSuffix);
                $mediaGalleryLink = $media->getValue('med_gallery_link'. $languageSuffix);
                $mediaGalleryLinkText = $media->getValue('med_gallery_link_text'. $languageSuffix);
                
                // BE
                $templateBE .= '<div style="margin:0 10px 10px 0; width:246px; float:left;"><img src="index.php?rex_media_type=rex_medialistbutton_preview&rex_media_file='.$picture.'" alt="'.$mediaGalleryText.'">';
                if($mediaGalleryTitle != '') $templateBE .= '<h3>'.$mediaGalleryTitle.'</h3>';
                if($mediaGalleryText != '') $templateBE .= '<p>'.$mediaGalleryText.'</p>';
                if($mediaGalleryLink != '') $templateBE .= '<div class="panel-collapse"><div class="panel-body" style="background: #f3f6fb; word-wrap:break-word;">Link: '.$mediaGalleryLink.'</div></div>';
                $templateBE .= '</div>';
                
                // FE
                $templateFE .= '<div class="gallery-item" style="width:300px; display:inline-block; text-align:center; clear:both;">';
                $templateFE .= '<img class="'.$borderShape.' responsive-img" src="index.php?rex_media_type=rex_mediabutton_preview&rex_media_file='.$picture.'" alt="'.$mediaGalleryText.'">';
                if($mediaGalleryTitle != '') $templateFE .= '<h3>'.$mediaGalleryTitle.'</h3>';
                if($mediaGalleryText != '') $templateFE .= '<p>'.$mediaGalleryText.'</p></div>';
                if($mediaGalleryLink != ""){
                    if($mediaGalleryLinkText == "") $mediaGalleryLinkText = "Mehr";
                    $templateFE .= '<div style="width:300px; display:inline-block; text-align:center; clear:both;"><a href="'.$mediaGalleryLink.'" class="waves-effect btn modal-trigger">'.$mediaGalleryLinkText.'</a></div>';
                }
            }
            
        }
        
        $templateFE .= '</div></div>';
        
    }

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
