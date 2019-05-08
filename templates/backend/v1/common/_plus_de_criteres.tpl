
<div class="remodal flyingForm --advancedSearch" data-remodal-id="plus-de-criteres--search">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="row">
        <div class="col-lg-12">
            <div class="h3 section_heading title-font--light text-left text-white">
                <i> RECHERCHE <b>AVANCÉE</b> </i>
            </div>
            <form  action='{$get.path}/biens' method='POST' accept-charset="utf-8" class="my-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-offre" class="">Type d'offre</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-de-biens">Type de bien</label>
                            <select class="form-control" name="id_type_bien">
                                <option>:: Choisir une option ::</option>
                                {foreach item=tb from=$carat.searchi.tb_research}
                                    <option value="{$tb->id}" {if isset($carat.searchf.id_type_bien) && $carat.searchf.id_type_bien eq $tb->id}selected{/if}>{$tb->name}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Prix minimum</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Prix maximum</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Surface minimum</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Surface maximum</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-bottom">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Villes des biens</label>
                            <select class="form-control" name="id_ville">
                                <option>:: Choisir une option ::</option>
                                {foreach item=vl from=$carat.searchi.vl_research}
                                    <option value="{$vl->id}" {if isset($carat.searchf.id_ville) && $carat.searchf.id_ville eq $vl->id}selected{/if}>{$vl->nom} ({$vl->cp})</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Villes à proximité</label>
                            <ul class="list-inline list-unstyled mb-0" data-table-li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="five-km" id="five-km1" value="option1" checked>
                                        <label class="form-check-label" for="five-km1">5 km</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ten-km" id="ten-km1" value="option1" checked>
                                        <label class="form-check-label" for="ten-km1">10 km</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="fifteen-km" id="fifteen-km1" value="option1" checked>
                                        <label class="form-check-label" for="fifteen-km1">15 km</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Frequence d'envoi</label> <br>
                            <ul class="list-inline list-unstyled mb-0" data-table-li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="one-by-day" id="onebyday" value="option1" checked>
                                        <label class="form-check-label" for="onebyday">1/Jour</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="two-by-day" id="two-by-day" value="option1" checked>
                                        <label class="form-check-label" for="twobyday">2/Jour</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Extérieur</label> <br>
                            <ul class="list-inline list-unstyled" data-table-li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="balcon">
                                        <label class="form-check-label" for="balcon"> Balcon </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Terrasse">
                                        <label class="form-check-label" for="Terrasse"> Terrasse </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-offre">Secteurs</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-de-biens">Nombre de chambres min</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-offre">Nombre de chambres</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-de-biens">Nombre de chambres max</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-de-biens">Départements des biens</label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Téléphone</label>
                            <input type="text" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="type-de-biens">Votre adresse mail <sup>*</sup></label>
                            <select class="form-control">
                                <option>:: Choisir une option ::</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 my-3 text-center">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    J'accepte les conditions d'utilisation des données (<sup>*</sup>)
                                </label>
                            </div>
                            <small><sup>*</sup> Champs obligatoires</small>
                        </div>
                        <a href="#" title="" class="btn btn-primary mt-3 content-font--bold w-50" data-flat-btn style="border:0;"><i class="zmdi zmdi-mail-send"></i> Envoyer</a>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <p>
                            Je reconnais avoir lu et accepté sans réserve, les <a href="#" title="" class="text-light"><b><u>Conditions Générales d'Utilisation</u></b></a> du site * CARAT TRANSACTIONS vous réserve le droit d'accès, de modification et de suppression des données vous concernant (art. 34 de la loi "Informatique et Libertés" du 6 janvier 1978). Pour l'exercer, vous pouvez vous adresser à contact@carat-transactions.com
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>