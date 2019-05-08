<style>
    .ville-found{ float:right;list-style:none;margin-top:-3px;padding:0;width:auto;position: absolute; }
    .ville-found li{ padding: 10px; background: #FFF; border-bottom: #bbb9b9 1px solid; }
    .ville-found li:hover{ background:#ece3d2;cursor: pointer; }
</style>
<form  action='{$get.path}/agent-de-recherche#content' method='POST' accept-charset="utf-8" class="mb-5">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Nom <sup>*</sup></label>
                <input type="text" id='nom_alerte' name='nom' value="{if isset($carat.sessionagentrecherche.nom)}{$carat.sessionagentrecherche.nom}{/if}"  class="form-control" id="" placeholder="" required="required">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Téléphone <sup>*</sup></label>
                <input type="number" id='phone_alerte' name='phone' value="{if isset($carat.sessionagentrecherche.phone)}{$carat.sessionagentrecherche.phone}{/if}"  class="form-control" id="" placeholder="" required="required">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">E-mail <sup>*</sup></label>
                <input type="email" id='email_alerte' name='email' value="{if isset($carat.sessionagentrecherche.email)}{$carat.sessionagentrecherche.email}{/if}"  class="form-control" id="" placeholder="" required="required">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Adresse</label>
                <input type="text" id='adresse_alerte' name='adresse' value="{if isset($carat.sessionagentrecherche.adresse)}{$carat.sessionagentrecherche.adresse}{/if}"  class="form-control" id="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Code postal</label>
                <input type="text" id='cp_alerte' name='cp' value="{if isset($carat.sessionagentrecherche.cp)}{$carat.sessionagentrecherche.cp}{/if}"  class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Ville</label>
                <input type="text" id='ville_alerte' name='ville' value="{if isset($carat.sessionagentrecherche.ville)}{$carat.sessionagentrecherche.ville}{/if}"  class="form-control" id="" placeholder="">
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="type-offre" class="">Type transaction <sup>*</sup></label>
                <select class="form-control" id='transaction_alerte' name="transaction" required="required">
                    <option value="">:: Choisir une option ::</option>
                    {foreach item=transaction from=$carat.agentrecherche.transaction key=cle}
                        <option value="{$cle}" {if isset($carat.sessionagentrecherche.transaction) && $carat.sessionagentrecherche.transaction eq $cle}selected{/if}>{$transaction|ucfirst}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="type-de-biens">Type de bien <sup>*</sup></label>
                <select class="form-control" id='type_alerte' name="type" required="required">
                    <option value=''>:: Choisir une option ::</option>
                    {foreach item=tb from=$carat.agentrecherche.tb}
                        <option value="{$tb->id}" {if isset($carat.sessionagentrecherche.type) && $carat.sessionagentrecherche.type eq $tb->id}selected{/if}>{$tb->name}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Surface minimum ({$language.commun_surface_signe})</label>
                <input type="number" id='surface_min_alerte' name='surface_min' value="{if isset($carat.sessionagentrecherche.surface_min)}{$carat.sessionagentrecherche.surface_min}{/if}"  class="form-control" id="" placeholder="">
            </div>
        </div>
    </div>
    <div class="row d-flex align-items-bottom">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Budget maximum ({$language.commun_monnaie_signe})</label>
                <input type="number" id='budget_max_alerte' name='budget_max' value="{if isset($carat.sessionagentrecherche.budget_max)}{$carat.sessionagentrecherche.budget_max}{/if}"  class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="type-offre">Nombre de pièces</label>
                <input type="number" id='nb_pieces_alerte' name='nb_pieces' value="{if isset($carat.sessionagentrecherche.nb_pieces)}{$carat.sessionagentrecherche.nb_pieces}{/if}"  class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="type-offre">Nombre de chambres</label>
                <input type="number" id='nb_chambres_alerte' name='nb_chambres' value="{if isset($carat.sessionagentrecherche.nb_chambres)}{$carat.sessionagentrecherche.nb_chambres}{/if}"  class="form-control" id="" placeholder="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Rechercher une ville <sup>*</sup></label>
                <input type="text" id='id_ville_bien_alerte' name='id_ville_bien' value="{*if isset($carat.sessionagentrecherche.id_ville_bien)}{$carat.sessionagentrecherche.id_ville_bien}{/if*}" class="form-control" id="" placeholder="" autocomplete="off">
                <div id="suggesstion-box-2"></div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Villes choisies </label>
                <ul id='villeschoisies' class="list-unstyled mb-0" style='overflow: auto; height: 90px;'>
                    {if isset($smarty.session.frontend.agentderecherche.villebien)}
                        {foreach from=$smarty.session.frontend.agentderecherche.villebien item=villechoisie}
                            <li onclick="supp(this)" data-text='{$villechoisie}'><span class="zmdi zmdi-close-circle" title="Supprimer la ville."></span> {$villechoisie}</li>

                        {/foreach}
                    {/if}
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label for="">Rayon (km)</label>
                <ul class="list-inline list-unstyled mb-0" data-table-li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rayon" id="rayon_5_alerte" value="5" {if isset($carat.sessionagentrecherche.rayon) && $carat.sessionagentrecherche.rayon eq 5}checked{/if} />
                            <label class="form-check-label" for="five-km1">5 km</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rayon" id="rayon_10_alerte" value="10" {if isset($carat.sessionagentrecherche.rayon) && $carat.sessionagentrecherche.rayon eq 10}checked{/if} />
                            <label class="form-check-label" for="ten-km1">10 km</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rayon" id="rayon_15_alerte" value="15" {if isset($carat.sessionagentrecherche.rayon) && $carat.sessionagentrecherche.rayon eq 15}checked{/if} />
                            <label class="form-check-label" for="fifteen-km1">15 km</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 my-3 text-center">
            <div class="form-group">
                <div class="form-group form-check bg-transparent">
                    <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                    {$carat.commun_conditions_generales_utilisations}
                </div>
                <small><sup>*</sup> Champs obligatoires</small>
            </div>
            {if $get.action eq 'alertes'}
                <input type="hidden" name="id" id='id_alerte' value="{if isset($carat.sessionagentrecherche.id)}{$carat.sessionagentrecherche.id}{/if}">
            {/if}
            <button type="submit" class="btn mt-3 content-font--bold" data-flat-btn style="background:#0B5A6A; color:#fff; border:0;"><i class="zmdi zmdi-save"></i>&nbsp;&nbsp;Enregistrer</button>
        </div>
    </div>
</form>

{literal}
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            $(document).ready(function () {
                $("#id_ville_bien_alerte").keyup(function () {
                    $.ajax({
                        type: "GET",
                        url: "/frontend/_ajax.php",
                        data: 'app=frontend&module=carat&action=autocomplete&term=' + $(this).val(),
                        beforeSend: function () {
                            $("#id_ville_bien_alerte").css("background", "#FFF url({/literal}{$smarty.const.IMG_PATH_FE}{literal}/LoaderIcon.gif) no-repeat 255px");
                        },
                        success: function (data) {
                            console.log(data)
                            $("#suggesstion-box-2").show();
                            $("#suggesstion-box-2").html(data);
                            $("#id_ville_bien_alerte").css("background", "#FFF");
                        }
                    });
                });
            });
        }, false);

        function selectVilleBien(val, id) {
            $("#id_ville_bien_alerte").val('');
            $("#suggesstion-box-2").hide();
            $.ajax({
                type: "GET",
                url: "/frontend/_ajax.php",
                data: 'app=frontend&module=carat&action=autocompleteaddvillebien&ville=' + val + '&id_ville=' + id,
                success: function (data) {
                    if (data == 1) {
                        var vnext = '<li onclick="supp(this)" data-text=' + val + ' data-id=' + id + '><span class="zmdi zmdi-close-circle" title="Supprimer la ville."></span> ' + val + '</li>';
                        $("#villeschoisies").append(vnext);

                    }
                }
            });
        }
    </script>
{/literal}
