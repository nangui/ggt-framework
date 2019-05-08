<?php

function menuPageSpecial($total, $nombreLignePage, $pageEncours, $url, $option = "") {
    $menuNav = "";

    $debut = ($pageEncours) ? (($pageEncours == 1) ? 0 : $pageEncours * $nombreLignePage - $nombreLignePage) : 0;
    $nombreDePage = ($nombreLignePage) ? ceil($total / $nombreLignePage) : 0;

    if ($pageEncours != $nombreDePage) {
        $plus = "<li class=\"page-item\"><a  class=\"page-link \" aria-label=\"Next\" href='" . $url . "/page/" . ($pageEncours + 1) . $option . "'><span aria-hidden = \"true\">&raquo;</span></a>";
    } else {
        $plus = "";
    }
    if ($pageEncours != 1) {
        $moins = "<li class=\"page-item\"><a  class=\"page-link \" aria-label=\"Previous\" href='" . $url . "/page/" . ($pageEncours - 1) . $option . "'><span aria-hidden = \"true\">&laquo;</span></a>";
    } else {
        $moins = "";
    }

    $debutBoucle = max(min($pageEncours - 4, $nombreDePage - 9), 1);
    $finBoucle = max(min(9, $nombreDePage), min($pageEncours + 4, $nombreDePage));
    $menu = "";
    for ($i = $debutBoucle; $i <= $finBoucle; $i++) {
        $menu .= ( $i == $pageEncours) ? "<li class=\"page-item active\"><a class=\"page-link\" href='#'>" . $i . "</a></li>" : "<li class=\"page-item\"><a class=\"page-link \" href='" . $url . "/page/" . $i . $option . "'>" . $i . "</a></li>";
    }

    if ($nombreDePage > 1) {
        $menuNav .= $moins . " " . $menu . " " . $plus;
    }

    $retour = array(
        'debut' => $debut,
        'limite' => $nombreLignePage,
        'pagination' => $menuNav);

    return $retour;
}

function paginationAjax($total, $nombreLignePage, $pageEncours, $url, $option = "") {
    $menuNav = "";

    $debut = ($pageEncours) ? (($pageEncours == 1) ? 0 : $pageEncours * $nombreLignePage - $nombreLignePage) : 0;
    $nombreDePage = ($nombreLignePage) ? ceil($total / $nombreLignePage) : 0;

    if ($pageEncours != $nombreDePage) {
        $plus = "<li class=\"page-item\"><a  class=\"page-link smooth-scroll-js-to-result cursor-pointer\" aria-label=\"Next\" onclick='paginate(\"" . $option . "\", \"" . ($pageEncours + 1) . "\")'>Suivant</a>";
    } else {
        $plus = "";
    }
    if ($pageEncours != 1) {
        $moins = "<li class=\"page-item\"><a  class=\"page-link smooth-scroll-js-to-result cursor-pointer\" aria-label=\"Previous\" onclick='paginate(\"" . $option . "\", \"" . ($pageEncours - 1) . "\")'>Précédent</a>";
    } else {
        $moins = "";
    }

    $debutBoucle = max(min($pageEncours - 4, $nombreDePage - 9), 1);
    $finBoucle = max(min(9, $nombreDePage), min($pageEncours + 4, $nombreDePage));
    $menu = "";
    for ($i = $debutBoucle; $i <= $finBoucle; $i++) {
        $menu .= ( $i == $pageEncours) ? "<li class=\"page-item active\"><a class=\"page-link\" href='#'>" . $i . "</a></li>" : "<li class=\"page-item\"><a class=\"page-link smooth-scroll-js-to-result cursor-pointer\" onclick='paginate(\"" . $option . "\", \"" . $i . "\")'>" . $i . "</a></li>";
    }

    if ($nombreDePage > 1) {
        $menuNav .= $moins . " " . $menu . " " . $plus;
    }

    $retour = array(
        'debut' => $debut,
        'limite' => $nombreLignePage,
        'pagination' => $menuNav);

    return $retour;
}

?>