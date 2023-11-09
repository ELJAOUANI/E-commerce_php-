<?php
session_start();
include('../../inc/functions.php');
if (isset($_POST['btnsubmit'])){
  //chager etat de panier 
ChangerEtatPanier($_POST);
}


$paniers = getAllpanier();
$commandes = getAllcommandes();

if(isset($_POST['btnsearch'])){
  if($_POST['etat'] == "tout"){
    $paniers = getAllpanier();
  }else{
    $paniers = getPaniersbByEtat($paniers, $_POST['etat']);
  }
 
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>onlineShop</title>

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
    $page = 'Paniers';
       include ('../template/navigation.php');
       ?> 


      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Liste des commandes</h1>
          <!-- la bare dajout avec succes-->
          
         

        </div>
        <!-- table start-->
        <div>



        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
          <div class="form-group d-flex">
          <select name="etat" class="form-control">
          <option value="">--Choisir l'etat--</option>
            <option value="tout">Tout</option>
            <option value="En cours">En cours</option>
            <option value="en livraison">En livraison</option>
            <option value="livraison termine">Livraison termine</option>
            <option value="livraison Annuler">Livraison Annuler</option>
          </select>
          
        
          <input type="submit" class="btn btn-primary ml-2" name="btnsearch" value="Chercher">
          </div>
        </form>
        <?php
           if(isset($_GET['ajout']) && $_GET['ajout'] == "ok"){
            print '<div class="alert alert-success">

            Categorie ajouter avec succes
          </div>';
          } ?>
          
          <?php
           if(isset($_GET['delete']) && $_GET['delete'] == "ok"){
            print '<div class="alert alert-success">

            Categorie Supprimee avec succes
          </div>';
          } ?> 
          <?php
           if(isset($_GET['modif']) && $_GET['modif'] == "ok"){
            print '<div class="alert alert-success">

            Categorie Modifié avec succes
          </div>';
          } ?> 
          <?php
           if(isset($_GET['erreur']) && $_GET['erreur'] == "duplicate"){
            print '<div class="alert alert-danger">

           Nom de Categorie deja  existe
          </div>';
          } ?> 
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Client</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                <th scope="col">Etat</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
               <?php
              $i = 0;
              foreach ($paniers as $panier) {
                $i++;
                print '<tr>
    <th scope="row">' . $i . '</th>
    <td>' . $panier['nom'] .' '.$panier['nom'] .'</td>
    <td>' . $panier['total'] . ' </td>
    <td>' . $panier['date_creation'] . '</td>
    <td>' . $panier['etat'] . '</td>
    <td>
      <a data-toggle="modal" data-target="#commandes'.$panier['ID'].'" class="btn btn-success">Afficher</a>
      <a data-toggle="modal" data-target="#Traiter'.$panier['ID'].'" class="btn btn-primary">Traiter</a>
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


            <?php 

foreach($paniers as $index => $panier){ ?> 
<!-- Modal affichage -->
<div class="modal fade" id="commandes<?php echo $panier['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Liste des commandes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <table class="table">
          <thead>
            <tr>
              <th> Nom de produit  </th>
              <th> Image  </th>
              <th>Quantite </th>
              <th>Total</th>
           
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($commandes as $index => $commande){
            if($commande['panier'] == $panier['ID']){ //si commande appartient a (panier ouvert $panier)

           
            print '<tr>
            <td>'.$commande['nom'].'</td>
            <td><img src=" ../../photo/'.$commande['image'].'" width=100  /></td>
            <td>'.$commande['quantite'].'</td>
            <td>'.$commande['total'].' DH</td>
            
            </tr>';
          }
          }
          
          ?>




          </tbody>
        </table>
        
       
      </div>
      
  
    
      </div>
    </div>
  </div>

<?php 
}
?>
            <?php 

foreach($paniers as $index => $panier){ ?> 
<!-- modal traitement -->
<div class="modal fade" id="Traiter<?php echo $panier['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Traitement des commandes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
       
       <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
       <input type="hidden" value="<?php echo $panier['ID']; ?>" name="panier_id">
        <div class="form-group">
        <select name="etat" class="form-control" >
          <option value="en livraison">En livraison</option>
          <option value="livraison termine">Livraison termine</option> 
          <option value="En cours">En cours</option>
          <option value="Livraison Annuler">Livraison Annuler</option>
        </select>
        </div>
      <div class="form-group">
      <button type="submit" name="btnsubmit" class="btn btn-primary">Sauvgrader</button>
      </div>
        
       </form>
      </div>
      
  <div class="modal-footer"></div>
    
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
} </script>
</body>

</html>
