<?php
$path = explode("|",$this->getValue("path").$this->getValue("article_id")."|");
$path1 = ((!empty($path[1])) ? $path[1] : '');
$path2 = ((!empty($path[2])) ? $path[2] : '');


$side_nav = '';
$side_nav_sub = '';
$side_nav_sub_list = '';
$side_nav_sub_start_article = '';

$single_scroll = '';
$single_scroll_sub_list = '';

// Loop through all root categories and dive into that one that is realted to the currect URL
foreach (rex_category::getRootCategories() as $lev1) {

    if($lev1->getId() == $path1){
        
        $side_nav = '<div id="slide-out" class="side-nav"><div class="side-nav-header"><i></i></div><ul>';
        
        // Loop only through online categories in the active URl root category
        foreach($lev1->getChildren(true) as $lev2){ 

            $activeClass = "";
            $activeClassSub = "";
            $articleUrl = $lev2->getUrl();
            $side_nav_item = "";
            $excludeCat = false;

            if($lev2->getValue('cat_hide_in_main_navigation') == '1'){
                $excludeCat = true;
            }

            if($lev2->getId() == $path2){ 
                $activeClass = 'class="active" ';
                $activeClassSub = ' active-sub';
                $articleUrl = "";
            }
            
            // Categories with a 'cat_nav_target' have to retrieve article items from another reference category
            if($lev2->getValue('cat_nav_target') != '0'){
                
                $referenceCategory = rex_category::get($lev2->getValue('cat_nav_target'), $lev2->getClang());
                $side_nav_sub = '';
                $side_nav_sub_list = '';
                
                $i = 0;
                foreach($referenceCategory->getArticles() as $navArticle){ 
                    
                    if(!$navArticle->isStartArticle()){

                        $name = Utils::normalizeArticleNameForReference($navArticle->getValue("name"));
                        
                        $navArticlePath = explode ( "/" , $navArticle->getUrl() );
                        $navArticleId = $navArticlePath[sizeof($navArticlePath)-2];
                        
                        $side_nav_sub_list .= '<li><a href="'.$articleUrl.'#'.$name.'"><i class="material-icons">keyboard_arrow_right</i> '.$navArticle->getValue('name').'</a></li>';
                        
                        if($articleUrl == ''){
                            $single_scroll_sub_list .= '<li><a class="waves-effect" href="'.$articleUrl.'#'.$name.'">'.$i.'</a></li>'; 
                            $single_scroll_sub_list_2 .= '<li><a class="waves-effect tooltipped" data-position="right" data-tooltip="'.$navArticle->getValue('name').'" href="'.$articleUrl.'#'.$name.'"><div>'.$i.'</div></a></li>';
                        } 
                    }
                    $i++;
                }
                
                if(sizeof($referenceCategory->getArticles()) > 0){
                    $side_nav_sub .= '<div class="side-nav-sub'.$activeClassSub.'">'.$side_nav_sub_start_article.'<ul>'.$side_nav_sub_list.'</ul></div>';
                }
                
                $side_nav_item .= '<li><a '.$activeClass.'href="'.$lev2->getUrl().'">'.$lev2->getName().'</a>'.$side_nav_sub.'</li>';  
            }else{
                $side_nav_item .= '<li><a '.$activeClass.'href="'.$lev2->getUrl().'">'.$lev2->getName().'</a></li>'; 
            } 
            
            if(!$excludeCat){
                $side_nav .= $side_nav_item;
            }
               
        }
        
        if($single_scroll_sub_list != ''){
           $single_scroll = '<ul class="pagination single-scroll" style="display:none">'.$single_scroll_sub_list.'</ul>';  
           $single_scroll .= '<ul class="pagination-dotted single-scroll">'.$single_scroll_sub_list_2.'</ul>'; 
        }
        
        $side_nav .= '</ul></div>';
    }

}

// print will happen in main template to insert the UL on the body DOM top layer
// echo $side_nav;

// print will happen in main template to insert the single scroll on the body DOM top layer
// echo $single_scroll;

?>

<a href="#" data-activates="slide-out" class="waves-effect btn button-collapse"><i class="material-icons">menu</i></a>

