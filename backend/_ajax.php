<?php

/* Inclusion des fichiers nécessaires */
require '../core/_ini.php';

$model = new Model($dao, ''); /* Mise en marche des requêtes basiques. */

/* * afficher numero. */
if (isset($get['module']) && (isset($get['affichenumero']))) {
    extract($get);
    nbvisites($model, $id, '');
    exit();
}

/* * ajouter a a envoye. */
if (isset($get['module']) && (isset($get['action']) && $get['action'] == 'sendfrompanier')) {
    extract($get);

    if (!isset($_SESSION[$app]['elementaenvoyer'])) {
        $_SESSION[$app]['elementaenvoyer'] = [];
    }

    if ($todo == 1) {
        if (!in_array($id, $_SESSION[$app]['elementaenvoyer'])) {
            $_SESSION[$app]['elementaenvoyer'][] = $id;
        }
    } else {
        if (in_array($id, $_SESSION[$app]['elementaenvoyer'])) {
            $cle = array_search($id, $_SESSION[$app]['elementaenvoyer']);
            unset($_SESSION[$app]['elementaenvoyer'][$cle]);
        }
    }
    exit();
}

/* * Gestion des tris. */
if (isset($get['module']) && (isset($get['tribiens']) || isset($get['tridatatable']))) {
    extract($get);

    $_SESSION['frontend'][$module]['tri'] = $valeur;
}

if (isset($get['module']) && (isset($get['tribiens']) || isset($get['tridatatable']))) {
    extract($get);

    $_SESSION['frontend'][$module]['tri'] = $valeur;
}

if (isset($get['action']) && ($get['action'] == 'ajouteraupanier')) {
    extract($get);

    if (isset($_SESSION[$app]['emailalerte'])) {
        $donnees['commerce_id'] = $id;
        $donnees['email'] = $_SESSION[$app]['emailalerte'];
        $model->settable(VDC_PANIER);
        $clause = 'email = "'.$_SESSION[$app]['emailalerte'].'" AND commerce_id = '.$donnees['commerce_id'];
        $exists = $model->getFreeCountClosure('commerce_id', $clause);

        if ($exists == 0) {
            $model->insertOne($donnees);
            echo 1;
            exit();
        }

        echo -5;
        exit();
    }

    echo -6;
    $_SESSION[$app]['notification']['erreur'] = 'Vous devez d\'abord enregistrer votre adresse e-mail.';
    exit();
}

if (isset($get['action']) && ($get['action'] == 'supprimerdupanier')) {
    extract($get);

    $model->settable(VDC_PANIER);
    $clause = 'email = "'.$_SESSION[$app]['emailalerte'].'" AND commerce_id = '.$id;
    $exists = $model->getFreeCountClosure('commerce_id', $clause);

    if ($exists > 0) {
        $model->deleteByClause($clause);
        if (isset($_SESSION[$app]['elementaenvoyer']) && in_array($id, $_SESSION[$app]['elementaenvoyer'])) { // On verifie si le bien avait deja parmi ceux qui sont coches pour etre envoyes
            $cle = array_search($id, $_SESSION[$app]['elementaenvoyer']);
            unset($_SESSION[$app]['elementaenvoyer'][$cle]);
        }
        echo 1;
        exit();
    }

    echo -5;
    exit();
}

if (isset($get['action']) && ($get['action'] == 'recuperationalerte')) {
    extract($get);

    $model->settable(VDC_AGENT_RECHERCHE);

    if (!empty($id)) {
        $alerte = $model->getAllById($id);
        if ($alerte) {
            $model->settable(_NOM_DBCOMMUNVILLES_TV);
            $villes_found = [];

            $ville_bien_array = explode('#', substr($alerte->id_ville_bien, 1, -1));
            $alerte->id_ville_bien = [];

            foreach ($ville_bien_array as $ville_) {
                $alerte->id_ville_bien[$ville_] = (!empty($ville_)) ? $model->getById('nom', $ville_).' ('.$model->getById('code_postal', $ville_).')' : '';
            }

            $_SESSION[$app]['agentderecherche']['villebien'] = $alerte->id_ville_bien;

            $_SESSION[$app]['sessionagentrecherche'] = (array) $alerte;
            echo json_encode($alerte);
            exit();
        }

        echo -1;
        exit();
    }

    echo -1;
    exit();
}

if (isset($get['action']) && ($get['action'] == 'filtrerbudget')) {
    extract($get);

    $options = "<option value=''>Budget</option>";
    if (!empty($valeur)) {
        $bg_research = ($valeur == 2 || $valeur == 3) ? $loyer_intervalle_recherche : $prix_intervalle_recherche;
        foreach ($bg_research as $key => $value) {
            $options .= "<option value='".$key."'>".$value.'</option>';
        }
    }

    echo $options;
    exit();
}

if (isset($get['term']) && !empty($get['term'])) {
    extract($get);

    $model->settable(_NOM_DBCOMMUNVILLES_TV);
    $found = $model->autocomplete('nom', $term);

    $content = '<ul class="ville-found">';

    $function = (!isset($ville)) ? 'selectVilleBien' : 'selectVille';
    $content_li = [];

    foreach ($found as $cle => $ville) {
        $nom_a_afficher = $ville->nom.' ('.$ville->cp.')';
        if (!isset($_SESSION[$app]['agentderecherche']['villebien'][$cle])) {
            $content_li[] = "<li onclick='".$function.'("'.$nom_a_afficher.'", '.$cle.");'>".$nom_a_afficher.'</li>';
        }
    }

    $content .= implode('', $content_li).'</ul>';

    echo $content;
    exit();
}

if (isset($get['action']) && $get['action'] == 'autocompleteaddvillebien') {
    extract($get);

    if (!isset($_SESSION[$app]['agentderecherche']['villebien'])) {
        $_SESSION[$app]['agentderecherche']['villebien'] = [];
    }
    if (!isset($_SESSION[$app]['agentderecherche']['villebien'][$id_ville])) {
        $_SESSION[$app]['agentderecherche']['villebien'][$id_ville] = $ville;
        echo 1;
        exit();
    }

    echo -1;
    exit();
}

if (isset($get['action']) && $get['action'] == 'autocompletesuppvillebien') {
    extract($get);

    if (isset($_SESSION[$app]['agentderecherche']['villebien'][$ville])) {
        unset($_SESSION[$app]['agentderecherche']['villebien'][$ville]);
        echo 1;
        exit();
    }

    echo -1;
    exit();
}

if (isset($get['action']) && ($get['action'] == 'emptyallsearchsession')) {
    extract($get);

    if (isset($_SESSION[$app]['caratbiens']['search'])) {
        unset($_SESSION[$app]['caratbiens']['search']);
    }
    exit();
}
