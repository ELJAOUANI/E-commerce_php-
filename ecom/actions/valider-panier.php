<?php 
session_start();
include('../testcon.php');
$visiteur = $_SESSION['ID'];
$total = $_SESSION['panier'][1];
$date = date("Y-m-d");
// creation de panier 
 $requette_panier = "INSERT INTO paniers (visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";

 //execution requette_panier

 $result = $connexiondb->query($requette_panier);
 
 $panier_id = $connexiondb->lastInsertId();

 // ajoutet commande 
$commandes= $_SESSION['panier'][3];


foreach($commandes as $commande){
    $quantite = $commande[0]; 
    $total = $commande[1];
    $id_produit = $commande[4];
    $requete2 = "INSERT INTO  commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES ('$quantite','$total','$panier_id','$date','$date','$id_produit')"; //requette
    $resultat = $connexiondb->query($requete2); // execution requette
   
}
 

//sepprimer le panier 
$_SESSION['panier'] = null ; 
// redirction page index 
header('location:../index.php');
  




?>