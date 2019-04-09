<?php

	/* 
	*
	* URLManager
	* ---
	*
	* @author: Jan Kern
	* @version: 0.1
	*
	*/

class UrlNormalizer{
    
    public function __construct(){

    }

    public static function getCustomUrlByArticleId($articleId) {

        
        $navLink = '';
        $protocol = rex::getProperty('protocol');
        
        if($articleId != '' && !rex::isBackend()){
            $navLink = $articleId;
            $linkArticle = rex_article::get(intval($articleId));
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
                    if($currentCategory->getValue('cat_nav_target') != $sourceCategoryTarget){
                        $navLink = $protocol.rex_yrewrite::getCurrentDomain().'/'.$navCategoryId.'/#'.$navArticleId;
                    }else{
                        $navLink = '#'.$navArticleId;
                    }
                }
            }
        }
        
        return $navLink;
        
    }
    
    public static function getDomainUrlByArticleId($articleId) {
        $protocol = rex::getProperty('protocol');
        $article = rex_article::get(intval($articleId));
        
        $urlPath = "";
        $articlePath = explode ( "/" , $article->getUrl());
        $articlePath = array_reverse($articlePath);
        
        for($i = 0; $i <= sizeof($articlePath); $i++){
            if($i < sizeof($articlePath)-3){
                if($articlePath[$i] != ''){
                    $urlPath = '/'.$articlePath[$i].$urlPath;
                }
            }
        }
        
        $url = $protocol.rex_yrewrite::getCurrentDomain().$urlPath;
        return $url;
    }
    
    public static function getDomainPathByArticleId($articleId) {
        $protocol = rex::getProperty('protocol');
        $article = rex_article::get(intval($articleId));
        
        $urlPath = "";
        $articlePath = explode ( "/" , $article->getUrl());
        $articlePath = array_reverse($articlePath);
        
//        echo rex_yrewrite::getCurrentDomain().'<br>';
//        echo '<pre>'; print_r($articlePath); echo '</pre>';
        
        for($i = 0; $i <= sizeof($articlePath); $i++){
            if($i < sizeof($articlePath)-4){
                if($articlePath[$i] != ''){
                    $urlPath = '/'.$articlePath[$i].$urlPath;
                }
            }
        }
        
        return $urlPath;
         
    }
    
}

?>