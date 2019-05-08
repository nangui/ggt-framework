<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:19:28
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\common\_homepage_lander.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd22ea03a7671_46812001',
  'has_nocache_code' => false,
  'file_dependency' => [
    'f587ef7c19e4b58619ff6a3a5d9c2bfa28fe1e6e' => [
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\common\\_homepage_lander.tpl',
      1 => 1552469210,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd22ea03a7671_46812001(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><section class="pagelander" data-home-pagelander style="background:url('<?php echo @constant('IMG_PATH_FE'); ?>
/arriere-plans/herolander-bg.jpg');background-position:center 70%;background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 logoWrap text-center">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
" title=""><img src="<?php echo @constant('IMG_PATH_FE'); ?>
/logo/logo_carat_white.svg" alt="logo principal" title="Aller à l'accueil" class="logo_principal"></a>
            </div>
        </div>
        <div class="menu-blocs row">
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/liste-proprietes">
                    <img src="<?php echo @constant('IMG_PATH_FE'); ?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">NOS BIENS</b>
                </a>
            </div>	
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/vendre-votre-bien">
                    <img src="<?php echo @constant('IMG_PATH_FE'); ?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">VENDEURS</b>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/agent-de-recherche">
                    <img src="<?php echo @constant('IMG_PATH_FE'); ?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">ACHETEURS</b>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/savoir-faire">
                    <img src="<?php echo @constant('IMG_PATH_FE'); ?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">NOTRE SAVOIR-FAIRE</b>
                </a>
            </div>
        </div>
    </div>
</section><?php
    }
}
