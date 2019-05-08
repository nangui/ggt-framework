<?php

$model = new Model($dao, ''); // Mise en marche des requêtes basiques.

$carat = [];

$tri = [1 => 'champ11 asc', 2 => 'champ11 desc', 3 => 'id asc', 4 => 'id desc'];

$storage = $route . STORAGE_PATH;

$carat['btitle'] = SITE_NAME_COMPLET . ' - Maison, villa, appartement, immeuble, terrain à vendre, à louer';
$carat['bdescription'] = SITE_NAME_COMPLET . ' - Maison, villa, appartement, immeuble, terrain à vendre, à louer en France';
$carat['bkeywords'] = SITE_NAME_COMPLET . ' - Maison, villa, appartement, immeuble, terrain, propriété, bien immobilier à vendre, à louer';

$cookies = filter_input_array(INPUT_COOKIE);
/** Recuperation ...... alertes */
if (isset($cookies['emailalerte'])) {
    $_SESSION[$app]['emailalerte'] = $cookies['emailalerte'];

    $model->settable(VDC_PANIER);
    $clausepanier = 'email = "' . $_SESSION[$app]['emailalerte'] . '"';
    $carat['paniernb'] = $model->getFreeCountClosure('commerce_id', $clausepanier);
}

if (isset($recupsession) && $recupsession == 1) {
    if (isset($cookies['emailalerte']) && !isset($_SESSION[$app]['sessionagentrecherche']['id'])) {
        $_SESSION[$app]['emailalerte'] = $cookies['emailalerte'];
        $model->settable(VDC_AGENT_RECHERCHE);

        $clauseacheteur = 'email = "' . $_SESSION[$app]['emailalerte'] . '"';

        $acheteur = $model->getFields([AGENT_RECHERCHE_NOM, AGENT_RECHERCHE_ADRESSE, AGENT_RECHERCHE_EMAIL, AGENT_RECHERCHE_PHONE, AGENT_RECHERCHE_PHONE, AGENT_RECHERCHE_CP, AGENT_RECHERCHE_VILLE], $clauseacheteur, 'id', 'LIMIT 1');

        if (isset($acheteur[0])) {
            $_SESSION[$app]['sessionagentrecherche'] = (array) $acheteur[0];
        } else {
            $_SESSION[$app]['sessionagentrecherche'] = [];
            $_SESSION[$app]['sessionagentrecherche']['email'] = $_SESSION[$app]['emailalerte'];
        }
    }
}

