<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:19:26
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cd22e9e32fe90_50944331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '515120062991fc7a573a3d4208be8d42642d0585' => 
    array (
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\index.tpl',
      1 => 1552469208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd22e9e32fe90_50944331 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['get']->value['module'] == '404') {?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/modules/".((string)$_smarty_tpl->tpl_vars['get']->value['module'])."/".((string)$_smarty_tpl->tpl_vars['get']->value['action']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php } else { ?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/common/_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/modules/".((string)$_smarty_tpl->tpl_vars['get']->value['module'])."/".((string)$_smarty_tpl->tpl_vars['get']->value['action']).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/common/_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
}
}
