<?php 

    // echo "toto : ".$_GET['id_article'];

    
     $id_article_fiche = $_GET['id_article'];

     if(!empty($id_article_fiche)){


         $sqlArticleFiche = "SELECT * FROM `article` WHERE `id_article` = ".$id_article_fiche." ";
         $articleFiche_table = mysqli_query($connexion, $sqlArticleFiche);
         $resultat_articleFiche = mysqli_fetch_all($articleFiche_table, MYSQLI_ASSOC);   

     }else{

        header('Location: ../index.php');

     }
     