<?php


function removeFormulaire($post)

{

    global $bdd;     

   
   $req = $bdd->prepare("DELETE FROM formulaire WHERE formulaireId = :post");
   $req -> bindParam(':post', $post);
   $req->execute();

}