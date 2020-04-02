<?php
$path = explode("|",$this->getValue("path").$this->getValue("article_id")."|");
$path1 = ((!empty($path[1])) ? $path[1] : '');
$path2 = ((!empty($path[2])) ? $path[2] : '');


$nav_head = '';
$nav_head_sub = '';
$nav_head_sub_list = '';
$nav_head_sub_start_article = '';

// Loop through all root categories and dive into that one that is realted to the currect URL
foreach (rex_category::getRootCategories() as $lev1) {

    if($lev1->getId() == $path1){
        
        $nav_head = '<ul>';
        
        // Loop only through online categories in the active URl root category
        foreach($lev1->getChildren(true) as $lev2){ 
            
            if($lev2->getValue('cat_hide_in_main_navigation') != '1'){

                $activeClass = "";
                $articleUrl = $lev2->getUrl();
                
                if($lev2->getId() == $path2){
                    $activeClass = 'class="active"';
                    $articleUrl = "";
                }
                
                // Categories with a 'cat_nav_target' have to retrieve article items from another reference category
                if($lev2->getValue('cat_nav_target') != '0'){
                    
                    $referenceCategory = rex_category::get($lev2->getValue('cat_nav_target'), $lev2->getClang());
                    $nav_head_sub = '';
                    $nav_head_sub_list = '';
                    
                    $navItemLength = sizeof($referenceCategory->getArticles());
                    $i = 0;
                    $maxNavItemsPerColumn = 4;
                    $subNavStart = '';   
                    $subNavEnd = '';
                    
                    foreach($referenceCategory->getArticles() as $navArticle){ 
                        
                        if($navArticle->isStartArticle()){
                            $startArticle =  new rex_article_content($navArticle->getId(), $navArticle->getClang());
                            $nav_head_sub_list .= '<div class="sub-nav-column start-article">'.$startArticle->getArticle(1).'</div>';
                            
                        }else{
                            $navArticlePath = explode ( "/" , $navArticle->getUrl() );
                            $navArticleId = $navArticlePath[sizeof($navArticlePath)-2];
                            
                            if($i == 0){
                                $subNavStart = '<div class="sub-nav-column"><ul>';
                            }else{
                                $subNavStart = '';
                            }
                            
                            if($i >= $navItemLength-1){
                                $subNavEnd = '</ul><div>'; 
                            }else{
                                $subNavEnd = '';
                            }
                            
                            if($navArticle->isOnline()){
                                $nav_head_sub_list .= $subNavStart.'<li><a href="'.$articleUrl.'#'.$navArticleId.'"><i class="material-icons">keyboard_arrow_right</i> '.$navArticle->getValue('name').'</a></li>'.$subNavEnd;
                            }
                            $i++;
                        }
                        
                        
                        
                    }
                    
                    if(sizeof($referenceCategory->getArticles()) > 0){
                        $nav_head_sub .= '<div class="sub-nav">'.$nav_head_sub_list.'</div>';
                    }
                    
                    $nav_head .= '<li '.$activeClass.'><a href="'.$lev2->getUrl().'">'.$lev2->getName().'</a>'.$nav_head_sub.'</li>';
                    
                }else{
                    $nav_head .= '<li '.$activeClass.'><a href="'.$lev2->getUrl().'">'.$lev2->getName().'</a></li>'; 
                }

            }        
             
        }
        
        $nav_head .= '</ul>';
    }

}

echo $nav_head;

?>
