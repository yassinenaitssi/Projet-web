<?php


try

{
    $bdd = new PDO('mysql:host='.getenv('OPENSHIFT_MYSQL_DB_HOST').';dbname='.getenv('OPENSHIFT_APP_NAME'), getenv('OPENSHIFT_MYSQL_DB_USERNAME'), getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)

{
        die('Erreur : '.$e->getMessage());
}
?>

<?php
include_once('../model/newResident.php');

 


include_once('../view/register.php');


if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	newResident($_POST['Nom'],$_POST['Prenom'],$_POST['DatedeNaissance'],$_POST['NumeroBat'],$_POST['numeroChambre'],$_POST['Nationalité'],$_POST['numeroDeTelephone']);
	  header('Location: ../controller/resident.php');
  exit();
}


