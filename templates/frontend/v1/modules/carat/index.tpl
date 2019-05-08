{include file="{$template}/common/_homepage_lander.tpl"}

{include file="{$template}/common/_search_form.tpl"}

<section class="coupsdecoeur mt-lg-5">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-8">
                <div class="h3 section_heading title-font--light">
                    <i>
                        <span class="text-primary title-font--bold">NOS</span> DERNIÈRES <br>
                        <span class="text-primary title-font--bold">ANNONCES</span> IMMOBILIÈRES
                    </i>
                </div>
            </div>
            <div class="col-lg-4 text-lg-right">
                <a href="{$get.path}/liste-proprietes" title="Voir toutes nos annonces" class="btn btn-outline btn-outline-primary" data-flat-btn>Voir toutes nos annonces</a>
            </div>
        </div>

        <div class="row mt-4">
            {if isset($carat.biens)}
                {foreach item=bien from=$carat.biens key=cle}
                    <div class="col-lg-4">
                        <div class="item">
                            <!-- Ce lien englobe tout le bien pour le clic --><a href="{$bien->lien}" title="{$bien->titre}" class="wrapLink"></a> <!-- Fin du wraplink -->
                            <div class="head --illustration" style="background:url('{$bien->photo.url}');background-position:center center;background-size:cover;"></div>
                            <div class="body">
                                <h3 class="h5 content-font--bold mb-1 w-100 text-truncate" data-title>{$bien->titre}</h3>
                                <h4 class="h6 content-font--light text-muted" data-departement><i class="zmdi zmdi-pin"></i>&nbsp; {$bien->ville}</h4>
                                <p class="text-muted" data-description>
                                    {$bien->description_cut} 
                                </p>
                            </div>
                            <div class="footer h4 text-primary"><span class="content-font--light" data-price>{$bien->prix_format} {$language.commun_monnaie_signe}</span></div>
                        </div>
                    </div>
                {/foreach}
            {else}
                <div class="col-lg-12">
                    <div class="h2"> <span class="content-font--thin">Aucun</span> <br> <span class="text-primary content-font--bold">bien trouvé.</span> </div>
                </div>
            {/if}
        </div>
    </div>
</section>

<!-- Créer l'espace entre les blocs --><br><br>
{include file="{$template}/common/_contact.tpl"}

