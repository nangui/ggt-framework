<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function dump($todump)
{
    print_r('<pre style="background: #000; color: #fff;">');

    var_dump($todump);

    print_r('</pre>');

    exit();
}

function setPourcentage($montant, $signe, $taux)
{
    if (intval($montant) > 0) {
        if ($signe == '-') {
            return $montant * (1 - $taux);
        } else {
            return $montant * (1 + $taux);
        }
    }

    return 0;
}

function cleanCut($string, $length, $cutString = '...')
{
    if (strlen($string) <= $length) {
        return $string;
    }

    $str = mb_substr($string, 0, $length - strlen($cutString) + 1, 'UTF8');

    return mb_substr($str, 0, strrpos($str, ' '), 'UTF8').$cutString;
}

//Cette fonction met des sauts de ligne après un nombre de caracteres donnés
function setBr($string, $length)
{
    if (strlen($string) <= $length) {
        return $string;
    } else {
        $chaine_retour = '';

        $nbreFois = ceil(strlen($string) / $length);
        $debut = 0;

        for ($i = 1; $i <= $nbreFois; $i++) {
            $coupure = substr($string, $debut, $length).'<br/>';
            $chaine_retour .= $coupure;
            $debut = $debut + $length;
        }

        return $chaine_retour;
    }
}

/**
 * Cette fonction génére un code aléatoire ayant une longueur.
 *
 * @param <type> $length
 */
function randomANUM($length)
{
    $longueur = ($length ? $length : 4);
    $gen = '';

    for ($i = 1; $i <= $longueur; $i++) {
        $d = rand(1, 30) % 2;
        $gen .= ($d ? chr(rand(65, 90)) : chr(rand(48, 57)));
    }

    return $gen;
}

/*
 *  ^[\w.-]+@ Commence (^) par au moins un caractère correspondant à la classe abrégée, ou un tiret, puis est suivi par un@.
 * [\w.-]+ un ou plus de caractères correspondant à la classe abrégée ou un tiret (c'est le nom de domaine)
 * \.[a-zA-Z]{2,6}$ un point, puis deux à six lettres, qui finissent la chaine (c'est la tld du nom de domaine).
 */

function isMail($email)
{
    if (preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $email)) {
        return true;
    }

    return false;
}

// ********************************************************
// Filter for generation html links. Makes strings look
// nice as an html link
// ********************************************************
function gen_title_filter($title, $compact = true, $nocasechange = true, $case = 'lower')
{
    trim($title);

    $title = preg_replace('#Ç#', 'C', $title);
    $title = preg_replace('#ç#', 'c', $title);
    $title = preg_replace('#è|é|ê|ë#', 'e', $title);
    $title = preg_replace('#È|É|Ê|Ë#', 'E', $title);
    $title = preg_replace('#à|á|â|ã|ä|å#', 'a', $title);
    $title = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $title);
    $title = preg_replace('#ì|í|î|ï#', 'i', $title);
    $title = preg_replace('#Ì|Í|Î|Ï#', 'I', $title);
    $title = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $title);
    $title = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $title);
    $title = preg_replace('#ù|ú|û|ü#', 'u', $title);
    $title = preg_replace('#Ù|Ú|Û|Ü#', 'U', $title);
    $title = preg_replace('#ý|ÿ#', 'y', $title);
    $title = preg_replace('#Ý#', 'Y', $title);
    $title = preg_replace("#'|!|@|%|&|\(|\)|_|\^|\*|\+| |\?|,|:|;|<|>|/#", '-', $title);
    $title = preg_replace('#-+#', '-', $title);
    if ($compact) {
        $title = preg_replace('#-#', '', $title);
    }
    $title = preg_replace('#&Ccedil;#', 'C', $title);
    $title = preg_replace('#&ccedil;#', 'c', $title);
    $title = preg_replace('#&egrave;|&eacute;|&ecirc;|&euml;#', 'e', $title);
    $title = preg_replace('#&Egrave;|&Eacute;|&Ecirc;|&Euml;#', 'E', $title);
    $title = preg_replace('#&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;#', 'a', $title);
    $title = preg_replace('#&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;#', 'A', $title);
    $title = preg_replace('#&igrave;|&iacute;|&icirc;|&iuml;#', 'i', $title);
    $title = preg_replace('#&Igrave;|&Iacute;|&Icirc;|&Iuml;#', 'I', $title);
    $title = preg_replace('#&otilde;|&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;#', 'o', $title);
    $title = preg_replace('#&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;#', 'O', $title);
    $title = preg_replace('#&ugrave;|&uacute;|&ucirc;|&uuml;#', 'u', $title);
    $title = preg_replace('#&Ugrave;|&Uacute;|&Ucirc;|&Uuml;#', 'U', $title);
    $title = preg_replace('#&yacute;|&yuml;#', 'y', $title);
    $title = preg_replace('#&Yacute;#', 'Y', $title);

    return ($nocasechange) ? $title : (($case == 'lower') ? strtolower($title) : strtoupper($title));
}

