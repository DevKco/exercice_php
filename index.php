

<?php 

session_start();

require_once('lib/var.php');
require_once('lib/connexion.php');

require_once('lib/form_traitment_connexion.php');
require_once('lib/form_traitment_inscription.php');
require_once('lib/all_articles.php');


// require_once('lib/all_articles_join_comments.php');



if(!empty($_POST)){
    if($_POST['decosub'] == "se déconnecter"){
        session_unset();
        session_destroy();
    }
}
// b0832e92f911cb683b0088a20157818be1e40c7b

// 5535ef4dd59f10b73b8c0fc812ae6fb0c5567c85

// connexion POST _shop.sql



 // exercice calcul function
     function calculatrice($nombre1, $nombre2, $operation){
        if($operation == 'x'){
            $nombre_resultat = $nombre1 * $nombre2;
        }elseif ($operation == '/') {
            $nombre_resultat = $nombre1 / $nombre2;
        }elseif ($operation == '-') {
            $nombre_resultat = $nombre1 - $nombre2;
        }elseif ($operation == '+') {
            $nombre_resultat = $nombre1 + $nombre2;
        }else{
            $nombre_resultat ="opérateur non reconnu";
        }
        echo $nombre_resultat."<br>"; 
     }
 
     // calculatrice(19, 26, 'x');
     // calculatrice(19, 26, '/');
     // calculatrice(19, 26, '-');
     // calculatrice(19, 26, '+');
     // calculatrice(19, 26, 'c');  


     function initial($prenom, $nom){
        $initial1 = substr($prenom, 0, 1);
        $initial2 = substr($nom, 0, 1);
        echo strtoupper($initial1.$initial2);
     }

     // initial("boris","aubrun");  
     // resultat : BA en MAJUSCULE


     $tableau = array(0 => "value0", 1 => "value1", 2 => "value2", 3 => "value3", 4 => "value4", 5 => "value5", 6 => "value6");
     
     // echo "<pre>";
     // print_r($tableau);
     // echo "</pre>";

     // var_dump($tableau);

     // echo "boucle foreach -> <br>";
     foreach($tableau as $value){
        // echo $value."<br>";
     }

     // echo "boucle for -><br>";
     for($i = 0; $i < count($tableau); $i++){
        // echo $tableau[$i]."<br>";
     }

     // echo "boucle while -><br>";
     $i = 0;
     while($i < count($tableau)){
        // echo $tableau[$i]."<br>";
        $i++;
     }


    
    // echo "Je m'appelle $prenom et j'ai $age ans <br>";
    // echo "Je m'appelle {$prenom} et j'ai {$age} ans <br>";
    // echo 'Je m\'appelle $prenom et j\'ai $age ans <br>';

    // echo "<hr>";

    // echo "<p>salut $prenom</p>";
    // echo "<p>Comment allez-vous $prenom ?</p>";
    // echo "<p>Bienvenue $prenom, vous êtes chez vous !</p>";

    // echo "<hr>";

    // echo "<p>salut ".$prenom."</p>";
    // echo "<p>Comment allez-vous ".$prenom." ?</p>";
    // echo "<p>Bienvenue ".$prenom.", vous êtes chez vous !</p>";

    // require() -- connexion à un autre fichier mais renvoie un bug si on ne le trouve pas
    // include() -- connexion à un autre fichier mais renvoie un warning si on ne trouve pas

    // $file = 'logs.txt';
    // // Open the file t oget existing content
    // $current = file_get_contents($file);
    // // Append a new person to the file
    // $current .= "John Smith\n";
    // // Write the contents back to the file
    // file_put_contents($file, $current);

     


     require_once('lib/connexion.php');
     



     ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <style type="text/css">
            .panel{
                 width: 20px;
                 margin-top: -10px;
                 margin-left: 10px;
                 cursor: pointer;
            }
        </style>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">  
                        <?php  
                        if($connexion == true){ ?>
                            <!-- <button class="btn btn-outline-dark" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Cart
                                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button> -->
                        <?php }else{ ?>
                            <!-- <button class="btn btn-outline-dark" type="submit" style="margin-left: 10px;">
                                <span>Connexion</span>
                            </button>  -->
                        <?php } ?>
                    </form>


                    <?php if(!empty($_SESSION['firstname']) && !empty($_SESSION['lastname'])) {?>
                        <p style="font-size: 25px;">
                            <b>Bienvenue</b> 
                            <span style="font-style: italic;font-size: 20px;">
                                <?php // echo $email; ?>
                                <?php echo $_SESSION['firstname']; ?>
                                <?php echo $_SESSION['lastname']; ?>
                                    
                                <form method="post" id="deco">
                                    <input type="submit" name="decosub" value="se déconnecter" style="    font-size: 9px;font-weight: bold;margin-top: 0;margin-bottom: 10px;margin-left: 10px;">
                                </form>
                            </span>
                            <?php if($_SESSION['admin'] == 1){ ?>
                            <a href="panel">
                                <img class="panel" src="assets/img/admin.png">
                            </a>
                            <?php } ?>
                        </p>
                    <?php }else{ ?>
                        <form id="formulaire_connexion" method="POST"> 
                            <label>Email :</label>
                            <input type="mail" name="email_connexion"> 
                            <label>Mot de passe :</label>
                            <input type="password" name="password_connexion">
                            <input type="submit" name="envoie" value="Envoie">
                        </form> 
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <?php $title = ""; ?> 
                    <h1 class="display-4 fw-bolder"> E-commerce </h1>

                    <?php 

                    if($title == "") {
                        echo "<p class='lead fw-normal text-white-50 mb-0'>With this shop hompeage template</p>";
                    }
                    ?>

                </div>
            </div>
        </header>
        <div>
            <?php 

                // echo "<pre>";
                // print_r($resultat);
                // echo "</pre>";

                
            ?>
        </div>


        <?php if(empty($_SESSION['firstname']) && empty($_SESSION['lastname'])) {?>
     
        <style type="text/css">
            #inscription{
                display: flex;
                flex-flow: column wrap;
                width: 100%;
                max-width: 550px;
                margin: 0 auto;
                align-items: flex-end;
                padding: 20px;
                background-color: #c3c3c394;
                margin-top: 30px;
                margin-bottom: 231px;
                display: none;
            }    

            .active_form{
                padding: 3px;
                width: 100%;
                max-width: 200px;
                margin: 0 auto;
                text-align: center;
                margin-top: 50px;
                margin-bottom: 50px;
                background-color: #212529;
                font-weight: bold;
                border: solid 8px #5b7283;
                color: white;
                cursor: pointer;
            }

            .active_form p{
                margin-bottom: 0;
            }

            .row{
                margin-top: 70px;
            }
        </style>

        <div class="active_form">
            <p>Inscription</p>
        </div>
         
        <form id="inscription" method="post">
            <div>
                <label for="firstname">Prénom*</label>
                <input type="text" name="firstname" required>               
            </div>
    

            <div>
                <label for="firstname">Nom*</label>
                <input type="text" name="lastname" required>    
            </div>

            <div>
                <label for="firstname">Email*</label>
                <input type="email" name="email" required>    
            </div>

            <div>
                <label for="firstname">Mot de passe*</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label for="firstname">Confirmer votre mot de passe*</label>
                <input type="password" name="confirm_password" required>
            </div>

            <div>
               <input type="submit" name="envoie_form_inscription" value="S'inscrire">
            </div>


        </form>

        <?php } ?>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" style="padding-top: 70px;">
            <?php 
            echo "<pre>";
            print_r($resultat_article);
            echo "</pre>"?>
           <?php foreach ($resultat_article as $key_articles => $value_articles) { ?> 

            <?php 
             // print_r($value_articles);
            ?>
            <div class="col mb-5">
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="panel/uploads/<?php echo $value_articles['image_article']; ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $value_articles['title_article']; ?></h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <?php echo $value_articles['price_article']; ?> €
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="fiche_article/index.php?id_article=<?php echo $value_articles['id_article']; ?>">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
           <?php } ?> 
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

        <script type="text/javascript">
            var i = 1;
            $('.active_form').click(function(){
                i++;

                if(i%2){

                $('#inscription').css('display','none');
                }else{
                $('#inscription').css('display','flex');

                }
            })
        </script>
    </body>
</html>
