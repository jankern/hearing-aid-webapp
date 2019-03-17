<!-- *******************************************************
SLIDESHOW MIT PANORAMA-MODAL - Output
******************************************************** -->

<?php

    $templateFE = '';
    $templateBE = '';

    if ("REX_MEDIALIST[1]" != '') {
        
        // List of pictures
        $pictureList = explode(',', "REX_MEDIALIST[1]");
        
        // Navigation to display
        $hasIndicators = "REX_VALUE[1]" == '1'?true:false;
        
        // Link to display
        $hasLink = "REX_VALUE[2]" == '1'?true:false;
            
        // Language suffix
        $languageSuffix = '';
        if (rex_clang::getCurrentId() == 2) {
          $languageSuffix = '_en';
        }
        
        $templateFE .= '<div class="slider" data-indicators="'.$hasIndicators.'"><ul class="slides">';
        
        foreach ($pictureList as $picture) {
            $media = rex_media::get($picture);
            if ($media instanceof rex_media) {

                // Media fields
                $mediaTitle = $media->getValue('title');
                $mediaDesc = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description' . $languageSuffix));
                $mediaGalleryTitle = $media->getValue('med_gallery_title'. $languageSuffix);
                $mediaGalleryLink = $media->getValue('med_gallery_link'. $languageSuffix);
                $mediaGalleryLinkText = $media->getValue('med_gallery_link_text'. $languageSuffix);
                $mediaGalleryText = $media->getValue('med_gallery_text'. $languageSuffix);
                
                $templateBE .= '<img src="index.php?rex_media_type=rex_medialistbutton_preview&rex_media_file='.$picture.'" alt="'.$mediaTitle.'">';
                
                $templateBE .= '<h3>'.$mediaGalleryTitle.'</h3>';
                $templateBE .= '<p>'.$mediaGalleryText.'</p>';
                
                $templateFE .= '<li><img src="index.php?rex_media_type=photos&rex_media_file='.$picture.'" alt="'.$mediaTitle.'">';
                $templateFE .= '<div class="caption center-align">';
                $templateFE .= '<h3>'.$mediaGalleryTitle.'</h3>';
                $templateFE .= '<h5 class="light grey-text text-lighten-3">'.$mediaGalleryText.'</h5></div></li>';
                
            }
            
        }
        
        if($hasLink) $templateBE .= '<div class="panel-collapse"><div class="panel-body" style="background: #f3f6fb; word-wrap:break-word;"><b>Panorama-Link:</b> REX_VALUE[3]</div></div>';
        
        $templateFE .= '</ul>';
        if($hasLink){
            $templateFE .= '<div><a class="waves-effect btn modal-trigger" id="panorama-btn" href="#panorama"><i class="material-icons">panorama</i>Store-Panorama</a></div></div>';
            $templateFE .= '<div id="panorama" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <iframe src="REX_VALUE[3]"></iframe>
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-action modal-close waves-effect btn-flat">Schließen</a>
                </div>
              </div>';
        }else{
            $templateFE .= '</div>';
        }
        
    }

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
