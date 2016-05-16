<?php


function findResident($post)

{

    global $bdd;     
 
     $req = $bdd->prepare('SELECT * FROM resident where residentId LIKE :post' );
      $req -> bindParam(':post', $post);

    $req->execute();

    $residents = $req->fetchAll();

   

    return $residents;



}