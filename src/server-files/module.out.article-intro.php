<!-- *******************************************************
Artikel Intro - Output
******************************************************** -->

<?php

    $templateBE = '';
    $templateFE = '';


    $templateTextHeader = '';
    if ('REX_VALUE[id=2" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[2]);
        $templateTextHeader .= str_replace(array('<i>', '</i>'), array('<span>', '</span>'), $textile);
    }

    $templateTextAddition = '';
    if ('REX_VALUE[id="3" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[3]);
        $templateTextAddition .= str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile);
    }


    // BE
    
    $templateBE .= '<div>'.$templateTextHeader.'</div>';
    $templateBE .= '<div>'.$templateTextAddition.'</div>';

    // FE

    $templateFE .= '<div class="article-intro">
        '.$templateTextHeader.$templateTextAddition.'
    </div>';

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
