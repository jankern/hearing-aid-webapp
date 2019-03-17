<!-- *******************************************************
Aktionseinbindung - Output
******************************************************** -->

<?php

    $templateBE = '';
    $templateFE = '';

    if("REX_VALUE[id=1 isset=1]"){
        
        if("REX_LINK[id=1 isset=1]"){
    
            $article = rex_article::get(REX_LINK[1], $this->getClang());
            
            if("REX_VALUE[1]" == '1'){
              
                // Print article content
                $articleContent = new rex_article_content($article->getId(), $article->getClang());
                $templateBE .= $articleContent->getArticle(1);
                $templateFE .= $articleContent->getArticle(1);
                
            }else if("REX_VALUE[1]" == '2'){
                
                //$url = UrlNormalizer::getDomainUrlByArticleId($article->getId()); //$article->getUrl();
                $url = $article->getUrl();
                $articleName = $article->getName();
                $paragraph = 'Haben Sie Fragen?<br>Kontaktieren Sie uns jetzt';
                $template = '<div class="offer-reference text-widgets"><i class="material-icons inverse">question_answer</i><p>'.$paragraph.'</p><a href="'.$url.'" class="waves-effect btn"><i class="material-icons">play_circle_filled</i></a></div>';
                
                $templateBE .= '<div class=""><p>Angebotsverlinkung zu: '.$articleName.'('.$url.')</p></div>';
                $templateFE .= $template;
                
            }
            
            
        }
        
    }

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>