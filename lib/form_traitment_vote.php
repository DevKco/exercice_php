<?php

if (!empty($_SESSION['id_user'])) {
    $sql_vote_exist = "SELECT * FROM comment WHERE id_user =" . $_SESSION['id_user'] . " AND id_article = " . $_GET['id_article'] . "  ";
    $table_vote = mysqli_query($connexion, $sql_vote_exist);
    $resultat_vote = mysqli_fetch_all($table_vote, MYSQLI_ASSOC);
}

// $sql_vote_average = "SELECT AVG(start_comment) FROM comment WHERE id_article = ".$_GET['id_article']."";


if (!empty($_POST)) {

    if (!empty($_POST['vote'])) {

        $sql_insert_vote = "INSERT INTO comment (id_comment, start_comment, id_article, id_user) VALUES (NULL,'" . $_POST["vote"] . "','" . $_GET["id_article"] . "','" . $_SESSION['id_user'] . "')";

        
        

        // $note = ;
        // echo "<pre>";
        // print_r($resultat_vote);
        // echo "</pre>";
        if (mysqli_num_rows($table_vote) > 0) {
           // echo " cet utilisateur à déja voté requete sql";

        } else {
           //echo "Vote pris en compte SQL";
            if ($_POST["vote"] < 1 || $_POST["vote"] > 5) {
            //echo "Le vote doit être compris entre 1 et 5.";
            } else {
            //echo "Le vote à bien été pris en compte SQL";
                if (mysqli_query($connexion, $sql_insert_vote)) {

                    echo "Article voté";

                } else {

                    echo "Erreur de requete SQL";
                }
            }
        }




    } else {
        echo "Voici plus d'informations :\n";
    }

}


$sql_ac = "SELECT `start_comment` FROM `comment` WHERE `id_article`=" . $_GET['id_article'] . " ";
$sql_act = mysqli_query($connexion, $sql_ac);
$sql_acr = mysqli_fetch_all($sql_act, MYSQLI_ASSOC);



echo "array sum ";
echo array_sum($sql_acr);
echo "<br>";
echo "count ";
echo count($sql_acr);
echo "<br>";

$average_c = array_sum($sql_acr) / count($sql_acr);
echo "$average_c";


?>