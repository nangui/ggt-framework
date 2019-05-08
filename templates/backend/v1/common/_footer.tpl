{if $get.action neq 'impression'}
    <div class="sideOptions">
        <a href="{$get.path}/alertes" title="Alertes" data-option class="{if isset($get.action) && $get.action eq 'alertes'}--panier{else}--alertes{/if}">
            <i data-icon class="zmdi zmdi-notifications"></i> <br>
            Alertes
        </a>
        <a href="{$get.path}/ma-selection" title="Panier" data-option class="{if isset($get.action) && $get.action eq 'panier'}--panier{else}--alertes{/if}">
            <i data-icon class="zmdi zmdi-shopping-cart position-relative"><span class="counter badge badge-light">{if isset($carat.paniernb)}{$carat.paniernb}{else}0{/if}</span></i> <br>
            Panier
        </a>
    </div>
{/if}

{if $get.action neq 'impression'}
    <section class="py-4 main_footer text-center" data-block-bg-is="blue-dark">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-2 mb-3 mb-lg-0">
                    <a href="{$get.path}" title="Aller à l'accueil">
                        <img src="{$smarty.const.IMG_PATH_FE}/logo/logo_carat_color.svg" alt="logo principal" title="Aller à l'accueil" class="logo">
                    </a>
                </div>
                <div class="col-lg-3">© 2019 - {$smarty.const.SITE_NAME_COMPLET}</div>
                <div class="col-lg-3 h6 mb-lg-0">
                    {if isset($get.rs) && $get.rs|count gt 0}
                        <ul class="list-inline list-unstyled mb-0 social-icons">
                            <li> Suivez nous sur : </li>
                                {foreach from=$get.rs key=cle item=rs}
                                <li class="px-lg-2"> <a href="{$rs.lien}" title="{$rs.title}" class="text-white" target="_blank"><i class="{$rs.class}"></i></a> </li>
                                    {/foreach}
                        </ul>
                    {else}
                        &nbsp;
                    {/if}
                </div>
                <div class="col-lg-2 h6 mb-lg-0">
                    <a href="{$get.path}/nos-tarifs" title="Nos tarifs" class="text-white btn btn-outline-primary w-100">Nos tarifs</a>
                </div>
                <div class="col-lg-2 h6 mb-lg-0">
                    <a href="{$get.path}/mentions-legales" title="Mentions légales" data-btn>Mentions légales</a>
                </div>
            </div>
        </div>
    </section>
{/if}

