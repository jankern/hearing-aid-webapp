<!-- *******************************************************
Kategorie-/Artikelliste mit Inhaltsangabe - Output
******************************************************** -->
<?php

    $selectedArticle = rex_article::get(REX_LINK[1], $this->getClang());
    $selectedCategoryId = $selectedArticle->getCategoryId();

    $category = rex_category::get($selectedCategoryId, $this->getClang());
    $children = $category->getChildren();
    $articles = $category->getArticles();

    // Language suffix
    $languageSuffix = '';
    if (rex_clang::getCurrentId() == 2) {
        $languageSuffix = 'en';
    }else{
        $languageSuffix = 'de'; 
    }

    $langList = array('de'=>array('Inhaltsübersicht'), 'en'=>array('Content disclosure'));

    $template = '';
    
    $wizard = '';
    $articleCount = 0;
    $slicesCount = 0;
    $active = 'REX_VALUE[2]' == '1' ? "" : "active";
    $contentDisclosure = '<div class="centered"><ul class="collapsible content-disclosures"><li><div class="collapsible-header '.$active.'"><i class="material-icons">touch_app</i>'.$langList[$languageSuffix][0].'</div>';
    $replaceContentDisclosureSting = '<!--{{CONTENT_DISCLOSURE}}-->';

    foreach ($articles as $article) {
        
        $templateArticleItem = '';
        $templateSliceItem = '';
        
        if ($article->isOnline() && !$article->isStartArticle()){
            
            // Generate id for scrollspy
            // $name = $article->getValue("name");
            // $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ", "?", "&", "(", ")");
            // $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-", "", "", "", "");
            // $name = str_replace($search, $replace, $name);
            // $name = strtolower($name);
            $name = Utils::normalizeArticleNameForReference($article->getValue("name"));

            // add scroll spy id to target element
            $templateArticleItem .= '<div class="section scrollspy" id="'.$name.'">';

            // add scroll spy id to link element
            if($articleCount >= 1){
                $contentDisclosure .= '<div class="collapsible-body"><a href="#'.$name.'"><i class="inverse">'.($articleCount).'</i> '.$article->getValue("name").'</a></div>';
            }
            // Analyse slices for output
            $slices = rex_article_slice::getSlicesForArticle($article->getId(), $article->getClang());
            // color iterator
            $colorIndex = -1;

            foreach($slices as $slice){

                $insertContentDisclosure = "";
                if($slicesCount <= 0){
                    $insertContentDisclosure = $replaceContentDisclosureSting;
                }

                // Formatting
                if($slice->getValue(1) != "ArticleIntro" && $slice->getValue(1) != "VideoBar" && $slice->getValue(1) != "Card" && $slice->getValue(4) !== "SlideShow" && $slice->getValue(4) !== "PersonGallery"){

                    $colorClass = "";
                    if($colorIndex % 2 && $article->getValue('art_alternating_slice_background') == 'on'){
                        $colorClass = " row-alt";
                    }

                    // fixed with and centerd
                    $templateSliceItem .= '<div class="article-slice'.$colorClass.'">';
                    $templateSliceItem .= $slice->getSlice();
                    $templateSliceItem .= '</div>';

                    $colorIndex++;

                }else{
                    // ganze browserbreite
                    $templateSliceItem .= $slice->getSlice();
                }

                $templateSliceItem .= $insertContentDisclosure;

                $slicesCount+=1;

            }

            // Article order
            $templateArticleItem .= $templateSliceItem;
            $templateArticleItem .= '</div>';
            
            $template .= $templateArticleItem;
            $articleCount+=1;          
        }   
    }

    $contentDisclosure .= '</li></ul></div>';

    // insert content disclosure element after the category is built
    $template = 'REX_VALUE[1]' == '1' ? str_replace($replaceContentDisclosureSting, $contentDisclosure, $template) : $template ;

    if (rex::isBackend()) {

        echo $template;

    } else {
        
        echo '<div class="container-fluid category-collection">';
        echo $template;
        echo '</div>';
        
    }

?>
