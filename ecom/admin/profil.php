<?php 
session_start();
require ("../inc/functions.php");
// cookies katenregista f pc et session katdar fdes variales ou katenregistra f serveur 
if (isset($_POST['btnEdit'])){
  if (editAdmin($_POST)){
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['email'] = $_POST['email'];
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

    <title>Admin : PRofile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">E-SHOP</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
       <?php
       $page = 'Profile' ; 
       include ('template/navigation.php');
       ?> 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1  class="h2">Profile Admin</h1>
            <div >
                <?php 
                
                echo "WELCOME ".$_SESSION['nom'];
                
                
                ?>
            </div>


            
          </div>    
          
          <div class="container">
          <h1> Nom : <span class="text-primary"><?php  echo $_SESSION['nom'];?> </span></h1>
            <h1> Email : <span class="text-primary"><?php  echo $_SESSION['email'];?> </span> </h1>
            <a data-toggle="modal" data-target="#profilEdit" class="btn btn-primary">Modifier</a> 
          </div>
          
        </main>
      </div> 
    </div>
 <!-- modal modification  -->
    <div class="modal fade" id="profilEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <input type="hidden" value="<?php  echo $_SESSION['ID'];?>" name="id_admin" >
      <div class="form-group">
      <input type="text" name="nom" value="<?php  echo $_SESSION['nom'];?>" id="" class="form-control" placeholder="Tapper votre le nom">
      </div>
      <div class="form-group">
      <input type="email" name="email" value="<?php  echo $_SESSION['email'];?>" id="" class="form-control" placeholder="Tapper votre email">
      </div>
      <div class="form-group">
      <input type="password" name="mp" value="" id="" class="form-control" placeholder="Tapper votre mot de passe ">
      </div>
    
     
      
       
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" name="btnEdit"  class="btn btn-primary">Modifier</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
   
  </body>
</html>