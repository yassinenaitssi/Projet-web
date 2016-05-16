
<?php


 
 function updateFormulaire($formulaireId,$NumSalle,$NumeroBat,$Date_debut,$Date_fin,$Date_fin_reel,$Heure_Debut,$Heure_fin,$Heure_fin_reel,$nombre_participant)


{

    global $bdd;   


   $req = $bdd->prepare (" UPDATE formulaire  SET   NumSalle= :NumSalle,  
                                                    NumeroBat= :NumeroBat, 
                                                    Date_debut =:Date_debut,
                                                    Date_fin=:Date_fin, 
                                                    Date_fin_reel = :Date_fin_reel,
                                                    Heure_Debut = :Heure_Debut,
                                                    Heure_fin = :Heure_fin, 
                                                    Heure_fin_reel = :Heure_fin_reel,
                                                    nombre_participant = :nombre_participant
                                                      where formulaireId= :formulaireId
                                                       ");

   $req -> bindParam(':NumSalle', $NumSalle);
   $req->bindParam(':NumeroBat', $NumeroBat);
   $req->bindParam(':Date_debut', $Date_debut);
   $req->bindParam(':Date_fin', $Date_fin);
   $req->bindParam(':Date_fin_reel', $Date_fin_reel);
   $req->bindParam(':Heure_Debut', $Heure_Debut);
   $req->bindParam(':Heure_fin', $Heure_fin);
    $req->bindParam(':Heure_fin_reel', $Heure_fin_reel);
   $req->bindParam(':nombre_participant', $nombre_participant);
      $req -> bindParam(':formulaireId', $formulaireId);
  
   

     $req->execute();

}