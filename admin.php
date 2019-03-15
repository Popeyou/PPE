<?php
session_start();
include("controleur/controleur.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Location de matériel Roilles</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<?php
        try
        {
           $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
?>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/image/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.php"><img src="img/image/roilles.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="shopCons.php">Magasin</a></li>
                    <?php
                    if(!isset($_SESSION['mail'])){
                      echo "<li><a href='inscription.php'>S'inscrire</a></li>"; 
                      echo "<li><a href='connexion.php'>Se connecter</a></li>";
                    } 
                    else
                    {
                        echo "<li><a href='profil.php'>Mon profil</a></li>";
                        echo "<li><a href='deconnexion.php'>Déconnexion</a></li>";
                    }
                    ?>
                    
                </ul>
            </nav>
        </header>
        <!-- Header Area End -->

        <h1>ESPACE ADMIN</h1>
        
        <?php
        
       if (isset($_GET['page'])) $page=$_GET['page'];
        else $page=0;


        switch ($page) 
        {

            case 1:
            ?>
            <form method="post">
                <table border = 1>
                <tr><td> Nom</td> <td> Code Client </td>
                    <td> Nombre Commande </td>
                    </tr>
                </br></br></br></br></br></br></br></br></br></br></br>
                <input type="submit" name="clic" value="Commande par clients">
                <input type="submit" name="suivant" value="requete suivante">
            </form>
             <?php
             if(isset($_POST['clic']))
             {
                $req = $bdd->query("select * from comCli");
                          while ($donnee = $req->fetch())
                          {
                            echo"<tr>
                            <td>".$donnee['Nom']."</td>
                            <td>".$donnee['CodeClient']."</td>
                            <td>".$donnee['nbCommande']."</td>  
                                </tr>";
                          }
                      }
                      ?></table><?php
                if(isset($_POST['suivant']))
                {
                 echo "<script type='text/javascript'>document.location.replace('admin.php?page=2');</script>";     
                }
                break;
             ?>   
            </br>
            </br>
            <?php
            case 2:
            ?>
            <form method="post">
                <table border = 1>
                <tr><td> Nb Commande</td> <td> Mois </td>
                    </tr>
                </br></br></br></br></br></br></br></br></br></br></br>
                <input type="submit" name="retour" value="précedente requete">
                <input type="submit" name="clic" value="Commande par mois">
                <input type="submit" name="suivant" value="requete suivante">
            </form>
             <?php
             if(isset($_POST['clic']))
             {
                $req = $bdd->query("select * from comMois");
                          while ($donnee = $req->fetch())
                          {
                                echo"<tr>
                                <td>".$donnee['nbCommande']."</td>
                                <td>".$donnee['Mois']."</td>
                                </tr>";
                    
                          }
                      }
                      ?></table><?php
                if(isset($_POST['suivant']))
                {
                 echo "<script type='text/javascript'>document.location.replace('admin.php?page=3');</script>";     
                }

                if(isset($_POST['retour']))
                {
                 echo "<script type='text/javascript'>document.location.replace('admin.php?page=1');</script>";     
                }
                      break;
             ?>   
            </br>
            </br>
            <?php
            case  3:
            ?>
            <form method="post">
                <table border = 1>
                <tr><td> Nb Commande </td> <td> Années </td>
                    </tr>
                </br></br></br></br></br></br></br></br></br></br></br>
                <input type="submit" name="retour" value="précédente requete">
                <input type="submit" name="clic" value="Commande par années">
            </form>
             <?php
             if(isset($_POST['clic']))
             {
                $req = $bdd->query("select * from comAn");
                          while ($donnee = $req->fetch())
                          {
                            echo"<tr>
                                <td>".$donnee['nbCommande']."</td>
                                <td>".$donnee['Annees']."</td>
                                </tr>";
                          }
                      }
                      ?></table><?php
                if(isset($_POST['retour']))
                {
                 echo "<script type='text/javascript'>document.location.replace('admin.php?page=2');</script>";     
                }
                      break;
                  }
             ?>   
    </div>    
    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>


</body>
</html>