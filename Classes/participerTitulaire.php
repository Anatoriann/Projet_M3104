<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 19/12/2018
 * Time: 15:15
 */
require_once('Joueur.php');
require_once('Match.php');

class participerTitulaire
{
    public static function ajouterTitulaire($numLicence, $idMatch, $poste){

        $linkpdo = connectPDO();
        if (!empty($numLicence) && !empty($idMatch) && !empty($poste)){
            if (self::nbTitulaire($numLicence,$idMatch)== 0){
                if(Joueur::nbJoueurNum($numLicence)!= 0){
                    if(Match::nbMatchs($idMatch)!= 0){
                        $reqInsert = $linkpdo->prepare("insert into participertitulaire (`numLicence`,`idMatch`,`posteOccupe`)
                                                      values (:numLicence, :idMatch, :poste)");
                        $reqInsert->execute(array('numLicence'=>$numLicence,
                            'idMatch'=>$idMatch,
                            'poste'=>$poste));
                        if (self::nbTitulaire($numLicence,$idMatch)!= 0) {
                            return 0;
                        }
                        else {
                            return 10;
                        }
                    }
                    else{
                        return 12;
                    }
                }
                else {
                    return 11;
                }
            }
            else {
                return 8;
            }
        }
        else {
            return 9;
        }

    }



    public static function nbTitulaire($numLicence, $idMatch){
        $linkpdo = connectPDO();
        $reqRech = $linkpdo->prepare("select * from participertitulaire where numLicence = :num and idMatch = :idMatch");
        $reqRech->execute(array('num'=>$numLicence, 'idMatch' => $idMatch));
        return $reqRech->rowCount();
    }

    public static function joueurDunMatch($idM){
        $linkpdo = connectPDO();
        $reqRech = $linkpdo->prepare("SELECT * FROM `participertitulaire` WHERE `idMatch`= :idM");
        $reqRech->execute(array('idM'=>$idM));
        return $reqRech;
    }

    public static function notation($idM, $licence, $note, $commentaire){
        $linkpdo = connectPDO();
        $reqUpdate = $linkpdo->prepare("UPDATE `participertitulaire` SET `notation`=:note,`commentaire`=:commentaire WHERE `numLicence` = :licence AND`idMatch`= :idM");
        $reqUpdate->execute(array('note' => $note, 'commentaire' => $commentaire, 'licence' => $licence, 'idM' => $idM));
    }

    public static function matchDunJoueur($licence){
        $linkpdo = connectPDO();
        $reqRech = $linkpdo->prepare("SELECT * FROM `participertitulaire` WHERE `numLicence`=:num");
        $reqRech->execute(array('num'=>$licence));
        return $reqRech;
    }
}