{if $get.action eq "details"}
    <div class="remodal flyingForm" data-remodal-id="obtenir-rdv">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-6 col-md-6"><img src="{$smarty.const.IMG_PATH_FE}/arriere-plans/img-rdv.svg" alt="" class="formPic"></div>
            <div class="col-lg-6 col-md-6">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> OBTENIR<br> UN RENDEZ-VOUS </i>
                </div>
                <form action="{$get.path}/obtenir-un-rendez-vous" method="POST" accept-charset="utf-8" class="row my-5 flat-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="nom" value="{if isset($carat.sessionrendezvous.nom)}{$carat.sessionrendezvous.nom}{else}{if isset($carat.sessionagentrecherche.nom)}{$carat.sessionagentrecherche.nom}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="nameId" placeholder="Nom *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name='email' value="{if isset($carat.sessionrendezvous.email)}{$carat.sessionrendezvous.email}{else}{if isset($carat.sessionagentrecherche.email)}{$carat.sessionagentrecherche.email}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="emailId" placeholder="Email *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="number" name='phone' value="{if isset($carat.sessionrendezvous.phone)}{$carat.sessionrendezvous.phone}{else}{if isset($carat.sessionagentrecherche.phone)}{$carat.sessionagentrecherche.phone}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="telephoneId" placeholder="Telephone *" required='required'>
                        </div>
                    </div>
                    <!--div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name='pays' value="{if isset($carat.sessionrendezvous.pays)}{$carat.sessionrendezvous.pays}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="paysId" placeholder="Pays">
                        </div>
                    </div-->
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *">{if isset($carat.sessionrendezvous.message)}{$carat.sessionrendezvous.message}{/if}</textarea>
                    </div>
                    <div class="col-lg-12 text-left">
                        <small class="d-block mt-3">
                            <div class="form-group form-check bg-transparent">
                                <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                                {$carat.commun_conditions_generales_utilisations}
                            </div>
                        </small>
                        <input type="hidden" name='id' value="{if isset($carat.bien->id)}{$carat.bien->id}{/if}">
                        <button type='submit' class="mt-3 btn btn-primary w-100" data-flat-btn style="border:0;">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="remodal flyingForm" data-remodal-id="etre-appele-vite">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-6 col-md-6"><img src="{$smarty.const.IMG_PATH_FE}/arriere-plans/img-callme.svg" alt="" class="formPic"></div>
            <div class="col-lg-6 col-md-6">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> ÊTRE APPELÉ<br> AU PLUS VITE </i>
                </div>
                <form action="{$get.path}/etre-appeler-au-plus-vite" method="POST" accept-charset="utf-8" class="row my-5 flat-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="nom" value="{if isset($carat.sessionetreappeler.nom)}{$carat.sessionetreappeler.nom}{else}{if isset($carat.sessionagentrecherche.nom)}{$carat.sessionagentrecherche.nom}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="nameId" placeholder="Nom *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name='email' value="{if isset($carat.sessionetreappeler.email)}{$carat.sessionetreappeler.email}{else}{if isset($carat.sessionagentrecherche.email)}{$carat.sessionagentrecherche.email}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="emailId" placeholder="Email *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="number" name='phone' value="{if isset($carat.sessionetreappeler.phone)}{$carat.sessionetreappeler.phone}{else}{if isset($carat.sessionagentrecherche.phone)}{$carat.sessionagentrecherche.phone}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="telephoneId" placeholder="Telephone *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *">{if isset($carat.sessionetreappeler.message)}{$carat.sessionetreappeler.message}{/if}</textarea>
                    </div>
                    <div class="col-lg-12 text-left">
                        <small class="d-block mt-3">
                            <div class="form-group form-check bg-transparent">
                                <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                                {$carat.commun_conditions_generales_utilisations}
                            </div>

                        </small>
                        <input type="hidden" name='id' value="{if isset($carat.bien->id)}{$carat.bien->id}{/if}">
                        <button type='submit' class="mt-3 btn btn-primary w-100" data-flat-btn style="border:0;">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="remodal flyingForm" data-remodal-id="recevoir-dossier">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-6 col-md-6"><img src="{$smarty.const.IMG_PATH_FE}/arriere-plans/img_dossier.svg" alt="" class="formPic"></div>
            <div class="col-lg-6 col-md-6">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> RECEVOIR LE<br> DOSSIER COMPLET </i>
                </div>
                <form action="{$get.path}/recevoir-dossier-complet" method="POST" accept-charset="utf-8" class="row my-5 flat-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="nom" value="{if isset($carat.sessionrecevoirdossiercomplet.nom)}{$carat.sessionrecevoirdossiercomplet.nom}{else}{if isset($carat.sessionagentrecherche.nom)}{$carat.sessionagentrecherche.nom}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="nameId" placeholder="Nom *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name='email' value="{if isset($carat.sessionrecevoirdossiercomplet.email)}{$carat.sessionrecevoirdossiercomplet.email}{else}{if isset($carat.sessionagentrecherche.email)}{$carat.sessionagentrecherche.email}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="emailId" placeholder="Email *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="number" name='phone' value="{if isset($carat.sessionrecevoirdossiercomplet.phone)}{$carat.sessionrecevoirdossiercomplet.phone}{else}{if isset($carat.sessionagentrecherche.phone)}{$carat.sessionagentrecherche.phone}{/if}{/if}" style="box-shadow: none;text-decoration: none;" class="form-control" id="telephoneId" placeholder="Telephone *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *">{if isset($carat.sessionrecevoirdossiercomplet.message)}{$carat.sessionrecevoirdossiercomplet.message}{/if}</textarea>
                    </div>
                    <div class="col-lg-12 text-left">
                        <small class="d-block mt-3">
                            <div class="form-group form-check bg-transparent">
                                <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                                {$carat.commun_conditions_generales_utilisations}
                            </div>
                        </small>
                        <input type="hidden" name='id' value="{if isset($carat.bien->id)}{$carat.bien->id}{/if}">
                        <button type='submit' class="mt-3 btn btn-primary w-100" data-flat-btn style="border:0;">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="remodal flyingForm" data-remodal-id="shareOnSocials">
        <button data-remodal-action="close" class="remodal-close"></button>
        <ul class="list-inline list-unstyled">
            <li>
                <a target="_blank" href="http://www.facebook.com/sharer.php?u={$carat.bien->lien}&t={$carat.bien->champ20}" title="Partager sur Facebook" data-shareOnsocialsBtn data-facebook><i class="zmdi zmdi-facebook-box"></i></a>
            </li>
            <li>
                <a target="_blank" href="http://twitter.com/intent/tweet/?url={$carat.bien->lien}&text={$carat.bien->champ20}&via=Carat Immobilier" title="Partager sur Twitter" data-shareOnsocialsBtn data-twitter><i class="zmdi zmdi-twitter"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={$carat.bien->lien}&title={$carat.bien->champ20}" title="Partager sur Linkedin" data-shareOnsocialsBtn data-linkedin><i class="zmdi zmdi-linkedin"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://pinterest.com/pin/create/button/?url={$carat.bien->lien}&media={if isset($carat.bien->photo[0].url)}{$carat.bien->photo[0].url}{/if}&description={$carat.bien->champ20}" title="Partager sur Pintrest" data-shareOnsocialsBtn data-pintrest><i class="zmdi zmdi-pinterest-box"></i></a>
            </li>
        </ul>
    </ul>
