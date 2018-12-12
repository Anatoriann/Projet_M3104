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


        $reqInser = $linkpdo->prepare("INSERT INTO `matchs`(`dateM`, `heureM`, `nomAdversaire`, `lieuDeRencontre`, `statut`) 
                                                VALUES (:dateM, :heureM, :nomAdversaire, :lieu, 0)");
        $reqInser->execute(array(
                            'dateM'=> date('Y-m-d', strtotime($dateM)),
                            'heureM' => date('H:i',strtotime($heureM)),
                            'nomAdversaire' => $adversaire,
                            'lieu' => $lieuDeRencontre));
        return $reqInser;
    }
}