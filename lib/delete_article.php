<?php


if(!empty($_POST['delete_article'])){

	// print_r($_POST);
	$sqlDeleteArticle = "DELETE FROM `article` WHERE `id_article` = '".$_GET['id_article']."'"; 

	if(mysqli_query($connexion, $sqlDeleteArticle)){
		header('Location: index.php'); 
	}else{
		echo "Erreur SQL";
	}

} 