</div>
{/if}

<div class="remodal flyingForm --advancedSearch" data-remodal-id="plus-de-criteres--search">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="row">
        <div class="col-lg-12">
            <div class="h3 section_heading title-font--light text-left text-white">
                <i> RECHERCHE <b>AVANCÉE</b> </i>
            </div>
            <form  action='{$get.path}/liste-proprietes' method='POST' accept-charset="utf-8" class="my-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_type_bien">Type de transaction</label>
                            <select class="form-control" name="id_type_transaction" id='id_type_transaction_plus_critere' onchange='document.getElementById("id_type_transaction").value = this.value;
                                    loadDoc2cibles("{$smarty.const.HTTP_PATH}/{$get.app}/_ajax.php?app={$get.app}&module={$get.module}&action=filtrerbudget&valeur=" + this.value, "budget_research", "budget_research_plus_criteres");'>
                                <option value="">:: Choisir une option ::</option>
                                {foreach item=libelle from=$carat.searchi.tt_research key=tt}
                                    <option value="{$tt}" {if isset($carat.searchf.champ3) && $carat.searchf.champ3 eq $tt}selected{/if}>{$libelle|ucfirst}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_type_bien">Type de bien</label>
                            <select class="form-control" name="id_type_bien" id='id_type_bien_plus_critere' onchange='document.getElementById("id_type_bien").value = this.value;'>
                                <option value="">:: Choisir une option ::</option>
                                {foreach item=tb from=$carat.searchi.tb_research}
                                    <option value="{$tb->id}" {if isset($carat.searchf.champ4) && $carat.searchf.champ4 eq $tb->id}selected{/if}>{$tb->name}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_ville">Ville</label>
                            <select class="form-control" name='id_ville' id='id_ville_plus_critere' onchange='document.getElementById("id_ville").value = this.value;'>
                                <option value="">:: Choisir une option ::</option>
                                {foreach item=vl from=$carat.searchi.vl_research}
                                    <option value="{$vl->id}" {if isset($carat.searchf.champ6) && $carat.searchf.champ6 eq $vl->id}selected{/if}>{$vl->nom} ({$vl->cp})</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Budget</label>
                            <select class="form-control" name='budget' id='budget_research_plus_criteres' onchange='document.getElementById("budget_research").value = this.value;'>
                                <option value="">:: Choisir une option ::</option>
                                {foreach item=bg from=$carat.searchi.bg_research key=cle}
                                    <option value="{$cle}" {if isset($carat.searchf.champ11) && $carat.searchf.champ11 eq $cle}selected{/if}>{$bg}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Surface minimum en {$language.commun_surface_signe}</label>
                            <input type="number" name="champ16_min" value="{if isset($carat.searchf.champ16_min)}{$carat.searchf.champ16_min}{/if}" class="form-control" placeholder="Surface minimum en {$language.commun_surface_signe}"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Surface maximum en {$language.commun_surface_signe}</label>
                            <input type="number" name="champ16_max" value="{if isset($carat.searchf.champ16_max)}{$carat.searchf.champ16_max}{/if}" class="form-control" placeholder="Surface maximum en {$language.commun_surface_signe}"/>
                        </div>
                    </div>
                </div>
                <div class="row hide-when-commerce-change {if isset($carat.searchf.champ4) && ($carat.searchf.champ4 eq 12)}hide{/if}">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de pièces minimum</label>
                            <input type="number" name="champ18_min" value="{if isset($carat.searchf.champ18_min)}{$carat.searchf.champ18_min}{/if}" class="form-control" placeholder="Nombre de pièces minimum"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de pièces maximum</label>
                            <input type="number" name="champ18_max" value="{if isset($carat.searchf.champ18_max)}{$carat.searchf.champ18_max}{/if}" class="form-control" placeholder="Nombre de pièces maximum"/>
                        </div>
                    </div>
                </div>
                <div class="row hide-when-commerce-change-ch {if isset($carat.searchf.champ4) && (!$carat.searchf.champ4|in_array:[1,7,10])}hide{/if}">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de chambres minimum</label>
                            <input type="number" name="champ19_min" value="{if isset($carat.searchf.champ19_min)}{$carat.searchf.champ19_min}{/if}" class="form-control" placeholder="Nombre de chambres maximum"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de chambres maximum</label>
                            <input type="number" name="champ19_max" value="{if isset($carat.searchf.champ19_max)}{$carat.searchf.champ19_max}{/if}" class="form-control" placeholder="Nombre de chambres maximum"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 my-3 text-center">
                        <button type="submit" class="btn btn-primary mt-3 content-font--bold w-50" data-flat-btn style="border:0;"><i class="zmdi zmdi-mail-send"></i>&nbsp;&nbsp;Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{if isset($get.action) && $get.action eq 'alertes'}
    <div class="remodal flyingForm --advancedSearch" data-remodal-id="modifier-alerte-info">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-12">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> MODIFIER <b>ALERTE</b> </i>
                </div>
                {include file="{$template}/modules/{$get.module}/_inc_form_alerte.tpl"}
            </div>
        </div>
    </div>
{/if}

