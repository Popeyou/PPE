<?php
  require 'inc/header.php';
?>
        <!-- Header Area End -->

        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catégories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <li><a href="shopCons">Construction</a></li>
                        <li><a href="shopBrico">Bricolage</a></li>
                        <li><a href="shopJard">Jardinage</a></li>
                        <li class="active"><a href="ShopEngin">Engin de chantier</a></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->


            <!-- ##### Single Widget ##### -->


            <!-- ##### Single Widget ##### -->

        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- Single Product Area -->

                    <?php

                    try
                    {
                      $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', 'root');
                    }

                    catch (Exception $e)
                    {
                      die('Erreur : ' . $e->getMessage());
                    }
                      $article = $bdd->query("select * from materiel where codeT_M = 2");

                      while ($data = $article->fetch())
                      {
                        echo "
                        <div class='col-12 col-sm-6 col-md-12 col-xl-6'>
                          <div class='single-product-wrapper'>
                              <!-- Product Image -->
                              <div class='product-img'>
                                  <img src='".$data['image']."' alt=''>
                                  <!-- Hover Thumb -->
                              </div>

                              <!-- Product Description -->

                              <div class='product-description d-flex align-items-center justify-content-between'>
                                  <!-- Product Meta Data -->
                                  <div class='product-meta-data'>
                                      <div class='line'></div>
                                      <p class='product-price'>".$data['prix']." €</p>
                                      <a href='product-details.php?id=".$data['codeM']."'>
                                          <h6>".$data['nom']."</h6>
                                      </a>
                                  </div>
                                  <!-- Ratings & Cart -->
                                  <div class='ratings-cart text-right'>
                                  ";
                                  if (isset($_SESSION['id']))
                                  {
                                    echo "<div class='cart'>
                                        <a href='panier.php?id=".$data['codeM']."' data-toggle='tooltip' data-placement='left' title='Acheter !'>
                                        <img src='img/core-img/cart.png' alt=''></a>
                                          </div>
                                            </div>
                                              </div>
                                                </div>
                                                  </div>";
                                  }
                                else
                                {
                                  echo "</div>
                                          </div>
                                            </div>
                                              </div>
                                              ";
                                }
                      }
                      ?>


                </div>


            </div>
        </div>
  </div>

    <!-- ##### Main Content Wrapper End ##### -->



    <!-- ##### Footer Area Start ##### -->
    <?php require 'inc/footer.php'; ?>
