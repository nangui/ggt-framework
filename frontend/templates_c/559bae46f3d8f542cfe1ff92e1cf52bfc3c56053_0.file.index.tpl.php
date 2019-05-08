<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:45:36
  from 'C:\xampp\htdocs\ggtframework\templates\frontend\v1\modules\carat\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd218a01b2050_09053650',
  'has_nocache_code' => false,
  'file_dependency' => [
    '559bae46f3d8f542cfe1ff92e1cf52bfc3c56053' => [
      0 => 'C:\\xampp\\htdocs\\ggtframework\\templates\\frontend\\v1\\modules\\carat\\index.tpl',
      1 => 1552469214,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd218a01b2050_09053650(Smarty_Internal_Template $_smarty_tpl)
    {
        $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_homepage_lander.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_search_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<section class="coupsdecoeur mt-lg-5">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-8">
                <div class="h3 section_heading title-font--light">
                    <i>
                        <span class="text-primary title-font--bold">NOS</span> DERNIÈRES <br>
                        <span class="text-primary title-font--bold">ANNONCES</span> IMMOBILIÈRES
                    </i>
                </div>
            </div>
            <div class="col-lg-4 text-lg-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/liste-proprietes" title="Voir toutes nos annonces" class="btn btn-outline btn-outline-primary" data-flat-btn>Voir toutes nos annonces</a>
            </div>
        </div>

        <div class="row mt-4">
            <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['biens'])) {
            ?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['biens'], 'bien', false, 'cle');
            if ($_from !== null) {
                foreach ($_from as $_smarty_tpl->tpl_vars['cle']->value => $_smarty_tpl->tpl_vars['bien']->value) {
                    ?>
                    <div class="col-lg-4">
                        <div class="item">
                            <!-- Ce lien englobe tout le bien pour le clic --><a href="<?php echo $_smarty_tpl->tpl_vars['bien']->value->lien; ?>
" title="<?php echo $_smarty_tpl->tpl_vars['bien']->value->titre; ?>
" class="wrapLink"></a> <!-- Fin du wraplink -->
                            <div class="head --illustration" style="background:url('<?php echo $_smarty_tpl->tpl_vars['bien']->value->photo['url']; ?>
');background-position:center center;background-size:cover;"></div>
                            <div class="body">
                                <h3 class="h5 content-font--bold mb-1 w-100 text-truncate" data-title><?php echo $_smarty_tpl->tpl_vars['bien']->value->titre; ?>
</h3>
                                <h4 class="h6 content-font--light text-muted" data-departement><i class="zmdi zmdi-pin"></i>&nbsp; <?php echo $_smarty_tpl->tpl_vars['bien']->value->ville; ?>
</h4>
                                <p class="text-muted" data-description>
                                    <?php echo $_smarty_tpl->tpl_vars['bien']->value->description_cut; ?>
 
                                </p>
                            </div>
                            <div class="footer h4 text-primary"><span class="content-font--light" data-price><?php echo $_smarty_tpl->tpl_vars['bien']->value->prix_format; ?>
 <?php echo $_smarty_tpl->tpl_vars['language']->value['commun_monnaie_signe']; ?>
</span></div>
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
                    <div class="h2"> <span class="content-font--thin">Aucun</span> <br> <span class="text-primary content-font--bold">bien trouvé.</span> </div>
                </div>
            <?php
        } ?>
        </div>
    </div>
</section>

<!-- Créer l'espace entre les blocs --><br><br>
<?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_contact.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<?php
    }
}
