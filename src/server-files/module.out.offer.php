<!-- *******************************************************
Aktion - Output
******************************************************** -->

<?php

    $templateBE = '';
    $templateFE = '';

    $img = '';

    if ("REX_MEDIA[1]" != '') {
        $media = rex_media::get("REX_MEDIA[1]");
        if ($media instanceof rex_media) {
            $mediatitle = str_replace(array("\r\n", "\n", "\r"), ' ', $media->getValue('med_description'));
            $img = '<img class="content" src="index.php?rex_media_type=default&rex_media_file=REX_MEDIA[1]" alt="'.$mediatitle.'">';
        }
    }

    $templateBE .= "REX_VALUE[id=1 isset=1]"?'<p>REX_VALUE[1]</p>':'';
    $templateBE .= "REX_VALUE[id=2 isset=1]"?'<p>REX_VALUE[2]</p>':'';
    $templateBE .= "REX_VALUE[id=4 isset=1]"?'<p>REX_VALUE[4]</p>':'';
    $templateBE .= $img;

    if("REX_VALUE[id=6 isset=1]"){

        // establish data base connection
        $dbTable = rex_sql::factory();
        $campaignTypes = array();

        // get the campaign name
        try {
            $campaignTypes = $dbTable->getArray("SELECT * FROM rex_concam_campaign"); 

        } catch (rex_sql_exception $e) {
            $error = $e->getMessage();
        }

        $campaignTypesOptions = array();
        foreach($campaignTypes as $key => $value){
            $campaignTypesOptions[$value['id']] = $value['name'];
        }
        
        $templateBE .= '<div class="pabel-collapse"><div class="panel-body" style="background: #f3f6fb; word-wrap:break-word;">';
        $templateBE .= '<p>Formular-Typ: '.$campaignTypesOptions[REX_VALUE[6]].'</p>';
        $templateBE .= "REX_VALUE[id=7 isset=1]"?'<p>Formular-Zuordnung: REX_VALUE[7]</p>':'';
        $templateBE .= '</div></div>';

    }

    $bottomBorder = "REX_VALUE[8]" == '1'?' bottom-border':'';
    $templateFE .= '<div class="container-fluid'.$bottomBorder.'"><div class="row centered offer">';
    
    $headLineAlign = "REX_VALUE[3]" == '1'?'left':'center';
    $textAlign = "REX_VALUE[5]" == '1'?'left':'center';

    $templateFE .= "REX_VALUE[id=1 isset=1]"?'<h1 style="text-align:'.$headLineAlign.'">REX_VALUE[1]</h1>':'';
    $templateFE .= "REX_VALUE[id=2 isset=1]"?'<h2 style="text-align:'.$headLineAlign.'">REX_VALUE[2]</h2>':'';
    
    $templateFETmp = '';
    $padding = '';
    if ('REX_VALUE[id="4" isset="1"]'){
        $textile = markitup::parseOutput('textile', REX_VALUE[4]);
        
         // handle icon replaces - will be rewritten to internal domain references
        $textMatch = array();

        // find internal links
        preg_match_all("/<p>(icon.)([a-z0-9_]+)<\/p>/", $textile, $textMatch);

        if(sizeof($textMatch) > 0){
            
            $i = 0;
            foreach($textMatch[0] as $value){
                
                if(gettype($value) != String){
                    $replacement = '<i class="material-icons">'.$textMatch[2][$i].'</i>';                
                    $textile = str_replace($value, $replacement, $textile);
                    $padding = ' padding-left';
                }
                
                $i++;
            }     
            

        }
        
        $templateFETmp = str_replace(array('<b>', '</b>'), array('<span class="label label-primary">', '</span>'), $textile);
    }
    $templateFE .= '<div class="text-container'.$padding.'">';
    $templateFE .= $templateFETmp;
    $templateFE .= $img.'</div>';

    $assignment = '';
    if ('REX_VALUE[id="7" isset="1"]'){
       $assignment = 'REX_VALUE[7]';
    }

    $templateContactCampaign = '';
    if (!rex::isBackend()) {
        $templateContactCampaign = ContactCampaign::getForm('REX_VALUE[6]', $assignment);
    }

    $templateFE .= '<div class="addon-contact-campaign">'.$templateContactCampaign.'</div>';

    $templateFE .= '</div></div>';

    // Different output for frontend and backend
    if (rex::isBackend()) {
        echo $templateBE;
    } else {
        echo $templateFE;
    }

?>

