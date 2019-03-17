<!-- *******************************************************
Text und Bild (1-3 Spalten) - Output
******************************************************** -->

<?php

$slice = rex_article_slice::getArticleSliceById(REX_SLICE_ID, $this->getClang());

$colAmount = REX_VALUE[1];
$colWidth = 12/intval($colAmount);
$colValueList = [];
$colValueList['1'] = ['icon'=>2,  'headline'=>3,  'picture'=>1, 'borderShape'=>4,  'text'=>5,  'alignment'=>6 ];
$colValueList['2'] = ['icon'=>7,  'headline'=>8,  'picture'=>2, 'borderShape'=>9,  'text'=>10, 'alignment'=>11];
$colValueList['3'] = ['icon'=>12, 'headline'=>13, 'picture'=>3, 'borderShape'=>14, 'text'=>15, 'alignment'=>16];

$colClass = !rex::isBackend()?'class="col s'.$colWidth.'"':'';
$textAligment = ['1'=>'left', '2'=>'center', '3'=>'right'];
$borderShape = ['1'=>'', '2'=>'circle'];

// Language suffix
$languageSuffix = '';
if (rex_clang::getCurrentId() == 2) {
  $languageSuffix = '_en';
}

$template = '<div class="row column">';

for($i = 1; $i <= intval($colAmount); $i++){
    
    $template .= '<div '.$colClass.'>';
    $template .= rex::isBackend()?'<legend>'.$i.'. Spalte</legend>':'';
    
    // ICON / HEAD
    
    if($slice->getValue($colValueList[$i]['icon']) != '' || $slice->getValue($colValueList[$i]['headline']) != ''){
        
        $templateIcon = '';
        if($slice->getValue($colValueList[$i]['icon']) != ''){
            $templateIcon .= !rex::isBackend()?
                '<i class="material-icons" style="display:inline-block">'.$slice->getValue($colValueList[$i]['icon']).'</i>':
                '<div class="panel-collapse"><div class="panel-body" style="background: #f3f6fb; word-wrap:break-word;">Icon-Code: '.$slice->getValue($colValueList[$i]['icon']).' (wird auf der Webseite angezeigt)</div></div>';
        }
        
        $template .= '<div style="text-align:'.$textAligment[$slice->getValue($colValueList[$i]['alignment'])].'">';
        $template .= $templateIcon;
        $template .= $slice->getValue($colValueList[$i]['headline']) != ''?
            '<h2 style="display:inline-block">'.$slice->getValue($colValueList[$i]['headline']).'</h2>':'';
        $template .= '</div>';
    }
     
    // IMAGE
    
    //$medTitle = $media->getValue('med_title'.$languageSuffix);
    
    // Picture handling
    if($slice->getMedia($colValueList[$i]['picture'])  != ''){
        $templatePicture = '';
        $media = rex_media::get($slice->getMedia($colValueList[$i]['picture']));
        if ($media instanceof rex_media) {
            
            $mediaTitle = rex_clang::getCurrentId() == 1 ? str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('title')) : str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_titel_en')) ;
            $mediaDescription = '';
            $mediaDescription = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'.$languageSuffix));
            
            if(rex::isBackend()){
                $mediaType = 'rex_medialistbutton_preview';
            }else{ 
                if($colAmount <= 1){
                    $mediaType = 'column-1';
                }else if($colAmount == 2){
                    $mediaType = 'column-2';
                }else{
                     $mediaType = 'content';
                }
            }
            
            $templatePicture = '<img style="text-align:'.$textAligment[$slice->getValue($colValueList[$i]['alignment'])].'" class="'.$borderShape[$slice->getValue($colValueList[$i]['borderShape'])].'" src="index.php?rex_media_type='.$mediaType.'&rex_media_file='.$slice->getMedia($colValueList[$i]['picture']).'" alt="'.$mediaTitle.'">';
            
            $template .= $templatePicture;
            
            $template .= $mediaDescription != '' ? '<p class="med-description" style="text-align:'.$textAligment[$slice->getValue($colValueList[$i]['alignment'])].'">'.$mediaDescription.'</p>' : '';
        }
    }
        
    // TEXT
    
    if($slice->getValue($colValueList[$i]['text'])  != ''){ 
        $textile = markitup::parseOutput('textile', $slice->getValue($colValueList[$i]['text']));

        $textile = str_replace(array('<li><em>', '</em>'), array('<li><i class="material-icons inverse">', '</i>'), $textile);
        
        // handle internal links - will be rewritten to internal domain references
        $linkMatch = array();

        // find internal links
        preg_match_all("/href=\"([\:.\w0-9-\/]+)\"/", $textile, $linkMatch);
      
        if(sizeof($linkMatch) > 0){
            
            foreach($linkMatch[1] as $value){
                // get article id from textile text link 
                $stringSlices = array();
                $stringSlices = explode('/', $value);
                
                // check if url part is number, if not it's supposed to be an external link or a mailto ref
                $isUrl = preg_match("/[0-9]{1,4}/", $stringSlices[2]);
                // only call URL normalizer for internal links
                if($isUrl > 0){
                    $url = UrlNormalizer::getCustomUrlByArticleId($stringSlices[2]);
                    $textile = str_replace('redaxo://'.$stringSlices[2], $url, $textile);
                }
            }
            
        }
        
        $template .= '<span style="text-align:'.$textAligment[$slice->getValue($colValueList[$i]['alignment'])].'">'.str_replace(array('<strong>', '</strong>'), array('<span class="label label-primary">', '</span>'), $textile).'</span>';
    }

    $template .= $i >= intval($colAmount)?'</div></div>':'</div>';
    
}

$template = SITE_TYPE == 'start' || SITE_TYPE == 'default' ? $template : '<div class="container-fluid category-single"><div class="centered">'.$template.'</div></div>';
echo $template; 

?>
