<?php

    $sqlRequest = "SELECT * FROM `util`";
    $user_table = mysqli_query($connexion, $sqlRequest);
    $resultat = mysqli_fetch_all($user_table, MYSQLI_ASSOC);
