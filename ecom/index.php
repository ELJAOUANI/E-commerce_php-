<?PHP 
session_start();
require "inc/functions.php";
 $categories = getAllCategories();
 $produits = getAllproduits();
 if (!empty($_POST)){
   // echo "HHHHHHHHHHH";
   echo $_POST['search'];
 }
 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>onlineShop</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<?php
include "inc/header.php";

?>
    <div class="row col-12 mt-4  "> 
        <?php 
        foreach ($produits as $produit){
            print '<div class="col-3 mt-2"> 
            <div class="card h-100" style="width: 18rem;">
                <img src="photo/'.$produit['image'].'" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">'.$produit['nom'].'</h5>
                    <p class="card-text">'.$produit['description'].'</p>
                    <a href="produit.php?id='.$produit['ID'].'" class="btn btn-primary">Afficher</a>
                </div>
            </div>
        </div>';
        }
        ?>
        
        
    </div>

</body>


<?php 
include('inc/footer.php');
?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>