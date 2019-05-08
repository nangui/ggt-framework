{if isset($get.action) && $get.action|in_array:['alertes', 'panier']}
    <div class="col-lg-4">
        <div class="h2"> <span class="content-font--thin">Rappelez-nous</span> <br> <span class="text-primary content-font--bold">votre adresse e-mail</span> </div>
    </div>
    <div class="col-lg-8">
        <h6 class="uppercase">Et faire apparaître {if ($get.action eq 'alertes')} vos alertes enregistrées {else} votre sélection de biens {/if} !</h6>
        <form action="{$carat.destination}" method="POST" accept-charset="utf-8" class="flat-form mb-0">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <input type="email" name="email" value="{if isset($smarty.session.frontend.emailalerte)}{$smarty.session.frontend.emailalerte}{/if}" class="form-control" placeholder="Votre adresse email *" required='required' autocomplete='off'>
                </div>
                <div class="col-lg-4 col-md-4">
                    <button type="" class="btn btn-outline btn-outline-primary content-font--bold w-100" data-flat-btn>
                        <i class="zmdi zmdi-mail-send"></i> Enregistrer
                    </button>
                </div>
            </div>
        </form>
    </div>
{else}
    <section class="email-alert py-4 text-white" data-block-bg-is="blue">
        <div class="container">
            <div class="row d-flex align-items-top">
                <div class="col-lg-4">
                    <div class="h2"> <span class="content-font--thin">Créez votre propre</span> <br> <span class="text-primary content-font--bold">alerte e-mail</span> </div>
                </div>
                <div class="col-lg-8">
                    <h6>ET RECEVEZ LES BIENS CORRESPONDANTS À VOTRE RECHERCHE DANS VOTRE BOÎTE MAIL !</h6>
                    <form action="{$get.path}/alertes" method="POST" accept-charset="utf-8" class="flat-form mb-0">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <input type="email" name="email" value="{if isset($carat.sessionagentrecherche.email)}{$carat.sessionagentrecherche.email}{/if}" class="form-control mb-3 mb-lg-3" placeholder="Votre adresse email *" required='required' autocomplete='off'>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <button type="" class="btn btn-outline btn-outline-primary content-font--bold w-100" data-flat-btn>
                                    <i class="zmdi zmdi-mail-send"></i> Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
{/if}