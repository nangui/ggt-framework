<div class="topBar">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-2 logoWrap text-center">
                <a href="{$get.path}" title=""><img src="{$smarty.const.IMG_PATH_FE}/logo/logo_carat_color.svg" alt="logo principal" title="Aller à l'accueil" class="logo_principal"></a>
            </div>
            <div class="col-lg-10">
                <ul class="inline-menu list-inline list-unstyled">
                    <li class="{if $get.action eq 'biens'}is-active{/if}"> <a href="{$get.path}/liste-proprietes"> NOS BIENS </a> </li>
                    <li class="{if $get.action eq 'vendeurs'}is-active{/if}"> <a href="{$get.path}/vendre-votre-bien"> VENDEURS </a> </li>
                    <li class="{if $get.action eq 'acheteurs'}is-active{/if}"> <a href="{$get.path}/agent-de-recherche"> ACHETEURS </a> </li>
                    <li class="{if $get.action eq 'savoirfaire'}is-active{/if}"> <a href="{$get.path}/savoir-faire"> NOTRE SAVOIR-FAIRE </a> </li>
                    <li class="{if $get.action eq 'index'}is-active{/if}"> <a href="{$get.path}#nous-contacter"> CONTACTS </a> </li>
                </ul>
            </div>	
        </div>
    </div>	
</div>