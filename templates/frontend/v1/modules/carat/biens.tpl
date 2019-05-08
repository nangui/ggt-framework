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
            {if isset($carat.filarianetitre)}
            <li class="breadcrumb-item active" aria-current="page">{$carat.filarianetitre}</li>
            {else}
            <li class="breadcrumb-item active" aria-current="page">Biens</li>
            {/if}
    </ol>
</nav>


<div class="search_results mt-5">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-10 mb-3">
                <div class="h3 section_heading title-font--light">
                    <i>
                        {if isset($carat.simplesearchliens)}
                            <div class="text-muted title-font--light uppercase">{$carat.btitleh1page.type}</div>
                            {if isset($carat.btitleh1page.ville)}<div class="text-primary title-font--bold uppercase">{$carat.btitleh1page.ville}</div>{/if}
                        {else}
                            <div class="text-muted title-font--light">NOS BIENS À VENDRE SUR</div>
                            <div class="text-primary title-font--bold">LA LOIRE ET ENVIRONS</div>
                        {/if}
                    </i>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="flat-form">
                    <div class="--fieldWrap">
                        <select class="form-control no-appearance" onchange='loadDocument("{$smarty.const.HTTP_PATH}/{$get.app}/_ajax.php?app={$get.app}&module={$get.module}{$get.action}&tribiens&valeur=" + this.value, "", "oui", "");'>
                            <option value=''>:: Trier la liste par ::</option>
                            <option value="1" {if isset($smarty.session.{$get.app}.{$get.module|cat:$get.action}.tri) && $smarty.session.{$get.app}.{$get.module|cat:$get.action}.tri eq 1}selected{/if}>Prix croissant</option>
                            <option value="2" {if isset($smarty.session.{$get.app}.{$get.module|cat:$get.action}.tri) && $smarty.session.{$get.app}.{$get.module|cat:$get.action}.tri eq 2}selected{/if}>Prix d&eacute;croissant</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {if isset($carat.simplesearchliens)}
            <div class="row mb-5">
                {foreach from=$carat.simplesearchliens item=simpletextliens}
                    <div class="col">
                        <a href='{$simpletextliens.lien}' title='{$simpletextliens.noml}' class="btn btn-outline btn-outline-primary mt-3 content-font--bold w-100" style="padding:0.8rem 0.5rem;font-size:0.8rem;line-height: 2;" data-flat-btn>{$simpletextliens.noml} ({$simpletextliens.nbrb})</a>
                    </div>
                {/foreach}
            </div>
        {/if}
        {if isset($carat.biens) && count($carat.biens) gt 0}
            {foreach item=bien from=$carat.biens key=cle}

                <div class="annonce mb-lg-3 mb-5">
                    <div class="--photo" style="background:url('{$bien->photo.url}');background-position:center center;background-size:cover;">
                        <div class="overlay">
                            <div class="tagsWrap">
                                {if isset($bien->cc) && $bien->cc eq 'OUI'}
                                    <span class="--tag tag-exclusivite">Coup de coeur</span>
                                {/if}
                            </div>
                        </div>
                    </div>
                    <div class="--description">
                        <h3 class="h5 w-100 -title"><a href="{$bien->lien}" title="{$bien->titre}" class="text-secondary content-font--bold">{$bien->titre_cut}</a></h3>
                        <div class="--caracteristiques">{$bien->surface_format} {$language.commun_surface_signe} {if !empty($bien->nb_pieces)}, {$bien->nb_pieces} pièce(s){/if}</div>

                        <p class="mt-3 text-muted">
                            {$bien->description_cut}
                            <br><br>
                        </p>
                        <span id='mypaniercare_{$bien->id}'>
                            {if isset($carat.panieridbien) && $bien->id|in_array:$carat.panieridbien}
                                <a onclick='deleteFromSelection("{$bien->id}");' title="Supprimer de la selection" class="h5 cursor-pointer">
                                    <i class="zmdi zmdi-check text-secondary"></i>&nbsp; 
                                    EST DANS VOTRE SÉLECTION
                                </a>
                            {else}
                                <a onclick='addToSelection("{$bien->id}");' title="Ajouter à la selection" class="h5 cursor-pointer">
                                    <i class="zmdi zmdi-plus-circle-o text-primary"></i>&nbsp; 
                                    AJOUTER À MA SÉLECTION
                                </a>
                            {/if}
                        </span>
                    </div>
                    <div class="--infos py-5 pl-4">
                        <h4 class="prix h2 content-font--regular text-dark">{$bien->prix_format} {$language.commun_monnaie_signe}</h4>
                        <p>
                            {$bien->adresse} <br>
                            Ville : {$bien->ville}
                        </p>
                        <hr>
                        <div class="h3 content-font--thin text-muted">Ref: {$bien->reference}</div>
                        <a href='#' onclick='redirection("{$bien->lien}");' title="{$bien->titre}" class="btn btn-primary btn-border-0 w-100"><span class="zmdi zmdi-chevron-right animated infinite fadeInLeft" style="animation-duration: 2s;font-size:1.2rem;"></span> Consulter</a>
                    </div>
                </div>
            {/foreach}
        {else}
            <div class="col-lg-12">
                <div class="h2"> <span class="content-font--thin">Aucun bien </span> <br> <span class="text-primary content-font--bold">ne correspond à votre recherche.</span> </div>
            </div>
        {/if}

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-lg-5">
                {if isset($carat.pagination.pagination)}
                    {$carat.pagination.pagination}
                {/if}
            </ul>
        </nav>
    </div>
</div>

<!-- Créer l'espace entre les blocs --><br><br>

{include file="{$template}/common/_alerte.tpl"}

{include file="{$template}/common/_contact.tpl"}

