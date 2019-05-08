<?php

ob_start();
/*
 *
 * Frontend index et routage.
 *
 */

require_once '../core/_ini.php';

/* Préparation de l'action. */
if (!isset($action)) {
    $action = ($module == 'connexion') ? 'connexion' : 'index';
}

require 'modules/'.$module.'.php'; // Routage et choix template
$vue = '/index.tpl';

/* Session; erreur et succes; form data */
if (isset($_SESSION[$app]['notification']['erreur'])) {
    $oSmarty->assign('erreur', $_SESSION[$app]['notification']['erreur']);
    unset($_SESSION[$app]['notification']);
}

if (isset($_SESSION[$app]['notification']['succes'])) {
    $oSmarty->assign('succes', $_SESSION[$app]['notification']['succes']);
    unset($_SESSION[$app]['notification']);
}

$get['action'] = $action;
$get['path'] = $path;
$get['sujets_contact'] = $courriel['sujets_contact'];
$get['rs'] = $reseeauxsociaux;

/* Assignation et affichage. */

$oSmarty->assign('get', $get);

$oSmarty->display($template.$vue);

ob_end_flush();
