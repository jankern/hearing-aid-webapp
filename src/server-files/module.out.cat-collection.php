<!-- *******************************************************
Kategorie-/Artikelliste - Output
******************************************************** -->
<?php

    $selectedArticle = rex_article::get(REX_LINK[1], $this->getClang());
    $selectedCategoryId = $selectedArticle->getCategoryId();

    $category = rex_category::get($selectedCategoryId, $this->getClang());
    $children = $category->getChildren();
    $articles = $category->getArticles();

    $template = '';
    
    $wizard = '';

    foreach ($articles as $article) {
        
        $templateArticleItem = '';
        $templateSliceItem = '';
        
        if ($article->isOnline() && !$article->isStartArticle()){
            
            // Generate id for scrollspy
            $name = $article->getValue("name");
            $search = array("Ä", "Ö", "Ü", "ä", "ö", "ü", "ß", "´", " ");
            $replace = array("Ae", "Oe", "Ue", "ae", "oe", "ue", "ss", "", "-");
            $name = str_replace($search, $replace, $name);
            $name = strtolower($name);
            
            $templateArticleItem .= '<div class="section scrollspy" id="'.$name.'">';
            
            // Analyse slices for output
            $slices = rex_article_slice::getSlicesForArticle($article->getId(), $article->getClang());
            
            foreach($slices as $slice){
                
                if($slice->getValue(1) != "ArticleIntro" && $slice->getValue(1) != "VideoBar" && $slice->getValue(1) != "Card"){
                    // fixed with and centerd
                    $templateSliceItem .= '<div class="centered">';
                    $templateSliceItem .= $slice->getSlice();
                    $templateSliceItem .= '</div>';
                    
                }else{
                    // ganze browserbreite
                    $templateSliceItem .= $slice->getSlice();
                }
                  
            }
            
            // Article order
            $templateArticleItem .= $templateSliceItem;
            $templateArticleItem .= '</div>';
            
            $template .= $templateArticleItem;
                      
        }   
    }

    if (rex::isBackend()) {

        echo $template;

    } else {
        
        echo '<div class="container-fluid category-collection">';
        echo $template;
        echo '</div>';
        
    }

?>
