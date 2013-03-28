<?php
       require ('./modeles/utilisateur.php');
       require ('./vueMenuInscription.php');
       
// récupération des données du formulaires
$nom = $_POST['nom'];

$adresse = $_POST['adresse'];
$idIntitule=$_POST['idIntitule'];
$identifiantConnexion=$_POST['identifiantConnexion'];
$motDePasseConnexion=$_POST['motDePasseConnexion'];

// connexion à ma base
$connexion = new PDO('mysql:host=127.0.0.1;dbname=monprojet','root','');



// je crée la requête SQL, pour ensuite l'envoyer


echo "Vos données ont été envoyées !";

// fermeture de la connexion vers Mysql
mysql_close();
?>


