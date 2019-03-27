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
                            <h2>Votre panier</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <td>Panier</td>
                                        <th></th>
                                        <th>Produit</th>
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
                                            <td>
                                                <a href='#''><img src='img/bg-img/cart1.jpg' alt='Product'></a>
                                            </td>
                                            <td>
                                                ".$data['nom']."
                                            </td>
                                            <td>
                                                ".$data['prix']." €
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
                            <h5>Total</h5>
                            <ul class="summary-table">
                                <li><span>Total des articles:</span> <span></span></li>
                                <li><span>Frais de port:</span> <span>0 €</span></li>
                                <li><span>TTC:</span> <span></span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="facture.php" class="btn amado-btn w-100">Payer</a>
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
