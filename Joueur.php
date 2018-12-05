<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 05/12/2018
 * Time: 14:17
 */

class Joueur
{
    public $numLicence;
    public $nom;
    public $prenom;
    public $photo;
    public $dateNaissance;
    public $taille;
    public $poids;
    public $postePrefere;
    public $statut;
    public $commentaire;

    public function __construct()
    {
    }

    public function addJoueur($licence, $nom, $prenom, $photo, $dateNaissance, $taille, $poids, $postePrefere, $statut, $commentaire){
        this->$this->numLicence = licence;
        this->nom = nom;
    }


}
