{include file="{$template}/common/_topbar.tpl"}

<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="h3 section_heading title-font--light">
                    <i>
                        <div class="text-light title-font--bold mb-1">AFFINEZ</div>
                        <div class="text-light title-font--light">VOTRE RECHERCHE</div>
                    </i>
                </div>
            </div>
            <div class="col-lg-12">
                {include file="{$template}/common/_search_form.tpl"}
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="{$get.path}" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item"><a href="{$carat.filariane.lientype}" title='{$carat.bien->transaction} {$carat.bien->nom_bien_type}'>{$carat.bien->transaction} {$carat.bien->nom_bien_type}</a></li>
        <li class="breadcrumb-item"><a href="{$carat.filariane.lientypeville}" title='{$carat.bien->transaction} {$carat.bien->nom_bien_type} - {$carat.bien->ville|lower|ucfirst}'>{$carat.bien->transaction} {$carat.bien->nom_bien_type} - {$carat.bien->ville|lower|ucfirst}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{$carat.bien->nom_bien_type} à {$carat.bien->ville} ({$carat.bien->champ5}) - {$carat.bien->surface_format} {$language.commun_surface_signe}</li>
    </ol>
</nav>


<section class="fiche-descriptive">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-3">
                <!--a href="{*$carat.retour*}" style="text-decoration: none;"><i class="zmdi zmdi-arrow-left text-primary h3"></i>&nbsp; RETOUR</a-->
            </div>
            <div class="col-lg-9 col-md-9">
                <ul class="--outils list-unstyled list-inline">
                    <li><a href="{$get.path}/outil-calculette" title="Calculette"><img data-icon src="{$smarty.const.IMG_PATH_FE}/icons/icons8-calculator.png" alt=""></a></li>
                    <span id='mypaniercare_{$carat.bien->id}'>
                        {if  isset($carat.panieridbien) && $carat.bien->id|in_array:$carat.panieridbien}
                            <li><a onclick='deleteFromSelection("{$carat.bien->id}", "li", "{$smarty.const.IMG_PATH_FE}");' class='cursor-pointer' title="Retirer des favoris"><img data-icon src="{$smarty.const.IMG_PATH_FE}/icons/icons8-favorite_chat.png" alt=""></a></li>
                                {else}
                            <li><a onclick='addToSelection("{$carat.bien->id}", "li", "{$smarty.const.IMG_PATH_FE}");' class='cursor-pointer' title="Ajouter aux favoris"><img data-icon src="{$smarty.const.IMG_PATH_FE}/icons/icons8-popular_topic.png" alt=""></a></li>
                                {/if}
                    </span>
                    <!--
                    Utiliser cette icone pour retirer des favoris
                    <li><a href="#" title="Enlever des favoris"><img data-icon src="../images/icons/icons8-favorite_chat.png" alt=""></a></li> -->
                    <li><a href="#" data-remodal-target="shareOnSocials" title="Partager vers"><img data-icon src="{$smarty.const.IMG_PATH_FE}/icons/icons8-share_message.png" alt=""></a></li>
                    <li><a href="{$carat.bien->lienprint}" title="Imprimer la fiche" target="_blank"><img data-icon src="{$smarty.const.IMG_PATH_FE}/icons/icons8-printer_door_open.png" alt=""></a></li>
                </ul>
            </div>
            <div class="col-lg-12 mb-3"><hr></div>
        </div>

        <div class="row d-flex align-items-top">
            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="--title h5 title-font--light">{$carat.bien->nom_bien_type} - {$carat.bien->ville} ({$carat.bien->champ5}) - {$carat.bien->surface_format} {$language.commun_surface_signe}</h1>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="text-primary content-font--bold">{$carat.bien->prix_format} {$language.commun_monnaie_signe}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <ul class="--dimensions list-inline list-unstyled">
                    {if !empty($carat.bien->surface_format)}<li>{$carat.bien->surface_format}{$language.commun_surface_signe}</li>{/if}
                    {if !empty($carat.bien->champ18)}<li>{$carat.bien->champ18}pièce(s)</li>{/if}
                    {if !empty($carat.bien->champ19)}<li>{$carat.bien->champ19}chambre(s)</li>{/if}
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="bd-example">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            {foreach item=photo from=$carat.bien->photo key=cle}
                                <div class="carousel-item {if $cle eq 0}active{/if}">
                                    <img src="{$photo.url}" class="d-block w-100" alt="{$photo.titre}">
                                    <div class="carousel-caption d-none d-md-block">
                                        <!--h5>First slide label</h5-->
                                        <p>{$photo.titre}</p>
                                    </div>
                                </div>
                            {/foreach}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="row" data-callback>
                    <div class="col-lg-4" data-wrap>
                        <a href="#" data-remodal-target="recevoir-dossier" title="Recevoir le dossier complet"><i data-icon class="zmdi zmdi-folder-person"></i> <span>Recevoir <br> le dossier complet</span></a>
                    </div>
                    <div class="col-lg-4" data-wrap>
                        <a href="#" data-remodal-target="obtenir-rdv" title="Obtenir un rendez-vous"><i data-icon class="zmdi zmdi-accounts"></i> <span>Obtenir <br> un rendez-vous</span></a>
                    </div>
                    <div class="col-lg-4" data-wrap>
                        <a href="#" data-remodal-target="etre-appele-vite" title="Être appelé au plus vite" style="border:0;"><i data-icon class="zmdi zmdi-phone-forwarded"></i> <span>Être appelé <br> au plus vite</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    {foreach item=photo from=$carat.bien->photo key=cle}
                        <li data-target="#carouselExampleCaptions" data-slide-to="{$cle}">
                            <img src="{$photo.url}" class="d-block w-100" alt="{$photo.titre}">
                        </li>
                    {/foreach}
                </ol>

                <div class="--description mt-2">
                    <b>{$carat.bien->champ20}</b>
                    <p class="mt-3">
                        {*$carat.bien->description_cut*}
                    </p>
                    <i><b>Référence : {$carat.bien->champ2}</b></i><br><br>
                    <a title="Afficher le téléphone" class="btn btn-outline btn-outline-primary" data-toggle="collapse" href="#showPhoneNumber" role="button" aria-expanded="false" aria-controls="showPhoneNumber" style="outline:none;box-shadow: none;" onclick='loadDocument("{$smarty.const.HTTP_PATH}/{$get.app}/_ajax.php?app={$get.app}&module=carat&affichenumero&id={$carat.bien->id}", "", "non", "");'>Aficher le téléphone</a>
                    <div class="collapse mt-2" id="showPhoneNumber">
                        <div class="alert alert-success"><b><i data-icon class="zmdi zmdi-phone"></i> &nbsp; {$carat.bien->champ105}</b></div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-12"><hr></div> -->
        </div>

        <div class="--detailsDescription">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="h3 --title">Description de l'offre</div>
                    <p>
                        {$carat.bien->champ21}
                    </p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="h3 --title">Descriptif du bien</div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Général</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="detailplus-tab" data-toggle="tab" href="#detailplus" role="tab" aria-controls="detailplus" aria-selected="false">+ Détails</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="financier-tab" data-toggle="tab" href="#financier" role="tab" aria-controls="financier" aria-selected="false">Financier</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane pt-3 fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <ul class="list-unstyled">
                                {if !empty($carat.bien->ville)}<li> <p> Ville  <span class="valueInfos">: {$carat.bien->ville}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ4)}<li> <p> Type de bien  <span class="valueInfos">: {$carat.bien->nom_bien_type}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ5)}<li> <p> Code postal  <span class="valueInfos">: {$carat.bien->champ5}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->surface_format)}<li> <p> Surface habitable <span class="valueInfos">: {$carat.bien->surface_format} {$language.commun_surface_signe} </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->surface_terrain_format)}<li> <p> Surface terrain  <span class="valueInfos">:  {$carat.bien->surface_terrain_format} {$language.commun_surface_signe} </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ18)}<li> <p> Nombre de pièces  <span class="valueInfos">:  {$carat.bien->champ18}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ19)}<li> <p> Nombre de chambres  <span class="valueInfos">:  {$carat.bien->champ19}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ25)}<li> <p> Nombre de niveaux  <span class="valueInfos">:  {$carat.bien->champ25}  </span> </p> </li>{/if}
                            </ul>
                        </div>
                        <div class="tab-pane pt-3 fade" id="detailplus" role="tabpanel" aria-labelledby="detailplus-tab">
                            <ul class="list-unstyled">
                                {if !empty($carat.bien->champ29)}<li> <p> Nombre de salles de bain  <span class="valueInfos">:  {$carat.bien->champ29}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ30)}<li> <p> Nombre de salles d'eau  <span class="valueInfos">:  {$carat.bien->champ30}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ31)}<li> <p> Nombre de WC  <span class="valueInfos">:  {$carat.bien->champ31}  </span> </p> <hr> </li>{/if}
                                {if !empty($carat.bien->champ33)}<li> <p> Type de chauffage  <span class="valueInfos">: {$carat.bien->champ33}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ34)}<li> <p> Type de cuisine  <span class="valueInfos">: {$carat.bien->champ34}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ48) && $carat.bien->champ48 eq 'OUI'}<li> <p> Terrasse  <span class="valueInfos">: OUI  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ43)}<li> <p> Nombre de parkings  <span class="valueInfos">:  {$carat.bien->champ43}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->quartier)}<li> <p> Quartier  <span class="valueInfos">: {$carat.bien->quartier}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ27)}<li> <p> Année de construction  <span class="valueInfos">: {$carat.bien->champ27}  </span> </p> </li>{/if}
                            </ul>
                        </div>
                        <div class="tab-pane pt-3 fade" id="financier" role="tabpanel" aria-labelledby="financier-tab">
                            <ul class="list-unstyled">
                                {if !empty($carat.bien->champ11)}<li> <p> Prix de vente  <span class="valueInfos">: {$carat.bien->prix_format} {$language.commun_monnaie_signe} </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->honoraire_a_la_charge)}<li> <p> Les honoraires d'agence seront{if $carat.bien->champ302 neq 3} intégralement{/if} à la charge <b>{$carat.bien->honoraire_a_la_charge}</b> </p> </li>{/if}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 col-md-12 mb-md-5">
                    <div class="h3 --title">Diagnostics de performance énergétique</div>
                    <div class="row">
                        {if empty($carat.bien->champ176) && empty($carat.bien->champ178)}
                            <div class="col-lg-12">
                                <img src="{$smarty.const.IMG_PATH_FE}/energies/dpe-indisponible.jpg" alt="" class="--dpeIndisponibleImg" />
                            </div>
                        {else}
                            <div class="col-lg-6 col-md-6">
                                <div class="diagnostics performance full">
                                    <div class="wrapper">
                                        <div class="segment level-1 ">
                                            <div class="info-range">&lt; 50</div>
                                            <div class="info-letter">A</div>
                                            {if !empty($carat.bien->champ176) && $carat.bien->champ176 gte 0 && $carat.bien->champ176 lte 50}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ176|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-1"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-2 ">
                                            <div class="info-range">51 à 90</div>
                                            <div class="info-letter">B</div>
                                            {if !empty($carat.bien->champ176) && $carat.bien->champ176 gte 51 && $carat.bien->champ176 lte 90}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ176|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-2"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-3 focus">
                                            <div class="info-range">91 à 150</div>
                                            <div class="info-letter">C</div>
                                            {if !empty($carat.bien->champ176) && $carat.bien->champ176 gte 91 && $carat.bien->champ176 lte 150}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ176|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-3"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-4 ">
                                            <div class="info-range">151 à 230</div>
                                            <div class="info-letter">D</div>
                                            {if !empty($carat.bien->champ176) && $carat.bien->champ176 gte 151 && $carat.bien->champ176 lte 230}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ176|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-4"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-5 ">
                                            <div class="info-range">231 à 330</div>
                                            <div class="info-letter">E</div>
                                            {if !empty($carat.bien->champ176) && $carat.bien->champ176 gte 231 && $carat.bien->champ176 lte 330}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ176|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-5"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-6 ">
                                            <div class="info-range">331 à 450</div>
                                            <div class="info-letter">F</div>
                                            {if !empty($carat.bien->champ176) && $carat.bien->champ176 gte 331 && $carat.bien->champ176 lte 450}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ176|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-6"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-7 ">
                                            <div class="info-range">&gt; 450</div>
                                            <div class="info-letter">G</div>
                                            {if !empty($carat.bien->champ176) && $carat.bien->champ176 gte 450}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ176|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-7"></div>`
                                    </div>
                                </div>
                                <div class="sh-text-light"> <small>Unité de mesure exprimé en kWhEP/m².an</small> </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="diagnostics gaz full">
                                    <div class="wrapper">
                                        <div class="segment level-1 ">
                                            <div class="info-range">&lt; 5</div>
                                            <div class="info-letter">A</div>
                                            {if !empty($carat.bien->champ178) && $carat.bien->champ178 gte 0 && $carat.bien->champ178 lte 5}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ178|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-1"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-2 ">
                                            <div class="info-range">6 à 10</div>
                                            <div class="info-letter">B</div>
                                            {if !empty($carat.bien->champ178) && $carat.bien->champ178 gte 6 && $carat.bien->champ178 lte 10}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ178|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-2"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-3 ">
                                            <div class="info-range">11 à 20</div>
                                            <div class="info-letter">C</div>
                                            {if !empty($carat.bien->champ178) && $carat.bien->champ178 gte 11 && $carat.bien->champ178 lte 20}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ178|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-3"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-4 focus">
                                            <div class="info-range">21 à 35</div>
                                            <div class="info-letter">D</div>
                                            {if !empty($carat.bien->champ178) && $carat.bien->champ178 gte 21 && $carat.bien->champ178 lte 35}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ178|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-4"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-5 ">
                                            <div class="info-range">36 à 55</div>
                                            <div class="info-letter">E</div>
                                            {if !empty($carat.bien->champ178) && $carat.bien->champ178 gte 36 && $carat.bien->champ178 lte 55}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ178|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-5"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-6 ">
                                            <div class="info-range">56 à 80</div>
                                            <div class="info-letter">F</div>
                                            {if !empty($carat.bien->champ178) && $carat.bien->champ178 gte 56 && $carat.bien->champ178 lte 80}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ178|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-6"></div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="segment level-7 ">
                                            <div class="info-range">&gt; 80</div>
                                            <div class="info-letter">G</div>
                                            {if !empty($carat.bien->champ178) && $carat.bien->champ178 gte 80}
                                                <div class="detail">
                                                    <div class="arrow detail-arrow"></div>
                                                    <div class="info-detail"><span>{$carat.bien->champ178|intval}</span></div>
                                                </div>
                                            {/if}
                                        </div>
                                        <div class="arrow line-arrow level-7"></div>
                                    </div>
                                </div>
                                <div class="sh-text-light"> <small>Unité de mesure exprimé en kgeqCO2/m².an </small> </div>
                            </div>
                        {/if}
                    </div> 
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        {if isset($carat.bornes.prev)}
                            <div class="col-lg-6 col-md-6">
                                <div class="h3 --title">Bien précédent</div>
                                <figure class="snip1584" style="background:url('{$carat.bornes.prev->photo.url}') no-repeat;background-size:cover;background-position: center center;">
                                    <!-- <img src="{$carat.bornes.prev->photo.url}" alt="{$carat.bornes.prev->photo.titre}"/> -->
                                    <figcaption>
                                        <div class="h5 --nom">{$carat.bornes.prev->nom_bien_type} {if !empty($carat.bornes.prev->surface_format)}{$carat.bornes.prev->surface_format} {$language.commun_surface_signe}{/if}</div>
                                        <div class="h5 --nom"><b><i class="zmdi zmdi-pin"></i>&nbsp; {$carat.bornes.prev->ville}</b></div>
                                        <div class="h6 --prix">{if !empty($carat.bornes.prev->prix_format)}{$carat.bornes.prev->prix_format} {$language.commun_monnaie_signe}{/if}</div>
                                    </figcaption><a href="{$carat.bornes.prev->lien}" title='{$carat.bornes.prev->titre}'></a>
                                </figure>
                            </div>
                        {/if}
                        {if isset($carat.bornes.next)}
                            <div class="col-lg-6 col-md-6">
                                <div class="h3 --title">Bien suivant</div>
                                <figure class="snip1584" style="background:url('{$carat.bornes.next->photo.url}') no-repeat;background-size:cover;background-position: center center;">
                                    <!-- <img src="{$carat.bornes.next->photo.url}" alt="{$carat.bornes.next->photo.titre}"/> -->
                                    <figcaption>
                                        <div class="h5 --nom">{$carat.bornes.next->nom_bien_type} {if !empty($carat.bornes.next->surface_format)}{$carat.bornes.next->surface_format} {$language.commun_surface_signe}{/if}</div>
                                        <div class="h5 --nom"><b><i class="zmdi zmdi-pin"></i>&nbsp; {$carat.bornes.next->ville}</b></div>
                                        <div class="h6 --prix">{if !empty($carat.bornes.next->prix_format)}{$carat.bornes.next->prix_format} {$language.commun_monnaie_signe}{/if}</div>
                                    </figcaption><a href="{$carat.bornes.next->lien}" title='{$carat.bornes.next->titre}'></a>
                                </figure>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>

            <div class="row mt-lg-5">
                <div class="col-lg-8" onload="initialiser()">
                    <div class="h3 --title">{$carat.bien->ville} ({$carat.bien->champ5})</div>
                    <div id="ficheMap" style="height:450px;width:100%;"></div>
                </div>
                <div class="col-lg-4">
                    <div class="h3">&nbsp;</div>
                    <ul class="list-unstyled mt-4">
                        {if count($carat.bien->proximite)}
                            {foreach item=proximite from=$carat.bien->proximite key=cle}
                                <li>
                                    <p> {$proximite|ucfirst} <hr> </p>
                                </li>
                            {/foreach}
                        {/if}
                    </ul>
                </div>
            </div>

            <!--div class="row mt-lg-5">
                <div class="col-lg-12"><div class="h3 --title">Statistiques</div></div>
                <div class="col-lg-6 col-md-6">
                    <ul class="list-unstyled">
                        <li> <p> Nombre d'habitants  <span class="valueInfos"> 62 480 € </span> <hr> </p> </li>
                        <li> <p> Propriétaires (vs. locataires)  <span class="valueInfos"> 43,88 %  </span> <hr> </p> </li>
                        <li> <p> Taxe habitation  <span class="valueInfos"> 17,20 %  </span> <hr> </p> </li>
                        <li> <p> Taxe foncière  <span class="valueInfos"> 25,17 %  </span> <hr> </p> </li>
                        <li> <p> Habitants de moins de 25 ans  <span class="valueInfos"> 32,26 %  </span> <hr> </p> </li>
                        <li> <p> Habitants de 25 à 55 ans  <span class="valueInfos"> 36,96 %  </span> <hr> </p> </li>
                        <li> <p> Habitants de plus de 55 ans  <span class="valueInfos"> 30,78 %  </span> <hr> </p> </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <ul class="list-unstyled">
                        <li> <p> Nombre d'enfants par famille  <span class="valueInfos"> 0,97  </span> <hr> </p> </li>
                        <li> <p> Familles sans enfant  <span class="valueInfos"> 49,02 %  </span> <hr> </p> </li>
                        <li> <p> Familles avec 1 ou 2 enfants  <span class="valueInfos"> 49,02 % </span> <hr> </p> </li>
                        <li> <p> Maisons <span class="valueInfos"> 23,86 %  </span> <hr> </p> </li>
                        <li> <p> Appartements <span class="valueInfos"> 76,14 %  </span> <hr> </p> </li>
                        <li> <p> Familles avec 3 enfants  <span class="valueInfos"> 8,07 % </span> <hr> </p> </li>
                    </ul>
                </div>
            </div-->
        </div>

    </div>
    <br><br>
</section>

{include file="{$template}/common/_alerte.tpl"}

{*include file="{$template}/common/_contact.tpl"*}
