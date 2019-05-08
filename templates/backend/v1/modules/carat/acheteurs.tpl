{include file="{$template}/common/_topbar.tpl"}


<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section_heading">
                <div class="h1 --title title-font--light">AGENT DE RECHERCHE</div>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="{$get.path}" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agent de recherche</li>
    </ol>
</nav>

<section class="estimation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="text-muted">
                    Vous recherchez un bien immobilier ? N'hésitez pas à nous contacter par téléphone ou à l'aide du formulaire ci dessous, nous vous recontacterons dans les meilleurs délais.
                </p>
            </div>
            <div class="col-lg-12 my-5 section_heading" id="content">
                <div class="h1 --title title-font--light">CREER UNE ALERTE</div>
            </div>
            <div class="col-lg-12 mb-5">
                {include file="{$template}/modules/{$get.module}/_inc_form_alerte.tpl"}
            </div>
        </div>
    </div>
</section>

{*include file="{$template}/common/_alerte.tpl"*}


