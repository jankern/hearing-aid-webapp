<!-- *******************************************************
    TABS/AKKORDEON-Gruppierung - Ausgabe
    ******************************************************** -->

<?php

    // generate Id
    $modulId = '';
    $idLength = 4;
    $range = "abcdefghijklmnopqrstuvwxyz0123456789";
    $limit = strlen($range)-1;
    for ($k = 0; $k < $idLength; $k++) {        
        $modulId .= $range{(int)floor(rand(0, $limit))};                                  
    }


    if (rex::isBackend()) {

        echo '<p>Das Modul listet alle Tabs/Akkordeon-Bereiche auf der Webseite auf.</p>';

    } else {
        
        $sliceIdList = [];
        $sliceIdSubList = [];
        
        $template = '';
        $tabTitleSection = '';
        $tabBodySection = '';
        
        $template .= REX_VALUE[1] == '1'
            ?'<div class="row" id="module-'.$modulId.'"><ul class="collapsible" data-collapsible="accordion">'
            :'<div class="row" id="module-'.$modulId.'"><div class="col s12"><ul class="tabs">';
        
        $sliceIdList = explode(";;", REX_VALUE[2]);

        for($i=0; $i<sizeof($sliceIdList); $i++){
            $sliceIdSubList = explode("::", $sliceIdList[$i]);
            
            // Get Slice content
            $slice = rex_article_slice::getArticleSliceById($sliceIdSubList[0], $this->getClang());
            
            // Generate Akkordeon component
            if(REX_VALUE[1] == '1'){
                $template .= '<li>
                    <div class="collapsible-header">'.$sliceIdSubList[1].'</div>
                    <div class="collapsible-body">'.$slice->getSlice().'</div>
                </li>';
            }
            // Generate Tab component
            else{
                // generate Id
                $tabId = '';
                $idLength = 4;
                $range = "abcdefghijklmnopqrstuvwxyz0123456789";
                $limit = strlen($range)-1;
                for ($j = 0; $j < $idLength; $j++) {        
                    $tabId .= $range{(int)floor(rand(0, $limit))};                                  
                }
                
                $tabTitleSection .= '<li class="tab col s3"><a href="#tab-'.$tabId.'">'.$sliceIdSubList[1].'</a></li>';
                if($i >= sizeof($sliceIdList)-1){
                    $tabTitleSection .= '</ul></div>';  
                }
                
                $tabBodySection .= '<div id="tab-'.$tabId.'" class="col s12">'.$slice->getSlice().'</div>';
                
            }
            
        }
        
        $template .= REX_VALUE[1] == '1'
            ?'</ul></div>'
            :$tabTitleSection.$tabBodySection.'</div></div>';
        
        echo $template;

    }
?>