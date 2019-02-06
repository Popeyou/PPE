<?php
  session_start();
	include ('controleur/controleur.php');

  require 'inc/header.php';
?>

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/pro-big-1.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/pro-big-2.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/pro-big-3.jpg);">
                                    </li>
                                    <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/pro-big-4.jpg);">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-1.jpg" alt="First slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-2.jpg" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                    if (isset($_GET['id'])) $id=$_GET['id'];
                    else $id=0;

                    						//instanciation d'un controleur
                    						$unC = new controleur('localhost','location','root','');

                    								  $unC->setTable('materiel');
                    						            $resultats = $unC->selectAll();
                    						            if (isset($_GET['id']))
                    						            {
                    						                $id = $_GET['id'];
                    						                if ($id == "")
                    						                {
                    						                    $resultats = $unC->selectAll();
                    						                }
                    						                else
                    						                {
                    						                    $champs = array('nom','notice','prix','poids','stock');
                    						                    $where = array('codeM'=>$id);
                    						                    $operateur = "";
                    						                    $resultats = $unC->selectWhere($champs,$where,$operateur);
                    						                }

                    						            }
                    									//if
                    ?>

                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">

                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?php foreach($resultats as $unResultat) echo $unResultat['prix']; ?> par jour</p>
                                <a href="product-details.php">
                                    <h6><?php foreach($resultats as $unResultat) echo $unResultat['nom']; ?></h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> En Stock : <?php foreach($resultats as $unResultat) echo $unResultat['stock']; ?></p>
                            </div>

                            <div class="short_overview my-5">
                                <p><?php foreach($resultats as $unResultat) echo "<p>".$unResultat['notice']."</br>Poids : ".$unResultat['poids']." kg</p>"; ?></p>
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="post">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->


    <!-- ##### Main Content Wrapper End ##### -->
    </div>

<?php require 'inc/footer.php'; ?>
