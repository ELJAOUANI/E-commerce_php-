<?PHP 
session_start();
require "inc/functions.php";
 $categories = getAllCategories();
 if( isset($_GET['id'])){
  $produit=getproduitbyId($_GET['id']);
 }
 
 ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
<?php
include "inc/header.php";

?>
    <div class="row col-12 mt-4">
    <?php if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0){
      
      print'<div class="alert alert-danger">
      Compte non validee
      </div>';
    } ?> 
    
    <div class="card col-8 offset-2"  >
  <img src="photo/<?php echo $produit['image'];?>"  class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $produit['nom']?></h5>
    <p class="card-text"><?php echo $produit['description']?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit['prix']?> DH</li>
    <?php
    foreach($categories as $index => $catego){
      if($catego['ID'] == $produit['categorie']){
        print ' <burron class="btn btn-success mb-2">' .$catego['nom'].'</li> '; //mb = margin button 
      }

    }
    
    ?>
  </ul>
  <div class="col-12 m-2">
    <form class="d-flex" action="actions/commander.php" method="POST">
      <input type="hidden" value="<?php echo $produit['ID']?>" name="produit" >
      <input type="number" class="form-control" name="quantite" step="1" placeholder="Quantite de produit...">
      <button type="submit" <?php if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0){ echo "disabled";} ?> class="btn btn-primary" >Commander</button>
    </form>
  </div>
</div>
        
    </div>

</body>

<!--footer -->
<?php 
include('inc/footer.php');
?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>