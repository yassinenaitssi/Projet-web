
<?php


function newFormulaire($residentId, $NumSalle,$NumeroBat,$Date_debut,$Date_fin,$Heure_Debut,$Heure_fin,$nombre_participant)
{

global $bdd;   
try {



   $req = $bdd->prepare("INSERT INTO formulaire  VALUES (Null, :residentId, :NumSalle,  :NumeroBat, :Date_debut, :Date_fin,:Heure_Debut,:Heure_fin , Null ,:nombre_participant, Null)");
   $req -> bindParam(':residentId', $residentId);
   $req -> bindParam(':NumSalle', $NumSalle);
   $req->bindParam(':NumeroBat', $NumeroBat);
   $req->bindParam(':Date_debut', $Date_debut);
   $req->bindParam(':Date_fin', $Date_fin);
   $req->bindParam(':Heure_Debut', $Heure_Debut);
   $req->bindParam(':Heure_fin', $Heure_fin);
   $req->bindParam(':nombre_participant', $nombre_participant);
   

     $req->execute();


    

  }
  catch(PDOException $e)
  {
     $error=substr($e->getMessage(), 80, -18);
     return $error;
     
   

  }
}