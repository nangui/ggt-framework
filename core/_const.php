<?php

/*
 *  Début
 *
 */

define('HTTP_PATH', 'http://'.$HTTP_HOST);

/* * **** SITE CONFIG & PATH */
const _version = 'v1';

define('CSS_PATH_BE', '/assets/backend/'._version.'/css');
define('DOC_PATH_BE', '/assets/backend/'._version.'/documents');
define('IMG_PATH_BE', '/assets/backend/'._version.'/images');
define('JS_PATH_BE', '/assets/backend/'._version.'/js');

define('CSS_PATH_FE', '/assets/frontend/'._version.'/css');
define('IMG_PATH_FE', '/assets/frontend/'._version.'/images');
define('JS_PATH_FE', '/assets/frontend/'._version.'/js');

const STORAGE_PATH = '/storage/';

const _CODE_SET_ATTEMPT = 3; /* Définit le nombre de fois que l'utilisateur aura tenté de saisir le code qui lui a été envoyé. */

/* * **** SITE & MAILING */
const ADMIN_MAIL = 'mdawa88@gmail.com';
const SUPERADMIN_MAIL = 'eldieng2003@gmail.com';
const SITE_MAIL = 'mdawa88@gmail.com';
const SITE_NAME = 'Carat Immo'; // Pour courriel.
const SITE_NAME_COMPLET = 'Carat Immobilier'; // Pour titre texte page.
const ADRESSE_AGENCE = '34 rue Jules Verne';
const CP_AGENCE = '44700';
const VILLE_AGENCE = 'ORVAULT';
const PHONE_1 = '(+221) 77 451 12 23';
const PHONE_2 = '(+221) 77 631 31 31';

/* * **** MYSQL CONFIG */
const HOST = 'localhost';
const USER = 'root';
const PORT = '3306';
const PASS = '';
const S_DB = 'bd_caratimmobilier';

/* * **** FOR WEBSITE */
const _USER_ = 'connecte';

const _VOIR_PAGE_DEFAUT = 10;
const _ECHEANCE = 72; // Heures
const _TAILLE_MAX_IMAGE = 4097152;

const _TVA_ = 0.18;

const _NOM_FICHIER_PASSERELLE = 'hektor_carat';
const _DBCOMMUNVILLES = 'dbcommunvilles';
const _NOM_DBCOMMUNVILLES_TV = 'dbcommunvilles.vdc_ville';

$prix_intervalle_recherche = [1 => '< 50 000 &euro;', 2 => '50 000 - 150 000 &euro;', 3 => '150 000 - 300 000 &euro;', 4 => '300 000 - 500 000 &euro;', 5 => '500 000 - 750 000 &euro;', 6 => '> 750 000 &euro;'];
$loyer_intervalle_recherche = [1 => '< 500 &euro;', 2 => '500 - 1500 &euro;', 3 => '1500 - 3000 &euro;', 4 => '3000 - 5000 &euro;', 5 => '5000 - 7500 &euro;', 6 => '> 7500 &euro;'];

$courriel = [
    'sujets_contact' => ['Je suis intéressé par la vente de mon bien', "J'ai une question", 'Je suis intéressé par l’achat d’un bien', 'Je souhaite rejoindre le groupe', 'Je souhaite être rappelé', 'Divers'],
];

$transaction = [1 => 'vente', 2 => 'location', 3 => 'location vacances', 4 => 'vente de prestige', 5 => 'viager'];

$honoraires = [1 => "de l'acquéreur", 2 => 'du vendeur', 3 => "de l'acquéreur et du vendeur"];

//Socials media.
$reseeauxsociaux = [
    ['title' => 'Facebook', 'class' => 'zmdi zmdi-facebook-box', 'lien' => ''],
    ['title' => 'Twitter', 'class' => 'zmdi zmdi-twitter', 'lien' => ''],
];