<!-- Notifications d'actions -->
{if isset($succes) && !empty($succes)}
    <div class="alert alert-success alert-dismissible fade show vivify driveInRight" role="alert" data-alert-cstm>
        <strong>{$succes}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
{/if}

{if isset($erreur)}
    <div class="alert alert-danger alert-dismissible fade show vivify driveInRight" role="alert" data-alert-cstm>
        <strong>{$erreur}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
{/if}
{*<div class="alert alert-success alert-dismissible fade show vivify driveInRight" role="alert" data-alert-cstm>
<strong>Bravo visiteur de Carat immobilier</strong> <br> vous avez <a href="#" title="" class="alert-link"><b><u>deux biens</u></b></a> au panier !
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>*}

<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="zmdi zmdi-chevron-up"></i></a>

<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/vendor/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/vendor/popper.min.js"></script>
<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/vendor/bootstrap.min.js"></script>

<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/remodal/remodal.min.js"></script>

<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/datatables/datatables.min.js"></script>
<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/datatables/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/ajax.js"></script>

<script>
    // ===== Scroll to Top ==== 
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
</script>

{literal}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.is-dataTable').DataTable({
                language: {
                    processing: "Traitement en cours...",
                    search: "Rechercher&nbsp;:",
                    lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                    info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first: "Premier",
                        previous: "Pr&eacute;c&eacute;dent",
                        next: "Suivant",
                        last: "Dernier"
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    </script>

    <script type="text/javascript">
        var snippet = [].slice.call(document.querySelectorAll('.hover'));
        if (snippet.length) {
            snippet.forEach(function (snippet) {
                snippet.addEventListener('mouseout', function (event) {
                    if (event.target.parentNode.tagName === 'figure') {
                        event.target.parentNode.classList.remove('hover')
                    } else {
                        event.target.parentNode.classList.remove('hover')
                    }
                });
            });
        }
    </script>
{/literal}

{if isset($get.action) && ($get.action eq 'details')}
    <script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/map/leaflet.js"></script>

    {literal}
        <script type="text/javascript">
            var mymap = L.map('ficheMap').setView([{/literal}{$carat.bien->lat}, {$carat.bien->lng}{literal}], 18);
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 25,
                    id: 'mapbox.streets',
                    accessToken: 'your.mapbox.access.token'
                }).addTo(mymap);
                var content = "<h6>{/literal}<b>{$carat.bien->champ20}</b><hr><br />A {$carat.bien->ville} ({$carat.bien->champ5}){literal}</h6>";
                L.marker([{/literal}{$carat.bien->lat}, {$carat.bien->lng}{literal}]).addTo(mymap)
                            .bindPopup(content)
                            .openPopup();
                    var circle = L.circle([{/literal}{$carat.bien->lat}, {$carat.bien->lng}{literal}], {
                            color: 'red',
                            fillColor: '#f03',
                            fillOpacity: 0.5,
                            radius: 12
                        }).addTo(mymap);
        </script>
    {/literal}
{/if}

