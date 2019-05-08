<?php

class Param
{
    public function filter($donnees, $required)
    {
        $sontvides = $this->required($donnees, $required);

        return ($sontvides === false) ? (object) ['etat' => true, 'donnees' => $donnees] : (object) ['etat' => false, 'donnees' => $sontvides];
    }

    public function required($donnees, $required)
    {
        foreach ($required as $champ) {
            if (isset($donnees[$champ]) && is_null($donnees[$champ]) || empty($donnees[$champ])) {
                return (object) ['champ' => $champ];
            }
        }

        return false;
    }

    public function isEmpty($var)
    {
        if (is_array($var)) {
            return (count($var) > 0) ? false : true;
        }

        return empty($var);
    }

    public function enLigne()
    {
        return isset($_SESSION[_USER_]->id);
    }

    public function peutChangerMP($path = HTTP_PATH)
    {
        if (!$this->enLigne() || $_SESSION[_USER_]->premiere_connexion == -1) {
            $this->redirect($path);
        }
    }

    public function peutseConnecter($path = HTTP_PATH)
    {
        if ($this->enLigne()) {
            $this->redirect($path);
        }
    }

    public function horsLigne($path = HTTP_PATH)
    {
        if ($this->enLigne() === false) {
            $this->redirect($path.'/connexion');
        }

        if ($_SESSION[_USER_]->premiere_connexion == 1) {
            $this->redirect($path.'/connexion/changementdemotdepasse');
        }
    }

    public function superadmin()
    {
        if ($_SESSION[_USER_]->type_utilisateur == 'SUPERADMINISTRATEUR') {
            return true;
        }

        return false;
    }

    public function deconnexion($path = HTTP_PATH)
    {
        session_destroy();

        $this->redirect($path);
    }

    public function redirect($path, $content = '')
    {
        header('location: '.$path.$content);
        exit();
    }

    public function trackback($referer, $action)
    {
        if (isset($referer) && !stristr($referer, $action)) {
            $_SESSION['trackingback'] = $referer;
        }
    }

    public function backto($path, $module = '')
    {
        $path .= $this->isEmpty($module) ? '' : $module;

        if (isset($_SESSION['trackingback'])) {
            $path = $_SESSION['trackingback'];
            unset($_SESSION['trackingback']);
        }

        $this->redirect($path);
    }
}
