{include file="{$template}/common/_topbar.tpl"}


<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section_heading">
                <div class="h1 --title title-font--light">VENDRE VOTRE BIEN</div>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="{$get.path}" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Vendre votre bien</li>
    </ol>
</nav>

<section class="estimation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="text-muted">
                    Vous désirez une évaluation précise et détaillée de votre bien immobilier.
                    Après un rendez-vous permettant d'évaluer les paramètres techniques de votre bien, nous réalisons une étude approfondie afin de déterminer le prix de vente. Nous vous remettons un rapport complet d'estimation comportant de nombreuses fiches explicatives sur les différents facteurs qui influencent le prix de votre bien.
                    N'hésitez pas à nous contacter par téléphone ou à l'aide du formulaire ci dessous, nous vous recontacterons dans les meilleurs délais.
                </p>
            </div>
            <div class="col-lg-12 my-5 section_heading" id="content">
                <div class="h1 --title title-font--light">FORMULAIRE</div>
            </div>
            <div class="col-lg-12 mb-3">
                <form action="{$get.path}/courriel-vendre-votre-bien" method="POST" accept-charset="utf-8" class="mt-lg-5">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="votre_nom">Votre nom <sup>*</sup></label>
                                <input type="text" name='name' value="{if isset($carat.sessionvendrebien.name)}{$carat.sessionvendrebien.name}{/if}" class="form-control" id="votre_nom" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <label for="votre_email">Votre adresse e-mail <sup>*</sup></label>
                                <input type="email" name='email' value="{if isset($carat.sessionvendrebien.email)}{$carat.sessionvendrebien.email}{/if}" class="form-control" id="votre_email" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <label for="votre_superficie">Superficie du bien ({$language.commun_surface_signe})</label>
                                <input type="number" name='superficie' value="{if isset($carat.sessionvendrebien.superficie)}{$carat.sessionvendrebien.superficie}{/if}" class="form-control" id="votre_superficie" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="cp_bien">Code postal du bien</label>
                                <input type="number" name='cp' value="{if isset($carat.sessionvendrebien.cp)}{$carat.sessionvendrebien.cp}{/if}" class="form-control" id="cp_bien" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="votre_telephone">Votre téléphone<sup>*</sup></label>
                                <input type="text" name='phone' value="{if isset($carat.sessionvendrebien.phone)}{$carat.sessionvendrebien.phone}{/if}" class="form-control" id="votre_telephone" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="type_de_bien">Type de bien <sup>*</sup></label>
                                <select class="form-control" name="type" required="required">
                                    {foreach item=tb from=$carat.vendeur_type_bien}
                                        <option value="{$tb->id}" {if isset($carat.sessionvendrebien.type) && $carat.sessionvendrebien.type eq $tb->id}selected{/if}>{$tb->name}</option>
                                    {/foreach}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="adresse_du_bien">Adresse du bien<sup>*</sup></label>
                                <input type="text" name='adresse' value="{if isset($carat.sessionvendrebien.adresse)}{$carat.sessionvendrebien.adresse}{/if}" class="form-control" id="adresse_du_bien" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <label for="votre_ville">Ville du bien <sup>*</sup></label>
                                <input type="text" name='ville' value="{if isset($carat.sessionvendrebien.ville)}{$carat.sessionvendrebien.ville}{/if}" class="form-control" id="votre_ville" placeholder="" required="required">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="votre_message">Votre message <sup>*</sup></label>
                                <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *" required="required">{if isset($carat.sessionvendrebien.message)}{$carat.sessionvendrebien.message}{/if}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gridCheck1" name="jaccepte" value='1' required="required">
                                <label class="form-check-label" for="gridCheck1">
                                    {$carat.commun_conditions_generales_utilisations}
                                </label>
                            </div>
                            <div class="col-sm-12 text-white">*Champs obligatoires</div>
                        </div>
                        <div class="col-lg-4 text-right">
                            <button type='submit' class="btn btn-outline btn-outline-primary mt-3 content-font--bold" data-flat-btn style="background:#0B5A6A; color:#fff; border:0;"><i class="zmdi zmdi-mail-send"></i> Envoyer le message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{include file="{$template}/common/_alerte.tpl"}
