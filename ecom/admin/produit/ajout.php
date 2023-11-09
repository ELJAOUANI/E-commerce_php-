<?php 
session_start();
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$categorie = $_POST['categorie']; 
$quantite = $_POST['quantite']; 
$date_creation = date("Y-m-d");

//upload image
$target_dir = "../../photo/"; // ana li ktabtha 
$target_file = $target_dir . basename($_FILES["image"]["name"]); // w3school script upload photo
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$date = date('Y-m-d');
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
     $requete = "INSERT INTO produits(nom,description,prix,image,createur,categorie,date_creation) VALUES ('$nom','$description','$prix','$image','$createur','$categorie','$date_creation') ";
     $resultat = $connexiondb->prepare($requete);
     $resultat->execute();

if($resultat){
     $produit_id = $connexiondb->lastInsertId();
     $requete2 = "INSERT INTO stocks (produit,quantite,createur,date_creation) VALUES ('$produit_id','$quantite','$createur','$date_creation')";
     
     
    if($connexiondb->query($requete2))
    {
      header('location:liste.php?ajout=ok');
    }
    else {
      echo "Impossible d'ajouter le stock du produit";
    }
  
      
    }
     
        
     
}catch(Exception $e){
   // die('erreur : ' . $e->getMessage());
   if($e ->getCode()== 23000){
   // echo"Ce nom de categorie existe deja";
   header('location:liste.php?erreur=duplicate');
   }
   }
?>