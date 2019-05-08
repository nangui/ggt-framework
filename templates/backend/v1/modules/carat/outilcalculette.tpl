{include file="{$template}/common/_topbar.tpl"}
<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section_heading">
                <div class="h1 --title title-font--light">OUTILS, NOS CALCULETTES IMMOBILIÈRES</div>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="{$get.path}" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item">Outils</li>
        <li class="breadcrumb-item active" aria-current="page">Calculette immobilière</li>
    </ol>
</nav>


<section class="outil --outil-calculette mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">Effectuez vos comptes facilement grâce à nos différentes calculettes financières.</div>
            <div class="col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Vous souhaitez calculer votre capacité d’emprunt
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <form>
                                    <div class="form-group row">
                                        <label for="mensualite" class="col-sm-4 col-form-label">Mensualité souhaitée (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="Mensualite" class="form-control" id="mensualite" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 765)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex align-items-center">
                                        <label for="duree" class="col-sm-4 col-form-label">Durée</label>
                                        <div class="col-sm-5">
                                            <input type="duree" class="form-control" id="duree" placeholder="">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="moisRadios1" value="option2">
                                                        <label class="form-check-label" for="moisRadios1">
                                                            Mois
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="anneeRadios2" value="option2">
                                                        <label class="form-check-label" for="anneeRadios2">
                                                            Années
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="taux-interet" class="col-sm-4 col-form-label">Taux d'intérêt - hors assurances (en %)</label>
                                        <div class="col-sm-8">
                                            <input type="taux-interet" class="form-control" id="taux-interet" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 3 ou 3.5)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8 text-center"><a href="#" title="calculer" class="btn btn-outline-primary">Calculer</a></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="montant-emprunt" class="col-sm-4 col-form-label">Montant de votre emprunt (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="montant-emprunt" class="form-control" id="montant-emprunt" placeholder="">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Vous souhaitez calculer le montant de votre mensualité
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <form>
                                    <div class="form-group row">
                                        <label for="montant-emprunt" class="col-sm-4 col-form-label">Montant de votre emprunt (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="montant-emprunt" class="form-control" id="montant-emprunt" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 115000)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row d-flex align-items-center">
                                        <label for="duree" class="col-sm-4 col-form-label">Durée</label>
                                        <div class="col-sm-5">
                                            <input type="duree" class="form-control" id="duree" placeholder="">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="moisRadios1" value="option2">
                                                        <label class="form-check-label" for="moisRadios1">
                                                            Mois
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="anneeRadios2" value="option2">
                                                        <label class="form-check-label" for="anneeRadios2">
                                                            Années
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="taux-interet" class="col-sm-4 col-form-label">Taux d'intérêt - hors assurances (en %)</label>
                                        <div class="col-sm-8">
                                            <input type="taux-interet" class="form-control" id="taux-interet" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 3 ou 3.5)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8 text-center"><a href="#" title="calculer" class="btn btn-outline-primary">Calculer</a></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mensualite" class="col-sm-4 col-form-label">Mensualité (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="mensualite" class="form-control" id="mensualite" placeholder="">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Vous souhaitez calculer la durée de vos remboursements
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <form>
                                    <div class="form-group row">
                                        <label for="montant-emprunt" class="col-sm-4 col-form-label">Montant de votre emprunt (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="montant-emprunt" class="form-control" id="montant-emprunt" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 115000)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="apport-initial" class="col-sm-4 col-form-label">Apport initial (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="apport-initial" class="form-control" id="apport-initial" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 10000)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mensualite" class="col-sm-4 col-form-label">Mensualité (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="mensualite" class="form-control" id="mensualite" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 765)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="taux-interet" class="col-sm-4 col-form-label">Taux d'intérêt - hors assurances (en %)</label>
                                        <div class="col-sm-8">
                                            <input type="taux-interet" class="form-control" id="taux-interet" placeholder="">
                                            <small>(Sans espace, ni virgule, ex : 3 ou 3.5)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8 text-center"><a href="#" title="calculer" class="btn btn-outline-primary">Calculer</a></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="duree" class="col-sm-4 col-form-label">Durée</label>
                                        <div class="col-sm-8">
                                            <input type="duree" class="form-control" id="duree" placeholder="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour" style="border-bottom: 0;">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Vous souhaitez calculer le montant de votre loyer
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    Le bailleur exige généralement que votre loyer avec les charges n'excède pas un tiers de vos revenus mensuels nets.
                                    On vous demandera aussi la caution d'une tierce personne, qui se portera garante du paiement des loyers si vous ne pouvez pas les régler. L'usage demande également que le garant puisse justifier de revenus nets mensuels égaux ou supérieurs à 3 fois le montant du loyer avec les charges.
                                </p>
                                <form>
                                    <div class="form-group row">
                                        <label for="revenus-mensuels" class="col-sm-4 col-form-label">Revenus mensuels (en €)</label>
                                        <div class="col-sm-8">
                                            <input type="revenus-mensuels" class="form-control" id="revenus-mensuels" placeholder="">
                                            <small>(sans espace, ni virgule, ex : 765)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="revenus-mensuels" class="col-sm-4 col-form-label">Ratio</label>
                                        <div class="col-sm-8">
                                            <input type="revenus-mensuels" class="form-control" id="revenus-mensuels" placeholder="">
                                            <small>(en % / sans espace, ni virgule, ex : 3 ou 3.5)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8 text-center"><a href="#" title="calculer" class="btn btn-outline-primary">Calculer</a></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="loyer-mensuel" class="col-sm-4 col-form-label">Loyer mensuel</label>
                                        <div class="col-sm-8">
                                            <input type="loyer-mensuel" class="form-control" id="loyer-mensuel" placeholder="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{include file="{$template}/common/_alerte.tpl"}

{include file="{$template}/common/_contact.tpl"}

