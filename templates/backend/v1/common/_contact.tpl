<section class="section-block contact-us" data-block-bg-is="blue-light" id="nous-contacter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="h3 section_heading title-font--light">
                    <i> <span class="text-dark title-font--bold">CONTACTEZ -</span> NOUS </i>
                </div>
            </div>
        </div>
        <div class="row --informations">
            <div class="col-12 col-lg-4 col-md-4 --infoWrap">
                <img src="{$smarty.const.IMG_PATH_FE}/icons/icons8-next_location.png" alt="icon">
                <p>{$smarty.const.ADRESSE_AGENCE} <br> {$smarty.const.CP_AGENCE} {$smarty.const.VILLE_AGENCE}</p> 
            </div>
            <div class="col-12 col-lg-4 col-md-4 --infoWrap">
                <img src="{$smarty.const.IMG_PATH_FE}/icons/icons8-outgoing_call.png" alt="icon">
                <p>{$smarty.const.PHONE_1}</p> 
            </div>
            <div class="col-12 col-lg-4 col-md-4 --infoWrap">
                <img src="{$smarty.const.IMG_PATH_FE}/icons/icons8-send_mass_email.png" alt="icon">
                <p>{$smarty.const.SITE_MAIL}</p> 
            </div>
        </div>
        <form action="{$get.path}/envoi-courriel-contact" method="POST" accept-charset="utf-8" class="row mt-5 flat-form">
            <div class="col-lg-12"></div>
            <div class="col-lg-6 col-md-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name='name' value="{if isset($carat.sessioncontact.name)}{$carat.sessioncontact.name}{else}{if isset($carat.sessionagentrecherche.nom)}{$carat.sessionagentrecherche.nom}{/if}{/if}" class="form-control" id="nameId" placeholder="Nom *" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" name='email' value="{if isset($carat.sessioncontact.email)}{$carat.sessioncontact.email}{else}{if isset($carat.sessionagentrecherche.email)}{$carat.sessionagentrecherche.email}{/if}{/if}" class="form-control" id="emailId" placeholder="Email *" required="required">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="telephone" name='phone' value="{if isset($carat.sessioncontact.phone)}{$carat.sessioncontact.phone}{else}{if isset($carat.sessionagentrecherche.phone)}{$carat.sessionagentrecherche.phone}{/if}{/if}" class="form-control" id="telephoneId" placeholder="Telephone *" required="required">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name='subject' required="required">
                                <option>Choisir un sujet</option>
                                {foreach from=$get.sujets_contact key=id item=subject}
                                    <option  value="{$id}" {if isset($carat.sessioncontact.subject) && $carat.sessioncontact.subject eq $id}selected{/if} >{$subject}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *" required="required">{if isset($carat.sessioncontact.message)}{$carat.sessioncontact.message}{/if}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 text-center text-md-left">
                <div class="form-group form-check bg-transparent mt-4 mt-md-0">
                    <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                    {$carat.commun_conditions_generales_utilisations}
                </div>
                <button type='submit' class="btn btn-outline btn-outline-primary mt-3 content-font--bold" data-flat-btn><i class="zmdi zmdi-mail-send"></i> Envoyer le message</button>
            </div>
        </form>
    </div>
</section>