switch ($action) {

    case 'index':

        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }

        /*         Recuperation des trois derniers biens. * ** */
        $model->settable('vdc_commerce');
        $champs = [
            'id', 'champ2 as reference', 'champ3 as type_transaction', 'champ4 as bien_type', 'champ6 as id_ville',
            'champ11 as prix', 'champ20 as titre', 'champ21 as description',
        ];

        $biens = $model->getFields($champs, 'actif = 1', 'date_creation DESC', 'LIMIT 3');

        if (count($biens) > 0) {

            foreach ($biens as $cle => $valeur) {
                // Recuperation du nom de la ville.
                $model->settable(_NOM_DBCOMMUNVILLES_TV);
                $biens[$cle]->ville = $model->getById('nom', $valeur->id_ville);

                // Recuperation du type de commerce
                $model->settable('vdc_commerce_type');
                $biens[$cle]->nom_bien_type = $model->getById('name', $valeur->bien_type);

                // Recuperation de la description
                $biens[$cle]->description_cut = (strlen($valeur->description) > 150) ? cleanCut($valeur->description, 150, '') : $valeur->description;

                // Recuperation du prix
                $biens[$cle]->prix_format = (intval($valeur->prix) > 0) ? number_format($valeur->prix, 0, ',', ' ') : $valeur->prix;

                // Recuperation de la photo principale
                $model->settable('vdc_photo');
                $photos = $model->getFields(['url', 'titre'], 'id_bien = ' . $valeur->id, 'id DESC', 'LIMIT 1');

                $photos_i = ['url' => STORAGE_PATH . 'images/biens/_defaut.jpg', 'titre' => ''];

                if (isset($photos[0]) && !empty($photos[0]->url) && file_exists($storage . 'images/biens/' . $photos[0]->url)) {
                    $photos_i['url'] = STORAGE_PATH . 'images/biens/' . $photos[0]->url;
                    $photos_i['titre'] = $photos[0]->titre;
                }

                $biens[$cle]->photo = $photos_i;

                // Creation du lien vers la fiche descriptive.
                $biens[$cle]->lien = generate_link_detail($path, $biens[$cle]->ville, $biens[$cle]->type_transaction, $biens[$cle]->nom_bien_type, $biens[$cle]->titre, $valeur->id);
            }
        }

        $carat['biens'] = $biens;

        $carat['searchf'] = isset($_SESSION[$app][$module . 'biens']['search']) ? $_SESSION[$app][$module . 'biens']['search'] : []; //  en vue de garder les traces de recherche. 

        $carat['searchi'] = search($model, $route);
        $carat['searchi']['bg_research'] = (isset($_SESSION[$app][$module . 'biens']['search']['champ3']) && in_array($_SESSION[$app][$module . 'biens']['search']['champ3'], [2, 3])) ? $loyer_intervalle_recherche : $prix_intervalle_recherche;

        break;

    case 'biens':

        if (isset($_SESSION[$app]['emailalerte'])) {
            $model->settable(VDC_COMMERCE);
            $clausepanier = ' email = "' . $_SESSION[$app]['emailalerte'] . '"';
            $carat['panieridbien'] = $model->getByClosure('id', 'id IN (SELECT commerce_id FROM ' . VDC_PANIER . ' WHERE ' . $clausepanier . ') AND actif=1 ');
        }

        $searched = filter_input_array(INPUT_POST);

        if ($searched !== NULL) {
            //$_SESSION[$app][$module . 'biens']['search'] = NULL;
            $_SESSION[$app][$module . 'biens']['search']['champ3'] = $searched['id_type_transaction'];
            $_SESSION[$app][$module . 'biens']['search']['champ4'] = $searched['id_type_bien'];
            $_SESSION[$app][$module . 'biens']['search']['champ6'] = $searched['id_ville'];
            $_SESSION[$app][$module . 'biens']['search']['champ11'] = $searched['budget'];

            $_SESSION[$app][$module . 'biens']['search']['champ16_min'] = isset($searched['champ16_min']) ? $searched['champ16_min'] : '';
            $_SESSION[$app][$module . 'biens']['search']['champ16_max'] = isset($searched['champ16_max']) ? $searched['champ16_max'] : '';
            $_SESSION[$app][$module . 'biens']['search']['champ18_min'] = (isset($searched['champ18_min']) && $searched['id_type_bien'] != 12) ? $searched['champ18_min'] : '';
            $_SESSION[$app][$module . 'biens']['search']['champ18_max'] = (isset($searched['champ18_max']) && $searched['id_type_bien'] != 12) ? $searched['champ18_max'] : '';
            $_SESSION[$app][$module . 'biens']['search']['champ19_min'] = (isset($searched['champ19_min']) && in_array($searched['id_type_bien'], [1, 7, 10])) ? $searched['champ19_min'] : '';
            $_SESSION[$app][$module . 'biens']['search']['champ19_max'] = (isset($searched['champ19_max']) && in_array($searched['id_type_bien'], [1, 7, 10])) ? $searched['champ19_max'] : '';

            $model->redirect($path . '/liste-proprietes');
        }

        $searchi = search($model, $route);
        $searchi['bg_research'] = (isset($_SESSION[$app][$module . 'biens']['search']['champ3']) && in_array($_SESSION[$app][$module . 'biens']['search']['champ3'], [2, 3])) ? $loyer_intervalle_recherche : $prix_intervalle_recherche;

        if (!empty($_SESSION[$app][$module . 'biens']['search']['champ11']) && isset($searchi['bg_research'][$_SESSION[$app][$module . 'biens']['search']['champ11']])) {
            $budget_traitement = explode(' - ', substr($searchi['bg_research'][$_SESSION[$app][$module . 'biens']['search']['champ11']], 0, -7));
        }

        /*         * * cas de la recherche simple */
        $path_pagination = $path . "/liste-proprietes";

        if (isset($simple) && $simple == 1) {

            $carat['simplesearchliens'] = [];

            $typefil = filarianeId($model, $type);

            $_SESSION[$app][$module . 'biens']['search']['champ4'] = $typefil['id_type'];

            $model->settable(VDC_COMMERCE_TYPE);
            $nom_type = $model->getById(COMMERCE_TYPE_NAME, $typefil['id_type']);

            $path_pagination = $path . "/acheter-vendre-louer/" . $type;

            if (!empty($ville)) {

                $villefil = filarianeId($model, $ville, 'ville', $typefil['id_type']);
                $_SESSION[$app][$module . 'biens']['search']['champ6'] = $villefil['id_ville'];

                $path_pagination = $path . "/" . $ville . "/acheter-vendre-louer/" . $type;
                $model->settable(VDC_COMMERCE);

                foreach ($villefil['ville'] as $cle => $valeur) {

                    if ($valeur->id == $villefil['id_ville']) {
                        $currentville = $valeur->nom; // . ' (' . $valeur->cp . ')';
                    } /* else {
                      $carat['simplesearchliens'][$cle]['lien'] = generate_link_type_ville($path, $type, $valeur->nom);
                      $carat['simplesearchliens'][$cle]['noml'] = $nom_type . ' - ' . ucwords(strtolower($valeur->nom)) . ' (' . $valeur->cp . ')';
                      $carat['simplesearchliens'][$cle]['nbrb'] = $model->getCountClosure('actif = 1 AND champ4 = ' . $typefil['id_type'] . ' AND champ6 = ' . $valeur->id);
                      } */
                }
                $carat['filarianetitre'] = $nom_type . ' - ' . $currentville;

                $carat['btitleh1page']['type'] = 'Vente, location ' . $nom_type . ' sur ';
                $carat['btitleh1page']['ville'] = $currentville;

                $carat['btitle'] = 'Achat, vente, location ' . $nom_type . ' sur ' . $currentville;
                $carat['bdescription'] = 'Achat, vente, location ' . $nom_type . ' sur ' . $currentville;
                $carat['bkeywords'] = 'Achat, vente, location ' . $nom_type . ' sur ' . $currentville;
            } else {

                $_SESSION[$app][$module . 'biens']['search']['champ6'] = '';
                $model->settable(VDC_COMMERCE);

                $carat['filarianetitre'] = $nom_type;
                $carat['btitleh1page']['type'] = 'Vente, location ' . $nom_type;

                $carat['btitle'] = 'Achat, vente, location ' . $nom_type;
                $carat['bdescription'] = 'Achat, vente, location ' . $nom_type;
                $carat['bkeywords'] = 'Achat, vente, location ' . $nom_type;
            }

            // Liens simples
            $carat['simplesearchliens'] = [];
            if (isset($typefil['type'])) {
                foreach ($typefil['type'] as $cle => $valeur) {
                    if ($valeur->id != $typefil['id_type']) {
                        $carat['simplesearchliens'][$cle]['lien'] = generate_link_type_ville($path, $valeur->nom);
                        $carat['simplesearchliens'][$cle]['noml'] = $valeur->nom;
                        $carat['simplesearchliens'][$cle]['nbrb'] = $model->getCountClosure('actif = 1 AND champ4 = ' . $valeur->id);
                    }
                }
            }
        }
        /*         * * fin cas */

        $clause = ' 1 = 1 AND actif = 1 ';

        // Cette partie gère la partie recherche.
        if (isset($_SESSION[$app][$module . 'biens']['search']) && count($_SESSION[$app][$module . 'biens']['search']) > 0) {
            foreach ($_SESSION[$app][$module . 'biens']['search'] as $cle => $valeur) {
                if (!empty($valeur)) {
                    if ($cle === 'champ11') {

                        if (isset($budget_traitement)) {
                            if (count($budget_traitement) == 2) {
                                $clause .= " AND (champ11 BETWEEN " . trim(traitePrix($budget_traitement[0])) . " AND " . trim(traitePrix($budget_traitement[1])) . ") ";
                            }
                            if (count($budget_traitement) == 1) {
                                //La valeur viendra avec son signe > ou <
                                $signe = substr($budget_traitement[0], 0, 1);
                                $valeur_budget_traitement = str_replace($signe, '', $budget_traitement[0]);
                                $clause .= " AND champ11 " . $signe . " " . trim(traitePrix($valeur_budget_traitement)) . " ";
                            }
                        }
                    } elseif (in_array($cle, ['champ16_min', 'champ18_min', 'champ19_min'])) {

                        $ncle = substr($cle, 0, -4);
                        $clause .= ' AND ' . $ncle . ' >= "' . $valeur . '" ';
                    } elseif (in_array($cle, ['champ16_max', 'champ18_max', 'champ19_max'])) {

                        $ncle = substr($cle, 0, -4);
                        $clause .= ' AND ' . $ncle . ' <= "' . $valeur . '" ';
                    } else {
                        $clause .= ' AND ' . $cle . ' = "' . $valeur . '" ';
                    }
                }
            }
            $carat['searchf'] = $_SESSION[$app][$module . 'biens']['search'];
        }

        // Cette partie gère la partie tri.
        if (!isset($_SESSION[$app][$module . 'biens']['tri'])) {
            $_SESSION[$app][$module . 'biens']['tri'] = 3;
        }

        $tri_clause = isset($tri[$_SESSION[$app][$module . 'biens']['tri']]) ? $tri[$_SESSION[$app][$module . 'biens']['tri']] : "id desc";

        // Pour pagination ****************************
        $page = isset($page) && ($page != '') ? $page : 1;
        $page_authentique = $page;

        $carat['btitle'] .= ' - page ' . $page;
        $carat['bdescription'] .= ' - page ' . $page;
        $carat['bkeywords'] .= ' - page ' . $page;

        $model->settable(VDC_COMMERCE);

        $champs = [
            'id', 'champ2 as reference', 'champ3 as type_transaction', 'champ4 as bien_type', 'champ6 as id_ville', 'champ8 as adresse', 'champ9 as quartier',
            'champ11 as prix', 'champ16 as surface', 'champ18 as nb_pieces', 'champ20 as titre', 'champ21 as description', 'champ84 as cc'
        ];

        do {
            $courant = $page;
            $lignes = $model->getCountClosure($clause);
            $limit = " limit " . ( ($courant - 1) * _VOIR_PAGE_DEFAUT) . ", " . _VOIR_PAGE_DEFAUT;

            if ($lignes > _VOIR_PAGE_DEFAUT) {
                //$option = ($onglet_encours == 'defaut') ? "" : "?" . $onglet_encours;
                $option = '';
                $carat['pagination'] = menuPageSpecial($lignes, _VOIR_PAGE_DEFAUT, $courant, $path_pagination, $option);
            }
            /*             * ********************************** */

            $biens = $model->getFields($champs, $clause, $tri_clause, $limit);

            $page--;

            if ($courant == 1 && $courant != $page_authentique) {
                $model->redirect($path_pagination);
            }
            if (count($biens) > 0 && $courant != $page_authentique) {
                $model->redirect($path_pagination . "/page/$courant");
            }
        } while (count($biens) == 0 && $courant != 1);

        if (count($biens) > 0) {

            foreach ($biens as $cle => $valeur) {
                // Recuperation du nom de la ville.
                $model->settable(_NOM_DBCOMMUNVILLES_TV);
                $biens[$cle]->ville = $model->getById('nom', $valeur->id_ville);

                // Recuperation du type de commerce
                $model->settable('vdc_commerce_type');
                $biens[$cle]->nom_bien_type = $model->getById('name', $valeur->bien_type);

                // Recuperation de la description
                $biens[$cle]->titre_cut = (strlen($valeur->titre) > 50) ? cleanCut($valeur->titre, 50, '...') : $valeur->titre;
                $biens[$cle]->description_cut = (strlen($valeur->description) > 200) ? cleanCut($valeur->description, 200, '...') : $valeur->description;

                // Recuperation de la description
                $biens[$cle]->quartier = (!empty($valeur->quartier)) ? $valeur->quartier : 'ND';

                // Recuperation du prix
                $biens[$cle]->prix_format = (intval($valeur->prix) > 0) ? number_format($valeur->prix, 0, ',', ' ') : $valeur->prix;

                // Recuperation du prix
                $biens[$cle]->surface_format = (intval($valeur->surface) > 0) ? number_format($valeur->surface, 2, ',', ' ') : $valeur->surface;

                // Recuperation de la photo principale
                $model->settable('vdc_photo');
                $photos = $model->getFields(['url', 'titre'], 'id_bien = ' . $valeur->id, 'id DESC', 'LIMIT 1');

                $photos_i = ['url' => STORAGE_PATH . 'images/biens/_defaut.jpg', 'titre' => ''];

                if (isset($photos[0]) && !empty($photos[0]->url) && file_exists($storage . 'images/biens/' . $photos[0]->url)) {
                    $photos_i['url'] = STORAGE_PATH . 'images/biens/' . $photos[0]->url;
                    $photos_i['titre'] = $photos[0]->titre;
                }

                $biens[$cle]->photo = $photos_i;

                // Creation du lien vers la fiche descriptive.
                $biens[$cle]->lien = generate_link_detail($path, $biens[$cle]->ville, $biens[$cle]->type_transaction, $biens[$cle]->nom_bien_type, $biens[$cle]->titre, $valeur->id);
            }
        }

        $carat['searchi'] = $searchi;

        $carat['biens'] = $biens;

        break;

    case 'details':

        if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
            $_SESSION[$app]['trackingback'] = $HTTP_REFERER;
        }

        $id = base64_decode($id_encode);

        $model->settable(VDC_COMMERCE);
        $bien = $model->getAllById($id);

        if ($bien == false) {

            $vers = $path . '/404';

            if (isset($_SESSION[$app]['trackingback'])) {
                $vers = $_SESSION[$app]['trackingback'];
                unset($_SESSION[$app]['trackingback']);
            }

            $model->redirect($vers);
        } else {
            // Est un favoris
            if (isset($_SESSION[$app]['emailalerte'])) {
                $model->settable(VDC_PANIER);
                $clausepanier = 'email = "' . $_SESSION[$app]['emailalerte'] . '" AND commerce_id = ' . $id;
                $carat['panieridbien'] = $model->getByClosure('commerce_id', $clausepanier);
            }

            nbvisites($model, $bien->id, 'visite');

            $carat['retour'] = isset($_SESSION[$app]['trackingback']) ? $_SESSION[$app]['trackingback'] : $path . '/liste-proprietes';

            $model->settable('vdc_commerce');
            $carat['bornes'] = prev_next($model, $id, $storage);

            /*             * * Informations du bien. */
            //nbvisites($bien->champ2);
            // Recuperation du nom de la ville.
            $model->settable(_NOM_DBCOMMUNVILLES_TV);
            $bien->ville = $model->getById('nom', $bien->champ6);
            $bien->lat = (double) $model->getById('latitude_deg', $bien->champ6);
            $bien->lng = (double) $model->getById('longitude_deg', $bien->champ6);

            // Recuperation du type de commerce et transaction
            $model->settable('vdc_commerce_type');
            $bien->nom_bien_type = $model->getById('name', $bien->champ4);
            $bien->transaction = ucfirst($transaction[$bien->champ3]);

            // Recuperation de la description
            $bien->description_cut = (strlen($bien->champ21) > 200) ? cleanCut($bien->champ21, 200, '...') : $bien->champ21;

            // Recuperation de la description
            $bien->quartier = (!empty($bien->champ9)) ? $bien->champ9 : '';
            $bien->proximite = (!empty($bien->champ9)) ? explode(' ', $bien->champ9) : [];

            // Recuperation du prix
            $bien->prix_format = (intval($bien->champ11) > 0) ? number_format($bien->champ11, 0, ',', ' ') : $bien->champ11;

            // Recuperation du surface
            $bien->surface_format = (intval($bien->champ16) > 0) ? number_format($bien->champ16, 2, ',', ' ') : $bien->champ16;
            $bien->surface_terrain_format = (intval($bien->champ17) > 0) ? number_format($bien->champ17, 2, ',', ' ') : $bien->champ17;

            // Honoraires a la charge
            $bien->honoraire_a_la_charge = (intval($bien->champ302) > 0) ? $honoraires[$bien->champ302] : '';

            // Recuperation des photos 
            $model->settable('vdc_photo');
            $photos = $model->getFields(['url', 'titre'], 'id_bien = ' . $bien->id, 'id ASC');

            $photos_i = [['url' => STORAGE_PATH . 'images/biens/_defaut.jpg', 'titre' => '']];

            foreach ($photos as $cle => $photo) {

                if (isset($photos[$cle]) && !empty($photos[$cle]->url) && file_exists($storage . 'images/biens/' . $photos[$cle]->url)) {
                    $photos_i[$cle]['url'] = STORAGE_PATH . 'images/biens/' . $photos[$cle]->url;
                    $photos_i[$cle]['titre'] = $photos[$cle]->titre;
                }
            }

            $bien->photo = $photos_i;

            // Creation du lien vers la fiche descriptive.
            $bien->lien = generate_link_detail($path, $bien->ville, $bien->champ3, $bien->nom_bien_type, $bien->champ20, $bien->id);
            $bien->lienprint = $bien->lien . '?impression';

            $carat['filariane']['lientype'] = generate_link_type_ville($path, $bien->nom_bien_type);

            $carat['filariane']['lientypeville'] = generate_link_type_ville($path, $bien->nom_bien_type, $bien->ville);

            $carat['btitle'] = $bien->transaction . ' ' . $bien->nom_bien_type . ' ' . ucfirst(strtolower($bien->ville)) . ' - Ref ' . $bien->champ2;
            $carat['bdescription'] = $bien->transaction . ' ' . $bien->nom_bien_type . ' ' . ucfirst(strtolower($bien->ville)) . ' - Ref ' . $bien->champ2;
            $carat['bkeywords'] = $bien->transaction . ' ' . $bien->nom_bien_type . ' ' . ucfirst(strtolower($bien->ville)) . ' - Ref ' . $bien->champ2;
        }

        $carat['bien'] = $bien;

        $carat['searchf'] = isset($_SESSION[$app][$module . 'biens']['search']) ? $_SESSION[$app][$module . 'biens']['search'] : []; //  en vue de garder les traces de recherche. 

        $carat['searchi'] = search($model, $route);
        $carat['searchi']['bg_research'] = (isset($_SESSION[$app][$module . 'biens']['search']['champ3']) && in_array($_SESSION[$app][$module . 'biens']['search']['champ3'], [2, 3])) ? $loyer_intervalle_recherche : $prix_intervalle_recherche;

        if (isset($impression)) {
            $action = 'impression'; // Pour afficher le template d'impression
        }

        break;

    case 'alertes':

        $carat['btitle'] = 'Mon agent de recherche';
        $carat['bdescription'] = 'Mon agent de recherche';
        $carat['bkeywords'] = 'Mon agent de recherche';

        $email = filter_input(INPUT_POST, 'email');

        if (!empty($email)) {

            $_SESSION[$app]['emailalerte'] = $email;

            setcookie('emailalerte', $email, time() + (60 * 60 * 24 * 356), '/');

            // On redirige l'utilisateur vers la page acheteur
            $_SESSION[$app]['sessionagentrecherche']['email'] = $_SESSION[$app]['emailalerte'];

            if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
                $model->redirect($path . '/agent-de-recherche', '#content');
            }
        }

        if (isset($_SESSION[$app]['emailalerte'])) {

            $clause = ' cloturer = -1 AND email = "' . $_SESSION[$app]['emailalerte'] . '"';

            $model->settable(VDC_AGENT_RECHERCHE);

            $recherches = $model->getAllDatas($clause);

            if (count($recherches) > 0) {

                foreach ($recherches as $cle => $valeur) {

                    // Recuperation du type de commerce
                    $model->settable('vdc_commerce_type');
                    $recherches[$cle]->nom_bien_type = $model->getById('name', $valeur->type);

                    // Recuperation de la description
                    $recherches[$cle]->transaction = (isset($transaction[$valeur->transaction])) ? ucfirst($transaction[$valeur->transaction]) : '';

                    $model->settable(_NOM_DBCOMMUNVILLES_TV);

                    $villes_found = [];

                    $ville_bien_array = explode('#', substr($valeur->id_ville_bien, 1, -1));
                    foreach ($ville_bien_array as $ville_) {
                        $villes_found[] = (!empty($ville_)) ? $model->getById('nom', $ville_) . ' (' . $model->getById('code_postal', $ville_) . ')' : '';
                    }
                    $recherches[$cle]->ville_bien = implode('<br />', $villes_found);

                    // Recuperation du prix
                    $recherches[$cle]->budget_format = (intval($valeur->budget_max) > 0) ? number_format($valeur->budget_max, 0, ',', ' ') : $valeur->budget_max;
                    $recherches[$cle]->surface_format = (intval($valeur->surface_min) > 0) ? number_format($valeur->surface_min, 2, ',', ' ') : $valeur->surface_min;
                }
            }

            $carat['recherches'] = $recherches;
        }

        $model->settable(VDC_COMMERCE_TYPE);
        $carat['agentrecherche']['tb'] = $model->getFields(['id', 'name'], ' id IN (SELECT champ4 FROM ' . VDC_COMMERCE . ' WHERE actif = 1)', 'name ASC');
        $carat['agentrecherche']['transaction'] = $transaction;

        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }

        $carat['destination'] = $path . '/alertes';

        break;

    case 'panier':

        $email = filter_input(INPUT_POST, 'email');

        if (!empty($email)) {

            $model->settable(VDC_PANIER);
            $clause = 'email = "' . $_SESSION[$app]['emailalerte'] . '"';
            $exists = $model->getFreeCountClosure('commerce_id', $clause);

            if ($exists == 0) {
                $model->record(['email', $email]);
                $_SESSION[$app]['notification']['succes'] = 'Votre panier a été créé avec succès.';
            } else {
                $_SESSION[$app]['notification']['succes'] = 'Votre panier a été restauré avec succès.';
            }

            $_SESSION[$app]['emailalerte'] = $email;

            setcookie('emailalerte', $email, time() + (60 * 60 * 24 * 356), '/');

            $model->redirect($path . '/ma-selection');
        }

        if (isset($_SESSION[$app]['emailalerte'])) {

            $clause = ' id IN (SELECT commerce_id FROM ' . VDC_PANIER . ' WHERE email = "' . $_SESSION[$app]['emailalerte'] . '") AND actif = 1  ';

            // Pour pagination ****************************
            $page = isset($page) && ($page != '') ? $page : 1;
            $page_authentique = $page;

            $carat['btitle'] = 'Ma sélection de biens - page ' . $page;
            $carat['bdescription'] = 'Ma sélection de biens - page ' . $page;
            $carat['bkeywords'] = 'Ma sélection de biens - page ' . $page;

            $model->settable(VDC_COMMERCE);

            $champs = [
                'id', 'champ2 as reference', 'champ3 as type_transaction', 'champ4 as bien_type', 'champ6 as id_ville',
                'champ11 as prix', 'champ20 as titre', 'champ21 as description',
            ];

            $path_pagination = $path . "/ma-selection";
            $tri_clause = 'id';

            $voir_page_defaut = 9;

            do {
                $courant = $page;
                $lignes = $model->getCountClosure($clause);
                $limit = " limit " . ( ($courant - 1) * $voir_page_defaut) . ", " . $voir_page_defaut;

                if ($lignes > $voir_page_defaut) {
                    //$option = ($onglet_encours == 'defaut') ? "" : "?" . $onglet_encours;
                    $option = '';
                    $carat['pagination'] = menuPageSpecial($lignes, $voir_page_defaut, $courant, $path_pagination, $option);
                }
                /*                 * ********************************** */

                $biens = $model->getFields($champs, $clause, $tri_clause, $limit);

                $page--;

                if ($courant == 1 && $courant != $page_authentique) {
                    $model->redirect($path_pagination);
                }
                if (count($biens) > 0 && $courant != $page_authentique) {
                    $model->redirect($path_pagination . "/page/$courant");
                }
            } while (count($biens) == 0 && $courant != 1);

            if (count($biens) > 0) {

                foreach ($biens as $cle => $valeur) {
                    // Recuperation du nom de la ville.
                    $model->settable(_NOM_DBCOMMUNVILLES_TV);
                    $biens[$cle]->ville = $model->getById('nom', $valeur->id_ville);

                    // Recuperation du type de commerce
                    $model->settable('vdc_commerce_type');
                    $biens[$cle]->nom_bien_type = $model->getById('name', $valeur->bien_type);

                    // Recuperation de la description
                    $biens[$cle]->description_cut = (strlen($valeur->description) > 200) ? cleanCut($valeur->description, 200, '...') : $valeur->description;

                    // Recuperation du prix
                    $biens[$cle]->prix_format = (intval($valeur->prix) > 0) ? number_format($valeur->prix, 0, ',', ' ') : $valeur->prix;

                    // Recuperation de la photo principale
                    $model->settable('vdc_photo');
                    $photos = $model->getFields(['url', 'titre'], 'id_bien = ' . $valeur->id, 'id ASC', 'LIMIT 1');

                    $photos_i = ['url' => STORAGE_PATH . 'images/biens/_defaut.jpg', 'titre' => ''];

                    if (isset($photos[0]) && !empty($photos[0]->url) && file_exists($storage . 'images/biens/' . $photos[0]->url)) {
                        $photos_i['url'] = STORAGE_PATH . 'images/biens/' . $photos[0]->url;
                        $photos_i['titre'] = $photos[0]->titre;
                    }

                    $biens[$cle]->photo = $photos_i;

                    // Creation du lien vers la fiche descriptive.
                    $biens[$cle]->lien = generate_link_detail($path, $biens[$cle]->ville, $biens[$cle]->type_transaction, $biens[$cle]->nom_bien_type, $biens[$cle]->titre, $valeur->id);
                }
            }

            $carat['biens'] = $biens;
        }

        $carat['destination'] = $path . '/ma-selection';

        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }

        break;

    case 'vendeurs':

        $model->settable(VDC_COMMERCE_TYPE);
        $carat['vendeur_type_bien'] = $model->getFields(['id', 'name'], ' id IN (SELECT champ4 FROM ' . VDC_COMMERCE . ' WHERE actif = 1) AND actif = 1 ', 'name ASC');

        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }

        $carat['btitle'] = 'Vendre votre bien';
        $carat['bdescription'] = 'Vendre votre bien';
        $carat['bkeywords'] = 'Vendre votre bien';

        break;

    case 'acheteurs':

        $donnees = filter_input_array(INPUT_POST);

        if ($donnees !== NULL) {

            $_SESSION[$app]['sessionagentrecherche'] = $donnees;

            $obligatoires = [AGENT_RECHERCHE_EMAIL, AGENT_RECHERCHE_NOM, AGENT_RECHERCHE_PHONE, AGENT_RECHERCHE_TRANSACTION, AGENT_RECHERCHE_TYPE, AGENT_RECHERCHE_ID_VILLE_BIEN];
            $clause = [];

            if (!isset($donnees['id'])) {
                $donnees[AGENT_RECHERCHE_DATE] = date('Y-m-d');
            }

            $model->settable(_NOM_DBCOMMUNVILLES_TV);

            $donnees[AGENT_RECHERCHE_ID_VILLE_BIEN] = '';

            if (isset($_SESSION[$app]['agentderecherche']['villebien']) && count($_SESSION[$app]['agentderecherche']['villebien']) > 0) {

                /* $villestrouvees = [];
                  foreach ($_SESSION[$app]['agentderecherche']['villebien'] as $ville) {
                  $ville_infos = explode(' (', $ville);
                  if (isset($ville_infos)) {
                  $villestrouvees[] = $model->getIdByField('nom', trim($ville_infos[0]));
                  }
                  }
                  $donnees[AGENT_RECHERCHE_ID_VILLE_BIEN] = '#' . implode('#', $villestrouvees) . '#';
                 */

                $donnees[AGENT_RECHERCHE_ID_VILLE_BIEN] = '#' . implode('#', array_keys($_SESSION[$app]['agentderecherche']['villebien'])) . '#';
            }

            if (!isset($donnees['jaccepte']) || $donnees['jaccepte'] != 1) {
                $_SESSION[$app]['notification']['erreur'] = 'Veuillez accepter les conditions d\'utilisation des données !';
                $id_agent = -9;
            }

            unset($donnees['jaccepte']);

            $model->settable(VDC_AGENT_RECHERCHE);
            $id_agent = $model->record($donnees, $obligatoires, $clause);

            if ($id_agent > 0) {

                $_SESSION[$app]['notification']['succes'] = "La recherche a été enregistrée avec succès.";

                $vers = $path . '/agent-de-recherche';

                if (isset($_SESSION[$app]['sessionagentrecherche'])) {
                    unset($_SESSION[$app]['sessionagentrecherche']);
                }

                // COOKIES AND SESSIONS
                setcookie('emailalerte', $donnees[AGENT_RECHERCHE_EMAIL], time() + (60 * 60 * 24 * 356), '/');
                $_SESSION[$app]['emailalerte'] = $donnees[AGENT_RECHERCHE_EMAIL];
                // COOKIES AND SESSIONS
                //**************** E-mail.............
                $model->settable(VDC_COMMERCE_TYPE);
                $type_bien_name = $model->getById(COMMERCE_TYPE_NAME, $donnees[AGENT_RECHERCHE_TYPE]);

                $superficie = (!empty($donnees[AGENT_RECHERCHE_SURFACE_MIN])) ? number_format($donnees[AGENT_RECHERCHE_SURFACE_MIN], 2, ',', ' ') . ' ' . $language['commun_surface_signe'] : $donnees['surface_min'];
                $budget_max = (!empty($donnees[AGENT_RECHERCHE_BUDGET_MAX])) ? number_format($donnees[AGENT_RECHERCHE_BUDGET_MAX], 0, ',', ' ') . ' ' . $language['commun_monnaie_signe'] : $donnees['budget_max'];

                $complement = '';

                if (!empty($donnees[AGENT_RECHERCHE_NB_PIECES])) {
                    $complement .= '<b>Nombre de pièces</b> : ' . $donnees[AGENT_RECHERCHE_NB_PIECES] . ' <br/>';
                }
                if (!empty($donnees[AGENT_RECHERCHE_NB_CHAMBRES])) {
                    $complement .= '<b>Nombre de chambres</b> : ' . $donnees[AGENT_RECHERCHE_NB_CHAMBRES] . ' <br/>';
                }

                $villes_for_mail = implode(' - ', $_SESSION[$app]['agentderecherche']['villebien']);

                $subject = SITE_NAME . ' - Agent de recherche';

                $message = str_replace(
                        ['#name#', '#phone#', '#email#', '#transaction#', '#budget#', '#villes_recherche#', '#complement#', '#type#', '#ville#', '#cp#', '#adresse#', '#superficie#'], [$donnees[AGENT_RECHERCHE_NOM], $donnees[AGENT_RECHERCHE_PHONE],
                    $donnees[AGENT_RECHERCHE_EMAIL], $transaction[$donnees[AGENT_RECHERCHE_TRANSACTION]], $budget_max, $villes_for_mail, $complement, $type_bien_name, $donnees[AGENT_RECHERCHE_VILLE], $donnees[AGENT_RECHERCHE_CP], $donnees[AGENT_RECHERCHE_ADRESSE], $superficie], $language['commun_courriel_agent_recherche_contenu']
                );

                $message .= signature();

                unset($_SESSION[$app]['agentderecherche']['villebien']);
                //dump($donnees);
                sendMail($donnees[AGENT_RECHERCHE_NOM], $donnees[AGENT_RECHERCHE_EMAIL], SITE_MAIL, $subject, $message);
                //sendMail($donnees['name'], $donnees['email'], ADMIN_MAIL, $subject, $message);
                sendMail($donnees[AGENT_RECHERCHE_NOM], $donnees[AGENT_RECHERCHE_EMAIL], SUPERADMIN_MAIL, $subject, $message);
                // ---------------------------------------------

                if (isset($donnees['id'])) {
                    $model->redirect($path . '/alertes', '#content');
                }

                $model->redirect($vers, '#content');
            } else {
                if ($id_agent != -9) {
                    if ($id_agent === -1) {
                        // La requête n'a pas été exécutée.
                        $_SESSION[$app]['notification']['erreur'] = $language['commun_notification_echec_texte'];
                    } elseif ($id_agent === -2) {
                        // Ces informations existent déjà.
                        $_SESSION[$app]['notification']['erreur'] = $language['commun_notification_enregistrement_existe_texte'];
                    } else {
                        // Champs obligatoires non renseignés.
                        $_SESSION[$app]['notification']['erreur'] = $language['commun_notification_champobligatoire_texte'];
                    }
                }
            }
        } else {
            if (isset($_SESSION[$app]['agentderecherche']['villebien'])) {
                unset($_SESSION[$app]['agentderecherche']['villebien']);
            }
        }

        if (isset($donnees['id'])) {
            $path_r = (isset($HTTP_REFERER)) ? $HTTP_REFERER : $path . '/alertes';
            $model->redirect($path_r, '');
        }

        $model->settable(VDC_COMMERCE_TYPE);
        $carat['agentrecherche']['tb'] = $model->getFields(['id', 'name'], ' id IN (SELECT champ4 FROM ' . VDC_COMMERCE . ' WHERE actif = 1) AND actif = 1 ', 'name ASC');
        $carat['agentrecherche']['transaction'] = $transaction;

        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }

        $carat['btitle'] = 'Agent de recherche';
        $carat['bdescription'] = 'Agent de recherche';
        $carat['bkeywords'] = 'Agent de recherche';

        break;

    case 'savoirfaire':
        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }
        //
        break;

    case 'outilcalculette':
        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }
        //
        break;

    case 'suppressionalerte':

        $id = base64_decode($id_encode);
        $model->settable(VDC_AGENT_RECHERCHE);
        $alerte = $model->getById(AGENT_RECHERCHE_ID, $id);

        if (empty($alerte)) {
            // $vers = $path . '/404';
            $_SESSION[$app]['notification']['erreur'] = "Cette alerte n'existe pas.";
        } else {
            $model->deleteById($id);
            $_SESSION[$app]['notification']['succes'] = "Cette alerte a été supprimée avec succès.";
        }

        $vers = $path . '/alertes';
        $model->redirect($vers);
        //
        break;

    default:

        if (isset($_SESSION[$app][$module . 'biens']['search'])) {
            unset($_SESSION[$app][$module . 'biens']['search']);
        }
        //
        break;
}

