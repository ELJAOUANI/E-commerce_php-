<?php
session_start();
//La recuperation des donnes de la formulaire 
$id = $_POST['IDst'];
$quantite = $_POST['quantite'];

//2_ La chaine de connexion 

   
        require ('../../testcon.php');
        $requete = "UPDATE stocks SET quantite='$quantite' where ID='$id' ";
        $resultat = $connexiondb->prepare($requete);
        $resultat->execute();
        if($resultat){
            header('location:liste.php?modif=ok');
        }
        ?>