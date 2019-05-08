<?php
/* Smarty version 3.1.32, created on 2019-05-08 14:54:10
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\modules\carat\vendeurs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cd2ed92ce4387_94166534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78390341c0abe3104e0fbf3006c4979df6cc9a42' => 
    array (
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\modules\\carat\\vendeurs.tpl',
      1 => 1552469212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd2ed92ce4387_94166534 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/common/_topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


<div class="pagelander-small py-4 pb-5" data-block-bg-is="blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section_heading">
                <div class="h1 --title title-font--light">VENDRE VOTRE BIEN</div>
            </div>
        </div>
    </div>
</div>

<nav class="container mt-3 mb-5" aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-lg-0">
        <li class="breadcrumb-item content-font--bold"><a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
" title='Accueil'>Accueil</a></li>
        <li class="breadcrumb-item active" aria-current="page">Vendre votre bien</li>
    </ol>
</nav>

<section class="estimation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="text-muted">
                    Vous désirez une évaluation précise et détaillée de votre bien immobilier.
                    Après un rendez-vous permettant d'évaluer les paramètres techniques de votre bien, nous réalisons une étude approfondie afin de déterminer le prix de vente. Nous vous remettons un rapport complet d'estimation comportant de nombreuses fiches explicatives sur les différents facteurs qui influencent le prix de votre bien.
                    N'hésitez pas à nous contacter par téléphone ou à l'aide du formulaire ci dessous, nous vous recontacterons dans les meilleurs délais.
                </p>
            </div>
            <div class="col-lg-12 my-5 section_heading" id="content">
                <div class="h1 --title title-font--light">FORMULAIRE</div>
            </div>
            <div class="col-lg-12 mb-3">
                <form action="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
/courriel-vendre-votre-bien" method="POST" accept-charset="utf-8" class="mt-lg-5">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="votre_nom">Votre nom <sup>*</sup></label>
                                <input type="text" name='name' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['name'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['name'];
}?>" class="form-control" id="votre_nom" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <label for="votre_email">Votre adresse e-mail <sup>*</sup></label>
                                <input type="email" name='email' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['email'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['email'];
}?>" class="form-control" id="votre_email" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <label for="votre_superficie">Superficie du bien (<?php echo $_smarty_tpl->tpl_vars['language']->value['commun_surface_signe'];?>
)</label>
                                <input type="number" name='superficie' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['superficie'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['superficie'];
}?>" class="form-control" id="votre_superficie" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="cp_bien">Code postal du bien</label>
                                <input type="number" name='cp' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['cp'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['cp'];
}?>" class="form-control" id="cp_bien" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="votre_telephone">Votre téléphone<sup>*</sup></label>
                                <input type="text" name='phone' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['phone'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['phone'];
}?>" class="form-control" id="votre_telephone" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="type_de_bien">Type de bien <sup>*</sup></label>
                                <select class="form-control" name="type" required="required">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['vendeur_type_bien'], 'tb');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tb']->value) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['tb']->value->id;?>
" <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['type']) && $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['type'] == $_smarty_tpl->tpl_vars['tb']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tb']->value->name;?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="adresse_du_bien">Adresse du bien<sup>*</sup></label>
                                <input type="text" name='adresse' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['adresse'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['adresse'];
}?>" class="form-control" id="adresse_du_bien" placeholder="" required="required">
                            </div>
                            <div class="form-group">
                                <label for="votre_ville">Ville du bien <sup>*</sup></label>
                                <input type="text" name='ville' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['ville'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['ville'];
}?>" class="form-control" id="votre_ville" placeholder="" required="required">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="votre_message">Votre message <sup>*</sup></label>
                                <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *" required="required"><?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['message'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionvendrebien']['message'];
}?></textarea>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="gridCheck1" name="jaccepte" value='1' required="required">
                                <label class="form-check-label" for="gridCheck1">
                                    <?php echo $_smarty_tpl->tpl_vars['carat']->value['commun_conditions_generales_utilisations'];?>

                                </label>
                            </div>
                            <div class="col-sm-12 text-white">*Champs obligatoires</div>
                        </div>
                        <div class="col-lg-4 text-right">
                            <button type='submit' class="btn btn-outline btn-outline-primary mt-3 content-font--bold" data-flat-btn style="background:#0B5A6A; color:#fff; border:0;"><i class="zmdi zmdi-mail-send"></i> Envoyer le message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/common/_alerte.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