/* * *********************** Recuperation des donnees issues des formulaires de contact. */

if (isset($_SESSION[$app]['sessioncontact'])) {
    $carat['sessioncontact'] = $_SESSION[$app]['sessioncontact'];
    unset($_SESSION[$app]['sessioncontact']);
}

if (isset($_SESSION[$app]['sessionvendrebien'])) {
    $carat['sessionvendrebien'] = $_SESSION[$app]['sessionvendrebien'];
    unset($_SESSION[$app]['sessionvendrebien']);
}

if (isset($_SESSION[$app]['sessionrendezvous'])) {
    $carat['sessionrendezvous'] = $_SESSION[$app]['sessionrendezvous'];
    unset($_SESSION[$app]['sessionrendezvous']);
}

if (isset($_SESSION[$app]['sessionetreappeler'])) {
    $carat['sessionetreappeler'] = $_SESSION[$app]['sessionetreappeler'];
    unset($_SESSION[$app]['sessionetreappeler']);
}

if (isset($_SESSION[$app]['sessionrecevoirdossiercomplet'])) {
    $carat['sessionrecevoirdossiercomplet'] = $_SESSION[$app]['sessionrecevoirdossiercomplet'];
    unset($_SESSION[$app]['sessionrecevoirdossiercomplet']);
}

if (isset($_SESSION[$app]['sessionenvoipanier'])) {
    $carat['sessionenvoipanier'] = $_SESSION[$app]['sessionenvoipanier'];
    unset($_SESSION[$app]['sessionenvoipanier']);
}

if (isset($_SESSION[$app]['sessionagentrecherche'])) {
    $carat['sessionagentrecherche'] = $_SESSION[$app]['sessionagentrecherche'];
    if ($action !== 'alertes') {
        unset($_SESSION[$app]['sessionagentrecherche']);
    }
}
/* * *********************** Fin recuperation. */

/* * * Conditions normales d'utilisation. * */
$carat['commun_conditions_generales_utilisations'] = str_replace(['#balise_a_ouvrante#', '#balise_a_fermante#'], ['<a href="' . $path . '/mentions-legales" title="Mentions légales">', '</a>'], $language['commun_conditions_generales_utilisations']);

$oSmarty->assign('carat', $carat);
