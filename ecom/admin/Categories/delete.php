<?php
// echo "id de categorie".$_GET['IDcatego'];
$idcatego = $_GET['IDcatego'];
include ('../../testcon.php');
$requete = "DELETE FROM categories where (id='$idcatego')";
$resultat = $connexiondb->prepare($requete);
$resultat -> execute();
if($resultat){
    header('location:liste.php?delete=ok');
}
?>