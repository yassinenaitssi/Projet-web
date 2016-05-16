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




include_once('../model/getSalles.php');

$salles = getSalles();


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	switch($_POST['submit'])
	{

  case 'deconnexion':

          setcookie('pseudo', $_POST['Pseudo'], time()-86400, null, null, false, true);
              header("Refresh:0");
    break;
    }
}

include_once('../view/salledetravail.php');