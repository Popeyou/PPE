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
            $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', 'root');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
                    if(!isset($_SESSION['mail']))
                    {
                        echo "<li><a href='inscription.php'>S'inscrire</a></li>";
                        echo "<li><a href='connexion.php'>Se connecter</a></li>";
                    }
                    else
                    {
                        echo "<li><a href='modifProfil.php'>Mon profil</a></li>";
                        echo "<li><a href='deconnexion.php'>Déconnexion</a></li>";
                    }
                    ?>

                </ul>
            </nav>
            <!-- Button Group -->
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="panier.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Panier</a>
                <!-- <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>-->
            </div>
        </header>
        <!-- Header Area End -->
        </br>
        <div style="padding-left: 30px; padding-top: 70px;">
        <a href="modifProfil.php"><h3>- Profil</h3></a><a href="commandes.php"><h3>- Mes Commandes</h3></a>
        </div>
        <div>
            <form method="post">
                <table border = 1 >
                </br></br></br></br></br></br></br></br>

                <tr><td> Numero Réservation</td> <td> Date Début Réservation </td>
                    <td> Date Fin Réservation </td><td> Date de Retrait </td>
                    <td> Date de Dépot </td> <td> État</td>
                    </tr>
                </br>
            </form>
            <?php
                
                $req = $bdd->query("select count(distinct codeR) as NumeroRes, dateD ,dateF,date_retrait,date_depot, etat 
                                    from reservation, client 
                                    where reservation.codeC=client.codeC 
                                    and client.codeC=".$_SESSION['id']."");
                        while ($donnee = $req->fetch())
                        {
                            echo"<tr>
                            <td>".$donnee['NumeroRes']."</td>
                            <td>".$donnee['dateD']."</td>
                            <td>".$donnee['dateF']."</td>
                            <td>".$donnee['date_retrait']."</td>
                            <td>".$donnee['date_depot']."</td>
                            <td>".$donnee['etat']."</td>
                            </tr>";
                        }
                    ?>
                    </table>
            </div>
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
