<?php

function generate_link($site_url, $module, $action = '', $id = '')
{
    $link = $site_url.'/'.gen_title_filter($module);
    $link .= !empty($action) ? '/'.gen_title_filter($action) : '';
    $link .= !empty($id) ? '/'.base64_encode($id) : '';

    return str_replace(["\r", "\n"], '', $link);
}

function generate_link_ville($site_url, $ville, $bientype = '')
{
    $link = $site_url.'/'.gen_title_filter($ville, false, false);
    $link .= !empty($bientype) ? '/'.gen_title_filter($bientype, false, false) : '';

    return str_replace(["\r", "\n"], '', $link);
}

function generate_link_type_ville($site_url, $bientype, $ville = '')
{
    $link = $site_url;
    $link .= !empty($ville) ? '/'.gen_title_filter($ville, false, false) : '';
    $link .= '/acheter-vendre-louer';
    $link .= !empty($bientype) ? '/'.gen_title_filter($bientype, false, false) : '';

    return str_replace(["\r", "\n"], '', $link);
}

function generate_link_detail($site_url, $ville, $transaction, $bientype, $titre, $id = '')
{
    $suivie = (in_array($transaction, [2, 3])) ? 'louer' : 'acheter-vendre';
    $link = $site_url.'/'.gen_title_filter($ville, false, false);
    $link .= !empty($suivie) ? '/'.gen_title_filter($suivie, false, false) : '';
    $link .= !empty($bientype) ? '/'.gen_title_filter($bientype, false, false) : '';
    $link .= !empty($titre) ? '/'.gen_title_filter($titre, false, false) : '';
    $link .= !empty($id) ? '/'.base64_encode($id) : '';

    return str_replace(["\r", "\n"], '', $link);
}

function generate_link_config($site_url, $module, $element = '', $action = '', $id = '')
{
    $link = $site_url.'/'.gen_title_filter($module);
    $link .= !empty($element) ? '/'.gen_title_filter($element) : '';
    $link .= !empty($action) ? '/'.gen_title_filter($action) : '';
    $link .= !empty($id) ? '/'.base64_encode($id) : '';

    return str_replace(["\r", "\n"], '', $link);
}
