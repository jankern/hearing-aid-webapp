<!-- *******************************************************
Kategorien-Slideshow (Medialink) - Output
******************************************************** -->

<?php

    $templateFE = '';
    $templateFETmp = '';
    $templateBE = '';

    if ("REX_MEDIALIST[1]" != '') {
        
        // List of pictures
        $pictureList = explode(',', "REX_MEDIALIST[1]");
        
        // Show picture as background or as pills in navigation 
        $pictureMode = "REX_VALUE[1]";
        
        // Language suffix
        $languageSuffix = '';
        if (rex_clang::getCurrentId() == 2) {
          $languageSuffix = '_en';
        }
        
        $pictureURLListStartString = '';
        $pictureURLList = '';
        $pictureURLListEndString = '';
        
        // in case picture is shown in navigation pill a placeholder is being created as background
        if($pictureMode == '1'){
            $placeholderPicture = "REX_MEDIA[1]";
            $placeholderMedia = rex_media::get($placeholderPicture);
            if ($placeholderMedia instanceof rex_media) {
                // Media fields
                $placeholderTitle = $placeholderMedia->getValue('title');
                $placeholderDesc = str_replace(array("\r\n", "\n", "\r"), ' ', $placeholderMedia->getValue('med_description' . $languageSuffix));
                $placeholderGalleryTitle = $placeholderMedia->getValue('med_gallery_title'. $languageSuffix);
                $placeholderGalleryLink = $placeholderMedia->getValue('med_gallery_link'. $languageSuffix);
                $placeholderGalleryLinkText = $placeholderMedia->getValue('med_gallery_link_text'. $languageSuffix);
                $placeholderGalleryText = $placeholderMedia->getValue('med_gallery_text'. $languageSuffix);
                $placeholderGalleryInternalLink = $placeholderMedia->getValue('med_gallery_internal_link'. $languageSuffix);
            }
            
            $pictureURLListStartString = 'data-picture-url-list="';
            $pictureURLListEndString = '"';
        }
            
        
        // create gallery picture with info and link url to refernce internal categories
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
                $mediaGalleryInternalLink = $media->getValue('med_gallery_internal_link'. $languageSuffix);
                
                // If cat_type is 2 it means this are collections and hash url have to be generated
                // Get article info
                $selectedArticle = rex_article::get($mediaGalleryInternalLink, $this->getClang());
                $articleName = $selectedArticle->getValue('name');
                
                // Get category info
                $selectedCategoryId = $selectedArticle->getCategoryId();
                $category = rex_category::get($selectedCategoryId, $this->getClang());

                if($category->getValue('cat_nav_target') != '0'){
                    
                    // Generate id for scrollspy
                    $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ");
                    $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-");
                    $name = str_replace($search, $replace, $articleName);
                    $name = strtolower($name);
                    
                    // if category is located to another domain, use the equal named category in the current domain
                    if(substr($category->getURL(), 0, 1) != '/'){
                        $currentCategory = rex_category::getCurrent($this->getClang());                      
                        $childrens = $currentCategory->getChildren();
                        foreach($childrens as $child){
                            if($child->getValue('name') == $category->getValue('name')){
                                $categoryLink = $child->getURL().'#'.$name;
                            }
                        } 
                    }else{
                        $categoryLink = $category->getURL().'#'.$name;
                    }
                    
                }else{
                    // otherwise generate a simple category url
                    $categoryLink = $category->getURL();
                }
                
                // prepare reduced output for backend
                $templateBE .= '<img src="index.php?rex_media_type=rex_medialistbutton_preview&rex_media_file='.$picture.'" alt="'.$mediaTitle.'">';
                $templateBE .= '<h3>'.$mediaGalleryTitle.'</h3>';
                $templateBE .= '<p>'.$mediaGalleryText.'</p>';
                $templateBE .= '<div class="panel-body" style="background: #f3f6fb; word-wrap:break-word;"> '.$articleName.' '.$categoryLink.'</div>';
                
                // prepare slide show for frontend
                if($pictureMode == '2'){    
                    $templateFETmp .= '<li><img src="index.php?rex_media_type=photos&rex_media_file='.$picture.'" alt="'.$mediaTitle.'">';
                }else{
                    $templateFETmp .= '<li><img src="index.php?rex_media_type=photos&rex_media_file='.$placeholderPicture.'" alt="'.$placeholderTitle.'">';
                    $pictureURLList .= 'rex_media_type=photos&rex_media_file='.$picture.';';
                }
                
                // random effect, font slide from left or right
                $effectList = ['left', 'right'];
                $randomEffectId = rand(0, 1);
                
                $templateFETmp .= '<div class="caption '.$effectList[$randomEffectId].'-align">';
                $templateFETmp .= '<h1>'.$mediaGalleryTitle.'</h1>';
                $templateFETmp .= '<h2 class="light text-lighten-3">'.$mediaGalleryText.'</h2>';
                $linkTextTmp = $mediaGalleryLinkText != '' ? $mediaGalleryLinkText : $articleName;
                $templateFETmp .= '<a href="'.$categoryLink.'" class="waves-effect btn">'.$linkTextTmp.'</a></div></li>';
                
            }
            
        }
        
        $pictureURLList = $pictureURLListStartString.$pictureURLList.$pictureURLListEndString;
        
        $templateFE .= '<div class="container-fluid">';
        $templateFE .= '<div class="slider" data-indicators="1" data-picture-mode="'.$pictureMode.'" '.$pictureURLList.'><ul class="slides">';
        $templateFE .= $templateFETmp;
        $templateFE .= '</ul></div>';
        $templateFE .= '</div>';
        
    }

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
