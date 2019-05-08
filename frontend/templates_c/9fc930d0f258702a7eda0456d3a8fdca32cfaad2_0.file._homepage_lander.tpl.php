<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:45:36
  from 'C:\xampp\htdocs\ggtframework\templates\frontend\v1\common\_homepage_lander.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cd218a0219d30_64892093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fc930d0f258702a7eda0456d3a8fdca32cfaad2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ggtframework\\templates\\frontend\\v1\\common\\_homepage_lander.tpl',
      1 => 1552469210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cd218a0219d30_64892093 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="pagelander" data-home-pagelander style="background:url('<?php echo @constant('IMG_PATH_FE');?>
/arriere-plans/herolander-bg.jpg');background-position:center 70%;background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 logoWrap text-center">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
" title=""><img src="<?php echo @constant('IMG_PATH_FE');?>
/logo/logo_carat_white.svg" alt="logo principal" title="Aller à l'accueil" class="logo_principal"></a>
            </div>
        </div>
        <div class="menu-blocs row">
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
/liste-proprietes">
                    <img src="<?php echo @constant('IMG_PATH_FE');?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">NOS BIENS</b>
                </a>
            </div>	
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
/vendre-votre-bien">
                    <img src="<?php echo @constant('IMG_PATH_FE');?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">VENDEURS</b>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
/agent-de-recherche">
                    <img src="<?php echo @constant('IMG_PATH_FE');?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">ACHETEURS</b>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path'];?>
/savoir-faire">
                    <img src="<?php echo @constant('IMG_PATH_FE');?>
/logo/logo_carat_white.svg" alt="menuIcon" data-menu-icon>
                    <b class="title-font--regular">NOTRE SAVOIR-FAIRE</b>
                </a>
            </div>
        </div>
    </div>
</section><?php }
}
