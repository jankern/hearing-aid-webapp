<!-- *******************************************************
Store Activity - Output
******************************************************** -->

<?php


    $templateBE = '';
    $templateFE = '';

    // Language suffix
    $languageSuffix = '';
    if (rex_clang::getCurrentId() == 2) {
      $languageSuffix = '_en';
    }

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    $select = array('1'=>' ', '2'=>'Neu');

    $templateHeader = '';
    if ('REX_VALUE[id="2" isset="1"]'){
        $templateHeader .= '<h2>'.REX_VALUE[2].'</h2>';
    }

    $templateHeaderPicture = '';
    if ('REX_MEDIA[id="1" isset="1"]'){    
        $media = rex_media::get(REX_MEDIA[1]);
        if ($media instanceof rex_media) {
            // Media field
            $media_type = rex::isBackend() ? 'headline' : 'headline' ;
            $medDescription = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description' . $languageSuffix));
            $templateHeaderPicture .= '<img src="index.php?rex_media_type='.$media_type.'&rex_media_file='.REX_MEDIA[1].'" alt="'.$medDescription.'">';
        }
    }
       
    $templateSubject1 = "";
    if('REX_VALUE[id="3" isset="1"]'){
        if('REX_LINK[id="1" isset="1"]'){
            
            $navLink = '';
            $linkArticle = rex_article::get(intval(REX_LINK[1]));
            $parentCategory = $linkArticle->getCategory();
            $sourceCategoryTarget = $parentCategory->getValue('cat_nav_target');

            $currentCategory = rex_category::getCurrent();
            $currentParentCategory = $currentCategory->getParent();
            $currentChildCategories = $currentParentCategory->getChildren();

            foreach($currentChildCategories as $cat){
                if($cat->getValue('cat_nav_target') == $sourceCategoryTarget){    
                    $navCategoryPath = explode ( "/" , $cat->getUrl());
                    $navCategoryId = $navCategoryPath[sizeof($navCategoryPath)-2];

                    $navArticlePath = explode ( "/" , $linkArticle->getUrl());
                    $navArticleId = $navArticlePath[sizeof($navArticlePath)-2];
                    $navLink = $protocol.rex_yrewrite::getCurrentDomain().'/'.$navCategoryId.'/#'.$navArticleId;
                }
            }

            $templateSubject1 .= '<a href="'.$navLink.'" class="collection-item">'.REX_VALUE[3];
            if('REX_VALUE[id="4" isset="1"]' && 'REX_VALUE[4]' != '1'){
                $templateSubject1 .= '<span class="badge orange">'.$select[REX_VALUE[4]].'</span>';
            }
            $templateSubject1 .= '<i class="material-icons">info</i></a>';
        }else{
            $templateSubject1 .= '<p class="collection-item">'.REX_VALUE[3];
            if('REX_VALUE[id="4" isset="1"]' && 'REX_VALUE[4]' != '1'){
                $templateSubject1 .= '<span class="badge orange">'.$select[REX_VALUE[4]].'</span>';
            }
            $templateSubject1 .= '</p>';
        } 
    }else{
        $templateSubject1 .= '<p class="collection-item">&nbsp;</p>';
    }

    $templateSubject2 = "";
    if('REX_VALUE[id="5" isset="1"]'){
        if('REX_LINK[id="2" isset="1"]'){
            
            $navLink = '';
            $linkArticle = rex_article::get(intval(REX_LINK[2]));
            $parentCategory = $linkArticle->getCategory();
            $sourceCategoryTarget = $parentCategory->getValue('cat_nav_target');

            $currentCategory = rex_category::getCurrent();
            $currentParentCategory = $currentCategory->getParent();
            $currentChildCategories = $currentParentCategory->getChildren();

            foreach($currentChildCategories as $cat){
                if($cat->getValue('cat_nav_target') == $sourceCategoryTarget){    
                    $navCategoryPath = explode ( "/" , $cat->getUrl());
                    $navCategoryId = $navCategoryPath[sizeof($navCategoryPath)-2];

                    $navArticlePath = explode ( "/" , $linkArticle->getUrl());
                    $navArticleId = $navArticlePath[sizeof($navArticlePath)-2];
                    $navLink = $protocol.rex_yrewrite::getCurrentDomain().'/'.$navCategoryId.'/#'.$navArticleId;
                }
            }
            
            $templateSubject2 .= '<a href="'.$navLink.'" class="collection-item">'.REX_VALUE[5];
            if('REX_VALUE[id="6" isset="1"]' && 'REX_VALUE[6]' != '1'){
                $templateSubject2 .= '<span class="badge orange">'.$select[REX_VALUE[6]].'</span>';
            }
            $templateSubject2 .= '<i class="material-icons">info</i></a>';
        }else{
            $templateSubject2 .= '<p class="collection-item">'.REX_VALUE[5];
            if('REX_VALUE[id="6" isset="1"]' && 'REX_VALUE[6]' != '1'){
                $templateSubject2 .= '<span class="badge orange">'.$select[REX_VALUE[6]].'</span>';
            }
            $templateSubject2 .= '</p>';
        } 
    }else{
        $templateSubject2 .= '<p class="collection-item">&nbsp;</p>';
    }

    $templateSubject3 = "";
    if('REX_VALUE[id="7" isset="1"]'){
        if('REX_LINK[id="3" isset="1"]'){
            
            $navLink = '';
            $linkArticle = rex_article::get(intval(REX_LINK[3]));
            $parentCategory = $linkArticle->getCategory();
            $sourceCategoryTarget = $parentCategory->getValue('cat_nav_target');

            $currentCategory = rex_category::getCurrent();
            $currentParentCategory = $currentCategory->getParent();
            $currentChildCategories = $currentParentCategory->getChildren();

            foreach($currentChildCategories as $cat){
                if($cat->getValue('cat_nav_target') == $sourceCategoryTarget){    
                    $navCategoryPath = explode ( "/" , $cat->getUrl());
                    $navCategoryId = $navCategoryPath[sizeof($navCategoryPath)-2];

                    $navArticlePath = explode ( "/" , $linkArticle->getUrl());
                    $navArticleId = $navArticlePath[sizeof($navArticlePath)-2];
                    $navLink = $protocol.rex_yrewrite::getCurrentDomain().'/'.$navCategoryId.'/#'.$navArticleId;
                }
            }
            
            $templateSubject3 .= '<a href="'.$navLink.'" class="collection-item">'.REX_VALUE[7];
            if('REX_VALUE[id="8" isset="1"]' && 'REX_VALUE[8]' != '1'){
                $templateSubject3 .= '<span class="badge orange">'.$select[REX_VALUE[8]].'</span>';
            }
            $templateSubject3 .= '<i class="material-icons">info</i></a>';
        }else{
            $templateSubject3 .= '<p class="collection-item">'.REX_VALUE[7];
            if('REX_VALUE[id="8" isset="1"]' && 'REX_VALUE[8]' != '1'){
                $templateSubject3 .= '<span class="badge orange">'.$select[REX_VALUE[8]].'</span>';
            }
            $templateSubject3 .= '</p>';
        } 
    }else{
        $templateSubject3 .= '<p class="collection-item">&nbsp;</p>';
    }

    $templateSubject4 = "";
    if('REX_VALUE[id="9" isset="1"]'){
        if('REX_LINK[id="4" isset="1"]'){
            
            $navLink = '';
            $linkArticle = rex_article::get(intval(REX_LINK[4]));
            $parentCategory = $linkArticle->getCategory();
            $sourceCategoryTarget = $parentCategory->getValue('cat_nav_target');

            $currentCategory = rex_category::getCurrent();
            $currentParentCategory = $currentCategory->getParent();
            $currentChildCategories = $currentParentCategory->getChildren();

            foreach($currentChildCategories as $cat){
                if($cat->getValue('cat_nav_target') == $sourceCategoryTarget){    
                    $navCategoryPath = explode ( "/" , $cat->getUrl());
                    $navCategoryId = $navCategoryPath[sizeof($navCategoryPath)-2];

                    $navArticlePath = explode ( "/" , $linkArticle->getUrl());
                    $navArticleId = $navArticlePath[sizeof($navArticlePath)-2];
                    $navLink = $protocol.rex_yrewrite::getCurrentDomain().'/'.$navCategoryId.'/#'.$navArticleId;
                }
            }
            
            $templateSubject4 .= '<a href="'.$navLink.'" class="collection-item">'.REX_VALUE[9];
            if('REX_VALUE[id="10" isset="1"]' && 'REX_VALUE[10]' != '1'){
                $templateSubject4 .= '<span class="badge orange">'.$select[REX_VALUE[10]].'</span>';
            }
            $templateSubject4 .= '<i class="material-icons">info</i></a>';
        }else{
            $templateSubject4 .= '<p class="collection-item">'.REX_VALUE[9];
            if('REX_VALUE[id="10" isset="1"]' && 'REX_VALUE[10]' != '1'){
                $templateSubject4 .= '<span class="badge orange">'.$select[REX_VALUE[10]].'</span>';
            }
            $templateSubject4 .= '</p>';
        } 
    }else{
        $templateSubject4 .= '<p class="collection-item">&nbsp;</p>';
    }

    $templateSubject5 = "";
    if('REX_VALUE[id="11" isset="1"]'){
        if('REX_LINK[id="5" isset="1"]'){
            
            $navLink = '';
            $linkArticle = rex_article::get(intval(REX_LINK[5]));
            $parentCategory = $linkArticle->getCategory();
            $sourceCategoryTarget = $parentCategory->getValue('cat_nav_target');

            $currentCategory = rex_category::getCurrent();
            $currentParentCategory = $currentCategory->getParent();
            $currentChildCategories = $currentParentCategory->getChildren();

            foreach($currentChildCategories as $cat){
                if($cat->getValue('cat_nav_target') == $sourceCategoryTarget){    
                    $navCategoryPath = explode ( "/" , $cat->getUrl());
                    $navCategoryId = $navCategoryPath[sizeof($navCategoryPath)-2];

                    $navArticlePath = explode ( "/" , $linkArticle->getUrl());
                    $navArticleId = $navArticlePath[sizeof($navArticlePath)-2];
                    $navLink = $protocol.rex_yrewrite::getCurrentDomain().'/'.$navCategoryId.'/#'.$navArticleId;
                }
            }
            
            $templateSubject5 .= '<a href="'.$navLink.'" class="collection-item">'.REX_VALUE[11];
            if('REX_VALUE[id="12" isset="1"]' && 'REX_VALUE[12]' != '1'){
                $templateSubject5 .= '<span class="badge orange">'.$select[REX_VALUE[12]].'</span>';
            }
            $templateSubject5 .= '<i class="material-icons">info</i></a>';
        }else{
            $templateSubject5 .= '<p class="collection-item">'.REX_VALUE[11];
            if('REX_VALUE[id="12" isset="1"]' && 'REX_VALUE[12]' != '1'){
                $templateSubject5 .= '<span class="badge orange">'.$select[REX_VALUE[12]].'</span>';
            }
            $templateSubject5 .= '</p>';
        } 
    }else{
        $templateSubject5 .= '<p class="collection-item">&nbsp;</p>';
    }

        

    // BE
    
    $templateBE .= $templateHeader != '' ? '<div>'.$templateHeader.'</div>' : '';
    $templateBE .= $templateHeaderPicture != '' ? '<div>'.$templateHeaderPicture.'</div>' : '';
    $templateBE .= $templateSubject1 != '' ? '<div>'.$templateSubject1.'</div>' : '';
    $templateBE .= $templateSubject2 != '' ? '<div>'.$templateSubject2.'</div>' : '';
    $templateBE .= $templateSubject3 != '' ? '<div>'.$templateSubject3.'</div>' : '';
    $templateBE .= $templateSubject4 != '' ? '<div>'.$templateSubject4.'</div>' : '';
    $templateBE .= $templateSubject5 != '' ? '<div>'.$templateSubject5.'</div>' : '';

    // FE

    $templateFE .= '<div class="store-activity">'.$templateHeader.$templateHeaderPicture.
    '<div class="collection">
        '.$templateSubject1.$templateSubject2.$templateSubject3.$templateSubject4.$templateSubject5.'
    </div></div>';

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
