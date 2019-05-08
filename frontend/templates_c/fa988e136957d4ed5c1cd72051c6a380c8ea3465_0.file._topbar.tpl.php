<?php
/* Smarty version 3.1.32, created on 2019-05-08 14:54:02
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\common\_topbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd2ed8aa0bca1_53870919',
  'has_nocache_code' => false,
  'file_dependency' => [
    'fa988e136957d4ed5c1cd72051c6a380c8ea3465' => [
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\common\\_topbar.tpl',
      1 => 1552469208,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd2ed8aa0bca1_53870919(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><div class="topBar">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-2 logoWrap text-center">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
" title=""><img src="<?php echo @constant('IMG_PATH_FE'); ?>
/logo/logo_carat_color.svg" alt="logo principal" title="Aller à l'accueil" class="logo_principal"></a>
            </div>
            <div class="col-lg-10">
                <ul class="inline-menu list-inline list-unstyled">
                    <li class="<?php if ($_smarty_tpl->tpl_vars['get']->value['action'] == 'biens') {
            ?>is-active<?php
        } ?>"> <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/liste-proprietes"> NOS BIENS </a> </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['get']->value['action'] == 'vendeurs') {
            ?>is-active<?php
        } ?>"> <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/vendre-votre-bien"> VENDEURS </a> </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['get']->value['action'] == 'acheteurs') {
            ?>is-active<?php
        } ?>"> <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/agent-de-recherche"> ACHETEURS </a> </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['get']->value['action'] == 'savoirfaire') {
            ?>is-active<?php
        } ?>"> <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/savoir-faire"> NOTRE SAVOIR-FAIRE </a> </li>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['get']->value['action'] == 'index') {
            ?>is-active<?php
        } ?>"> <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
#nous-contacter"> CONTACTS </a> </li>
                </ul>
            </div>	
        </div>
    </div>	
</div><?php
    }
}
