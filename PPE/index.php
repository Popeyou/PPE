<?php
	require 'inc/header.php';

	include("controleur/controleur.php")
?>

<html lang="en">

  <head>
		<script>
			function changePrice()
			{
				var produit = document.getElementById("choix_24h").value;
				switch(produit)
				{
					case "beton":
						document.getElementById("choix_24h_prix").innerHTML="30€";
						break;
					case "marteau_piqueur":
						document.getElementById("choix_24h_prix").innerHTML="40€";
						break;
					case "motobineuse":
						document.getElementById("choix_24h_prix").innerHTML="130€";
						break;
				}
				var produit_semaine = document.getElementById("choix_semaine").value;
				switch(produit_semaine)
				{
					case "beton":
						document.getElementById("choix_semaine_prix").innerHTML="120€";
						break;
					case "marteau_piqueur":
						document.getElementById("choix_semaine_prix").innerHTML="180€";
						break;
					case "motobineuse":
						document.getElementById("choix_semaine_prix").innerHTML="520€";
						break;
				}
				var produit_mois = document.getElementById("choix_mois").value;
				switch(produit_mois)
				{
					case "beton":
						document.getElementById("choix_mois_prix").innerHTML="420€";
						break;
					case "marteau_piqueur":
						document.getElementById("choix_mois_prix").innerHTML="600€";
						break;
					case "motobineuse":
						document.getElementById("choix_mois_prix").innerHTML="1350€";
						break;
				}
			}
		</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Location de matériel Roilles</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <header>
			<div>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="float:right">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active">
						<center><img src="image/beton.png" height="480" width="480"></center>
            <div class="carousel-caption d-none d-md-block">
              <h1 style="color: black">Produit en vedette</h1>
              <p style="color: black">Bétonnière Électrique</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
					<div class="carousel-item">
						<center><img src="image/marteau_piqueur.jpg" height="480" width="480"></center>
						<div class="carousel-caption d-none d-md-block">
							<h1 style="color: black">Nouveau</h1>
              <p style="color: black">Marteau Piqueur</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
						<center><img src="image/motobineuse.jpg" height="480" width="480"></center>
						<div class="carousel-caption d-none d-md-block">
							<h1 style="color: black">Stock limité</h1>
              <p style="color: black">Motobineuse Électrique</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="fas fa-angle-double-left" style="color: orange; font-size : 50px" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="fas fa-angle-double-right" style="color: orange; font-size : 50px" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
		</div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Location de matériel</h1>

      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">Forfait 24H</h4>
            <div class="card-body">
              <p class="card-text">Tarifs pour la location du matériel pour 24H</p>
							<form method="GET" action="page.html">
							  <select id="choix_24h" name="choix_24h" onchange="changePrice()">
							    <option value="beton" selected>Bétonnière</option>
							    <option value="marteau_piqueur">Marteau Piqueur</option>
							    <option value="motobineuse">Motobineuse</option>
							  </select>
							</form>
						</br>
							<?php
							if(isset($_GET['choix_24h']))
							{
								$choix_24h = $_GET['choix_24h'];
							}
							echo "<h2 id='choix_24h_prix'>30€</h2>";
							?>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Détails</a>
						</br>


            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">1 Semaine</h4>
            <div class="card-body">
              <p class="card-text">Tarifs pour le Forfait hebdomadaire</p>
							<form method="GET" action="page.html">
							  <select id="choix_semaine" name="choix_semaine" onchange="changePrice()">
							    <option value="beton" selected>Bétonnière</option>
							    <option value="marteau_piqueur">Marteau Piqueur</option>
							    <option value="motobineuse">Motobineuse</option>
							  </select>
						</form>
					</br>
						<?php
						if(isset($_GET['choix_semaine']))
						{
							$choix_24h = $_GET['choix_semaine'];
						}
						echo "<h2 id='choix_semaine_prix'>120€</h2>";
						?>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Détails</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">1 Mois et +</h4>
            <div class="card-body">
              <p class="card-text">Tarif pour une durée d'un mois et plus</p>
							<form method="GET" action="page.html">
								<select id="choix_mois" name="choix_mois" onchange="changePrice()">
									<option value="beton" selected>Bétonnière</option>
									<option value="marteau_piqueur">Marteau Piqueur</option>
									<option value="motobineuse">Motobineuse</option>
								</select>
						</form>
					</br>
					<?php
					if(isset($_GET['choix_mois']))
					{
						$choix_24h = $_GET['choix_mois'];
					}
					echo "<h5>à partir de </h5>";
					echo "<h2 id='choix_mois_prix'>420€</h2>";
					?>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Détails</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Liste des produits</h2>
		</br>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="image/betonniere_thermique.jpg" alt="" height="150" width="480"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Bétonnière Thermique</a>
              </h4>
              <p class="card-text">
								<h4>à partir de 80€</h4>
							</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Two</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Three</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Four</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Five</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Project Six</a>
              </h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Modern Business Features</h2>
          <p>The Modern Business template by Start Bootstrap includes:</p>
          <ul>
            <li>
              <strong>Bootstrap v4</strong>
            </li>
            <li>jQuery</li>
            <li>Font Awesome</li>
            <li>Working contact form with validation</li>
            <li>Unstyled page elements for easy customization</li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
