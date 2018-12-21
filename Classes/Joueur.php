<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 05/12/2018
 * Time: 14:17
 */

require_once('connectPDO.php');

class Joueur
{
    public static function addJoueur($licence, $nom, $prenom, $photo, $dateNaissance, $taille, $poids, $postePrefere, $statut)
    {

        $linkpdo = connectPDO();
        $res = Joueur::nbJoueurNum($licence);

        if ($res > 0) {
            return 1; // Erreur 1 : Le joueur est déjà présent
        } else {
            $reqInsert = $linkpdo->prepare("insert into Joueur (`numLicence`, `nom`, `prenom`, `photo`, `dateNaissance`, `taille`, `poids`, `postePrefere`, `statut`) VALUES (:numLicence, :nom, :prenom, :photo, :dateNaissance, :taille, :poids, :postePrefere, :statut)");
            $reqInsert->execute(array('numLicence' => $licence,
                'nom' => $nom,
                'prenom' => $prenom,
                'photo' => $photo,
                'dateNaissance' => date('Y-m-d', strtotime($dateNaissance)),
                'taille' => $taille,
                'poids' => $poids,
                'postePrefere' => $postePrefere,
                'statut' => $statut));
            $res = Joueur::nbJoueurNum($licence);
            if ($res > 0) {
                return 0;
            } else {
                return 2;//Erreur 2 : Erreur lors de l'insertion
            }
        }


    }

    public static function nbJoueurNum($licence)
    {
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from Joueur where numLicence= :licence');
        $reqRecherche->execute(array('licence' => $licence));
        return $reqRecherche->rowCount();
    }

    public static function selectJoueurs()
    {
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from Joueur');
        $reqRecherche->execute();
        return $reqRecherche;
    }

    public static function selectJoueur($numLicence)
    {
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from Joueur where numLicence = :num');
        $reqRecherche->execute(array('num' => $numLicence));
        return $reqRecherche;
    }

    public static function updateJoueur($licence, $nom, $prenom, $photo, $dateNaissance, $taille, $poids, $postePrefere, $statut, $commentaire){        $linkpdo = connectPDO();
        try {
            $reqUpdate = $linkpdo->prepare('update Joueur 
                                                  set nom=:nom,
                                                      prenom=:prenom,
                                                      photo=:photo,
                                                      dateNaissance=:dateN,
                                                      taille=:taille,
                                                      poids=:poids,
                                                      postePrefere=:postePrefere,
                                                      statut=:statut,
                                                      commentaire=:commentaire
                                                  where numLicence=:licence');
            $reqUpdate->execute(array('numLicence' => $licence,
                'nom' => $nom,
                'prenom' => $prenom,
                'photo' => $photo,
                'dateNaissance' => date('Y-m-d', strtotime($dateNaissance)),
                'taille' => $taille,
                'poids' => $poids,
                'postePrefere' => $postePrefere,
                'statut' => $statut,
                'commentaire' => $commentaire));
        } catch (Exception $e) {
            return 3; // L'update ne s'est pas fait
        }
        return 0;
    }

    public static function deleteJoueur($licence){
        $linkpdo = connectPDO();
        $reqDelete = $linkpdo->prepare('delete from Joueur where numLicence = :licence');
        $reqDelete->execute(array('licence'=>$licence));
        if(Joueur::nbJoueurNum($licence)==1){
            return 4; //Joueur non supprimé
        }
        return 0;
    }
}
