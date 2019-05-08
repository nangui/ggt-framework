<?php

header('Content-type: text/html; charset=UTF-8');

session_start(); /* Démarre la session. */

$server = filter_input_array(INPUT_SERVER);

extract($server);

// $browser = get_browser(null);

$route = $DOCUMENT_ROOT; // On récupère la route.

require_once $route.'/core/_const.php';

require_once $route.'/core/language/fr.php';

(file_exists($route.'/core/_const_bd.php')) ? require_once($route.'/core/_const_bd.php') : '';

require_once $route.'/core/model/connect.php';

require_once $route.'/core/model/Model.class.php';

require_once $route.'/core/plugins/smarty/libs/Smarty.class.php';

require_once $route.'/core/_func.php';

require_once $route.'/core/_paginate.php';

require_once $route.'/core/_links.php';

require_once $route.'/core/_mail.php';

/*
 * INITIALISATION des variables qui doivent être visibles partout.
 * CRÉATION des objets qui serviront partout.
 *          Exemple : connexion à la base, moteur de template.
 * ASSIGNATION des variables visibles partout au template.
 */

$oSmarty = new Smarty();

$dao = _connect(HOST, PORT, USER, PASS, S_DB);

$get = filter_input_array(INPUT_GET); // On récupère la varibale module et les autres variables passées par get dans l'URL.

if ($get) {
    extract($get);

    $path = (isset($app) && $app == 'backend') ? HTTP_PATH.'/admin' : HTTP_PATH;

    $language = (isset($module) && isset($lang[$module])) ? array_merge($lang['commun'], $lang[$module]) : $lang['commun'];

    $template = $route.'/templates/'.$app.'/'._version; // Chemin vers le dossier template.

    $oSmarty->assign('language', $language);

    $oSmarty->assign('template', $template);
}
