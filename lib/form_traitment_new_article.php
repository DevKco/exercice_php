<?php 

 
if(!empty($_POST)){
	 
	if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['text']) && !empty($_POST['quantity']) && !empty($_POST['price']) && !empty($_FILES['image']['name'])){
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir . basename($_FILES['image']['name']);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
		    // echo "Le fichier est valide, et a été téléchargé
		    //        avec succès. Voici plus d'informations :\n";

			$image_article = $_FILES['image']['name'];

			$sql_insert_article = "INSERT INTO article (id_article, title_article, text_article, image_article, price_article, description_article, quantity_article, id_user) VALUES (NULL,'".$_POST["title"]."','".$_POST["text"]."','".$image_article."','".$_POST['price']."','".$_POST['description']."','".$_POST['quantity']."',".$_SESSION['id_user'].")";

			if(mysqli_query($connexion, $sql_insert_article)){

					echo "Article ajouté";

			}else{

				// echo "Erreur de requete SQL";
			}


		} else {
		    // echo "Attaque potentielle par téléchargement de fichiers.
		    //       Voici plus d'informations :\n";
		} 
	}
}

?>