<?php 




if(!empty($_POST)){

    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){

        if($_POST['password'] == $_POST['confirm_password']){
           
           if(strlen($_POST['password']) >= 8 && strlen($_POST['email']) >= 8){
                
                $password_inscription = $_POST['password'];
                $email_inscription = $_POST['email'];
                $cryptage_sha = sha1($password_inscription); 
                $firstname_Inscription = $_POST['firstname'];
                $lastname_Inscription =  $_POST['lastname'];  

                // $query = "INSERT INTO user (id_user, lastname, firstname, email, password, admin) VALUES (NULL, $lastname_Inscription, $firstname_Inscription, $email_inscription, $cryptage_sha, false)";

                // L'erreur de la requete SQL  ci-dessus, était du à la concaténation de mes variables pour la partie VALUES (...)
 
                $sqlSelectEmail = "SELECT * FROM util WHERE email ='".$email_inscription."'";
                // Si nous ne voulons pas que les utilisateurs puissent s'inscrire plusieurs fois avec la même adresse Email,
                // nous allons donc dabord récuperer la table user pour chercher si nous avons une valeur identique à $email_inscription

                $emailResultat = mysqli_query($connexion, $sqlSelectEmail);

                if(mysqli_num_rows($emailResultat) > 0){
                    // SI la recherche de colonne email de la table user est égale à $email_inscription
                    // alors l'email est déjà existant
                    $email_error = "L'email est déjà existant";  
                    echo $email_error;
                }else{
                    // sinon, on insert les données sur la base de donnée
                    $sql = "INSERT INTO util (id, nom, prenom, email, password, droit) VALUES (NULL,'".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$cryptage_sha."',false)";
                    if(mysqli_query($connexion, $sql)){
                        // si la requete mysqli_query fonctionne, alors...
                        // echo "Vous êtes inscris ".$firstname_Inscription;
                        header('Location: confirmation.php?firstname='.$firstname_Inscription.'');
                    } 

                }





           }else{
               echo "SAMARCHEPO";
           }

        }else{
            echo "Les mots de passe ne sont pas identiques";
        }
    }   
} 