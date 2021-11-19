<?php

 

if(!empty($_POST)){
    if(!empty($_POST['email_connexion']) && !empty($_POST['password_connexion'])){
        $email = $_POST['email_connexion'];
        $pwd = $_POST['password_connexion'];

        $pwd_sha = sha1($pwd); 

        $sqlSelectEmail = "SELECT * FROM util WHERE email ='".$email."' AND pass ='".$pwd_sha."' LIMIT 1";
        $emailResultat = mysqli_query($connexion, $sqlSelectEmail);
        $resultat = mysqli_fetch_all($emailResultat, MYSQLI_ASSOC);
        
// $resultat =>
// 1
// Aubrun
// Boris
// boris.aubrun@gmail.com
// b736efda7342c257b42af16d6f7b8da01d5aa165
// 1


        if(mysqli_num_rows($emailResultat) > 0){
        	// echo "Formulaire de connexion rempli";

	        // echo "<pre>";
	        // print_r($resultat);
	        // echo "</pre>";

			
			$_SESSION['id_user'] = $resultat[0]['id'];
	        $_SESSION['lastname'] = $resultat[0]['nom'];
			$_SESSION['firstname'] = $resultat[0]['prenom'];
			$_SESSION['email'] =  $resultat[0]['email'];
			$_SESSION['admin'] =  $resultat[0]['droit'];

	        // echo "<pre>";
	        // print_r($_SESSION);
	        // echo "</pre>";

			$_POST = array();
 
        }else{ 
        	echo "email ou mdp incorrect"; 
        }
    } 
}