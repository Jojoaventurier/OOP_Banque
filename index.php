<?php


require "classes/Compte.php";
require "classes/Titulaire.php";


$geoffroy = new Titulaire("Maur", "Geoffroy", "1990-11-13", "Mulhouse");
$premierCompte = new Compte("Compte courant", 10, "EUR", $geoffroy);
$deuxiemeCompte = new Compte("Compte épargne", 0, "EUR", $geoffroy);


var_dump($geoffroy);

echo $premierCompte->crediterCompte(25);
echo $premierCompte->debiterCompte(5);

echo $premierCompte->transfertArgent(12, $deuxiemeCompte);

echo $geoffroy->infosTitulaire();

echo $premierCompte->infosCompte();