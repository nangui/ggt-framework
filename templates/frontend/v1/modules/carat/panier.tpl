{include file="{$template}/common/_topbar.tpl"}


<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section_heading">
                <div class="h1 --title title-font--light">MA SÉLECTION</div>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="{$get.path}" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ma sélection {if isset($carat.sessionagentrecherche.nom)}- <b>{$carat.sessionagentrecherche.nom}</b>{else}{if isset($smarty.session.frontend.emailalerte)}- <b>{$smarty.session.frontend.emailalerte}</b>{/if}{/if}</li>
    </ol>
</nav>


<section class="panier-de-selection mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <section class="coupsdecoeur mb-5">
                    <div class="row">
                        {include file="{$template}/common/_alerte.tpl"}
                        <br />
                        {if isset($carat.biens) && ($carat.biens|count gt 0)}
                            {foreach item=bien from=$carat.biens key=cle}
                                <div class="col-lg-4 mt-5 bien-panier-{$bien->id}">
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
                                        <div class="footer h4 text-primary">
                                            <span class="content-font--light" data-price>{$bien->prix_format} {$language.commun_monnaie_signe}</span>
                                        </div>
                                    </div>
                                    <span class="pull-right" style="float: right;"><input type="checkbox" data-id='{$bien->id}' class="id-bien-panier-a-envoyer" {if isset($smarty.session.frontend.elementaenvoyer) && $bien->id|in_array:$smarty.session.frontend.elementaenvoyer}checked{/if} /> | <a onclick='if (confirm("Voulez-vous retirer ce bien de votre sélection ?"))
                                                deleteFromSelection("{$bien->id}", "li", "{$smarty.const.IMG_PATH_FE}", "remove");' class='cursor-pointer' title="Retirer des favoris"><img data-icon src="{$smarty.const.IMG_PATH_FE}/icons/icons8-favorite_chat.png" alt="" width="25px"></a></span>
                                </div>
                            {/foreach}
                        {/if}
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-lg-5">
                            {if isset($carat.pagination.pagination)}
                                {$carat.pagination.pagination}
                            {/if}
                        </ul>
                    </nav>
                </section>
            </div>
            <section class="section-block contact-us" data-block-bg-is="blue-light" id="nous-contacter">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="h3 section_heading title-font--light">
                                <i> <span class="text-dark title-font--bold">ENVOYEZ VOTRE SELECTION -</span> PAR E-MAIL </i>
                            </div>
                        </div>
                    </div>
                    <form action="{$get.path}/envoi-courriel-bien-panier" method="POST" accept-charset="utf-8" class="row mt-5 flat-form">
                        <div class="col-lg-12"></div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name='name' value="{if isset($carat.sessionenvoipanier.name)}{$carat.sessionenvoipanier.name}{else}{if isset($carat.sessionagentrecherche.nom)}{$carat.sessionagentrecherche.nom}{/if}{/if}" class="form-control" id="nameId" placeholder="Nom *" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name='email' value="{if isset($carat.sessionenvoipanier.email)}{$carat.sessionenvoipanier.email}{else}{if isset($carat.sessionagentrecherche.email)}{$carat.sessionagentrecherche.email}{/if}{/if}" class="form-control" id="emailId" placeholder="Email *" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="telephone" name='phone' value="{if isset($carat.sessionenvoipanier.phone)}{$carat.sessionenvoipanier.phone}{else}{if isset($carat.sessionagentrecherche.phone)}{$carat.sessionagentrecherche.phone}{/if}{/if}" class="form-control" id="telephoneId" placeholder="Telephone *" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name='subject' value="{$get.sujets_contact[2]}" class="form-control" id="telephoneId" placeholder="Telephone *" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="votre_nom">Destinataire <sup>*</sup></label>
                                    <div class="form-group">
                                        <input type="email" name='destinataire' value="{if isset($carat.sessionenvoipanier.destinataire)}{$carat.sessionenvoipanier.destinataire}{else}{$smarty.const.SITE_MAIL}{/if}" class="form-control" id="destinataireId" placeholder="Destinataire *" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *" required="required">{if isset($carat.sessionenvoipanier.message)}{$carat.sessionenvoipanier.message}{/if}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group form-check bg-transparent">
                                <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                                {$carat.commun_conditions_generales_utilisations}
                            </div>
                            <button type='submit' class="btn btn-outline btn-outline-primary mt-3 content-font--bold" data-flat-btn><i class="zmdi zmdi-mail-send"></i> Envoyer le message</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>
