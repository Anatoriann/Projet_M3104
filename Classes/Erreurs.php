<?php
/**
 * Created by PhpStorm.
 * User: anato
 * Date: 10/12/2018
 * Time: 14:31
 */
class Erreurs{

    public static function messageErreur($erreur){
        switch ($erreur){
            case 1 :
                $return = 'Le joueur existe déjà, veuillez passer par la page de modification';
                break;
            case 2:
                $return = 'Erreur lors de l\'insertion';
            case 3:
                $return = 'Erreur lors de la suppression';
            case 4:
                $return = 'Joueur non supprimé';
        }
        return $return;
    }
}