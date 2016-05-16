<?php


function findFormulaire($post)

{

    global $bdd;     
 
     $req = $bdd->prepare('SELECT * FROM formulaire where residentId LIKE :post' );
      $req -> bindParam(':post', $post);

    $req->execute();

    $formulaires = $req->fetchAll();

   

    return $formulaires;



}