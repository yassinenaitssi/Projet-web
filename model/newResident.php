
<?php


function newResident($Nom, $Prenom,$DatedeNaissance,$NumeroBat,$numeroChambre,$nationalite,$numeroDeTelephone)

{

    global $bdd;     

   
   $req = $bdd->prepare("INSERT INTO resident  VALUES (Null, :Nom, :Prenom, :DatedeNaissance, :NumeroBat, :numeroChambre,:nationalite,:numeroDeTelephone)");
   $req -> bindParam(':Nom', $Nom);
   $req -> bindParam(':Prenom', $Prenom);
   $req->bindParam(':DatedeNaissance', $DatedeNaissance);
   $req->bindParam(':NumeroBat', $NumeroBat);
   $req->bindParam(':numeroChambre', $numeroChambre);
   $req->bindParam(':nationalite', $nationalite);
   $req->bindParam(':numeroDeTelephone', $numeroDeTelephone);

     $req->execute();

}