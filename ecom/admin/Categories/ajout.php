<?php
session_start();
//La recuperation des donnes de la formulaire 
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['ID'];
$date_creation = date("Y-m-d");
//2_ La chaine de connexion 
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
     $requete = "INSERT INTO categories(nom,description,createur,date_creation) VALUES ('$nom','$description','$createur','$date_creation') ";
$resultat = $connexiondb->prepare($requete);
$resultat->execute();

if($resultat){
    header('location:liste.php?ajout=ok');
        }
     
}catch(Exception $e){
   // die('erreur : ' . $e->getMessage());
   if($e ->getCode()== 23000){
   // echo"Ce nom de categorie existe deja";
   header('location:liste.php?erreur=duplicate');
   }
}
?>