//traite les prix
function traitePrix($prix)
{
    $prix = str_replace(' ', '', $prix);
    $prix = str_replace('.', '', $prix);
    $prix = str_replace(',', '', $prix);

    return $prix;
}

//Création de a signature des mails
function signature($info = [])
{
    if ((count($info) == 0)) {
        $signature = '<hr/>';
        $signature .= '<table cellspacing="10">
                        <tr>
                            <td colspan="2">
                                <a href="'.HTTP_PATH.'" target="_BLANK"><img src = "'.HTTP_PATH.'/assets/'._version.'/'.IMG_PATH_BE.'/avatars/profile.png" width="200"></a>
                            </td>
                        </tr>
                        <tr>
                            <td valign = "top">
                                Email :  '.ADMIN_MAIL.' <br/><br/>
                                Téléphone : '.PHONE_1;
        //$signature .= (isset(PHONE_2) && !empty(PHONE_2)) ? PHONE_2 : '';
        $signature .= ' <br/><br/>
                                Site web : <a href="'.HTTP_PATH.'">'.SITE_NAME.'</a> <br/>
                            </td>
                        </tr>
                    </table>';

        return $signature;
    } else {
        $signature = '<hr/>';
        $signature .= '<table cellspacing="10">
                        <tr>
                            <td colspan="2">
                                <a href="'.HTTP_PATH.'" target="_BLANK"><img src = "'.HTTP_PATH.'/assets/'._version.'/'.IMG_PATH_BE.'/avatars/profile.png" width="200"></a>
                            </td>
                        </tr>
                        <tr>
                            <td valign = "top">#nom_complet# <br/><br/>
                                Email :  #email# <br/><br/>
                                Téléphone : #telephone# <br/><br/>
                                Site web : <a href="'.HTTP_PATH.'">'.SITE_NAME.'</a> <br/>
                            </td>
                        </tr>
                    </table>';

        return str_replace(['#nom_complet#', '#email#', '#telephone#'], $info, $signature);
    }
}

/**
 * Fonction permettant de créer une miniature de l'image.
 *
 * @param string $file   Le nom du fichier à miniaturiser
 * @param string $output Le nom de la miniature
 * @param string Le nom du dossier dans lequel la miniature sera créée
 * @param int $width  La largeur de la miniature
 * @param int $height La hauteur de la miniature
 *
 * @return string le nom de la miniature si la miniature a bien été réalisé, FALSE sinon
 */
function miniature($file, $output, $output_folder, $width, $height)
{
    if (!file_exists($output_folder.$output)) {
        if (!fopen($output_folder.$output, 'xb')) {
            echo "Error in the function 'miniature', the picture '".$output."' doesn't exist and faile to create.\nPage:'".$_SERVER['PHP_SELF']."'";

            return false;
        }
    } elseif (filemtime($output_folder.$output) < filemtime($file)) {
        if (!fopen($output_folder.$output, 'wb')) {
            echo "Error in the function 'miniature', the picture '".$output."' doesn't exist and faile to create.\nPage:'".$_SERVER['PHP_SELF']."'";

            return false;
        }
    } else {
        return $output;
    }

    //ouverture de l'image et calcul des hauteurs
    $image_src = imagecreatefrom($file);
    $image_dest = imagecreatetruecolor($width, $height);
    $width_src = imagesx($image_src);
    $height_src = imagesy($image_src);

    if (!imagecopyresampled($image_dest, $image_src, 0, 0, 0, 0, $width, $height, $width_src, $height_src)) {
        echo "Error in the function 'miniature', the picture '".$output."' isn't resized.\nPage:'".$_SERVER['PHP_SELF']."'";

        return false;
    }

    imagepng($image_dest, $output_folder.$output);

    return $output;
}

/**
 * Fonction permettant de créer une image selon son type.
 *
 * @param string $url L'url de l'image
 *
 * @return Ressouce la ressource de l'image
 */
