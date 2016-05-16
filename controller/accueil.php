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

 setcookie('pseudo', $_POST['Pseudo'], time()-86400, null, null, false, true);

include_once('../model/checkUser.php');

 


include_once('../view/accueil.php');


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $test = checkUser($_POST['Pseudo'],$_POST['password']) ;
   if ($test == 1)
   {
   	header('Location: ../controller/resident.php');
    setcookie('pseudo', $_POST['Pseudo'], time()+86400, null, null, false, true);
  exit();
   }
   else 
   {
    $test = "Accès refusé pour des raisons de sécurité";
   	include_once('../view/Alerte.php');
   }
	
}