{if isset($get.action) && $get.action eq 'alertes'}
    {literal}
        <script type="text/javascript">
            function modifyAlert(id) {
                $.ajax({
                    url: '/frontend/_ajax.php',
                    type: 'get',
                    data: 'app=frontend&module=carat&action=recuperationalerte&id=' + id,
                    success: function (data) {
                        var alerte = JSON.parse(data);
                        $.each(alerte, function (key, value) {
                            if (key === "rayon" && value !== "") {
                                $("#" + key + "_" + value + "_alerte").attr('checked', true);
                            } else if (key === "id_ville_bien") {
                                var vnext = '';
                                $.each(value, function (index, item) {
                                    vnext += '<li onclick="supp(this)" data-id=' + index + ' data-text=' + item + '><span class="zmdi zmdi-close-circle" title="Supprimer la ville."></span> ' + item + '</li>';

                                });
                                $("#villeschoisies").html(vnext);
                            } else if (key === "type" || key === "transaction") {
                                $("#" + key + "_alerte option[value='" + value + "']").attr('selected', true);
                            } else {
                                $("#" + key + "_alerte").val(value);
                            }
                        });
                    }
                });
            }
        </script>
    {/literal}
{/if}

<script type="text/javascript" src="{$smarty.const.JS_PATH_FE}/cookies/cookie.notice.min.js"></script>
<script type="text/javascript">
    var defaults = {
        'messageLocales': {
            'it': 'Utilizziamo i cookie per essere sicuri che tu possa avere la migliore esperienza sul nostro sito. Se continui ad utilizzare questo sito assumiamo che tu ne sia felice.',
            'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.',
            'de': 'Wir verwenden Cookies, um sicherzustellen, dass Sie das beste Erlebnis auf unserer Website haben können. Indem Sie unsere Dienste stimmen Sie der Verwendung in Übereinstimmung mit unseren Cookies Richtlinien.',
            'fr': 'Nous utilisons des cookies afin d\'être sûr que vous pouvez avoir la meilleure expérience sur notre site. Si vous continuez à utiliser ce site, nous supposons que vous acceptez.'
        },
        'buttonLocales': {
            'en': 'Ok'
        },
        'cookieNoticePosition': 'bottom',
        'learnMoreLinkEnabled': false,
        'learnMoreLinkHref': '/cookie-banner-information.html',
        'learnMoreLinkText': {
            'it': 'Saperne di più',
            'en': 'Learn more',
            'de': 'Mehr erfahren',
            'fr': 'En savoir plus'
        },
        'buttonLocales': {
            'en': 'Ok'
        },
        'expiresIn': 30,
        'buttonBgColor': '#d35400',
        'buttonTextColor': '#fff',
        'noticeBgColor': '#000',
        'noticeTextColor': '#fff',
        'linkColor': '#009fdd'
    };
</script>
{literal}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.slick-button-go-one').click(function () {
                $.ajax({
                    url: '/frontend/_ajax.php',
                    type: 'get',
                    data: 'app=frontend&module=carat&action=emptyallsearchsession',
                    success: function () {
                        location.reload();
                    }
                });
            });
            $('#id_type_bien_plus_critere, #id_type_bien').change(function () {
                if ($(this).val() === "1" || $(this).val() === "7" || $(this).val() === "10") {
                    $('.hide-when-commerce-change-ch').removeClass('hide');
                } else {
                    $('.hide-when-commerce-change-ch').addClass('hide');
                }

                if ($(this).val() === "12") {
                    $('.hide-when-commerce-change').addClass('hide');
                } else {
                    $('.hide-when-commerce-change').removeClass('hide');
                }
            });

            $('.id-bien-panier-a-envoyer').click(function () {

                var todo;

                if ($(this).prop('checked')) {
                    todo = 1;
                } else {
                    todo = -1;
                }

                var id = $(this).attr('data-id');

                $.ajax({
                    url: '/frontend/_ajax.php',
                    type: 'get',
                    data: 'app=frontend&module=carat&action=sendfrompanier&todo=' + todo + '&id=' + id,
                    success: function () {
                    }
                });
            });
        });
    </script>
{/literal}
</body>
</html>
