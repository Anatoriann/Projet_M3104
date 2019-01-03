<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 19/12/2018
 * Time: 15:08
 */

require_once('connectPDO.php');

class participerRemplacant
{

    public static function ajouterRemplacant($numLicenceR1, $numLicenceR2, $numLicenceR3, $numLicenceR4, $numLicenceR5, $idM){
        $linkpdo = connectPDO();
        try {
            $reqInsert = $linkpdo->prepare("INSERT INTO `participerremplacant` (`numLicence`, `idMatch`) VALUES (:licence, :idM)");
            $reqInsert->execute(array('licence' => $numLicenceR1, 'idM' => $idM));
            $reqInsert->execute(array('licence' => $numLicenceR2, 'idM' => $idM));
            $reqInsert->execute(array('licence' => $numLicenceR3, 'idM' => $idM));
            $reqInsert->execute(array('licence' => $numLicenceR4, 'idM' => $idM));
            $reqInsert->execute(array('licence' => $numLicenceR5, 'idM' => $idM));
        }catch(Exception $e){
            return 16;
        }
        return 0;
    }

    public static function remplacantDunMatch($idM){
        $linkpdo = connectPDO();
        $reqRech = $linkpdo->prepare("SELECT * FROM `participerremplacant` WHERE `idMatch`= :idM");
        $reqRech->execute(array('idM'=>$idM));
        return $reqRech;
    }

    public static function notation($idM, $licence, $note, $commentaire){
        $linkpdo = connectPDO();
        $reqUpdate = $linkpdo->prepare("UPDATE `participerremplacant` SET `notation`=:note,`commentaire`=:commentaire WHERE `numLicence` = :licence AND`idMatch`= :idM");
        $reqUpdate->execute(array('note' => $note, 'commentaire' => $commentaire, 'licence' => $licence, 'idM' => $idM));
    }

}