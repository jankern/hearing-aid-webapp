<!-- *******************************************************
Store INTRO - Output
******************************************************** -->

<?php

    $templateBE = '';
    $templateFE = '';


    $templateTextHeader = '';
    if ('REX_VALUE[id=2" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[2]);
        $templateTextHeader .= '<p>'.str_replace(array('<i>', '</i>'), array('<span>', '</span>'), $textile).'</p>';
    }


    // BE
    
    $templateBE .= '<div>'.$templateTextHeader.'</div>';

    // FE

    $templateFE .= '<div class="container-fluid"><div class="store-intro centered">
        '.$templateTextHeader.'
    </div>';

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>
