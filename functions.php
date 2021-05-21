<?php

function enregistrerFichierEnvoye(array $infoFichier): string
{
    // strval(): Récupère la valeur d'une variable, au format chaîne
    //time():Retourne le timestamp
    // on récuppere la date et l'heure en string dans $timestamp.
    $timestamp = strval(time());

    // pathinfo(): Retourne des informations sur un chemin système
    // basename(): Retourne le nom de la composante finale d'un chemin
    $extension = pathinfo(basename($infoFichier["name"]), PATHINFO_EXTENSION);
    //création du nom de l'image en vue de le sauveguardé
    $nomDuFichier = 'produit_' . $timestamp . '.' . $extension;
    //création du lien de stockage de l'image 
     $dossierStockage = __DIR__ . '/uploads/';

    //on vérifie si le dossier ou l'on va stocké l'image existe

    if (file_exists($dossierStockage) === false)
    {

        // sinon on crée le dossier
        mkdir($dossierStockage);
    }
    // on copie l'image dans son nouveau repertoire
    move_uploaded_file($infoFichier["tmp_name"], $dossierStockage . $nomDuFichier);
    // return '../uploads/' . $nomDuFichier;
    // on renvoi le lien vers le fichier
    return '/TP_PHP/uploads/' . $nomDuFichier;
}
function onVaRediriger(string $path)
{

    // on modifie le header (l'URL) pour redirigé
    header('LOCATION: .' . $path);
    // on sort de la fonction
    die();
}