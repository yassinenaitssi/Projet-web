<?php


function removeResident($post)

{

    global $bdd;     

   
   $req = $bdd->prepare("DELETE FROM resident WHERE residentId = :post");
   $req -> bindParam(':post', $post);
   $req->execute();

}