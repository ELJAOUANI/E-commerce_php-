<?php 
session_start();
//test user connecter
if(!isset($_SESSION['nom'])){ // user non connecter
    header('location: ../connexion.php');
    exit();
}

$visiteur = $_SESSION['ID'];





 $id_produit = $_POST['produit'];
 $quantite = $_POST['quantite'];


 // selectionner le produit avec leur id 

 $servername = "localhost";
 $dbuser = "root";
 $dbpassword= "";
 $dbname="ecommerce";
 try{
     $connexiondb = new PDO(
         "mysql:host=$servername;dbname=$dbname;charset=utf8",
         $dbuser,
         $dbpassword
         
      );
      
 }catch(Exception $e){
     die('erreur : ' . $e->getMessage());
 }
 

    $requete = "SELECT prix ,nom FROM produits WHERE ID='$id_produit'";
    $resultat = $connexiondb->query($requete);
  
    $produit = $resultat->fetch();
    
   
 $total =  $quantite * $produit['prix'];
 $date = date("Y-m-d");
 if(!isset($_SESSION['panier'])){   //panier n'existe de pas 
    $_SESSION['panier'] = array( $visiteur , 0 , $date , array()  );  // creation de panier , dek 0 dial toutes les commandes li ghatkoun par defaut 0
  } 
  $_SESSION['panier'][1] += $total; // katjma3 totaal du panier 
  $_SESSION['panier'][3][] = array ($quantite , $total , $date , $date , $id_produit , $produit['nom']); // push : pour ecire un nouveau enregistrement 



    header('location:../panier.php');

 


?>  