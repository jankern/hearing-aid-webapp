<!-- *******************************************************
CARDS - Output
******************************************************** -->
<?php

    $img = '';

    if ("REX_MEDIA[1]" != '') {
        $media = rex_media::get("REX_MEDIA[1]");
        if ($media instanceof rex_media) {
            $mediatitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
            $img = '<img class="content" src="index.php?rex_media_type=cards&rex_media_file=REX_MEDIA[1]" alt="'.$mediatitle.'">';
        }
    }

    if (rex::isBackend()) {

        if ('REX_VALUE[id=2 isset=1]') {
            echo '<h1>REX_VALUE[2]</h1>';
        }

        if ('REX_VALUE[id=3 isset=1]') {
            echo '<p>REX_VALUE[3]</p>';
        }
            
        echo $img;
        

        if ('REX_VALUE[id=4 isset=1]') {
            echo '<p>REX_VALUE[4]</p>';
        }
        
        if ('REX_VALUE[id=5 isset=1]') {
            $out = REX_VALUE[5] == '1'?'Hell':'Dunkel';
            echo '<p>Schriftfarbe auf Bild: '.$out.'</p>';
        }
        
        if ('REX_VALUE[id=6 isset=1]') {
            if(REX_VALUE[6] == '1'){
               $out = '1/3 Spalte'; 
            }else if(REX_VALUE[6] == '2'){
               $out = '1/3 Spalte medium'; 
            }else if(REX_VALUE[6] == '3'){
               $out = '1/3 Spalte lang'; 
            }else if(REX_VALUE[6] == '4'){
               $out = '1/2 Spalte'; 
            }else if(REX_VALUE[6] == '5'){
               $out = '1/2 Spalte medium'; 
            }else if(REX_VALUE[6] == '6'){
               $out = '1/2 Spalte lang'; 
            }
            echo '<p>Card-Höhe: '.$out.'</p>';
        }

    }else{
        
        $sizes = ['1'=>'col-3', '2'=>'col-3-medium', '3'=>'col-3-long', '4'=>'col-2', '5'=>'col-2-medium', '6'=>'col-2-long'];
        $colors = ['1'=>'light', '2'=>'dark'];
        
        $description = REX_VALUE[5] != '' ? '<span class="card-title '.$colors['REX_VALUE[5]'].'">REX_VALUE[3]</span>' : '' ;
        $image = $img != '' ? '<div class="card-image">'.$img.$description.'</div>' : '' ;
        
        $headline = REX_VALUE[2] != "" ? '<h1>REX_VALUE[2]</h1>' : '';
        
        $textile = markitup::parseOutput('textile', REX_VALUE[4]);
        $templateContentText= str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile);
        
        $templateButton = '';
        if(REX_VALUE[7] == '2'){
            if(REX_LINK[1] != ''){
                $article = rex_article::get(REX_LINK[1], $this->getClang());
                $url = UrlNormalizer::getDomainPathByArticleId($article->getId());
                $templateButton = '<a href="'.$url.'" class="waves-effect btn">REX_VALUE[8]</a>'; 
            }
        }
        if(REX_VALUE[7] == '3'){
            $templateButton = '<a href="REX_VALUE[9]" class="waves-effect btn" target="_blank">REX_VALUE[10]</a>'; 
        }
        
        $template = '<div class="card '.$sizes['REX_VALUE[6]'].'">
                '.$image.'
                <div class="card-content">
                    '.$headline.'
                    '.$templateContentText.'
                </div>
                <div class="card-action">
                  '.$templateButton.'
                </div>
              </div>';
        
        echo $template;
        
    } 
?>