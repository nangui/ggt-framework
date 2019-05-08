<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:19:28
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\common\_search_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd22ea0592aa8_04863818',
  'has_nocache_code' => false,
  'file_dependency' => [
    'e585664c42d48aff9a522412743ee6696698dd89' => [
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\common\\_search_form.tpl',
      1 => 1552469208,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd22ea0592aa8_04863818(Smarty_Internal_Template $_smarty_tpl)
    {
        ?><section class="moteur_de_recherche" id="moteurDeRecherche">
    <div class="container">
        <form action='<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/liste-proprietes' method='POST'>
            <div class="--champs">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-12 col-lg-3 col-md-3" data-typedebien>
                            <div class="--fieldWrap">
                                <select class="form-control" name="id_type_transaction" id='id_type_transaction' onchange='document.getElementById("id_type_transaction_plus_critere").value = this.value;
                        loadDoc2cibles("<?php echo @constant('HTTP_PATH'); ?>
/<?php echo $_smarty_tpl->tpl_vars['get']->value['app']; ?>
/_ajax.php?app=<?php echo $_smarty_tpl->tpl_vars['get']->value['app']; ?>
&module=<?php echo $_smarty_tpl->tpl_vars['get']->value['module']; ?>
&action=filtrerbudget&valeur=" + this.value, "budget_research", "budget_research_plus_criteres");'>
                                    <option value=''>Type de transaction</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['searchi']['tt_research'], 'libelle', false, 'tt');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['tt']->value => $_smarty_tpl->tpl_vars['libelle']->value) {
                ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['tt']->value; ?>
" <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ3']) && $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ3'] == $_smarty_tpl->tpl_vars['tt']->value) {
                    ?>selected<?php
                } ?>><?php echo ucfirst($_smarty_tpl->tpl_vars['libelle']->value); ?>
</option>
                                    <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3" data-typedebien>
                            <div class="--fieldWrap">
                                <select class="form-control" name="id_type_bien" id='id_type_bien' onchange='document.getElementById("id_type_bien_plus_critere").value = this.value;' >
                                    <option value=''>Type de bien</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['searchi']['tb_research'], 'tb');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['tb']->value) {
                ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['tb']->value->id; ?>
" <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ4']) && $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ4'] == $_smarty_tpl->tpl_vars['tb']->value->id) {
                    ?>selected<?php
                } ?>><?php echo $_smarty_tpl->tpl_vars['tb']->value->name; ?>
</option>
                                    <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3" data-lieu>
                            <div class="--fieldWrap">
                                <select class="form-control" name='id_ville' id='id_ville' onchange='document.getElementById("id_ville_plus_critere").value = this.value;' >
                                    <option value=''>Ville</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['searchi']['vl_research'], 'vl');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['vl']->value) {
                ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['vl']->value->id; ?>
" <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ6']) && $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ6'] == $_smarty_tpl->tpl_vars['vl']->value->id) {
                    ?>selected<?php
                } ?>><?php echo $_smarty_tpl->tpl_vars['vl']->value->nom; ?>
 (<?php echo $_smarty_tpl->tpl_vars['vl']->value->cp; ?>
)</option>
                                    <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3" data-budget id='bg_research'>
                            <div class="--fieldWrap">
                                <select class="form-control" name='budget' id='budget_research' onchange='document.getElementById("budget_research_plus_criteres").value = this.value;'>
                                    <option value=''>Budget</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carat']->value['searchi']['bg_research'], 'bg', false, 'cle');
        if ($_from !== null) {
            foreach ($_from as $_smarty_tpl->tpl_vars['cle']->value => $_smarty_tpl->tpl_vars['bg']->value) {
                ?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['cle']->value; ?>
" <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ11']) && $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ11'] == $_smarty_tpl->tpl_vars['cle']->value) {
                    ?>selected<?php
                } ?>><?php echo $_smarty_tpl->tpl_vars['bg']->value; ?>
</option>
                                    <?php
            }
        }
        $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                                </select>
                                <i class="--icon zmdi zmdi-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 mt-lg-0 mt-4 mt-md-0 mt-md-5">
                    <button type="submit" class="btn btn-primary form-btn w-100" data-form-btn data-flat-btn style="border:0;">Rechercher</button>
                </div>
                <div class="col-lg-12 text-center" data-criteres-sup>
                    <hr>
                    <a href="#" title="" data-remodal-target="plus-de-criteres--search" class="text-white mt-2 d-inline-block" style="text-decoration:none;">[ + de critères ]</a>
                    <a class="text-light mt-2 d-inline-block slick-button-go-one cursor-pointer" style="text-decoration:none;">[ vider les critères de recherche ]</a>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
    }
}
