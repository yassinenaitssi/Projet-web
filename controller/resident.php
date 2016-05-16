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



include_once('../model/getResident.php');

include_once('../model/removeResident.php');
include_once('../model/updateResident.php');
include_once('../model/findResident.php');


$residents = getResident();


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  switch($_POST['submit'])
	{
    
    case 'search':
        
       $residents = findResident($_POST['residentId']);   

    break;
    case 'deconnexion':

          setcookie('pseudo', $_POST['Pseudo'], time()-86400, null, null, false, true);
              header("Refresh:0");

    break;

		 case 'supprimer': 
    foreach ($_POST as $post) {
      
     	removeResident($post);
                               }
      header("Refresh:0");
    break;

    case 'modifier':

updateResident($_POST['residentId'],$_POST['Nom'],$_POST['Prenom'],$_POST['DatedeNaissance'],$_POST['NumeroBat'],$_POST['numeroChambre'],$_POST['nationalite'],$_POST['numeroDeTelephone']);

              header("Refresh:0");      
                               
    break;
	}


}




include_once('../view/resident.php');


