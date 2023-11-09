<?php
session_start();
include('../../inc/functions.php');

$categories = getAllCategoriies();
$produits = getAllproduits(); 
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>E-SHOP</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="http://<?php  echo $_SERVER['HTTP_HOST'];?>/ecom/admin/home.php">E-SHOP</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <?php
      $page = 'Products';
      include('../template/navigation.php');
      ?>


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Liste des Produits</h1>
          <!-- la bare dajout avec succes-->

          <div>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>

          </div>

        </div>
        <!-- table start-->
        <div>
          <?php
                if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                  print '<div class="alert alert-success">

            Produit ajouter avec succes
          </div>';
                } ?>
          
          <?php
          if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
            print '<div class="alert alert-success">

            Produit Supprimee avec succes
          </div>';
          } ?> 
          <?php
          if (isset($_GET['modif']) && $_GET['modif'] == "ok") {
            print '<div class="alert alert-success">

            Produit Modifié avec succes
          </div>';
          } ?> 
          <?php
          if (isset($_GET['erreur']) && $_GET['erreur'] == "duplicate") {
            print '<div class="alert alert-danger">

           Nom de Poduit deja  existe
          </div>';
          } ?>  
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
               <?php
                  
                    foreach ($produits as $i => $prod) {
                      $i++;
                      print '<tr>
    <th scope="row">' . $i . '</th>
    <td>' . $prod['nom'] . '</td>
    <td>' . $prod['description'] . '</td>
    <td>
      <a data-toggle="modal" data-target="#editModal' . $prod['ID'] . '" class="btn btn-success">Modifier</a>
      <a onclick="return popUpcat()" href="delete.php?IDprod=' . $prod['ID'] . '" class="btn btn-danger">Supprimer</a>
    </td>
    </tr>
    ';
                    }

                    ?> 

            </tbody>
          </table>



        </div>
      </main>
    </div>
  </div>


  <!-- Modal ajout -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajout Produit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="ajout.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <!-- required makatkhelik der ajouter hta kat3amer input, maxlength = "5" maymkaanch lik tktab ktar mn 5 dial les caracter  minlength = "2" A9al haja t9der tktab homa 2 caractere   -->
              <input type="text" required name="nom" class="form-control" placeholder="Nom de produit...">
            </div>
            <div class="form-group">
              <textarea name="description" class="form-control" placeholder="Description de produit..."></textarea>
            </div>
            <div class="form-group">
              <input type="number" name="prix" step="0.01" class="form-control" placeholder="Prix de produit...">
            </div>
            <div class="form-group">
              <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
              <select name="categorie" class="form-control">
                <?php foreach ($categories as $index => $catego)
                  print '<option value="' . $catego['ID'] . '">' . $catego['nom'] . '</option>';
                ?>

              </select>
              </div>
            <div class="form-group">
              <input type="number" name="quantite" class="form-control" placeholder="Tapper la quantite de produit... ">
            </div>
              
            </div> 
            <input type="hidden" name="createur" value="<?php echo $_SESSION['ID'];?>">
        
                      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>


  <?php 

foreach($produits as $i => $prod){ ?> 
<!-- Modal modification -->
<div class="modal fade" id="editModal<?php echo $prod['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $prod['ID']; ?>" name="IDprod"/>
        <div class="form-group">
          <input type="text" name="nom" class="form-control" value="<?php echo $prod['nom']; ?>" placeholder="Nom de categorie...">
        </div>
        <div class="form-group">
          <textarea name="description" class="form-control" placeholder="Description de categorie..." ><?php echo $prod['description'] ;?></textarea> 
        </div>
        <div class="form-group">
              <input type="number" name="prix" step="0.01" value="<?php echo $prod['prix']; ?>" class="form-control" placeholder="Prix de produit...">
            </div>
            <div class="form-group">
              <input type="file" name="image"  class="form-control">
            </div>
            <div class="form-group">
              <select name="categorie" class="form-control">
                <?php foreach ($categories as $index => $catego)
                  print '<option value="' . $catego['ID'] . '">' . $catego['nom'] . '</option>';
                ?>

              </select>
            
              
            </div>
            <input type="hidden" value="<?php echo $_SESSION['ID'];?>" name="createur">
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php 
}
?>




  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../../js/vendor/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

  <!-- Graphs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
<script> 
function popUpcat(){
  return confirm("Voulez vous vraiment supprimer la categorie");
}
</script>
</body>

</html>