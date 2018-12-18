<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 12/12/2018
 * Time: 14:17
 */

require('connectPDO.php');

class Matchs
{

    public static function addMatch($adversaire, $dateM, $heureM, $lieuDeRencontre){
        $linkpdo = connectPDO();

        // Vérification de l'existance du match
        $reqRecherche = $linkpdo->prepare("select * from matchs where dateM = :dateM and heureM = :heureM and nomAdversaire = :nomAdversaire and lieuDeRencontre = :lieu" );
        $reqRecherche->execute(array(
            'dateM'=> date('Y-m-d', strtotime($dateM)),
            'heureM' => date('H:i',strtotime($heureM)),
            'nomAdversaire' => $adversaire,
            'lieu' => $lieuDeRencontre));

        if ($reqRecherche->rowCount() != 0){
            return 5; //Match déjà créé
        }

        // Insertion du match
        $reqInser = $linkpdo->prepare("INSERT INTO `matchs`(`dateM`, `heureM`, `nomAdversaire`, `lieuDeRencontre`, `statut`) 
                                                VALUES (:dateM, :heureM, :nomAdversaire, :lieu, 0)");
        $reqInser->execute(array(
                            'dateM'=> date('Y-m-d', strtotime($dateM)),
                            'heureM' => date('H:i',strtotime($heureM)),
                            'nomAdversaire' => $adversaire,
                            'lieu' => $lieuDeRencontre));

        // Vérification match bien inséré
        $reqRecherche->execute(array(
            'dateM'=> date('Y-m-d', strtotime($dateM)),
            'heureM' => date('H:i',strtotime($heureM)),
            'nomAdversaire' => $adversaire,
            'lieu' => $lieuDeRencontre));

        if ($reqRecherche->rowCount() == 0){
            return 6; // Match non inséré
        }
        return 0;
    }

    public static function selectMatchs()
    {
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from matchs');
        $reqRecherche->execute();
        return $reqRecherche;
    }

    public static function selectMatch($idMatch)
    {
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from matchs where numLicence = :num');
        $reqRecherche->execute(array('num' => $idMatch));
        return $reqRecherche;
    }

    public static function updateMatch($idMatch, $dateM, $heureM, $lieuDeRencontre, $adversaire){
        $linkpdo = connectPDO();
        try{
            $reqUpdate = $linkpdo->prepare( "UPDATE `matchs` SET `dateM`=  :dateM,`heureM`= :heureM,`nomAdversaire`= :nomAdversaire,`lieuDeRencontre`= :lieuDeRencontre WHERE idMatch = :idMatch");
            $reqUpdate->execute(array(
                'dateM'=> date('Y-m-d', strtotime($dateM)),
                'heureM' => date('H:i',strtotime($heureM)),
                'nomAdversaire' => $adversaire,
                'lieu' => $lieuDeRencontre,
                'idMatch'=>$idMatch));
        } catch (Exception $e) {
            return 7; // L'update ne s'est pas fait
        }
        return 0;
    }

    public static function addResultat($resAdv, $resLocal, $idMatch){
        $linkpdo = connectPDO();
        // On verra plus tard
    }
}