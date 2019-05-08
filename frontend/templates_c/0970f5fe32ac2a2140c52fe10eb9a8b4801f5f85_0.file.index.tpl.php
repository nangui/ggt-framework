<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:45:35
  from 'C:\xampp\htdocs\ggtframework\templates\frontend\v1\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd2189fd525f1_85890312',
  'has_nocache_code' => false,
  'file_dependency' => [
    '0970f5fe32ac2a2140c52fe10eb9a8b4801f5f85' => [
      0 => 'C:\\xampp\\htdocs\\ggtframework\\templates\\frontend\\v1\\index.tpl',
      1 => 1552469208,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd2189fd525f1_85890312(Smarty_Internal_Template $_smarty_tpl)
    {
        if ($_smarty_tpl->tpl_vars['get']->value['module'] == '404') {
            ?>

    <?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/modules/'.((string) $_smarty_tpl->tpl_vars['get']->value['module']).'/'.((string) $_smarty_tpl->tpl_vars['get']->value['action']).'.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<?php
        } else {
            ?>

    <?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

    <?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/modules/'.((string) $_smarty_tpl->tpl_vars['get']->value['module']).'/'.((string) $_smarty_tpl->tpl_vars['get']->value['action']).'.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

    <?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/common/_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>

<?php
        }
    }
}
