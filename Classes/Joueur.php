<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 05/12/2018
 * Time: 14:17
 */

require('connectPDO.php');

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

    /**
     * @param $licence
     * @param $nom
     * @param $prenom
     * @param $photo
     * @param $dateNaissance
     * @param $taille
     * @param $poids
     * @param $postePrefere
     * @param $statut
     * @param $commentaire
     */
    public function addJoueur($licence, $nom, $prenom, $photo, $dateNaissance, $taille, $poids, $postePrefere, $statut){
        $this->numLicence = $licence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->photo = $photo;
        $this->dateNaissance = date('Y-m-d',strtotime($dateNaissance));
        $this->taille=$taille;
        $this->poids = $poids;
        $this->postePrefere = $postePrefere;
        $this->statut = $statut;

        $linkpdo = connectPDO();
        $res = $this->nbJoueurNum($licence);

        if( $res > 0){
            return 1; // Erreur 1 : Le joueur est déjà présent
        }
        else{
            $reqInsert = $linkpdo->prepare("insert into Joueur (`numLicence`, `nom`, `prenom`, `photo`, `dateNaissance`, `taille`, `poids`, `postePrefere`, `statut`) VALUES (:numLicence, :nom, :prenom, :photo, :dateNaissance, :taille, :poids, :postePrefere, :statut)");
            $reqInsert->execute(array('numLicence'=>$licence,
                'nom'=>$nom,
                'prenom'=>$prenom,
                'photo'=>$photo,
                'dateNaissance'=>$this->dateNaissance,
                'taille'=>$taille,
                'poids'=>$poids,
                'postePrefere'=>$postePrefere,
                'statut'=>$statut));
            $res = $this->nbJoueurNum($licence);
            if ($res > 0){
                return 0;
            }
            else{
                return 2;//Erreur 2 : Erreur lors de l'insertion
            }
        }



    }

    public function nbJoueurNum($licence){
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from Joueur where numLicence= :licence');
        $reqRecherche->execute(array('licence'=> $licence));
        return $reqRecherche->rowCount();
    }


}
