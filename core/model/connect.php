<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connect
 *
 * @author Mohamed DIOUF
 */

function _connect($host, $port, $user, $password, $db) {
    
    try {
        
        $connexionBD = new PDO('mysql:host=' . $host . ';port=' . $port . ';dbname=' . $db, $user, $password);
        $connexionBD->exec('SET NAMES utf8');
        
        return $connexionBD;
    } catch (Exception $e) {
        
        echo 'Une erreur est survenue lors de la connexion à la base de donnée !' . $e->getMessage();
        die();
    }
}
