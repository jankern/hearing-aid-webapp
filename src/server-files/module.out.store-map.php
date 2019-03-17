<!-- *******************************************************
Store Map - Output
******************************************************** -->
<?php
    if (rex::isBackend()) {

        if(REX_VALUE[2] != '' ){     
            echo '<div class="panel-collapse"><div class="panel-body" style="background: #f3f6fb;">Karte kann hier generiert werden: https://developers.google.com/maps/documentation/embed/start?hl=de<<br>'.
            'Personal-Key: AIzaSyACoYx3W6bU-w6ARwvQCYiInvgsh7iFPSk</div></div><br><p>Embed-Link:</p>'.REX_VALUE[id=2 output=html];
            
        }

    } else {
        
        if(REX_VALUE[2] != '' ){
            echo '<div class="store-address map">';
            echo REX_VALUE[id=2 output=html];
            echo '</div>';
        }

    }

?>
