<?php 

	// $sqlRequestArticle = "SELECT * FROM `article`";
	$sqlRequestArticle = "SELECT * FROM article INNER JOIN util ON article.id_user = util.id";
	$article_table = mysqli_query($connexion, $sqlRequestArticle);
	$resultat_article = mysqli_fetch_all($article_table, MYSQLI_ASSOC);

	// echo "<pre>";
	// print_r($resultat_article);
	// echo "</pre>";

	// SELECT * FROM comment INNER JOIN article ON comment.id_article = article.id_article INNER JOIN user ON comment.id_user = user.id_user;