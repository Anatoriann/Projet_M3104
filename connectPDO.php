<?php
    function connectPDO(){
        require('config.php');
        try {
            $linkpdo = new PDO("mysql:host = $server;dbname=$db",$login,$mdp);
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        return $linkpdo;
    }
    ?>
