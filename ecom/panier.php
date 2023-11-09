<?PHP
session_start();
include "inc/functions.php";
//var_dump($_SESSION['panier'])
$total =0 ;
if(isset($_SESSION['panier'])){
    $total = $_SESSION['panier'][1] ;
}

$categories = getAllCategories();

if (!empty($_POST)) { //buton search cliked

    // $produits = searchProduits(($_POST['search']));
} else {
    $produits = getAllproduits();
}
$commandes = array();
if (isset($_SESSION['panier'])) {
    if (count($_SESSION['panier'][3]) > 0) {
        $commandes = $_SESSION['panier'][3];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>onlineShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
    include "inc/header.php";

    ?>
    <div class="row col-12 mt-4 p-5">
        <H1>Panier utilisateur</H1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                foreach($commandes as $index => $commande){
                    print'<tr>
                    <th scope="row">'.($index+1).'</th>
                    <td>'.$commande[5].'</td>
                    <td>'.$commande[0].' Pieces</td>
                    <td>'.$commande[1].' DH</td>
                    <td><a href="actions/enlever-produit-panier.php?id='.$index.'" class= "btn btn-danger">Supprimer</a></td>
                </tr>';
                }
                 ?>          
            </tbody>
        </table>
        <div class="text-end mt-3" >
            <h3>Total <?php echo $total?> DH </h3>
            <hr>
            <a href="actions/valider-panier.php" class="btn btn-success" style="width:100px">Valider</a>
        </div>
        
      

    </div>
    <?php
include('inc/footer.php');
?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>