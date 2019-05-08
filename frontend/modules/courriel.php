<?php

$model = new Model($dao, ''); // Mise en marche des requêtes basiques.

$datas = filter_input_array(INPUT_POST);

$secret = "6LcZh4IUAAAAAPzjbRs10JlP-ojjPWigtqwjFmpO"; // ma clé secréte
$response = isset($datas['g-recaptcha-response']) ? $datas['g-recaptcha-response'] : "";
$remoteip = $REMOTE_ADDR;
$api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $response . "&remoteip=" . $remoteip;
$decode = json_decode(file_get_contents($api_url), true);

switch ($action) {

    case 'envoicourrielcontact':

        $ancre = '#nous-contacter';

        if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
            $_SESSION[$app]['trackingback'] = $HTTP_REFERER;
        }

        $_SESSION[$app]['sessioncontact'] = $datas;

        if ($decode['success'] !== true) {

            if (((strlen($datas['phone']) > 0) && (!preg_match('#^[. 0-9]*$#', $datas['phone'])))) {
                $erreur = 'Le numéro de téléphone saisi n\'est pas correct.';
                $ready = -1;
            }

            if (strlen($datas['name']) == 0 || strlen($datas['email']) == 0 || strlen($datas['message']) == 0) {
                $erreur = 'Les champs obligatoires n\'ont pas été renseignés.';
                $ready = -1;
            }

            if (isMail($datas['email']) == false) {
                $erreur = 'L\'adresse e-mail saisie n\'est pas correcte.';
                $ready = -1;
            }

            if (!isset($datas['jaccepte']) || $datas['jaccepte'] != 1) {
                $erreur = 'Veuillez accepter les conditions d\'utilisation des données !';
                $ready = -1;
            }

            if (!isset($ready)) {

                $spam = -1;

                if ((preg_match('#mailto|<a|href|http|https#', $datas['name'])) || (preg_match('#mailto|<a|href|http|https#', $datas['email'])) || (preg_match('#mailto|<a|href|http|https#', $datas['message']))) {
                    $spam = 1;
                }

                if ($spam == -1) {
                    // $sujet = SITE_NAME . $language['contact_courriel_sujet'] . ' - Site web';
                    $subject = (!isset($datas['subject']) || strlen($datas['subject']) == 0) ? SITE_NAME . ' - Contact' : SITE_NAME . ' - ' . $courriel['sujets_contact'][$datas['subject']];

                    $message = str_replace(['#nom#', '#telephone#', '#email#', '#message#'], [$datas['name'], $datas['phone'], $datas['email'], $datas['message']], $language['commun_courriel_contact_contenu']);
                    $message .= signature();

                    sendMail($datas['name'], $datas['email'], SITE_MAIL, $subject, $message);
                    //sendMail($datas['name'], $datas['email'], ADMIN_MAIL, $subject, $message);
                    sendMail($datas['name'], $datas['email'], SUPERADMIN_MAIL, $subject, $message);

                    $_SESSION[$app]['notification']['succes'] = 'Votre message a été envoyé avec succès.';

                    if (isset($_SESSION[$app]['sessioncontact'])) {
                        unset($_SESSION[$app]['sessioncontact']);
                    }
                }
            } else {
                $_SESSION[$app]['notification']['erreur'] = $erreur;
            }
        } else {
            $_SESSION[$app]['notification']['erreur'] = 'Vous devez sûrement être un robot.';
        }

        break;

    case 'obtenirunrendezvous':

        $ancre = '#obtenir-rdv';

        if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
            $_SESSION[$app]['trackingback'] = $HTTP_REFERER;
        }

        $_SESSION[$app]['sessionrendezvous'] = $datas;
        if ($decode['success'] !== true) {

            if (((strlen($datas['phone']) > 0) && (!preg_match('#^[. 0-9]*$#', $datas['phone'])))) {
                $erreur = 'Le numéro de téléphone saisi n\'est pas correct.';
                $ready = -1;
            }

            if (strlen($datas['nom']) == 0 || strlen($datas['email']) == 0 || strlen($datas['phone']) == 0) {
                $erreur = 'Les champs obligatoires n\'ont pas été renseignés.';
                $ready = -1;
            }

            if (isMail($datas['email']) == false) {
                $erreur = 'L\'adresse e-mail saisie n\'est pas correcte.';
                $ready = -1;
            }

            if (!isset($datas['jaccepte']) || $datas['jaccepte'] != 1) {
                $erreur = 'Veuillez accepter les conditions d\'utilisation des données !';
                $ready = -1;
            }

            if (!isset($ready)) {

                $spam = -1;

                if ((preg_match('#mailto|<a|href|http|https#', $datas['nom'])) || (preg_match('#mailto|<a|href|http|https#', $datas['email'])) || (preg_match('#mailto|<a|href|http|https#', $datas['message']))) {
                    $spam = 1;
                }

                if ($spam == -1) {
                    $model->settable(VDC_COMMERCE);
                    $reference = $model->getById(COMMERCE_CHAMP2, $datas['id']);

                    $subject = SITE_NAME . ' - Obtenir un rendez-vous';

                    $message = str_replace(['#nom#', '#telephone#', '#email#', '#message#', '#reference#'], [$datas['nom'], $datas['phone'], $datas['email'], $datas['message'], $reference], $language['commun_courriel_prise_rendez_vous_contenu']);
                    $message .= signature();

                    sendMail($datas['nom'], $datas['email'], SITE_MAIL, $subject, $message);
                    //sendMail($datas['nom'], $datas['email'], ADMIN_MAIL, $subject, $message);
                    sendMail($datas['nom'], $datas['email'], SUPERADMIN_MAIL, $subject, $message);

                    $ancre = '';

                    $_SESSION[$app]['notification']['succes'] = 'Votre message a été envoyé avec succès.';

                    if (isset($_SESSION[$app]['sessionrendezvous'])) {
                        unset($_SESSION[$app]['sessionrendezvous']);
                    }
                }
            } else {
                $_SESSION[$app]['notification']['erreur'] = $erreur;
            }
        } else {
            $_SESSION[$app]['notification']['erreur'] = 'Vous devez sûrement être un robot.';
        }

        break;

    case 'etreappelerauplusvite':

        $ancre = '#etre-appele-vite';

        if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
            $_SESSION[$app]['trackingback'] = $HTTP_REFERER;
        }

        $_SESSION[$app]['sessionetreappeler'] = $datas;
        if ($decode['success'] !== true) {

            if (((strlen($datas['phone']) > 0) && (!preg_match('#^[. 0-9]*$#', $datas['phone'])))) {
                $erreur = 'Le numéro de téléphone saisi n\'est pas correct.';
                $ready = -1;
            }

            if (strlen($datas['nom']) == 0 || strlen($datas['email']) == 0 || strlen($datas['phone']) == 0) {
                $erreur = 'Les champs obligatoires n\'ont pas été renseignés.';
                $ready = -1;
            }

            if (isMail($datas['email']) == false) {
                $erreur = 'L\'adresse e-mail saisie n\'est pas correcte.';
                $ready = -1;
            }

            if (!isset($datas['jaccepte']) || $datas['jaccepte'] != 1) {
                $erreur = 'Veuillez accepter les conditions d\'utilisation des données !';
                $ready = -1;
            }

            if (!isset($ready)) {

                $spam = -1;

                if ((preg_match('#mailto|<a|href|http|https#', $datas['nom'])) || (preg_match('#mailto|<a|href|http|https#', $datas['email'])) || (preg_match('#mailto|<a|href|http|https#', $datas['message']))) {
                    $spam = 1;
                }

                if ($spam == -1) {
                    $model->settable(VDC_COMMERCE);
                    $reference = $model->getById(COMMERCE_CHAMP2, $datas['id']);

                    $subject = SITE_NAME . ' - Etre appeler au plus vite';

                    $message = str_replace(['#nom#', '#telephone#', '#email#', '#message#', '#reference#'], [$datas['nom'], $datas['phone'], $datas['email'], $datas['message'], $reference], $language['commun_courriel_etre_appeler_contenu']);
                    $message .= signature();

                    sendMail($datas['nom'], $datas['email'], SITE_MAIL, $subject, $message);
                    //sendMail($datas['nom'], $datas['email'], ADMIN_MAIL, $subject, $message);
                    sendMail($datas['nom'], $datas['email'], SUPERADMIN_MAIL, $subject, $message);

                    $ancre = '';

                    $_SESSION[$app]['notification']['succes'] = 'Votre message a été envoyé avec succès.';

                    if (isset($_SESSION[$app]['sessionetreappeler'])) {
                        unset($_SESSION[$app]['sessionetreappeler']);
                    }
                }
            } else {
                $_SESSION[$app]['notification']['erreur'] = $erreur;
            }
        } else {
            $_SESSION[$app]['notification']['erreur'] = 'Vous devez sûrement être un robot.';
        }

        break;

    case 'recevoirdossiercomplet':

        $ancre = '#recevoir-dossier';

        if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
            $_SESSION[$app]['trackingback'] = $HTTP_REFERER;
        }

        $_SESSION[$app]['sessionrecevoirdossiercomplet'] = $datas;
        if ($decode['success'] !== true) {


            if (((strlen($datas['phone']) > 0) && (!preg_match('#^[. 0-9]*$#', $datas['phone'])))) {
                $erreur = 'Le numéro de téléphone saisi n\'est pas correct.';
                $ready = -1;
            }

            if (strlen($datas['nom']) == 0 || strlen($datas['email']) == 0 || strlen($datas['phone']) == 0) {
                $erreur = 'Les champs obligatoires n\'ont pas été renseignés.';
                $ready = -1;
            }

            if (isMail($datas['email']) == false) {
                $erreur = 'L\'adresse e-mail saisie n\'est pas correcte.';
                $ready = -1;
            }

            if (!isset($datas['jaccepte']) || $datas['jaccepte'] != 1) {
                $erreur = 'Veuillez accepter les conditions d\'utilisation des données !';
                $ready = -1;
            }

            if (!isset($ready)) {

                $spam = -1;

                if ((preg_match('#mailto|<a|href|http|https#', $datas['nom'])) || (preg_match('#mailto|<a|href|http|https#', $datas['email'])) || (preg_match('#mailto|<a|href|http|https#', $datas['message']))) {
                    $spam = 1;
                }

                if ($spam == -1) {
                    $model->settable(VDC_COMMERCE);
                    $reference = $model->getById(COMMERCE_CHAMP2, $datas['id']);

                    $subject = SITE_NAME . ' - Recevoir dossier complet';

                    $message = str_replace(['#nom#', '#telephone#', '#email#', '#message#', '#reference#'], [$datas['nom'], $datas['phone'], $datas['email'], $datas['message'], $reference], $language['commun_courriel_dossier_complet_contenu']);
                    $message .= signature();

                    sendMail($datas['nom'], $datas['email'], SITE_MAIL, $subject, $message);
                    //sendMail(SITE_NAME, $datas['email'], ADMIN_MAIL, $subject, $message);
                    sendMail($datas['nom'], $datas['email'], SUPERADMIN_MAIL, $subject, $message);

                    $ancre = '';

                    $_SESSION[$app]['notification']['succes'] = 'Votre message a été envoyé avec succès.';

                    if (isset($_SESSION[$app]['sessionrecevoirdossiercomplet'])) {
                        unset($_SESSION[$app]['sessionrecevoirdossiercomplet']);
                    }
                }
            } else {
                $_SESSION[$app]['notification']['erreur'] = $erreur;
            }
        } else {
            $_SESSION[$app]['notification']['erreur'] = 'Vous devez sûrement être un robot.';
        }

        break;

    case 'courrielvendrevotrebien':

        $ancre = '#content';

        if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
            $_SESSION[$app]['trackingback'] = $HTTP_REFERER;
        }

        $_SESSION[$app]['sessionvendrebien'] = $datas;

        if ($decode['success'] !== true) {

            if (((strlen($datas['phone']) > 0) && (!preg_match('#^[. 0-9]*$#', $datas['phone'])))) {
                $erreur = 'Le numéro de téléphone saisi n\'est pas correct.';
                $ready = -1;
            }

            if (strlen($datas['phone']) == 0 || strlen($datas['adresse']) == 0 || strlen($datas['type']) == 0 || strlen($datas['ville']) == 0 || strlen($datas['name']) == 0 || strlen($datas['email']) == 0 || strlen($datas['message']) == 0) {
                $erreur = 'Les champs obligatoires n\'ont pas été renseignés.';
                $ready = -1;
            }

            if (isMail($datas['email']) == false) {
                $erreur = 'L\'adresse e-mail saisie n\'est pas correcte.';
                $ready = -1;
            }

            if (!isset($datas['jaccepte']) || $datas['jaccepte'] != 1) {
                $erreur = 'Veuillez accepter les conditions d\'utilisation des données !';
                $ready = -1;
            }

            if (!isset($ready)) {

                $spam = -1;

                if ((preg_match('#mailto|<a|href|http|https#', $datas['phone'])) || (preg_match('#mailto|<a|href|http|https#', $datas['adresse'])) || (preg_match('#mailto|<a|href|http|https#', $datas['ville'])) || (preg_match('#mailto|<a|href|http|https#', $datas['cp']))) {
                    $spam = 1;
                }

                if ((preg_match('#mailto|<a|href|http|https#', $datas['superficie'])) || (preg_match('#mailto|<a|href|http|https#', $datas['name'])) || (preg_match('#mailto|<a|href|http|https#', $datas['email'])) || (preg_match('#mailto|<a|href|http|https#', $datas['message']))) {
                    $spam = 1;
                }

                if ($spam == -1) {

                    $model->settable(VDC_COMMERCE_TYPE);
                    $type_bien_name = $model->getById(COMMERCE_TYPE_NAME, $datas['type']);

                    $superficie = (!empty($datas['superficie'])) ? number_format($datas['superficie'], 2, ',', ' ') . ' ' . $language['commun_surface_signe'] : $datas['superficie'];

                    $subject = SITE_NAME . ' - Vendre un bien';

                    $message = str_replace(
                            ['#name#', '#phone#', '#email#', '#message#', '#type#', '#ville#', '#cp#', '#adresse#', '#superficie#'], [$datas['name'],
                        $datas['phone'], $datas['email'], $datas['message'], $type_bien_name, $datas['ville'], $datas['cp'], $datas['adresse'], $superficie], $language['commun_courriel_vendre_un_bien_contenu']
                    );

                    $message .= signature();
                    //dump($message);
                    sendMail($datas['name'], $datas['email'], SITE_MAIL, $subject, $message);
                    //sendMail($datas['name'], $datas['email'], ADMIN_MAIL, $subject, $message);
                    sendMail($datas['name'], $datas['email'], SUPERADMIN_MAIL, $subject, $message);

                    $_SESSION[$app]['notification']['succes'] = 'Votre message a été envoyé avec succès.';

                    if (isset($_SESSION[$app]['sessionvendrebien'])) {
                        unset($_SESSION[$app]['sessionvendrebien']);
                    }
                }
            } else {
                $_SESSION[$app]['notification']['erreur'] = $erreur;
            }
        } else {
            $_SESSION[$app]['notification']['erreur'] = 'Vous devez sûrement être un robot.';
        }

        break;

    case 'envoicourrielbienpanier':

        $ancre = '#nous-contacter';

        if (isset($HTTP_REFERER) && !stristr($HTTP_REFERER, $action)) {
            $_SESSION[$app]['trackingback'] = $HTTP_REFERER;
        }

        $_SESSION[$app]['sessionenvoipanier'] = $datas;

        if ($decode['success'] !== true) {

            if (((strlen($datas['phone']) > 0) && (!preg_match('#^[. 0-9]*$#', $datas['phone'])))) {
                $erreur = 'Le numéro de téléphone saisi n\'est pas correct.';
                $ready = -1;
            }

            if (strlen($datas['name']) == 0 || strlen($datas['email']) == 0 || strlen($datas['message']) == 0) {
                $erreur = 'Les champs obligatoires n\'ont pas été renseignés.';
                $ready = -1;
            }

            if (isMail($datas['email']) == false && isMail($datas['destinataire']) == false) {
                $erreur = 'L\'adresse e-mail saisie n\'est pas correcte.';
                $ready = -1;
            }

            if (!isset($datas['jaccepte']) || $datas['jaccepte'] != 1) {
                $erreur = 'Veuillez accepter les conditions d\'utilisation des données !';
                $ready = -1;
            }

            if (!isset($ready)) {

                $spam = -1;

                if ((preg_match('#mailto|<a|href|http|https#', $datas['name'])) || (preg_match('#mailto|<a|href|http|https#', $datas['email'])) || (preg_match('#mailto|<a|href|http|https#', $datas['message']))) {
                    $spam = 1;
                }

                if ($spam == -1) {
                    // $sujet = SITE_NAME . $language['contact_courriel_sujet'] . ' - Site web';
                    $subject = (!isset($datas['subject']) || strlen($datas['subject']) == 0) ? SITE_NAME . ' - Contact' : SITE_NAME . ' - ' . $datas['subject'];

                    if (isset($_SESSION[$app]['elementaenvoyer']) && count($_SESSION[$app]['elementaenvoyer']) > 0) {

                        $model->settable(VDC_COMMERCE);

                        $biens_choisis = '<ul>';
                        foreach ($_SESSION[$app]['elementaenvoyer'] as $id) {
                            $biens_choisis .= '<li>' . $model->getById(COMMERCE_CHAMP2, $id) . '</li>';
                        }
                        $biens_choisis .= '</ul>';

                        $message = str_replace(['#nom#', '#telephone#', '#email#', '#biens_choisis#', '#message#'], [$datas['name'], $datas['phone'], $datas['email'], $biens_choisis, $datas['message']], $language['commun_courriel_bien_panier_contenu']);
                        $message .= signature();

                        sendMail($datas['name'], $datas['email'], $datas['destinataire'], $subject, $message);
                        sendMail($datas['name'], $datas['email'], SITE_MAIL, $subject, $message);
                        //sendMail($datas['name'], $datas['email'], ADMIN_MAIL, $subject, $message);
                        sendMail($datas['name'], $datas['email'], SUPERADMIN_MAIL, $subject, $message);

                        $_SESSION[$app]['notification']['succes'] = 'Votre message a été envoyé avec succès.';

                        if (isset($_SESSION[$app]['elementaenvoyer'])) {
                            unset($_SESSION[$app]['elementaenvoyer']);
                        }
                        if (isset($_SESSION[$app]['sessionenvoipanier'])) {
                            unset($_SESSION[$app]['sessionenvoipanier']);
                        }
                    } else {

                        $_SESSION[$app]['notification']['erreur'] = 'Veuillez choisir au moins un bien.';
                    }
                }
            } else {
                $_SESSION[$app]['notification']['erreur'] = $erreur;
            }
        } else {
            $_SESSION[$app]['notification']['erreur'] = 'Vous devez sûrement être un robot.';
        }

        break;

    default:
        break;
}

if (isset($_SESSION[$app]['trackingback'])) {
    $path = $_SESSION[$app]['trackingback'];
    unset($_SESSION[$app]['trackingback']);
}

$model->redirect($path, $ancre);
