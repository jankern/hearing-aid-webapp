<!-- *******************************************************
Store Address - Output
******************************************************** -->
<?php

    $templateBE = '';
    $templateFE = '';
    
    $templateTitle = '';
    $templateStreet = '';
    $templatePlace = '';
    $templateFone = '';

    if('REX_VALUE[id="2" isset="1"]'){   
        $templateTitle .= rex::isBackend() ? '<div>'.REX_VALUE[2].'</div>' : '<h3>'.REX_VALUE[2].'</h3>' ;
    }

    if('REX_VALUE[id="3" isset="1"]'){   
        $templateStreet .= rex::isBackend() ? '<div>'.REX_VALUE[3].'</div>' : '<p><i class="material-icons inverse">location_on</i>'.REX_VALUE[3].'</i></p>' ;
    }

    if('REX_VALUE[id="4" isset="1"]'){   
        $templatePlace .= rex::isBackend() ? '<div>'.REX_VALUE[4].'</div>' : '<p class="place">'.REX_VALUE[4].'</p>' ;
    }

    if('REX_VALUE[id="5" isset="1"]'){   
        $templateFone .= rex::isBackend() ? '<div>'.REX_VALUE[5].'</div>' : '<p><i class="material-icons inverse">local_phone</i>'.REX_VALUE[5].'</i></p>' ;
    }
    
    $templateBE .= $templateTitle.$templateStreet.$templatePlace.$templateFone;

    $templateFE .= '<div class="store-address">';
    $templateFE .= $templateTitle.$templateStreet.$templatePlace.$templateFone;
    $templateFE .= '</div>';
    
    
    if (rex::isBackend()) {

        echo $templateBE;

    } else {
        
        echo $templateFE;
    }

?>
