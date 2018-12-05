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
    public function addJoueur($licence, $nom, $prenom, $photo, $dateNaissance, $taille, $poids, $postePrefere, $statut, $commentaire){
        $this->numLicence = $licence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->photo = $photo;
        $this->dateNaissance = $dateNaissance;
        $this->taille=$taille;
        $this->poids = $poids;
        $this->postePrefere = $postePrefere;
        $this->statut = $statut;
        $this->commentaire = $commentaire;

        $linkpdo = connectPDO();
        $res = $this->nbJoueurNum($licence);
        echo($res);

        if( $res > 0){
            echo('Le joueur existe déjà, vous pouvez le modifier à l\'adresse : ');
        }
        else{
            $reqInsert = $linkpdo->prepare("insert into Joueur (`numLicence`, `nom`, `prenom`, `photo`, `dateNaissance`, `taille`, `poids`, `postePrefere`, `statut`, `commentaire`) VALUES (:numLicence, :nom, :prenom, :photo:, :dateNaissance, :taille, :poids, :postePrefere, :statut, :commentaire)");
            $reqInsert->execute(array('numLicence'=>$licence,
                'nom'=>$nom,
                'prenom'=>$prenom,
                'photo'=>$photo,
                'dateNaissance'=>$dateNaissance,
                'taille'=>$taille,
                'poids'=>$poids,
                'postePrefere'=>$postePrefere,
                'statut'=>$statut,
                'commentaire'=>$commentaire));
            $res = $this->nbJoueurNum($licence);
            echo($res);
        }



    }

    public function nbJoueurNum($licence){
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from Joueur where numLicence= :licence');
        $reqRecherche->execute(array('licence'=> $licence));
        return $reqRecherche->rowCount();
    }


}
