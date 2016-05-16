<?php

function getSalles()

{

    global $bdd;     

    $req = $bdd->prepare('SELECT * FROM salle_de_travail ORDER BY NumeroBat , NumSalle');

    $req->execute();

    $salles = $req->fetchAll();

    return $salles;

}