function imagecreatefrom($url)
{
    $info = getimagesize($url);
    switch ($info[2]) {
        case IMAGETYPE_GIF:
            $res = imagecreatefromgif($url);
            break;
        case IMAGETYPE_JPEG:
            $res = imagecreatefromjpeg($url);
            break;
        case IMAGETYPE_PNG:
            $res = imagecreatefrompng($url);
            break;
        default:
            $res = false;
            break;
    }

    return $res;
}

//calcul du nombre de jours entre 2 dates
function nbJours($debut, $fin)
{
    $diff = strtotime($debut) - strtotime($fin);

    return round($diff / 86400);
}

//Nous renvoie une date apres reception d'une date reference et d'une constante
//exemple $duree = +6 day, +3 month ...
function calculDate($date_reference, $duree)
{
    if (isset($date_reference) && ($duree != '')) {
        try {
            $d = new DateTime($date_reference);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }

        $d->modify($duree);

        return $d->format('Y-m-d');
    }

    return false;
}

// Cette fonction est utilisée pour traiter les messages (langue)
function remplaceChaine($chaine, $tableauVariable)
{
    if (count($tableauVariable) > 0 && !empty($chaine)) {
        $tableauSearch = [];
        foreach ($tableauVariable as $key => $value) {
            $tableauSearch[] = '%'.$key.'%';
        }
        $chaine = str_replace($tableauSearch, $tableauVariable, $chaine);
    }

    return $chaine;
}

//Cette fonction supprime un dossier non vide et son contenu
function clearDir($dossier)
{
    $ouverture = opendir($dossier);
    if (!$ouverture) {
        return;
    }
    while ($fichier = readdir($ouverture)) {
        if ($fichier == '.' || $fichier == '..') {
            continue;
        }
        if (is_dir($dossier.'/'.$fichier)) {
            $r = clearDir($dossier.'/'.$fichier);
            if (!$r) {
                return false;
            }
        } else {
            $r = unlink($dossier.'/'.$fichier);
            if (!$r) {
                return false;
            }
        }
    }
    closedir($ouverture);
    $r = rmdir($dossier);
    if (!$r) {
        return false;
    }

    return true;
}

//Utilisé pour détecter les variables des lettres types
function getVariablesContenuMail($contenu, $separator)
{
    $array = str_split($contenu);
    $tableauVariable = [];
    $var = '';
    $keys = array_keys($array, $separator);
    if (count($keys) > 0) {
        $i = 0;
        $j = $keys[$i] + 1;
        while ($j < count($array)) {
            if ($array[$j] !== $separator) {
                $var .= $array[$j];
                $j++;
            } else {
                $i++;
                $j = $keys[$i] + 1;
                if (!preg_match('/\s/', $var)) {
                    array_push($tableauVariable, $var);
                }
                $var = '';
            }
        }
    }

    return $tableauVariable;
}

function getChaine($texte)
{
    preg_match_all("|\#[a-zA-z_]*\#|U", $texte, $chaines);

    return isset($chaines[0]) ? $chaines[0] : [];
}

function precedent($niveau)
{
    ?>
    <script>
        var niveau = <?php echo (float) $niveau; ?>;
        niveau = (niveau == 0) ? -1 : niveau;
        window.history.go(niveau);
    </script>
    <?php
}

function print_f($route, $smarty, $donnees, $template, $output = 'fiche.pdf', $display_mode = 'fullpage')
{
    $smarty->assign('donnees', $donnees);
    $smarty->display($template);

    $content = ob_get_clean();

    require $route.'/core/plugins/topdf/html2pdf.class.php';

    try {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode($display_mode);
        $html2pdf->writeHTML($content);
        $html2pdf->Output($output);
    } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}

function i_cal($module, $id, $donnees)
{
    $ical_content = "BEGIN:VCALENDAR
VERSION:2.0
PRODID:$id
BEGIN:VEVENT
ORGANIZER;CN=Ousmane Dieng:MAILTO:eldieng2003@gmail.com
STATUS:CONFIRMED
DESCRIPTION:".$donnees['objet'].'
TRANSP:OPAQUE
UID:'.$id.'
DTSTAMP:'.date("Ymd\THis", strtotime($donnees['date_creation'])).'
DTSTART:'.date("Ymd\THis", strtotime($donnees['date_creation'])).'
DTEND:'.date("Ymd\THis", strtotime($donnees['date_echeance'])).'
SUMMARY:'.$donnees['type_tache'].'
LOCATION:'.$donnees['lieu'].'
URL:'.generate_link(HTTP_PATH, $module, 'details', $id).'
BEGIN:VALARM
ACTION:DISPLAY
DESCRIPTION:Rappel
TRIGGER:-PT30M
REPEAT:2
DURATION:PT15M
ACTION:DISPLAY
END:VALARM
END:VEVENT
END:VCALENDAR';

    return $ical_content;
}

