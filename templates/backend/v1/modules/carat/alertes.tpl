{include file="{$template}/common/_topbar.tpl"}

<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section_heading">
                <div class="h1 --title title-font--light">ALERTES</div>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="{$get.path}" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Alertes {if isset($carat.sessionagentrecherche.nom)}- <b>{$carat.sessionagentrecherche.nom}</b>{/if}</li>
    </ol>
</nav>

<section class="panier-de-selection mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section class="coupsdecoeur mb-5">
                    <div class="row">
                        {include file="{$template}/common/_alerte.tpl"}
                    </div>
                </section>
                <br />
                <table id="table--alertes" class="is-dataTable table table-bordered">
                    <thead>
                        <tr>
                            <th>Coordonnées</th>
                            <th>Transaction / Type bien</th>
                            <th>Ville recherche</th>
                            <th>Informations</th>
                            <th width='25px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if isset($carat.recherches) && ($carat.recherches|count gt 0)}
                            {foreach item=recherche from=$carat.recherches key=cle}
                                <tr>
                                    <td>
                                        <div>{$recherche->nom}</div>
                                        <div><a href='mailto:{$recherche->email}' title="Ecrire un courriel">{$recherche->email}</a></div>
                                        <div><a href='tel:{$recherche->phone}' title="Appeler">{$recherche->phone}</a></div>
                                        {if !empty($recherche->adresse)}<div class="small"><b>Adresse : </b>{$recherche->adresse}</div>{/if}
                                        {if !empty($recherche->cp)}<div class="small"><b>Code postal : </b>{$recherche->cp}</div>{/if}
                                        {if !empty($recherche->ville)}<div class="small"><b>Ville : </b>{$recherche->ville}</div>{/if}
                                    </td>
                                    <td>
                                        <div>{$recherche->transaction}</div>
                                        <div>{$recherche->nom_bien_type}</div>
                                    </td>
                                    <td>
                                        <div>{$recherche->ville_bien}</div>
                                    </td>
                                    <td>
                                        {if !empty($recherche->budget_max)}<div>Budget max.: {$recherche->budget_format} {$language.commun_monnaie_signe}</div>{/if}
                                        {if !empty($recherche->surface_min)}<div>Surface min.: {$recherche->surface_format} {$language.commun_surface_signe}</div>{/if}
                                        {if !empty($recherche->rayon)}<div>Rayon : {$recherche->rayon} km</div>{/if}
                                        {if !empty($recherche->nb_pieces)}<div>Nb. pièces : {$recherche->nb_pieces}</div>{/if}
                                        {if !empty($recherche->nb_chambres)}<div>Nb. chambres : {$recherche->nb_chambres}</div>{/if}
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-success" title="Cliquez sur la ligne pour modifier les informations."  data-remodal-target="modifier-alerte-info" onclick='modifyAlert("{$recherche->id}");' class="cursor-pointer"><i class="zmdi zmdi-edit"></i></a>
                                            </div>
                                            <div class="col">
                                                <a onclick='if (confirm("Voulez vous supprimer cette alerte ? "))
                                                            redirection("{$get.path}/alertes/suppression/{$recherche->id|base64_encode}")' class="text-danger" title="Cliquez sur la ligne pour supprimer les informations." class="cursor-pointer"><i class="zmdi zmdi-delete"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            {/foreach}
                        {/if}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{*include file="{$template}/common/_alerte.tpl"*}
