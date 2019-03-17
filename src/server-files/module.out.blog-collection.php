<?php
// TODO pass category id from input
$cats = rex_category::get(7);
$children = $cats->getChildren();
$articles = $cats->getArticles();

	$container = ($this->getTemplateId() == 1) ? 'container ' : '';
	echo '
	<div class="'.$container.'teaser clearfix">';

    foreach ($articles as $article) {
        $art = new rex_article_content($article->getId(), $article->getClang());
        echo $art->getArticle();
    }

	echo '
	</div>';
?>
