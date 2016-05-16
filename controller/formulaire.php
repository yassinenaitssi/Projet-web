
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

include_once('../model/newFormulaire.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	
foreach ($_POST as $post) {
	
}
  $test = newFormulaire($_POST['residentId'],$_POST['NumSalle'],$_POST['NumeroBat'],$_POST['Date_debut'],$_POST['Date_fin'],$_POST['Heure_Debut'],$_POST['Heure_fin'],$_POST['nombre_participant']);
if (!empty($test))
{
	
		     
		if ($test == "ld row: a foreign key constraint fails (`citecolombiere`.`formulaire`, CONSTRAINT `FK_formulaire_residentId` FOREIGN KEY (`residentId`) REFERENCES `resident` (`residentId`)" )
	{     
		echo 1;
		$test = 'Numero de resident non trouvée';
		
	}
	if ( $test == "ld row: a foreign key constraint fails (`citecolombiere`.`formulaire`, CONSTRAINT `FK_formulaire_NumSalle` FOREIGN KEY (`NumSalle`) REFERENCES `salle_de_travail` (`NumSalle`)" )
	{            
		$test = 'cette salle n`existe pas';
		
	}
	
		include_once('../view/Alerte.php');
	

	
	
}
else
{
	header('Location: ../controller/listeDeFormulaire.php');
  exit();
}
 

	
}
include_once('../view/formulaire.php');