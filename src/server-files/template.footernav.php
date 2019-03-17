<?php
$path = explode("|",$this->getValue("path").$this->getValue("article_id")."|");
$path1 = ((!empty($path[1])) ? $path[1] : '');
$path2 = ((!empty($path[2])) ? $path[2] : '');

$nav_foot = '';

// Loop through all root categories and dive into that one that is related to the current URL
foreach (rex_category::getRootCategories() as $lev1) {
    

    if($lev1->getId() == $path1){
        
        $nav_foot = '<ul>';

        foreach($lev1->getArticles(true) as $art){
            if(!$art->isStartArticle() && $art->getValue('art_type') != "footer_menu_hidden"){
                $article = rex_article::get($art->getId(), $art->getClang());
                $nav_foot .= '<li><a href="'.$article->getUrl().'">'.$article->getValue('name').'</a></li>';
            }
        }
        
        $nav_foot .= '</ul>';
    }

}

echo $nav_foot;

?>