function destroy($a_detruire)
{
    if (isset($a_detruire)) {
        unset($a_detruire);
    }
}

function FileGetSize($aPath = '', $aShort = true, $aCheckIfFileExist = true)
{
    if ($aCheckIfFileExist && !file_exists($aPath)) {
        return 0;
    }
    $size = filesize($aPath);
    if (empty($size)) {
        return '0 '.($aShort ? 'o' : 'octets');
    }

    $l = [];
    $l[] = ['name' => 'octets', 'abbr' => 'o', 'size' => 1];
    $l[] = ['name' => 'kilo octets', 'abbr' => 'ko', 'size' => 1024];
    $l[] = ['name' => 'mega octets', 'abbr' => 'Mo', 'size' => 1048576];
    $l[] = ['name' => 'giga octets', 'abbr' => 'Go', 'size' => 1073741824];
    $l[] = ['name' => 'tera octets', 'abbr' => 'To', 'size' => 1099511627776];
    $l[] = ['name' => 'peta octets', 'abbr' => 'Po', 'size' => 1125899906842620];
    foreach ($l as $k => $v) {
        if ($size < $v['size']) {
            return round($size / $l[$k - 1]['size'], 2).' '.($aShort ? $l[$k - 1]['abbr'] : $l[$k - 1]['name']);
        }
    }
    $l = end($l);

    return round($size / $l['size'], 2).' '.($aShort ? $l['abbr'] : $l['name']);
}

