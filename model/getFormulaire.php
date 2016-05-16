<?php

function getFormulaire()

{

    global $bdd;     

    $req = $bdd->prepare('SELECT * FROM formulaire');

    $req->execute();

    $formualires = $req->fetchAll();

    return $formualires;

}