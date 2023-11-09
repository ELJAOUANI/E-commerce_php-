<?PHP 

function getAllCategories(){
    
    require('testcon.php');
$requete = 'SELECT * FROM categories';
$sqlstatement = $connexiondb->prepare($requete);
$sqlstatement->execute();
$categories = $sqlstatement->fetchAll();
return $categories;
}
function getAllproduits(){
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
    
    $requete = 'SELECT * FROM produits';
    $sqlstatement = $connexiondb->prepare($requete);
    $sqlstatement->execute();
    $produits = $sqlstatement->fetchAll();
    return $produits;
}
function getproduitbyId($id){
require('testcon.php');
$requete = "SELECT * FROM produits where ID =$id";
$sqlstatement = $connexiondb->prepare($requete);
    $sqlstatement->execute();
    $produit = $sqlstatement->fetch();
    return $produit;
} 
    function AddVisiteur($data){
    require('testcon.php');
    $mphash = md5($data["mp"]);
    $requete = "INSERT INTO visiteurs(nom,prenom,email,mp,telephone) VALUES('".$data["nom"]."','".$data["prenom"]."','".$data["email"]."','".$mphash."','".$data["telephone"]."')";
    $resultat = $connexiondb->prepare($requete);
    $resultat->execute();
    if($resultat){
        return true;
    }else{
        return false;
    }
} 
function connectVisiteur($data){
    require('testcon.php');
    $email = $data['email'];
    $mp = md5($data['mp']);
    $requete = "SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";
    $resultat = $connexiondb->prepare($requete);
    $resultat->execute();
    $user = $resultat->fetch();
    return $user; 
    

}
function connectAdmin($data){
    require('../testcon.php');
    $email = $data['email'];
    $mp =  $data['mp'];                   //md5($data['mp']); 21232f297a57a5a743894a0e4a801fc3
    $requete = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
    $resultat = $connexiondb->prepare($requete);
    $resultat->execute();
    $user = $resultat->fetch();
    return $user; 
}
function getAllCategoriies(){ // fonction khassa ghir b page liste.php
    
    require('../../testcon.php');
$requete = 'SELECT * FROM categories';
$sqlstatement = $connexiondb->prepare($requete);
$sqlstatement->execute();
$categories = $sqlstatement->fetchAll();
return $categories;
}
function getAllusers(){
    require('../../testcon.php');
    $requete = 'SELECT * FROM visiteurs where etat=0';
    $resultat = $connexiondb->prepare($requete);
$resultat->execute();
$users = $resultat->fetchAll();
return $users;

}
function getStocks(){
    require('../../testcon.php');
    $requete = 'SELECT s.ID,p.nom,s.quantite FROM produits p , stocks s WHERE p.ID = s.produit';
    $resultat = $connexiondb->prepare($requete);
$resultat->execute();
$stock = $resultat->fetchAll();
return $stock;


    
}
function getAllpanier(){


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



    $requete = "SELECT v.nom , v.prenom , v.telephone , p.total , p.etat , p.date_creation,  p.ID FROM paniers p , visiteurs v WHERE p.visiteur = v.ID ";
    $resultat = $connexiondb->query($requete);
    // $resultat->execute();
    $paniers= $resultat->fetchAll();
    return $paniers;


    
}
function getAllcommandes(){
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
    
    $requete = "SELECT p.nom , p.image , c.quantite, c.total , c.panier  FROM commandes c , produits p  WHERE c.produit = p.ID ";
    $resultat = $connexiondb->query($requete);
    // $resultat->execute();
    $commandes= $resultat->fetchAll();
    return $commandes;

}
function ChangerEtatPanier($data){
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
    $requete = "UPDATE paniers SET etat='".$data['etat']."' WHERE ID='".$data['panier_id']."'";
    $resultat = $connexiondb->query($requete);
    $etat= $resultat->fetchAll();
    return $etat;
}
function getPaniersbByEtat($paniers,$etat){
$paniersEtat = array();
foreach($paniers as $p){
    if ($p['etat'] == $etat){
        array_push($paniersEtat,$p);
        
    }
}
return $paniersEtat;
}
function editAdmin($data){
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
    if($data['mp'] != ""){ //mot de passe a une valeur
        $requete = "UPDATE administrateur SET nom='".$data['nom']."', email='".$data['email']."', mp='".$data['mp']."' WHERE ID='".$data['id_admin']."'";
    }else{
        $requete = "UPDATE administrateur SET nom='".$data['nom']."', email='".$data['email']."' WHERE ID='".$data['id_admin']."'";
    }
    
    $resultat = $connexiondb->query($requete);
    $admin= $resultat->fetchAll();
    return $admin;
}
function getData(){
    
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

$data = array();
$requete = "SELECT COUNT(*) from produits";
$resultat = $connexiondb->query($requete);
$nbrPro= $resultat->fetch();
//return $nbrPro;
$requete = "SELECT COUNT(*) from categories";
$resultat = $connexiondb->query($requete);
$nbrCat= $resultat->fetch();
//return $nbrCat;
$requete = "SELECT COUNT(*) from visiteurs";
$resultat = $connexiondb->query($requete);
$nbrClient= $resultat->fetch();
//return $nbrClient;
$requete = "SELECT COUNT(*) from stocks";
$resultat = $connexiondb->query($requete);
$nbrStock= $resultat->fetch();
//
$requete = "SELECT COUNT(*) from paniers";
$resultat = $connexiondb->query($requete);
$nbrPanier= $resultat->fetch();



$data["produit"] = $nbrPro[0];
$data["categories"] = $nbrCat[0];
$data["client"] = $nbrClient[0];
$data["stock"] = $nbrStock[0];
$data["panier"] = $nbrPanier[0];


return $data;

    }



?>