<?php
/* Smarty version 3.1.32, created on 2019-05-08 14:54:02
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\modules\carat\biens.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd2ed8a9e4624_93032386',
  'has_nocache_code' => false,
  'file_dependency' => [
    '23b7f6d07448f042d612e27144236d8a956001d0' => [
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\modules\\carat\\biens.tpl',
      1 => 1552469216,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd2ed8a9e4624_93032386(Smarty_Internal_Template $_smarty_tpl)
    {
        $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_topbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="h3 section_heading title-font--light">
                    <i>
                        <div class="text-light title-font--bold mb-1">AFFINEZ</div>
                        <div class="text-light title-font--light">VOTRE RECHERCHE</div>
                    </i>
                </div>
            </div>
            <div class="col-lg-12">
                <?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_search_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
" title='Accueil'>Accueil</a></li>
            <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['filarianetitre'])) {
            ?>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $_smarty_tpl->tpl_vars['carat']->value['filarianetitre']; ?>
</li>
            <?php
        } else {
            ?>
            <li class="breadcrumb-item active" aria-current="page">Biens</li>
            <?php
        } ?>
    </ol>
</nav>


<div class="search_results mt-5">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-10 mb-3">
                <div class="h3 section_heading title-font--light">
                    <i>
                        <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['simplesearchliens'])) {
            ?>
                            <div class="text-muted title-font--light uppercase"><?php echo $_smarty_tpl->tpl_vars['carat']->value['btitleh1page']['type']; ?>
</div>
                            <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['btitleh1page']['ville'])) {
                ?><div class="text-primary title-font--bold uppercase"><?php echo $_smarty_tpl->tpl_vars['carat']->value['btitleh1page']['ville']; ?>
</div><?php
            } ?>
                        <?php
        } else {
            ?>
                            <div class="text-muted title-font--light">NOS BIENS À VENDRE SUR</div>
                            <div class="text-primary title-font--bold">LA LOIRE ET ENVIRONS</div>
                        <?php
        } ?>
                    </i>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="flat-form">
                    <div class="--fieldWrap">
                        <select class="form-control no-appearance" onchange='loadDocument("<?php echo @constant('HTTP_PATH'); ?>
/<?php echo $_smarty_tpl->tpl_vars['get']->value['app']; ?>
/_ajax.php?app=<?php echo $_smarty_tpl->tpl_vars['get']->value['app']; ?>
&module=<?php echo $_smarty_tpl->tpl_vars['get']->value['module'];
        echo $_smarty_tpl->tpl_vars['get']->value['action']; ?>
&tribiens&valeur=" + this.value, "", "oui", "");'>
                            <option value=''>:: Trier la liste par ::</option>
                            <option value="1" <?php if ((($_SESSION[$_smarty_tpl->tpl_vars['get']->value['app']][($_smarty_tpl->tpl_vars['get']->value['module']).($_smarty_tpl->tpl_vars['get']->value['action'])]['tri'] !== null)) && $_SESSION[$_smarty_tpl->tpl_vars['get']->value['app']][($_smarty_tpl->tpl_vars['get']->value['module']).($_smarty_tpl->tpl_vars['get']->value['action'])]['tri'] == 1) {
            ?>selected<?php
        } ?>>Prix croissant</option>
                            <option value="2" <?php if ((($_SESSION[$_smarty_tpl->tpl_vars['get']->value['app']][($_smarty_tpl->tpl_vars['get']->value['module']).($_smarty_tpl->tpl_vars['get']->value['action'])]['tri'] !== null)) && $_SESSION[$_smarty_tpl->tpl_vars['get']->value['app']][($_smarty_tpl->tpl_vars['get']->value['module']).($_smarty_tpl->tpl_vars['get']->value['action'])]['tri'] == 2) {
            ?>selected<?php
        } ?>>Prix d&eacute;croissant</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['simplesearchliens'])) {
            ?>
            <div class="row mb-5">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['simplesearchliens'], 'simpletextliens');
            if ($_from !== null) {
                foreach ($_from as $_smarty_tpl->tpl_vars['simpletextliens']->value) {
                    ?>
                    <div class="col">
                        <a href='<?php echo $_smarty_tpl->tpl_vars['simpletextliens']->value['lien']; ?>
' title='<?php echo $_smarty_tpl->tpl_vars['simpletextliens']->value['noml']; ?>
' class="btn btn-outline btn-outline-primary mt-3 content-font--bold w-100" style="padding:0.8rem 0.5rem;font-size:0.8rem;line-height: 2;" data-flat-btn><?php echo $_smarty_tpl->tpl_vars['simpletextliens']->value['noml']; ?>
 (<?php echo $_smarty_tpl->tpl_vars['simpletextliens']->value['nbrb']; ?>
)</a>
                    </div>
                <?php
                }
            }
            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
            </div>
        <?php
        } ?>
        <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['biens']) && count($_smarty_tpl->tpl_vars['carat']->value['biens']) > 0) {
            ?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['biens'], 'bien', false, 'cle');
            if ($_from !== null) {
                foreach ($_from as $_smarty_tpl->tpl_vars['cle']->value => $_smarty_tpl->tpl_vars['bien']->value) {
                    ?>

                <div class="annonce mb-lg-3 mb-5">
                    <div class="--photo" style="background:url('<?php echo $_smarty_tpl->tpl_vars['bien']->value->photo['url']; ?>
');background-position:center center;background-size:cover;">
                        <div class="overlay">
                            <div class="tagsWrap">
                                <?php if (isset($_smarty_tpl->tpl_vars['bien']->value->cc) && $_smarty_tpl->tpl_vars['bien']->value->cc == 'OUI') {
                        ?>
                                    <span class="--tag tag-exclusivite">Coup de coeur</span>
                                <?php
                    } ?>
                            </div>
                        </div>
                    </div>
                    <div class="--description">
                        <h3 class="h5 w-100 -title"><a href="<?php echo $_smarty_tpl->tpl_vars['bien']->value->lien; ?>
" title="<?php echo $_smarty_tpl->tpl_vars['bien']->value->titre; ?>
" class="text-secondary content-font--bold"><?php echo $_smarty_tpl->tpl_vars['bien']->value->titre_cut; ?>
</a></h3>
                        <div class="--caracteristiques"><?php echo $_smarty_tpl->tpl_vars['bien']->value->surface_format; ?>
 <?php echo $_smarty_tpl->tpl_vars['language']->value['commun_surface_signe']; ?>
 <?php if (!empty($_smarty_tpl->tpl_vars['bien']->value->nb_pieces)) {
                        ?>, <?php echo $_smarty_tpl->tpl_vars['bien']->value->nb_pieces; ?>
 pièce(s)<?php
                    } ?></div>

                        <p class="mt-3 text-muted">
                            <?php echo $_smarty_tpl->tpl_vars['bien']->value->description_cut; ?>

                            <br><br>
                        </p>
                        <span id='mypaniercare_<?php echo $_smarty_tpl->tpl_vars['bien']->value->id; ?>
'>
                            <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['panieridbien']) && in_array($_smarty_tpl->tpl_vars['bien']->value->id, $_smarty_tpl->tpl_vars['carat']->value['panieridbien'])) {
                        ?>
                                <a onclick='deleteFromSelection("<?php echo $_smarty_tpl->tpl_vars['bien']->value->id; ?>
");' title="Supprimer de la selection" class="h5 cursor-pointer">
                                    <i class="zmdi zmdi-check text-secondary"></i>&nbsp; 
                                    EST DANS VOTRE SÉLECTION
                                </a>
                            <?php
                    } else {
                        ?>
                                <a onclick='addToSelection("<?php echo $_smarty_tpl->tpl_vars['bien']->value->id; ?>
");' title="Ajouter à la selection" class="h5 cursor-pointer">
                                    <i class="zmdi zmdi-plus-circle-o text-primary"></i>&nbsp; 
                                    AJOUTER À MA SÉLECTION
                                </a>
                            <?php
                    } ?>
                        </span>
                    </div>
                    <div class="--infos py-5 pl-4">
                        <h4 class="prix h2 content-font--regular text-dark"><?php echo $_smarty_tpl->tpl_vars['bien']->value->prix_format; ?>
 <?php echo $_smarty_tpl->tpl_vars['language']->value['commun_monnaie_signe']; ?>
</h4>
                        <p>
                            <?php echo $_smarty_tpl->tpl_vars['bien']->value->adresse; ?>
 <br>
                            Ville : <?php echo $_smarty_tpl->tpl_vars['bien']->value->ville; ?>

                        </p>
                        <hr>
                        <div class="h3 content-font--thin text-muted">Ref: <?php echo $_smarty_tpl->tpl_vars['bien']->value->reference; ?>
</div>
                        <a href='#' onclick='redirection("<?php echo $_smarty_tpl->tpl_vars['bien']->value->lien; ?>
");' title="<?php echo $_smarty_tpl->tpl_vars['bien']->value->titre; ?>
" class="btn btn-primary btn-border-0 w-100"><span class="zmdi zmdi-chevron-right animated infinite fadeInLeft" style="animation-duration: 2s;font-size:1.2rem;"></span> Consulter</a>
                    </div>
                </div>
            <?php
                }
            }
            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
        <?php
        } else {
            ?>
            <div class="col-lg-12">
                <div class="h2"> <span class="content-font--thin">Aucun bien </span> <br> <span class="text-primary content-font--bold">ne correspond à votre recherche.</span> </div>
            </div>
        <?php
        } ?>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-lg-5">
                <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['pagination']['pagination'])) {
            ?>
                    <?php echo $_smarty_tpl->tpl_vars['carat']->value['pagination']['pagination']; ?>

                <?php
        } ?>
            </ul>
        </nav>
    </div>
</div>

<!-- Créer l'espace entre les blocs --><br><br>

<?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_alerte.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_contact.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<?php
    }
}
