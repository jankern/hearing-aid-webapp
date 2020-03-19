<?php

// Is User not logged in?
if (!rex_backend_login::hasSession()) {
	// Is current article offline?
	if ($this->getValue('status') == 0) {
		// redirect to 404 page
		header ('HTTP/1.1 301 Moved Permanently');
		header('Location: '.rex_getUrl(rex_article::getNotFoundArticleId(), rex_clang::getCurrentId()));
		die();
	}
}

// Extract and store part of the domain name taken from url
$domain = rex_yrewrite::getCurrentDomain();
$domainParts = explode('.', $domain); 
$domain = '';
for( $i = 0; $i <= sizeof($domainParts); $i++ ) {
    if($i == sizeof($domainParts)-2){
        $domain = $domainParts[$i];
    }
}

$domainNameParts = explode('-', $domain);
$domainName = ucfirst($domainNameParts[1]);
rex::setProperty('domainName', $domainName);

// save protocol mode http/https
rex::setProperty('protocol', (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");

// Define national state codes
$nationalStates = array('Berlin'=>"BE", "Potsdam"=>"BB", "Babelsberg"=>"BB", "Roseneck"=>"BE");
rex::setProperty('stateName', $nationalStates[$domainName]);

// Fetch the phone number to be displayed in navigation head
$path = explode("|",$this->getValue("path").$this->getValue("article_id")."|");
$path1 = ((!empty($path[1])) ? $path[1] : '');
$path2 = ((!empty($path[2])) ? $path[2] : '');


if(rex_category::getCurrent() != null){
    $phoneNumber = "";
    $domainRootCategory = $path2 != '' && rex_category::getCurrent()->getParent() != null ? rex_category::getCurrent()->getParent() : rex_category::getCurrent() ;
    $domainCategories = $domainRootCategory->getChildren();
    if(sizeof($domainCategories) > 0){
        foreach($domainCategories as $categoryStore){
            if( $categoryStore->getStartArticle()->getValue('art_type') == 'store'){
                $storeSlices = rex_article_slice::getSlicesForArticle($categoryStore->getStartArticle()->getId(), $this->getClang());
                foreach($storeSlices as $storeSlice){
                    if( $storeSlice->getValue(1) == 'StoreAddress'){
                       if($storeSlice->getValue(5) != ''){
                           $phoneNumber = $storeSlice->getValue(5);  
                       } 
                    }
                }
            }
        }
    }

    rex::setProperty('phoneNumber', $phoneNumber);
}

// set charset to utf8
header('Content-Type: text/html; charset=utf-8');

// setLocale is a language meta field, set your individual locale informations per language
setlocale (LC_ALL, rex_clang::getCurrent()->getValue('clang_setlocale'));

?><!DOCTYPE html>
<html lang="<?php echo rex_clang::getCurrent()->getCode(); ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php

    // yrewrite
    $seo = new rex_yrewrite_seo();
    
    //echo '<!-- SEO Start -->';
    echo $seo->getTitleTag().PHP_EOL;
    echo $seo->getDescriptionTag().PHP_EOL;
    echo $seo->getRobotsTag().PHP_EOL;
    echo $seo->getHreflangTags().PHP_EOL;
    echo $seo->getCanonicalUrlTag().PHP_EOL;

	// Keywords 
	// If current article does not have keywords, take them from start article
	$keywords = "";
    if ($this->hasValue("art_keywords") && $this->getValue("art_keywords") != "") {
        $keywords = $this->getValue("art_keywords");
    } else {
        $home = new rex_article_content(rex_article::getSiteStartArticleId());
        if ($home->hasValue("art_keywords")) {
            $keywords = $home->getValue('art_keywords');
        }
    }

	//if($keywords != '') {echo '<meta name="keywords" content="'.htmlspecialchars($keywords).'">';}

	?>
    
    <?php
        $cookieLang = array(
            'de'=>array("Diese Website benutzt Cookies. Wenn du die Website weiter nutzt, gehen wir von deinem Einverständnis aus.", "Mehr Informationen"),
            'en'=>array("This website is using cookies to ensufre you get the best experinece on our website.", "Learn more")
        );
    
        if(rex_clang::getCurrent()->getCode() == 'de'){
            $cookieMessage = $cookieLang['de'][0];
            $cookieLinkText = $cookieLang['de'][1];
        }else{
            $cookieMessage = $cookieLang['en'][0];
            $cookieLinkText = $cookieLang['en'][1];
        }
        
    ?>
   
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129615842-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-129615842-1');
    </script>
   
    <!-- Cookie Consent -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <script>
    window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "#fce7bd",
          "text": "#F48A03"
        },
        "button": {
          "background": "#f1a84c",
          "text": "#ffffff"
        }
      },
      "theme": "classic",
      "content": {
        "message": "<?php echo $cookieMessage; ?>",
        "dismiss": "OK",
        "link": "<?php echo $cookieLinkText; ?>",
        "href": "/datenschutzbestimmungen/"
      }
    })});
    </script>

    <link href="<? echo rex::getProperty('protocol'); ?>fonts.googleapis.com/css?family=Lora:400,700|Roboto:400,300,300italic,400italic,500,500italic|Roboto+Condensed" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= rex_url::base('resources/dist/css/vendor0.bundle.css') ?>">
    <link rel="stylesheet" href="<?= rex_url::base('resources/dist/css/main2.bundle.css') ?>">
    <link rel="stylesheet" href="<?= rex_url::base('resources/dist/css/custom2.bundle.css') ?>">

    <link rel="stylesheet" href="<?= rex_url::base('resources/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= rex_url::base('resources/css/prettify.css') ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= rex_url::base('resources/favicons/apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= rex_url::base('resources/favicons/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= rex_url::base('resources/favicons/favicon-16x16.png') ?>">
    
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<!script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
