<?php
    // Breadcrumb
    $path = explode("|",$this->getValue("path").$this->getValue("article_id")."|");
    $secondLevel = $path[2];

    if ($secondLevel != '') { // show breadcrumb only in second level or deeper
        echo '<div class="container breadcrumb-wrapper">';
            $nav = rex_navigation::factory();
            echo $nav->showBreadcrumb('', true);
        echo '</div>';
    }
?>