<!-- *******************************************************
Store Teaser List - Output
******************************************************** -->
<?php

    $templateBE = '';
    $templateFE = '';
    
    if('REX_VALUE[id="1" isset="1"]'){
        
        $articleMain = rex_article::get(REX_VALUE[1], $this->getClang());
        $slice = rex_article_slice::getFirstSliceForCtype(2, REX_VALUE[1], $this->getClang());
        
        // get media
        
        $templateImage = '';
        if($slice->getMedia(2) != ''){
            $media = rex_media::get($slice->getMedia(2));
            if ($media instanceof rex_media) {
                $mediatitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
                if(!rex::isBackend()){
                   $templateImg = 'style="background:url(\'index.php?rex_media_type=photos&rex_media_file='.$slice->getMedia(2).'\') no-repeat bottom right; background-size: 60%;"'; 
                }else{
                   $templateImg = '<img class="content" src="index.php?rex_media_type=rex_mediabutton_preview&rex_media_file='.$slice->getMedia(2).'" alt="'.$mediatitle.'">'; 
                }
            }
        }
        
        $templateTitle = '';
        if ($slice->getValue(1) != ""){
            $templateTitle .= '<h2>'.$slice->getValue(1).'</h2>';
        }
        
        $templateTitleText = '';
        if ($slice->getValue(2) != ""){
            $textile = markitup::parseOutput('textile', $slice->getValue(2));
            $templateTitleText .= '<p>'.str_replace(array('<em>', '</em>'), array('<span>', '</span>'), $textile).'</p>';
        }
        
        $templateText = '';
        if ($slice->getValue(3) != ""){
            $textile = markitup::parseOutput('textile', $slice->getValue(3));
            $templateText .= '<p>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'</p>';
        }

        $templateNumber = '';
        if ($slice->getValue(4) != ""){
            $templateNumber .= '<p><i class="material-icons inverse">local_phone</i> '.$slice->getValue(4).'</p>';
        }

        $templateAddress = '';
        if ($slice->getValue(5) != ""){
            $textile = markitup::parseOutput('textile', $slice->getValue(5));
            $templateAddress .= '<p>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'</p>';
        }

        $templateBussinessHours = '';
        if ($slice->getValue(6) != ""){
            $textile = markitup::parseOutput('textile', $slice->getValue(6));
            $templateBussinessHours .= '<p>'.str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile).'</p>';
        }
        
        
        
        // BE
        
        $templateBE .= '<div>'.$templateTitle.'</div>';
        $templateBE .= '<div>'.$templateTitleText.'</div>';
        $templateBE .= '<div>'.$templateText.'</div>';
        $templateBE .= '<div>'.$templateNumber.'</div>';
        $templateBE .= '<div>'.$templateAddress.'</div>';
        $templateBE .= '<div>'.$templateBussinessHours.'</div>';
        $templateBE .= '<div>'.$articleMain->getUrl().'</div>';
        
        // FE
        
        $templateFE .= '<div class="container-fluid store-list home" '.$templateImg.'>';
        $templateFE .= '<div class="centered">';
        $templateFE .= $templateTitleText;
        $templateFE .= $templateText;
        $templateFE .= $templateNumber;
    
        $templateFE .= $templateAddress;
        $templateFE .= $templateBussinessHours;
        $templateFE .= '<div class="centered text-centered"><a class="waves-effect btn" href="'.$articleMain->getUrl().'">Zum Store</a></div>';
        $templateFE .= '</div>';
        $templateFE .= '</div>';
    }
    
    if('REX_LINKLIST[id="1" isset="1"]'){
        $templateFE .= '<div class="container-fluid store-list">';
        if('REX_VALUE[id="2" isset="1"]'){$templateFE .= '<h1>'.REX_VALUE[2].'</h1>';}
        $articleLinkList = explode(',', "REX_LINKLIST[1]");
        foreach($articleLinkList as $articleLink){
            // Print article content
            $articleContent = new rex_article_content($articleLink, $this->getClang());
            $templateBE .= $articleContent->getArticle(2);
            $templateFE .= $articleContent->getArticle(2);
            
        }
        $templateFE .= '</div>';
    }

    if (rex::isBackend()) {

        echo $templateBE;

    } else {
        
        echo $templateFE;
    }

?>
