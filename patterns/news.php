<?php
/**
 * Title: Accueil : à la une (3 dernières actualités)
 * Slug: wizards/news
 * Categories: wizards, query
 * Description: Les trois derniers articles, mis à jour automatiquement.
 *
 * @package Wizards
 */

?>
<!-- wp:group {"align":"wide","className":"wiz-news","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group alignwide wiz-news"><!-- wp:heading -->
<h2 class="wp-block-heading">À la une</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":1,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"news-card","layout":{"type":"constrained"}} -->
<div class="wp-block-group news-card"><!-- wp:post-date {"format":"j M Y","className":"news-card__date"} /-->

<!-- wp:post-title {"level":3,"isLink":true,"className":"news-card__title"} /-->

<!-- wp:post-excerpt {"excerptLength":18} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
