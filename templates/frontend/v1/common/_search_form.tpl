<section class="moteur_de_recherche" id="moteurDeRecherche">
    <div class="container">
        <form action='{$get.path}/liste-proprietes' method='POST'>
            <div class="--champs">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-12 col-lg-3 col-md-3" data-typedebien>
                            <div class="--fieldWrap">
                                <select class="form-control" name="id_type_transaction" id='id_type_transaction' onchange='document.getElementById("id_type_transaction_plus_critere").value = this.value;
                        loadDoc2cibles("{$smarty.const.HTTP_PATH}/{$get.app}/_ajax.php?app={$get.app}&module={$get.module}&action=filtrerbudget&valeur=" + this.value, "budget_research", "budget_research_plus_criteres");'>
                                    <option value=''>Type de transaction</option>
                                    {foreach item=libelle from=$carat.searchi.tt_research key=tt}
                                        <option value="{$tt}" {if isset($carat.searchf.champ3) && $carat.searchf.champ3 eq $tt}selected{/if}>{$libelle|ucfirst}</option>
                                    {/foreach}
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3" data-typedebien>
                            <div class="--fieldWrap">
                                <select class="form-control" name="id_type_bien" id='id_type_bien' onchange='document.getElementById("id_type_bien_plus_critere").value = this.value;' >
                                    <option value=''>Type de bien</option>
                                    {foreach item=tb from=$carat.searchi.tb_research}
                                        <option value="{$tb->id}" {if isset($carat.searchf.champ4) && $carat.searchf.champ4 eq $tb->id}selected{/if}>{$tb->name}</option>
                                    {/foreach}
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3" data-lieu>
                            <div class="--fieldWrap">
                                <select class="form-control" name='id_ville' id='id_ville' onchange='document.getElementById("id_ville_plus_critere").value = this.value;' >
                                    <option value=''>Ville</option>
                                    {foreach item=vl from=$carat.searchi.vl_research}
                                        <option value="{$vl->id}" {if isset($carat.searchf.champ6) && $carat.searchf.champ6 eq $vl->id}selected{/if}>{$vl->nom} ({$vl->cp})</option>
                                    {/foreach}
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3" data-budget id='bg_research'>
                            <div class="--fieldWrap">
                                <select class="form-control" name='budget' id='budget_research' onchange='document.getElementById("budget_research_plus_criteres").value = this.value;'>
                                    <option value=''>Budget</option>
                                    {foreach item=bg from=$carat.searchi.bg_research key=cle}
                                        <option value="{$cle}" {if isset($carat.searchf.champ11) && $carat.searchf.champ11 eq $cle}selected{/if}>{$bg}</option>
                                    {/foreach}
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mt-lg-0 mt-4 mt-md-0 mt-md-5">
                    <button type="submit" class="btn btn-primary form-btn w-100" data-form-btn data-flat-btn style="border:0;">Rechercher</button>
                </div>
                <div class="col-lg-12 text-center" data-criteres-sup>
                    <hr>
                    <a href="#" title="" data-remodal-target="plus-de-criteres--search" class="text-white mt-2 d-inline-block" style="text-decoration:none;">[ + de critères ]</a>
                    <a class="text-light mt-2 d-inline-block slick-button-go-one cursor-pointer" style="text-decoration:none;">[ vider les critères de recherche ]</a>
                </div>
            </div>
        </form>
    </div>
</section>
