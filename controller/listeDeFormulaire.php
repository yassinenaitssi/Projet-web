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
include_once('../model/getFormulaire.php');
include_once('../model/removeFormulaire.php');
include_once('../model/updateFormulaire.php');
include_once('../model/findFormulaire.php');

$formulaires = getFormulaire();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	switch($_POST['submit'])
	{

  case 'deconnexion';

          setcookie('pseudo', $_POST['Pseudo'], time()-86400, null, null, false, true);
              header("Refresh:0");
         case 'search':
        
       $formulaires = findFormulaire($_POST['residentId']);   

    break;
		 case 'supprimer': 
    foreach ($_POST as $post) {
     	removeFormulaire($post);
                               }
                                 header("Refresh:0");
    break;

    case 'modifier':

     	if (empty($_POST['Date_fin_reel']))
     		{$_POST['Date_fin_reel'] = NULL;}
     	if (empty($_POST['Heure_fin_reel']))
     		{$_POST['Heure_fin_reel'] = NULL;}
     	updateFormulaire($_POST['formulaireId'],$_POST['NumSalle'],$_POST['NumeroBat'],$_POST['Date_debut'],$_POST['Date_fin'],$_POST['Date_fin_reel'],$_POST['Heure_Debut'],$_POST['Heure_fin'],$_POST['Heure_fin_reel'],$_POST['nombre_participant']);
 header("Refresh:0");  
   break;
     
	}

  
	 
     
}



include_once('../view/listeDeFormulaire.php');