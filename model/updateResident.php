
<?php


 
 function updateResident($residentId,$Nom,$Prenom,$DatedeNaissance,$NumeroBat,$numeroChambre,$nationalite,$numeroDeTelephone)

                               
{

    global $bdd;   


   $req = $bdd->prepare (" UPDATE resident  SET   Nom= :Nom,  
                                                  Prenom= :Prenom, 
                                                    DatedeNaissance =:DatedeNaissance,
                                                    NumeroBat=:NumeroBat, 
                                                    numeroChambre = :numeroChambre,
                                                    nationalite = :nationalite,
                                                   numeroDeTelephone = :numeroDeTelephone
                                                  
                                                      where residentId= :residentId
                                                       ");

   $req -> bindParam(':Nom', $Nom);
   $req->bindParam(':NumeroBat', $NumeroBat);
   $req->bindParam(':Prenom', $Prenom);
   $req->bindParam(':numeroChambre', $numeroChambre);
   $req->bindParam(':nationalite', $nationalite);
   $req->bindParam(':numeroDeTelephone', $numeroDeTelephone);
   $req->bindParam(':residentId', $residentId);
   $req->bindParam(':DatedeNaissance', $DatedeNaissance);

  
  
  
  
   

     $req->execute();

}