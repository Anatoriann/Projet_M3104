<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 12/12/2018
 * Time: 14:17
 */

require_once('connectPDO.php');

class Match
{

    public static function addMatch($adversaire, $dateM, $heureM, $lieuDeRencontre){
        $linkpdo = connectPDO();
        $dateExplode = explode('/',$dateM);
        $dateVerif = $dateExplode[2].'-'.$dateExplode[1].'-'.$dateExplode[0];

        // Vérification de l'existance du match
        $reqRecherche = $linkpdo->prepare("select * from matchs where dateM = :dateM and heureM = :heureM and nomAdversaire = :nomAdversaire and lieuDeRencontre = :lieu" );
        $reqRecherche->execute(array(
            'dateM'=> $dateVerif,
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
                            'dateM'=> $dateVerif,
                            'heureM' => date('H:i',strtotime($heureM)),
                            'nomAdversaire' => $adversaire,
                            'lieu' => $lieuDeRencontre));

        // Vérification match bien inséré
        $reqRecherche->execute(array(
            'dateM'=> $dateVerif,
            'heureM' => date('H:i',strtotime($heureM)),
            'nomAdversaire' => $adversaire,
            'lieu' => $lieuDeRencontre));

        if ($reqRecherche->rowCount() == 0){
            return 6; // Match non inséré
        }
        return 0;
    }

    public static function nbMatchs($idMatch){
        $reqRech=self::selectMatch($idMatch);
        return $reqRech->rowCount();
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
        $reqRecherche = $linkpdo->prepare('select * from matchs where idMatch = :num');
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

    public static function addResultat($resLocal, $resAdv, $idMatch){
        $linkpdo = connectPDO();
        try {
            $reqUpdate = $linkpdo->prepare("update `matchs` set `resAdv` = :resAdv, `resLocal`=:resLocal where `idMatch` = :idM");
            $reqUpdate->execute(array('resAdv' => $resAdv, 'resLocal' => $resLocal, 'idM' => $idMatch));
        } catch(Exception $e){
            return 13;
        }
        return 0;
    }

    // Fonction modifier statut
    public static function modifierStatut($idMatch, $statut){
        $linkpdo = connectPDO();
        try {
            $reqUpdate = $linkpdo->prepare("update `matchs` set `statut` = :statut where `idMatch` = :idM");
            $reqUpdate->execute(array('statut' => $statut, 'idM' => $idMatch));
        } catch (Exception $e){
            return 14;
        }
        return 0;
    }

    public static function supprMatch($idMatch){
        $linkpdo = connectPDO();
        try {
            $reqDel = $linkpdo->prepare("DELETE FROM `matchs` WHERE `idMatch` = :idM");
            $reqDel->execute(array('idM' => $idMatch));
        } catch(Exception $e){
            return 15;
        }
        return 0;
    }

    public static function estGagne($idM){
        $linkpdo = connectPDO();
        $reqRech = $linkpdo->prepare("SELECT * FROM `matchs` WHERE `idMatch` = :idM");
        $reqRech->execute(array('idM'=>$idM));
        $m = $reqRech->fetch();
        if ($m['resAdv']<$m['resLocal']){
            return 1;
        }
        elseif ($m['resAdv']==$m['resLocal']){
            return 0;
        }
        else{
            return -1;
        }
    }

    public static function selectMatchFinis(){
        $linkpdo = connectPDO();
        $req = $linkpdo->query("SELECT * FROM `matchs` WHERE `statut` = 2");
        return $req;
    }
}
