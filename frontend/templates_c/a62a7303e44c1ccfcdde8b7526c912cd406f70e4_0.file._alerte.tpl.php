<?php
/* Smarty version 3.1.32, created on 2019-05-08 14:54:02
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\common\_alerte.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd2ed8aa330e2_61759950',
  'has_nocache_code' => false,
  'file_dependency' => [
    'a62a7303e44c1ccfcdde8b7526c912cd406f70e4' => [
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\common\\_alerte.tpl',
      1 => 1552469212,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd2ed8aa330e2_61759950(Smarty_Internal_Template $_smarty_tpl)
    {
        if (isset($_smarty_tpl->tpl_vars['get']->value['action']) && in_array($_smarty_tpl->tpl_vars['get']->value['action'], ['alertes', 'panier'])) {
            ?>
    <div class="col-lg-4">
        <div class="h2"> <span class="content-font--thin">Rappelez-nous</span> <br> <span class="text-primary content-font--bold">votre adresse e-mail</span> </div>
    </div>
    <div class="col-lg-8">
        <h6 class="uppercase">Et faire apparaître <?php if (($_smarty_tpl->tpl_vars['get']->value['action'] == 'alertes')) {
                ?> vos alertes enregistrées <?php
            } else {
                ?> votre sélection de biens <?php
            } ?> !</h6>
        <form action="<?php echo $_smarty_tpl->tpl_vars['carat']->value['destination']; ?>
" method="POST" accept-charset="utf-8" class="flat-form mb-0">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <input type="email" name="email" value="<?php if (isset($_SESSION['frontend']['emailalerte'])) {
                echo $_SESSION['frontend']['emailalerte'];
            } ?>" class="form-control" placeholder="Votre adresse email *" required='required' autocomplete='off'>
                </div>
                <div class="col-lg-4 col-md-4">
                    <button type="" class="btn btn-outline btn-outline-primary content-font--bold w-100" data-flat-btn>
                        <i class="zmdi zmdi-mail-send"></i> Enregistrer
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php
        } else {
            ?>
    <section class="email-alert py-4 text-white" data-block-bg-is="blue">
        <div class="container">
            <div class="row d-flex align-items-top">
                <div class="col-lg-4">
                    <div class="h2"> <span class="content-font--thin">Créez votre propre</span> <br> <span class="text-primary content-font--bold">alerte e-mail</span> </div>
                </div>
                <div class="col-lg-8">
                    <h6>ET RECEVEZ LES BIENS CORRESPONDANTS À VOTRE RECHERCHE DANS VOTRE BOÎTE MAIL !</h6>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/alertes" method="POST" accept-charset="utf-8" class="flat-form mb-0">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <input type="email" name="email" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'];
            } ?>" class="form-control mb-3 mb-lg-3" placeholder="Votre adresse email *" required='required' autocomplete='off'>
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
<?php
        }
    }
}
