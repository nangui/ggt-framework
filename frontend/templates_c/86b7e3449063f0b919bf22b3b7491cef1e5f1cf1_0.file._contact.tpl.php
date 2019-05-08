<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:45:36
  from 'C:\xampp\htdocs\ggtframework\templates\frontend\v1\common\_contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cd218a0457f80_84000267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86b7e3449063f0b919bf22b3b7491cef1e5f1cf1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ggtframework\\templates\\frontend\\v1\\common\\_contact.tpl',
      1 => 1552469212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd218a0457f80_84000267 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="section-block contact-us" data-block-bg-is="blue-light" id="nous-contacter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="h3 section_heading title-font--light">
                    <i> <span class="text-dark title-font--bold">CONTACTEZ -</span> NOUS </i>
                </div>
            </div>
        </div>
        <div class="row --informations">
            <div class="col-12 col-lg-4 col-md-4 --infoWrap">
                <img src="<?php echo @constant('IMG_PATH_FE');?>
/icons/icons8-next_location.png" alt="icon">
                <p><?php echo @constant('ADRESSE_AGENCE');?>
 <br> <?php echo @constant('CP_AGENCE');?>
 <?php echo @constant('VILLE_AGENCE');?>
</p> 
            </div>
            <div class="col-12 col-lg-4 col-md-4 --infoWrap">
                <img src="<?php echo @constant('IMG_PATH_FE');?>
/icons/icons8-outgoing_call.png" alt="icon">
                <p><?php echo @constant('PHONE_1');?>
</p> 
            </div>
            <div class="col-12 col-lg-4 col-md-4 --infoWrap">
                <img src="<?php echo @constant('IMG_PATH_FE');?>
/icons/icons8-send_mass_email.png" alt="icon">
                <p><?php echo @constant('SITE_MAIL');?>
</p> 
            </div>
        </div>
        <form action="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
/envoi-courriel-contact" method="POST" accept-charset="utf-8" class="row mt-5 flat-form">
            <div class="col-lg-12"></div>
            <div class="col-lg-6 col-md-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name='name' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['name'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['name'];
} else {
if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'];
}
}?>" class="form-control" id="nameId" placeholder="Nom *" required="required">
                        </div>
                        <div class="form-group">
                            <input type="email" name='email' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['email'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['email'];
} else {
if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'];
}
}?>" class="form-control" id="emailId" placeholder="Email *" required="required">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <input type="telephone" name='phone' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['phone'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['phone'];
} else {
if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'];
}
}?>" class="form-control" id="telephoneId" placeholder="Telephone *" required="required">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name='subject' required="required">
                                <option>Choisir un sujet</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['get']->value['sujets_contact'], 'subject', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['subject']->value) {
?>
                                    <option  value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['subject']) && $_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['subject'] == $_smarty_tpl->tpl_vars['id']->value) {?>selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['subject']->value;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *" required="required"><?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['message'])) {
echo $_smarty_tpl->tpl_vars['carat']->value['sessioncontact']['message'];
}?></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 text-center text-md-left">
                <div class="form-group form-check bg-transparent mt-4 mt-md-0">
                    <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                    <?php echo $_smarty_tpl->tpl_vars['carat']->value['commun_conditions_generales_utilisations'];?>

                </div>
                <button type='submit' class="btn btn-outline btn-outline-primary mt-3 content-font--bold" data-flat-btn><i class="zmdi zmdi-mail-send"></i> Envoyer le message</button>
            </div>
        </form>
    </div>
</section><?php }
}
