<!-- *******************************************************
Download - Output
******************************************************** -->

<?php

    $templateBE = '';
    $templateFE = '';

    if ("REX_MEDIALIST[1]" != '') {
        
        $template = '';

        // Find out file size
        if (!function_exists('datei_groesse')) {
            
            function datei_groesse($URL) {

                $groesse = filesize($URL);
                if($groesse<1000) {
                    return number_format($groesse, 0, ",", ".")." Bytes";
                }
                elseif($groesse<1000000) {
                    return number_format($groesse/1024, 0, ",", ".")." kB";
                } else {
                    return number_format($groesse/1048576, 0, ",", ".")." MB";
                }
            }
            
        }

        // Find out icon
        if (!function_exists('parse_icon')) {
            function parse_icon($ext) {
                switch (strtolower($ext)) {
                    case 'doc': return '<i class="icon-file-word"></i>';
                    case 'pdf': return '<i class="icon-file-pdf"></i>';
                    case 'zip': return '<i class="ficon-file-archive"></i>';
                    // please add your own settings, e.g. with icons of Font-Awesome
                default:
                    return '';
                }
            }
        }


        $languageSuffix = '';
        if (rex_clang::getCurrentId() == 2) {
            $languageSuffix = '_en';
        }

        $arr = explode(",","REX_MEDIALIST[1]");
        foreach ($arr as $value) {

            $extension = substr(strrchr($value, '.'), 1);
            $parsed_icon = parse_icon($extension);
            $media = rex_media::get($value);
            $file_description = $media->getValue('med_description' . $languageSuffix) != '' ? $media->getValue('med_description' . $languageSuffix) : $value;
            
            $template .= '<a href="'.rex_getUrl(12, $this->clang, array ('file' => $value) ).'" class="collection-item">'.$parsed_icon.' '.$file_description.' <span class="new badge orange" data-badge-caption="">'.datei_groesse(rex_path::media($value)).'</span></a>'; 

        }
    }

    $templateFE .= '<div class="download-container text-widgets"><i class="material-icons inverse">file_download</i>';
    $templateFE .= "REX_VALUE[1]" != '' ? '<p>'.REX_VALUE[1].'</p>' : '';
    $templateFE .= '<div class="collection">'.$template.'</div></div>';
    $templateBE = $template;

    if (rex::isBackend()) {

        echo $templateBE;

    } else {
        
        echo $templateFE;
        
    }

?>