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
    public static function addJoueur($licence, $nom, $prenom, $photo, $dateNaissance, $taille, $poids, $postePrefere, $statut, $commentaire)
    {

        $linkpdo = connectPDO();
        $res = Joueur::nbJoueurNum($licence);

        if ($res > 0) {
            return 1; // Erreur 1 : Le joueur est déjà présent
        } else {
            $reqInsert = $linkpdo->prepare("insert into Joueur (`numLicence`, `nom`, `prenom`, `photo`, `dateNaissance`, `taille`, `poids`, `postePrefere`, `statut`, `commentaire`) VALUES (:numLicence, :nom, :prenom, :photo, :dateNaissance, :taille, :poids, :postePrefere, :statut, :commentaire)");
            $reqInsert->execute(array('numLicence' => $licence,
                'nom' => $nom,
                'prenom' => $prenom,
                'photo' => $photo,
                'dateNaissance' => date('Y-m-d', strtotime($dateNaissance)),
                'taille' => $taille,
                'poids' => $poids,
                'postePrefere' => $postePrefere,
                'statut' => $statut,
                'commentaire' => $commentaire));
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

    public static function selectJoueursActif()
    {
        $linkpdo = connectPDO();
        $reqRecherche = $linkpdo->prepare('select * from Joueur where `statut` = 1');
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

    public static function updateJoueur($licence, $nom, $prenom, $dateNaissance, $taille, $poids, $postePrefere, $statut, $commentaire){
        $linkpdo = connectPDO();
        try {
            $reqUpdate = $linkpdo->prepare('update joueur 
                                                  set nom=:nom,
                                                      prenom=:prenom,
                                                      dateNaissance=:dateN,
                                                      taille=:taille,
                                                      poids=:poids,
                                                      postePrefere=:postePrefere,
                                                      statut=:statut,
                                                      commentaire=:commentaire
                                                  where numLicence=:licence');
            $reqUpdate->execute(array('licence' => $licence,
                'nom' => $nom,
                'prenom' => $prenom,
                'dateN' => date('Y-m-d', strtotime($dateNaissance)),
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
        $reqDelete = $linkpdo->prepare('delete from joueur where numLicence = :licence');
        $reqDelete->execute(array('licence'=>$licence));
        if(Joueur::nbJoueurNum($licence)==1){
            return 4; //Joueur non supprimé
        }
        return 0;
    }

    public static function sontDifferent($joueur1, $joueur2, $joueur3, $joueur4, $joueur5, $rempl1, $rempl2, $rempl3,$rempl4, $rempl5){
        $rep = ($joueur1!=$joueur2)&&($joueur1!=$joueur3)&&($joueur1!=$joueur4)&&($joueur1!=$joueur5)&&($joueur1!=$rempl1)&&($joueur1!=$rempl2)&&($joueur1!=$rempl3)&&($joueur1!=$rempl4)&&($joueur1!=$rempl5)&&
            ($joueur2!=$joueur3)&&($joueur2!=$joueur4)&&($joueur2!=$joueur5)&&($joueur2!=$rempl1)&&($joueur2!=$rempl2)&&($joueur2!=$rempl3)&&($joueur2!=$rempl4)&&($joueur2!=$rempl5)&&
            ($joueur3!=$joueur4)&&($joueur3!=$joueur5)&&($joueur3!=$rempl1)&&($joueur3!=$rempl2)&&($joueur3!=$rempl3)&&($joueur3!=$rempl4)&&($joueur3!=$rempl5)&&
            ($joueur4!=$joueur5)&&($joueur4!=$rempl1)&&($joueur4!=$rempl2)&&($joueur4!=$rempl3)&&($joueur4!=$rempl4)&&($joueur4!=$rempl5)&&
            ($joueur5!=$rempl1)&&($joueur5!=$rempl2)&&($joueur5!=$rempl3)&&($joueur5!=$rempl4)&&($joueur5!=$rempl5)&&
            ($rempl1!=$rempl2)&&($rempl1!=$rempl3)&&($rempl1!=$rempl4)&&($rempl1!=$rempl5)&&
            ($rempl2!=$rempl3)&&($rempl2!=$rempl4)&&($rempl2!=$rempl5)&&
            ($rempl3!=$rempl4)&&($rempl3!=$rempl5)&&
            ($rempl4!=$rempl5);
        return $rep;
    }

    public static function assignerStatut($st){
        switch ($st) {
            case 1 :
                $statut = 'Actif';
                break;
            case 2:
                $statut = 'Suspendu';
                break;
            case 3 :
                $statut = 'Blessé';
                break;
            case 4:
                $statut = 'Absent';
                break;
        }
        return $statut;
    }

    public static function assignerPoste($p){
        switch ($p){
            case 1 :
                $postePrefere = 'Meneur';
                break;
            case 2:
                $postePrefere = 'Arrière';
                break;
            case 3 :
                $postePrefere = 'Ailier';
                break;
            case 4:
                $postePrefere = 'Ailier fort';
                break;
            case 5:
                $postePrefere = 'Pivot';
                break;
        }
        return $postePrefere;
    }

    public static function affichageSansModif(){
       echo "<div class=\"affichage-joueurs\">";
            echo "<div class=\"affichage-joueurs-colg\">";
                $joueurs = Joueur::selectJoueursActif();
                $nbjoueurs = $joueurs->rowCount();
                for($i=0; $i < $nbjoueurs/2; $i++) {
                    $joueurEnCours = $joueurs->fetch();
                    $statut = Joueur::assignerStatut($joueurEnCours['statut']);
                    $postePrefere= Joueur::assignerPoste($joueurEnCours['postePrefere']);
                    $age = round((time()-strtotime($joueurEnCours['dateNaissance']))/(3600*24*365));

                    echo "<div class=\"affichage-joueur\">
                        <button class=\"player-accordion\">
                            <div class=\"player-info\">".$joueurEnCours['prenom']." ".$joueurEnCours['nom']."</div>
                            <div class=\"player-info\">".$postePrefere."</div>
                            <div class=\"player-info\">".$statut."</div>
                            <div class=\"player-info\">".$age." ans</div>
                        </button>
                        <div class=\"player-panel\">
                            <p class=\"player-pinfo\">".$joueurEnCours['poids'].' kg'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['taille'].' m'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['commentaire']."</p>
                        </div>
                    </div>";
                }
            echo '</div>';
            echo "<div class=\"affichage-joueurs-cold\">";
                $joueurs = Joueur::selectJoueursActif();
                $nbjoueurs = $joueurs->rowCount();
                for($i=$nbjoueurs/2; $i < $nbjoueurs; $i++) {
                    $joueurEnCours = $joueurs->fetch();
                    $statut = Joueur::assignerStatut($joueurEnCours['statut']);
                    $postePrefere= Joueur::assignerPoste($joueurEnCours['postePrefere']);
                    $age = round((time()-strtotime($joueurEnCours['dateNaissance']))/(3600*24*365));

                    echo "<div class=\"affichage-joueur\">
                        <button class=\"player-accordion\">
                            <div class=\"player-info\">".$joueurEnCours['prenom']." ".$joueurEnCours['nom']."</div>
                            <div class=\"player-info\">".$postePrefere."</div>
                            <div class=\"player-info\">".$statut."</div>
                            <div class=\"player-info\">".$age." ans</div>
                        </button>
                        <div class=\"player-panel\">
                            <p class=\"player-pinfo\">".$joueurEnCours['poids'].' kg'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['taille'].' m'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['commentaire']."</p>
                        </div>
                    </div>";
                }
            echo '</div>';
        echo '</div>';
    }

    public static function affichageAvecModif(){
        echo "<div class=\"affichage-joueurs\">";
        echo "<div class=\"affichage-joueurs-colg\">";
        $joueurs = Joueur::selectJoueursActif();
        $nbjoueurs = $joueurs->rowCount();
        for($i=0; $i < $nbjoueurs/2; $i++) {
            $joueurEnCours = $joueurs->fetch();
            $statut = Joueur::assignerStatut($joueurEnCours['statut']);
            $postePrefere= Joueur::assignerPoste($joueurEnCours['postePrefere']);
            $age = round((time()-strtotime($joueurEnCours['dateNaissance']))/(3600*24*365));

            echo "<div class=\"affichage-joueur\">
                        <button class=\"player-accordion\">
                            <div class=\"player-info\">".$joueurEnCours['prenom'].' '.$joueurEnCours['nom']."</div>
                            <div class=\"player-info\">".$postePrefere."</div>
                            <div class=\"player-info\">".$statut."</div>
                            <div class=\"player-info\">".$age." ans</div>
                        </button>
                        <div class=\"player-panel\">
                            <p class=\"player-pinfo\">".$joueurEnCours['poids'].' kg'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['taille'].' m'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['commentaire']."</p>
                            <div class=\"player-contentbutton\">
                                <div class=\"player-pinfobutton\">
                                    <a href=\"modif_joueur.php?numLicence=".$joueurEnCours['numLicence']."\" class=\"edit-btn\">
                                        <i class=\"fa fa-edit\"></i>
                                    </a>
                                </div>
                                <div class=\"player-pinfobutton\">
                                    <a href=\"#\" class=\"delete-btn\" onclick=\"valider_suppression(".$joueurEnCours['numLicence'].")\">
                                        <i class=\"fa fa-trash\"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>";
            // Ligne du modif d'origine
            //<a href=\"modif_joueur.php?numLicence=<?php echo $joueurEnCours['numLicence'];\" class=\"edit-btn\"><i class=\"fa fa-edit\"></i></a>
        }
        echo '</div>';
        echo "<div class=\"affichage-joueurs-cold\">";
        $joueurs = Joueur::selectJoueursActif();
        $nbjoueurs = $joueurs->rowCount();
        for($i=$nbjoueurs/2; $i < $nbjoueurs; $i++) {
            $joueurEnCours = $joueurs->fetch();
            $statut = Joueur::assignerStatut($joueurEnCours['statut']);
            $postePrefere= Joueur::assignerPoste($joueurEnCours['postePrefere']);
            $age = round((time()-strtotime($joueurEnCours['dateNaissance']))/(3600*24*365));

            echo "<div class=\"affichage-joueur\">
                        <button class=\"player-accordion\">
                            <div class=\"player-info\">".$joueurEnCours['prenom']." ".$joueurEnCours['nom']."</div>
                            <div class=\"player-info\">".$postePrefere."</div>
                            <div class=\"player-info\">".$statut."</div>
                            <div class=\"player-info\">".$age." ans</div>
                        </button>
                        <div class=\"player-panel\">
                            <p class=\"player-pinfo\">".$joueurEnCours['poids'].' kg'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['taille'].' m'."</p>
                            <p class=\"player-pinfo\">".$joueurEnCours['commentaire']."</p>
                            <div class=\"player-contentbutton\">
                                <div class=\"player-pinfobutton\">
                                    <a href=\"modif_joueur.php?numLicence=".$joueurEnCours['numLicence']." class=\"edit-btn\"><i class=\"fa fa-edit\"></i></a>
                                </div>
                                <div class=\"player-pinfobutton\">
                                    <a href=\"#\" class=\"delete-btn\" onclick=\"valider_suppression(".$joueurEnCours['numLicence'].")\">
                                        <i class=\"fa fa-trash\"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        echo '</div>';
        echo '</div>';
    }
}
