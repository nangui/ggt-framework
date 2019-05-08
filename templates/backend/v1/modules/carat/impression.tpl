<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-3">
                &nbsp;
            </div>
            <div class="col-lg-8 mb-3 pull-right">
                <div class="h3 section_heading title-font--light">
                    <i>
                        <div class="text-light title-font--bold mb-1">FICHE DESCRIPTIVE</div>
                        <div class="text-light title-font--light"><i><b>REFERENCE : {$carat.bien->champ2}</b></i> / {$carat.bien->nom_bien_type} - {$carat.bien->ville} ({$carat.bien->champ5})</div>
                    </i>
                </div>
            </div>
        </div>
    </div>
</div>
<br /><br />
<section class="fiche-descriptive">
    <div class="container">
        <div class="row d-flex align-items-top">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="--title h5 title-font--light">{$carat.bien->nom_bien_type} - {$carat.bien->ville} ({$carat.bien->champ5}) - {$carat.bien->surface_format} {$language.commun_surface_signe}</h1>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="text-primary content-font--bold">{$carat.bien->prix_format} {$language.commun_monnaie_signe}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
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
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Indicators -->
                <!--ol class="carousel-indicators">
                {foreach item=photo from=$carat.bien->photo key=cle}
                    <li data-target="#carouselExampleCaptions" data-slide-to="{$cle}">
                        <img src="{$photo.url}" class="d-block w-100" alt="{$photo.titre}">
                    </li>
                {/foreach}
            </ol-->
                <div class="--description mt-2">
                    <b>{$carat.bien->champ20}</b>
                    <p class="mt-3">
                        {*$carat.bien->description_cut*}
                    </p>
                    <i><b>Référence : {$carat.bien->champ2}</b></i><br><br>
                </div>
            </div>
            <!-- <div class="col-lg-12"><hr></div> -->
        </div>

        <div class="--detailsDescription">
            <div class="row">
                <div class="col-lg-6">
                    <div class="h3 --title">Description de l'offre</div>
                    <p>
                        {$carat.bien->champ21}
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="h3 --title">Descriptif du bien</div>
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
                                {if !empty($carat.bien->champ29)}<li> <p> Nombre de salles de bain  <span class="valueInfos">:  {$carat.bien->champ29}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ30)}<li> <p> Nombre de salles d'eau  <span class="valueInfos">:  {$carat.bien->champ30}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ31)}<li> <p> Nombre de WC  <span class="valueInfos">:  {$carat.bien->champ31}  </span> </p> <hr> </li>{/if}
                                {if !empty($carat.bien->champ33)}<li> <p> Type de chauffage  <span class="valueInfos">: {$carat.bien->champ33}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ34)}<li> <p> Type de cuisine  <span class="valueInfos">: {$carat.bien->champ34}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ48) && $carat.bien->champ48 eq 'OUI'}<li> <p> Terrasse  <span class="valueInfos">: OUI  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ43)}<li> <p> Nombre de parkings  <span class="valueInfos">:  {$carat.bien->champ43}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->quartier)}<li> <p> Quartier  <span class="valueInfos">: {$carat.bien->quartier}  </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->champ27)}<li> <p> Année de construction  <span class="valueInfos">: {$carat.bien->champ27}  </span> </p> </li>{/if}
                                {if !empty($carat.bien->champ11)}<li> <p> Prix de vente  <span class="valueInfos">: {$carat.bien->prix_format} {$language.commun_monnaie_signe} </span> <hr> </p> </li>{/if}
                                {if !empty($carat.bien->honoraire_a_la_charge)}<li> <p> Les honoraires d'agence seront{if $carat.bien->champ302 neq 3} intégralement{/if} à la charge <b>{$carat.bien->honoraire_a_la_charge}</b> </p> </li>{/if}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {if !empty($carat.bien->champ176) || !empty($carat.bien->champ178)}
                <div class="row mt-lg-5">
                    <div class="col-lg-6">
                        <div class="h3 --title">Diagnostics de performance énergétique</div>
                        <!-- <div class="row">
                                <div class="col-lg-6"><img src="{$smarty.const.IMG_PATH_FE}/energies/dpe.jpg" alt=""></div>
                                <div class="col-lg-6"><img src="{$smarty.const.IMG_PATH_FE}/energies/dpe2.jpeg" alt=""></div>
                        </div> -->
                        <div class="row">
                            {if !empty($carat.bien->champ176)}
                                <div class="col-lg-6">
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
                            {/if}
                            {if !empty($carat.bien->champ178)}
                                <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        &nbsp;
                    </div>
                </div>	
            {/if}

            <div class="row mt-lg-5">
                <!--div class="col-lg-8" onload="initialiser()">
                    <div class="h3 --title">{*$carat.bien->ville} ({$carat.bien->champ5*})</div>
                    <div id="ficheMap" style="height:450px;width:100%;"></div>
                </div-->
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
        </div>
    </div>
    <br><br>
</section>
<script>
    window.print();
</script>