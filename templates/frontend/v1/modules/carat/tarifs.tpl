{include file="{$template}/common/_topbar.tpl"}

<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section_heading">
                <div class="h1 --title title-font--light">NOTRE SAVOIR FAIRE</div>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="{$get.path}" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Notre savoir faire</li>
    </ol>
</nav>

<section class="notre-agence cms-block mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <ul class="informations-de-contact list-unstyled">
                    <li>
                        <img src="{$smarty.const.IMG_PATH_FE}/icons/icons8-rotating_globe_.png" alt="Worldwide icon" class="icone">
                        <h5 class="content-font--bold">SITUATION GÉOGRAPHIQUE</h5>
                        <p class="mb-0">{$smarty.const.ADRESSE_AGENCE} <br> {$smarty.const.CP_AGENCE} {$smarty.const.VILLE_AGENCE}</p>
                    </li>
                    <li>
                        <img src="{$smarty.const.IMG_PATH_FE}/icons/icons8-email_sign.png" alt="Adress icon" class="icone">
                        <h5 class="content-font--bold">ADRESSE EMAIL</h5>
                        <p class="mb-0"> {$smarty.const.SITE_MAIL} </p>
                    </li>
                    <li>
                        <img src="{$smarty.const.IMG_PATH_FE}/icons/icons8-missed_call.png" alt="Call us icon" class="icone">
                        <h5 class="content-font--bold">APPELEZ-NOUS</h5>
                        <p class="mb-0"> {$smarty.const.PHONE_1} </p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="--illustration text-center">
                    <img data-icon src="{$smarty.const.IMG_PATH_FE}/logo/logo_carat_couleur.png" alt="" width="200px">
                    <hr style="border:0.5px dashed #0B5A6A;">
                </div>
                <div class="--content bg-white p-4">
                    <p>
                        <b><u>Rémunération hors taxes</u></b> : fixée suivant le barème ci-dessous (à la charge de l’acquéreur). <br>
                        Ce barème est composé de trois paliers cumulatifs :
                    </p>
                    <table class="table table-bordered" style="margin-bottom: 1.7em;margin-top: 1.7em;">
                        <thead>
                            <tr class="table thead-default">
                                <th class="text-center" style="background-color: #e1e1e1;">
                                    Taux en %
                                </th>
                                <th class="text-center" style="background-color: #e1e1e1;">
                                    Paliers sur le prix d’achat
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    10 % (dix)
                                </td>
                                <td class="text-center">
                                    Jusqu’à 80.000,00 €
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    09 % (neuf)
                                </td>
                                <td class="text-center">
                                    De 80.000,00 € à 159.999,00 €
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    06 % (six)
                                </td>
                                <td class="text-center">
                                    Supérieur ou égal à 160.000,00 €
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{include file="{$template}/common/_alerte.tpl"}

{include file="{$template}/common/_contact.tpl"}
