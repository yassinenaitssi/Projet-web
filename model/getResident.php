<?php

function getResident()

{

    global $bdd;     

    $req = $bdd->prepare('SELECT * FROM resident');

    $req->execute();

    $residents = $req->fetchAll();

    return $residents;

}