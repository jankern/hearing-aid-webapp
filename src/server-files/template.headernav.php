
<a class="navbar-brand" href="<?= rex_getUrl(rex_article::getSiteStartArticleId(), rex_clang::getCurrentId()) ?>"><img src="<?= rex_url::base('resources/css/images/logo.svg') ?>" alt="REDAXO CMS"></a>

REX_TEMPLATE[10]
<?php
$path = explode("|",$this->getValue("path").$this->getValue("article_id")."|");
$path1 = ((!empty($path[1])) ? $path[1] : '');
$path2 = ((!empty($path[2])) ? $path[2] : '');

$nav_main = '';

foreach (rex_category::getRootCategories() as $lev1) {

	$hidden_ids = array(1,6);
	// Home und Footer-Hilfsartikel sollen nicht in der Navi auftauchen
	if ($lev1->isOnline(true) && (!in_array($lev1->getId(), $hidden_ids))) {
		
		if ($lev1->getId() == $path1) {
			$nav_main .= '
			<li class="dropdown-toggle active"><a href="'.$lev1->getUrl().'">'.htmlspecialchars($lev1->getValue('name')).'</a>';
		} else {
   			$nav_main .= '
			<li class="dropdown-toggle"><a href="'.$lev1->getUrl().'">'.htmlspecialchars($lev1->getValue('name')).'</a>';
		}

		// 1st level start
		$lev1Size = sizeof($lev1->getChildren());

			if ($lev1Size != "0") {

				$nav_main .= '
				<ul class="dropdown-menu">';

					// START 2nd level categories
					foreach ($lev1->getChildren() as $lev2):
						if ($lev2->isOnline(true)) {

							if ($lev2->getId() == $path2) {
								$nav_main .= '
								<li class="dropdown-toggle active"><a href="'.$lev2->getUrl().'">'.htmlspecialchars($lev2->getValue('name')).'</a></li>';
							} else {
								$nav_main .= '
								<li class="dropdown-toggle"><a href="'.$lev2->getUrl().'">'.htmlspecialchars($lev2->getValue('name')).'</a></li>';
							}
						}
					endforeach;

				$nav_main .= '
				</ul>';

			}

		$nav_main .= '
		</li>';
	}
}

$a = rex_addon::get('yrewrite');
echo '<pre>';
printf(gettype($a));
printf($a->isAvailable());
echo ' - ';
$structureAddon = rex_addon::get('structure');
$c = $structureAddon->getProperty('start_article_id');
$d = $structureAddon->getProperty('article_id');
$e = $structureAddon->getProperty('catgeory_id');
printf($c);
echo ' - ';
printf($d);
echo ' - ';
printf($e);
echo ' - ';


//printf($a->getDomains());
//printf($a::getDomains());
echo '</pre>';

echo '
<div class="navbar-collapse collapse navbar-right">
	<ul class="nav navbar-nav">
		'.$nav_main.'
		'.rex::getProperty('lang_switch').'
	</ul>
</div><!--/.nav-collapse -->';
?>
