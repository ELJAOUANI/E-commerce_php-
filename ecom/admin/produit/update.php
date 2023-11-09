<?php
session_start();
//La recuperation des donnes de la formulaire 
$id = $_POST['IDprod'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['ID'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$date_modification = date("Y-m-d");
$target_dir = "../../photo/"; // ana li ktabtha 
$target_file = $target_dir . basename($_FILES["image"]["name"]); // w3school script upload photo
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
//2_ La chaine de connexion 

   
        require ('../../testcon.php');
        $requete = "UPDATE produits SET nom='$nom', description='$description',prix='$prix',createur='$createur',date_modification='$date_modification',image='$image' where ID='$id' ";
        $resultat = $connexiondb->prepare($requete);
        $resultat->execute();
        if($resultat){
            header('location:liste.php?modif=ok');
        }
        ?>