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

}