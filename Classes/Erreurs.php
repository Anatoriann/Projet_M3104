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
                $return = 'Erreur lors de l\'insertion du joueur';
                break;
            case 3:
                $return = 'Erreur lors de la suppression du joueur';
                break;
            case 4:
                $return = 'Joueur non mis à jour';
                break;
            case 5 :
                $return = 'Le match est déjà présent dans la base';
                break;
            case 6:
                $return = 'Erreur lors de l\'insertion du match';
                break;
            case 7:
                $return = 'Erreur lors de la mise à jour du match';
                break;
        }
        return $return;
    }
}