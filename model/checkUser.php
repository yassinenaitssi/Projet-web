
<?php


function checkUser($identifiant, $password)

{

    global $bdd; 

   
   $req = $bdd->prepare("SELECT * FROM utilisateurs where identifiant = :identifiant" );
   $req -> bindParam(':identifiant', $identifiant);
   $req->execute();
   $mdp = $req->fetch();
   
if (md5($password)  == $mdp['motdepasse'])
{
	return 1;
}
 


   

      

}