function FileGetInfo($aPath = '', $aCheckIfFileExist = true)
{
    if ($aCheckIfFileExist && !file_exists($aPath)) {
        return 0;
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    return finfo_file($finfo, $aPath);
}

//Génére le xml pour la passerelle
function traiteDonneeXML($donnee)
{
    if ($donnee != '') {
        return htmlspecialchars(str_replace('&#039;', "'", $donnee));
    }
}

function checkRCS($rcs)
{
    if (!$rcs) {
        return false;
    }
    $rcs = htmlspecialchars($rcs);
    $ch = curl_init("https://www.infogreffe.fr/services/entreprise/rest/recherche/parPhrase?phrase=$rcs&typeProduitMisEnAvant=EXTRAIT");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $output = curl_exec($ch);
    curl_close($ch);

    $dec_obj = json_decode($output, true);
    $raison_sociale_arr = [];

    if (count($dec_obj) > 0) {
        foreach ($dec_obj as $obj) {
            // Search for the correct obj, that contains denomination
            // $dec_obj['entrepRCSStoreResponse']['items'][0]['libelleEntreprise'];
            if (is_array($obj)) {
                if (isset($obj['items'][0]['libelleEntreprise'])) {
                    $raison_sociale_arr = $obj['items'][0]['libelleEntreprise'];
                    break;
                }
            }
        }
    }

    return $raison_sociale_arr;
}

function url_exists($url_a_tester)
{
    $F = @fopen($url_a_tester, 'r');
    if ($F) {
        fclose($F);

        return true;
    } else {
        return false;
    }
}

function search($model, $route = '')
{
    $transaction = [];
    $model->settable(VDC_COMMERCE);
    foreach ($GLOBALS['transaction'] as $cle => $valeur) {
        $counting = $model->getCountClosure(COMMERCE_CHAMP3.' = '.$cle);
        if ($counting > 0) {
            $transaction[$cle] = $valeur;
        }
    }

    $pathfilevl = $route.STORAGE_PATH.'villes.json';
    $pathfiletb = $route.STORAGE_PATH.'typesbien.json';

    return [
        'tt_research' => $transaction,
        'tb_research' => getFromJson($pathfiletb),
        'vl_research' => getFromJson($pathfilevl),
    ];
}

function getFromJson($pathfile)
{
    if (file_exists($pathfile)) {
        return json_decode(file_get_contents($pathfile));
    }

    return [];
}

function prev_next($model, $id, $storage)
{
    $model->settable(VDC_COMMERCE);
    $idmax = $model->getExtremum(COMMERCE_ID, 'max', 'actif=1');
    $idmin = $model->getExtremum(COMMERCE_ID, 'min', 'actif=1');
    $previous = $model->getExtremum(COMMERCE_ID, 'max', 'actif=1 AND id < '.$id);
    $next = $model->getExtremum(COMMERCE_ID, 'min', 'actif=1 AND id > '.$id);

    $idprev = (((int) $previous) === 0) ? $idmax : $previous;
    $idnext = (((int) $next) === 0) ? $idmin : $next;

    $champs = ['id', 'champ3 as transaction', 'champ4 as bien_type', 'champ6 as id_ville', 'champ11 as prix', 'champ16 as surface', 'champ20 as titre'];
    $biens['prev'] = $model->getMoreById($idprev, $champs);
    $biens['next'] = $model->getMoreById($idnext, $champs);

    foreach ($biens as $cle => $valeur) {
        // Recuperation du nom de la ville.
        $model->settable(_NOM_DBCOMMUNVILLES_TV);
        $biens[$cle]->ville = $model->getById('nom', $valeur->id_ville);

        // Recuperation du type de commerce
        $model->settable('vdc_commerce_type');
        $biens[$cle]->nom_bien_type = $model->getById('name', $valeur->bien_type);

        // Recuperation du prix
        $biens[$cle]->prix_format = (intval($valeur->prix) > 0) ? number_format($valeur->prix, 2, ',', ' ') : $valeur->prix;
        $biens[$cle]->surface_format = (intval($valeur->surface) > 0) ? number_format($valeur->surface, 2, ',', ' ') : $valeur->surface;

        // Recuperation de la photo principale
        $model->settable('vdc_photo');
        $photos = $model->getFields(['url', 'titre'], 'id_bien = '.$valeur->id, 'id ASC', 'LIMIT 1');

        $photos_i = ['url' => STORAGE_PATH.'images/biens/_defaut.jpg', 'titre' => ''];

        if (isset($photos[0]) && !empty($photos[0]->url) && file_exists($storage.'images/biens/'.$photos[0]->url)) {
            $photos_i['url'] = STORAGE_PATH.'images/biens/'.$photos[0]->url;
            $photos_i['titre'] = $photos[0]->titre;
        }

        $biens[$cle]->photo = $photos_i;

        // Creation du lien vers la fiche descriptive.
        $biens[$cle]->lien = generate_link_detail(HTTP_PATH, $biens[$cle]->ville, $biens[$cle]->transaction, $biens[$cle]->nom_bien_type, $biens[$cle]->titre, $valeur->id);
    }

    return $biens;
}

function filarianeId($model, $nom, $type = 'type', $idtype = '')
{
    if ($type == 'ville') {
        $model->settable(_NOM_DBCOMMUNVILLES_TV);
        $datas = $model->getFields(['id', 'nom', 'code_postal as cp'], ' id IN (SELECT champ6 FROM '.VDC_COMMERCE.' WHERE actif = 1 AND champ4 = '.$idtype.')', 'nom ASC');
    }

    if ($type == 'type') {
        $model->settable(VDC_COMMERCE_TYPE);
        $datas = $model->getFields(['id', 'name as nom'], ' id IN (SELECT champ4 FROM '.VDC_COMMERCE.' WHERE actif = 1)', 'name ASC');
    }

    if (isset($datas) && count($datas) > 0) {
        $id = '';
        foreach ($datas as $data) {
            $traitenom = gen_title_filter($data->nom, false, false);

            if ($nom === $traitenom) {
                $id = $data->id;

                break;
            }
        }

        return [$type => $datas, 'id_'.$type => $id, 'nom' => $nom];
    }

    return false;
}

function nbvisites($model, $id, $nbquoi)
{
    if ($nbquoi === 'visite') {
        $champ = COMMERCE_NB_VISITE;
    } else {
        $champ = COMMERCE_AFFICHER_NUMERO;
    }

    if (!isset($_SESSION[session_id()][$champ])) {
        $_SESSION[session_id()][$champ] = [];
    }

    if (!in_array($id, $_SESSION[session_id()][$champ])) {
        $model->settable(VDC_COMMERCE);
        $donnees['id'] = $id;
        $donnees[$champ] = (int) $model->getById($champ, $donnees['id']) + 1;

        $model->updateOne($donnees);

        $_SESSION[session_id()][$champ][] = $id;
    }
}

/* * *** Extras */
