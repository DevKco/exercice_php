<?php 
 
 

if(!empty($_POST)){
	if(!empty($_POST['update_title']) && !empty($_POST['update_text']) && !empty($_POST['update_description']) && !empty($_POST['update_price']) && !empty($_POST['update_quantity'])){

		// print_r($_FILES);
		$today = date("DMjGisTY");
		$uploaddir = 'uploads/';
		$nameImage = $_FILES['update_image']['name'];
		$replace_image = str_replace(".", "date=".$today."d.", $nameImage); 
		$uploadfile = $uploaddir . basename($replace_image);

		if (move_uploaded_file($_FILES['update_image']['tmp_name'], $uploadfile)) {

			// echo "Reussi";
			// $updatetitle = htmlspecialchars($_POST['update_title']);

			$sqlUpdateArticle = "UPDATE `article` SET `title_article`='".$_POST['update_title']."',`text_article`='".$_POST['update_text']."',`image_article`='".$replace_image."',`price_article`='".$_POST['update_price']."',`description_article`='".$_POST['update_description']."',`quantity_article`='".$_POST['update_quantity']."',`id_user`='".$_SESSION['id_user']."' WHERE `id_article` = ".$_GET['id_article']."";

			// echo $sqlUpdateArticle;
			if(mysqli_query($connexion, $sqlUpdateArticle)){
				echo "Article modifié";
			}else{
				echo "Echec requete SQL";
			}
		}  
	}
}