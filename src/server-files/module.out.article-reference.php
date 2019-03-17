<!-- *******************************************************
Artikeleinbindung - Output
******************************************************** -->

<?php

    $templateBE = '';
    $templateFE = '';

        
    if("REX_LINK[id=1 isset=1]"){

        $article = rex_article::get(REX_LINK[1], $this->getClang());

        // Print article content
        $articleContent = new rex_article_content($article->getId(), $article->getClang());
        $templateBE .= $articleContent->getArticle(1);
        $templateFE .= $articleContent->getArticle(1);

    }
        

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
