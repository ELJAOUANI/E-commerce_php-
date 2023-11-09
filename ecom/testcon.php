<?php 
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


?>