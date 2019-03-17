<!-- *******************************************************
    TABS/AKKORDEON-Gruppierung - Output
    ******************************************************** -->

<?php

    // generate Id
    $modulId = 0;
    $idLength = 4;
    $range = "abcdefghijklmnopqrstuvwxyz0123456789";
    $limit = strlen($range)-1;
    for ($i = 0; $i < $idLength; $i++) {        
        $modulId .= $range{(int)floor(rand(0, $limit))};                                  
    }


    if (rex::isBackend()) {

        echo '<p>Das Modul listet alle Tabs/Akkordeon-Bereiche auf der Webseite auf.</p>';

    } else {

        $slices = rex_article_slice::getSlicesForArticle($this->getArticleId(), $this->getClang());
        $sliceSetList = [];
        $sliceSetList['akkordeon'] = array();
        $sliceSetList['tab'] = array();
        
        $sliceAkkList = array();
        $sliceTabList = array();
        
        foreach($slices as $slice){
            
            if($slice->getValue(1) == "AkkordeonTab"){
                $a = array('title'=>$slice->getValue(3), 'picture'=>$slice->getMedia(1), 'text'=>$slice->getValue(4), 'selected'=>$slice->getValue(5));
                // Akkordoen (1) or Tab (2)
                if($slice->getValue(2) == '1'){
                    $sliceSetList['akkordeon'][sizeof($sliceSetList['akkordeon'])] = $a;
                }else{
                    $sliceSetList['tab'][sizeof($sliceSetList['tab'])] = $a;
                }
            }
            
        }
        
        $template = '';
        
        // Ausgabe Akkordeon 
        if(sizeof($sliceSetList['akkordeon']) > 0){
            
            // Generate ID
            $containerId = 'accordion-'.$modulId; 
            
            $template .= '<div class="row" id="'.$containerId.'"><ul class="collapsible" data-collapsible="accordion">';
            foreach($sliceSetList['akkordeon'] as $item){
                
                // Picture handling
                $templatePicture = '';
                if($item['picture'] != ''){
                    $media = rex_media::get($item['picture']);
                    if ($media instanceof rex_media) {
                        $mediatitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
                    }
                    $templatePicture = '<img class="" src="index.php?rex_media_type=content&rex_media_file='.$item['picture'].'" alt="'.$mediatitle.'">';
                }
                
                // Textile parse into html
                $textile = markitup::parseOutput('textile', $item['text']);
                
                // Akkordeon item active?
                $active = '';
                if($item['selected'] == '2'){
                    $active = 'active'; 
                }
                
                $template .= '<li>
                  <div class="collapsible-header '.$active.'">'.$item['title'].'</div>
                  <div class="collapsible-body">
                    '.$templatePicture.'
                    <span>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).
                    '</span>
                  </div>
                </li>';
            }
            $template .= '</ul></div>';
        }
        
        // Ausgabe Tab
        if(sizeof($sliceSetList['tab']) > 0){
            
            // Generate ID
            $containerId = 'accordion-'.$modulId;
            
            $template .= '<div class="row" id="'.$containerId.'">';
            $templateTabTitle = '<div class="col s12"><ul class="tabs">';
            $templateTabBody = '';
            $count = 0;
            
            foreach($sliceSetList['tab'] as $item){
                
                // Picture handling
                $templatePicture = '';
                if($item['picture'] != ''){
                    $media = rex_media::get($item['picture']);
                    if ($media instanceof rex_media) {
                        $mediatitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
                    }
                    $templatePicture = '<img class="" src="index.php?rex_media_type=content&rex_media_file='.$item['picture'].'" alt="'.$mediatitle.'">';
                }
                
                // Textile parse into html
                $textile = markitup::parseOutput('textile', $item['text']);
                
                // Generate Id
                $itemId = 0;
                $idLength = 4;
                $range = "abcdefghijklmnopqrstuvwxyz0123456789";
                $limit = strlen($range)-1;
                for ($i = 0; $i < $idLength; $i++) {        
                    $itemId .= $range{(int)floor(rand(0, $limit))};                                  
                }
                $tabItemId = 'tab-item-'.$itemId;
                
                // Tab item active?
                $active = '';
                if($item['selected'] == '2'){
                    $active = 'class="active"'; 
                }
                
                // Generate Tab title bar
                $templateTabTitle .= '<li class="tab col s3"><a '.$active.' href="#'.$tabItemId.'">'.$item['title'].'</a></li>';
                if($count >= sizeof($sliceSetList['tab'])-1){
                    $templateTabTitle .= '</ul></div>';
                }
                
                // Generate Tab body
                $templateTabBody .= '<div id="'.$tabItemId.'" class="col s12">
                    '.$templatePicture.'
                    '.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'
                </div>';
                
                
                $count++;
                
            }
            
            $template .= $templateTabTitle.$templateTabBody.'</div>';
        }
        
        echo $template;
        
    }
?>