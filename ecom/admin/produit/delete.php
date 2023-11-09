<?php
// echo "id de categorie".$_GET['IDcatego'];
$idprod = $_GET['IDprod'];
include ('../../testcon.php');
$requete = "DELETE FROM produits where (id='$idprod')";
$resultat = $connexiondb->prepare($requete);
$resultat -> execute();

if($resultat){
    header('location:liste.php?delete=ok');
}
?>