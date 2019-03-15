<?php
  require 'inc/header.php';
?>


<body>
<?php
     try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=location;charset=utf8', 'root', '');
    }



    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
        if (!empty($_GET['id']))
        {


        $requete = $bdd->query("insert into panier values (".$_SESSION['id'].",".$_GET['id'].")");

        }
        ?>

        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <td>Votre panier</td>
                                        <th></th>
                                        <th>Libellé produit</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $req = $bdd->query("select * from panier where codeC = ".$_SESSION['id']."");
                                    while ($donnees = $req->fetch())
                                    {
                                        $produits = $bdd->query("select * from materiel where codeM = ".$donnees['codeM']."");

                                        while ($data = $produits->fetch())
                                        {


                                            echo "
                                        <tr>
                                            <td class='cart_product_img'>
                                                <a href='#''><img src='img/bg-img/cart1.jpg' alt='Product'></a>
                                            </td>
                                            <td class='cart_product_desc'>
                                                <h5>".$data['nom']."</h5>
                                            </td>
                                            <td class='price'>
                                                <span>".$data['prix']." €</span>
                                            </td>

                                        </tr>";
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>$140.00</span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span>$140.00</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="panier.php" class="btn amado-btn w-100">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->



    <!-- ##### Footer Area Start ##### -->
    <?php require 'inc/footer.php'; ?>
