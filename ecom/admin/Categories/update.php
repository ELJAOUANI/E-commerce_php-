<?php
session_start();
//La recuperation des donnes de la formulaire 
$id = $_POST['IDcatego'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['ID'];
$date_modification = date("Y-m-d");
//2_ La chaine de connexion 

   
        require ('../../testcon.php');
        $requete = "UPDATE categories SET nom='$nom', description='$description', date_modification='$date_modification' where ID='$id' ";
        $resultat = $connexiondb->prepare($requete);
        $resultat->execute();
        if($resultat){
            header('location:liste.php?modif=ok');
        }
        ?>