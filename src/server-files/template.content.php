<!-- *******************************************************
     Head
     ******************************************************* -->
     REX_TEMPLATE[1]

<?php 

    // Define site type: default|start|location  
    $article = "";
    $siteType = "";

    if (SITE_TYPE=='default' || SITE_TYPE=='start' || SITE_TYPE=='location' || SITE_TYPE=='landingpage') { 
        $article = $this->getArticle('1'); 
        if(SITE_TYPE == 'location' || SITE_TYPE == 'landingpage'){
            $siteType = 'default '.SITE_TYPE;
        }else{
            $siteType = SITE_TYPE;
        }
    } 

?>

<body <?= 'class="content-'.$siteType.'"' ?> >

    <header>
        <div class="logo">
            <a href="<? echo '/' ?>"><img src="index.php?rex_media_type=header_logo&rex_media_file=terzo_logo.png" alt="terzo-Zentrum"></a>
        </div>
        <div class="nav-container">
            <div class="info">
                <? 
                    if(rex::getProperty('phoneNumber') != ''){
                        echo '<span>Haben Sie Fragen?</span><h1><i class="material-icons inverse">local_phone</i>'.rex::getProperty('phoneNumber').'</h1>';
                    }
                ?>
            </div>
            <div class="side">
               REX_TEMPLATE[3]  
            </div>
        </div>
        <nav class="header">
           REX_TEMPLATE[2]
        </nav>
    </header>

    <?php echo $side_nav; echo $single_scroll;?>
    <main>
          
        <?php echo $article; ?>
        
    </main>

    <footer>
        REX_TEMPLATE[8]
    </footer>

    <!-- *******************************************************
         JS
         ******************************************************* -->
    <script type="text/javascript" src="<?= rex_url::base('resources/dist/js/vendor0.bundle.js') ?>"></script>
    <script type="text/javascript" src="<?= rex_url::base('resources/dist/js/main2.bundle.js') ?>"></script>
    <!--script type="text/javascript" src="<?= rex_url::base('resources/js/prettify.js') ?>"></script-->

</body>

</html>