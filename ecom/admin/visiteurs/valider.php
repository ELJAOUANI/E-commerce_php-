<?php 
$idvisiteur = $_GET['ID'];

include ('../../testcon.php');
$requete = "UPDATE visiteurs SET etat=1 WHERE ID='$idvisiteur'";
$resultat = $connexiondb->prepare($requete);
$resultat -> execute();
if($resultat){
    header('location:liste.php?valider=ok');
}else{
    echo "erreur de validation";
}
?>