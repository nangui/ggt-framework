<?php
/* Smarty version 3.1.32, created on 2019-05-08 01:19:28
  from 'C:\laragon\www\ggtframework\templates\frontend\v1\common\_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, [
  'version' => '3.1.32',
  'unifunc' => 'content_5cd22ea07c8697_95876899',
  'has_nocache_code' => false,
  'file_dependency' => [
    'f67cae1d7231983a2a1bfb8a6163eab3ff0f50cc' => [
      0 => 'C:\\laragon\\www\\ggtframework\\templates\\frontend\\v1\\common\\_footer.tpl',
      1 => 1552562464,
      2 => 'file',
    ],
  ],
  'includes' => [
  ],
], false)) {
    function content_5cd22ea07c8697_95876899(Smarty_Internal_Template $_smarty_tpl)
    {
        if ($_smarty_tpl->tpl_vars['get']->value['action'] != 'impression') {
            ?>
    <div class="sideOptions">
        <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/alertes" title="Alertes" data-option class="<?php if (isset($_smarty_tpl->tpl_vars['get']->value['action']) && $_smarty_tpl->tpl_vars['get']->value['action'] == 'alertes') {
                ?>--panier<?php
            } else {
                ?>--alertes<?php
            } ?>">
            <i data-icon class="zmdi zmdi-notifications"></i> <br>
            Alertes
        </a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/ma-selection" title="Panier" data-option class="<?php if (isset($_smarty_tpl->tpl_vars['get']->value['action']) && $_smarty_tpl->tpl_vars['get']->value['action'] == 'panier') {
                ?>--panier<?php
            } else {
                ?>--alertes<?php
            } ?>">
            <i data-icon class="zmdi zmdi-shopping-cart position-relative"><span class="counter badge badge-light"><?php if (isset($_smarty_tpl->tpl_vars['carat']->value['paniernb'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['paniernb'];
            } else {
                ?>0<?php
            } ?></span></i> <br>
            Panier
        </a>
    </div>
<?php
        } ?>

<?php if ($_smarty_tpl->tpl_vars['get']->value['action'] != 'impression') {
            ?>
    <section class="py-4 main_footer text-center" data-block-bg-is="blue-dark">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-2 mb-3 mb-lg-0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
" title="Aller à l'accueil">
                        <img src="<?php echo @constant('IMG_PATH_FE'); ?>
/logo/logo_carat_color.svg" alt="logo principal" title="Aller à l'accueil" class="logo">
                    </a>
                </div>
                <div class="col-lg-3">© 2019 - <?php echo @constant('SITE_NAME_COMPLET'); ?>
</div>
                <div class="col-lg-3 h6 mb-lg-0">
                    <?php if (isset($_smarty_tpl->tpl_vars['get']->value['rs']) && count($_smarty_tpl->tpl_vars['get']->value['rs']) > 0) {
                ?>
                        <ul class="list-inline list-unstyled mb-0 social-icons">
                            <li> Suivez nous sur : </li>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['get']->value['rs'], 'rs', false, 'cle');
                if ($_from !== null) {
                    foreach ($_from as $_smarty_tpl->tpl_vars['cle']->value => $_smarty_tpl->tpl_vars['rs']->value) {
                        ?>
                                <li class="px-lg-2"> <a href="<?php echo $_smarty_tpl->tpl_vars['rs']->value['lien']; ?>
" title="<?php echo $_smarty_tpl->tpl_vars['rs']->value['title']; ?>
" class="text-white" target="_blank"><i class="<?php echo $_smarty_tpl->tpl_vars['rs']->value['class']; ?>
"></i></a> </li>
                                    <?php
                    }
                }
                $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1); ?>
                        </ul>
                    <?php
            } else {
                ?>
                        &nbsp;
                    <?php
            } ?>
                </div>
                <div class="col-lg-2 h6 mb-lg-0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/nos-tarifs" title="Nos tarifs" class="text-white btn btn-outline-primary w-100">Nos tarifs</a>
                </div>
                <div class="col-lg-2 h6 mb-lg-0">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/mentions-legales" title="Mentions légales" data-btn>Mentions légales</a>
                </div>
            </div>
        </div>
    </section>
<?php
        } ?>

<?php if ($_smarty_tpl->tpl_vars['get']->value['action'] == 'details') {
            ?>
    <div class="remodal flyingForm" data-remodal-id="obtenir-rdv">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-6 col-md-6"><img src="<?php echo @constant('IMG_PATH_FE'); ?>
/arriere-plans/img-rdv.svg" alt="" class="formPic"></div>
            <div class="col-lg-6 col-md-6">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> OBTENIR<br> UN RENDEZ-VOUS </i>
                </div>
                <form action="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/obtenir-un-rendez-vous" method="POST" accept-charset="utf-8" class="row my-5 flat-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="nom" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['nom'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['nom'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="nameId" placeholder="Nom *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name='email' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['email'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['email'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="emailId" placeholder="Email *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="number" name='phone' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['phone'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['phone'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="telephoneId" placeholder="Telephone *" required='required'>
                        </div>
                    </div>
                    <!--div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name='pays' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['pays'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['pays'];
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="paysId" placeholder="Pays">
                        </div>
                    </div-->
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *"><?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['message'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrendezvous']['message'];
            } ?></textarea>
                    </div>
                    <div class="col-lg-12 text-left">
                        <small class="d-block mt-3">
                            <div class="form-group form-check bg-transparent">
                                <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                                <?php echo $_smarty_tpl->tpl_vars['carat']->value['commun_conditions_generales_utilisations']; ?>

                            </div>
                        </small>
                        <input type="hidden" name='id' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['bien']->id)) {
                echo $_smarty_tpl->tpl_vars['carat']->value['bien']->id;
            } ?>">
                        <button type='submit' class="mt-3 btn btn-primary w-100" data-flat-btn style="border:0;">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="remodal flyingForm" data-remodal-id="etre-appele-vite">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-6 col-md-6"><img src="<?php echo @constant('IMG_PATH_FE'); ?>
/arriere-plans/img-callme.svg" alt="" class="formPic"></div>
            <div class="col-lg-6 col-md-6">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> ÊTRE APPELÉ<br> AU PLUS VITE </i>
                </div>
                <form action="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/etre-appeler-au-plus-vite" method="POST" accept-charset="utf-8" class="row my-5 flat-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="nom" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['nom'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['nom'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="nameId" placeholder="Nom *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name='email' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['email'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['email'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="emailId" placeholder="Email *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="number" name='phone' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['phone'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['phone'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="telephoneId" placeholder="Telephone *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *"><?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['message'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionetreappeler']['message'];
            } ?></textarea>
                    </div>
                    <div class="col-lg-12 text-left">
                        <small class="d-block mt-3">
                            <div class="form-group form-check bg-transparent">
                                <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                                <?php echo $_smarty_tpl->tpl_vars['carat']->value['commun_conditions_generales_utilisations']; ?>

                            </div>

                        </small>
                        <input type="hidden" name='id' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['bien']->id)) {
                echo $_smarty_tpl->tpl_vars['carat']->value['bien']->id;
            } ?>">
                        <button type='submit' class="mt-3 btn btn-primary w-100" data-flat-btn style="border:0;">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="remodal flyingForm" data-remodal-id="recevoir-dossier">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-6 col-md-6"><img src="<?php echo @constant('IMG_PATH_FE'); ?>
/arriere-plans/img_dossier.svg" alt="" class="formPic"></div>
            <div class="col-lg-6 col-md-6">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> RECEVOIR LE<br> DOSSIER COMPLET </i>
                </div>
                <form action="<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/recevoir-dossier-complet" method="POST" accept-charset="utf-8" class="row my-5 flat-form">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="nom" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['nom'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['nom'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['nom'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="nameId" placeholder="Nom *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name='email' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['email'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['email'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['email'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="emailId" placeholder="Email *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="number" name='phone' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['phone'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['phone'];
            } else {
                if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'])) {
                    echo $_smarty_tpl->tpl_vars['carat']->value['sessionagentrecherche']['phone'];
                }
            } ?>" style="box-shadow: none;text-decoration: none;" class="form-control" id="telephoneId" placeholder="Telephone *" required='required'>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Saisissez votre message *"><?php if (isset($_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['message'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['sessionrecevoirdossiercomplet']['message'];
            } ?></textarea>
                    </div>
                    <div class="col-lg-12 text-left">
                        <small class="d-block mt-3">
                            <div class="form-group form-check bg-transparent">
                                <input type="checkbox" class="form-check-input" id="rgpgcheck" name="jaccepte" value='1' required="required">
                                <?php echo $_smarty_tpl->tpl_vars['carat']->value['commun_conditions_generales_utilisations']; ?>

                            </div>
                        </small>
                        <input type="hidden" name='id' value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['bien']->id)) {
                echo $_smarty_tpl->tpl_vars['carat']->value['bien']->id;
            } ?>">
                        <button type='submit' class="mt-3 btn btn-primary w-100" data-flat-btn style="border:0;">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="remodal flyingForm" data-remodal-id="shareOnSocials">
        <button data-remodal-action="close" class="remodal-close"></button>
        <ul class="list-inline list-unstyled">
            <li>
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lien; ?>
&t=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->champ20; ?>
" title="Partager sur Facebook" data-shareOnsocialsBtn data-facebook><i class="zmdi zmdi-facebook-box"></i></a>
            </li>
            <li>
                <a target="_blank" href="http://twitter.com/intent/tweet/?url=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lien; ?>
&text=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->champ20; ?>
&via=Carat Immobilier" title="Partager sur Twitter" data-shareOnsocialsBtn data-twitter><i class="zmdi zmdi-twitter"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lien; ?>
&title=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->champ20; ?>
" title="Partager sur Linkedin" data-shareOnsocialsBtn data-linkedin><i class="zmdi zmdi-linkedin"></i></a>
            </li>
            <li>
                <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lien; ?>
&media=<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['bien']->photo[0]['url'])) {
                echo $_smarty_tpl->tpl_vars['carat']->value['bien']->photo[0]['url'];
            } ?>&description=<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->champ20; ?>
" title="Partager sur Pintrest" data-shareOnsocialsBtn data-pintrest><i class="zmdi zmdi-pinterest-box"></i></a>
            </li>
        </ul>
    </ul>
</div>
<?php
        } ?>

<div class="remodal flyingForm --advancedSearch" data-remodal-id="plus-de-criteres--search">
    <button data-remodal-action="close" class="remodal-close"></button>
    <div class="row">
        <div class="col-lg-12">
            <div class="h3 section_heading title-font--light text-left text-white">
                <i> RECHERCHE <b>AVANCÉE</b> </i>
            </div>
            <form  action='<?php echo $_smarty_tpl->tpl_vars['get']->value['path']; ?>
/liste-proprietes' method='POST' accept-charset="utf-8" class="my-5">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_type_bien">Type de transaction</label>
                            <select class="form-control" name="id_type_transaction" id='id_type_transaction_plus_critere' onchange='document.getElementById("id_type_transaction").value = this.value;
                                    loadDoc2cibles("<?php echo @constant('HTTP_PATH'); ?>
/<?php echo $_smarty_tpl->tpl_vars['get']->value['app']; ?>
/_ajax.php?app=<?php echo $_smarty_tpl->tpl_vars['get']->value['app']; ?>
&module=<?php echo $_smarty_tpl->tpl_vars['get']->value['module']; ?>
&action=filtrerbudget&valeur=" + this.value, "budget_research", "budget_research_plus_criteres");'>
                                <option value="">:: Choisir une option ::</option>
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
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_type_bien">Type de bien</label>
                            <select class="form-control" name="id_type_bien" id='id_type_bien_plus_critere' onchange='document.getElementById("id_type_bien").value = this.value;'>
                                <option value="">:: Choisir une option ::</option>
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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="id_ville">Ville</label>
                            <select class="form-control" name='id_ville' id='id_ville_plus_critere' onchange='document.getElementById("id_ville").value = this.value;'>
                                <option value="">:: Choisir une option ::</option>
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
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Budget</label>
                            <select class="form-control" name='budget' id='budget_research_plus_criteres' onchange='document.getElementById("budget_research").value = this.value;'>
                                <option value="">:: Choisir une option ::</option>
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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Surface minimum en <?php echo $_smarty_tpl->tpl_vars['language']->value['commun_surface_signe']; ?>
</label>
                            <input type="number" name="champ16_min" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ16_min'])) {
            echo $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ16_min'];
        } ?>" class="form-control" placeholder="Surface minimum en <?php echo $_smarty_tpl->tpl_vars['language']->value['commun_surface_signe']; ?>
"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Surface maximum en <?php echo $_smarty_tpl->tpl_vars['language']->value['commun_surface_signe']; ?>
</label>
                            <input type="number" name="champ16_max" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ16_max'])) {
            echo $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ16_max'];
        } ?>" class="form-control" placeholder="Surface maximum en <?php echo $_smarty_tpl->tpl_vars['language']->value['commun_surface_signe']; ?>
"/>
                        </div>
                    </div>
                </div>
                <div class="row hide-when-commerce-change <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ4']) && ($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ4'] == 12)) {
            ?>hide<?php
        } ?>">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de pièces minimum</label>
                            <input type="number" name="champ18_min" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ18_min'])) {
            echo $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ18_min'];
        } ?>" class="form-control" placeholder="Nombre de pièces minimum"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de pièces maximum</label>
                            <input type="number" name="champ18_max" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ18_max'])) {
            echo $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ18_max'];
        } ?>" class="form-control" placeholder="Nombre de pièces maximum"/>
                        </div>
                    </div>
                </div>
                <div class="row hide-when-commerce-change-ch <?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ4']) && (!in_array($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ4'], [1, 7, 10]))) {
            ?>hide<?php
        } ?>">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de chambres minimum</label>
                            <input type="number" name="champ19_min" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ19_min'])) {
            echo $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ19_min'];
        } ?>" class="form-control" placeholder="Nombre de chambres maximum"/>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de chambres maximum</label>
                            <input type="number" name="champ19_max" value="<?php if (isset($_smarty_tpl->tpl_vars['carat']->value['searchf']['champ19_max'])) {
            echo $_smarty_tpl->tpl_vars['carat']->value['searchf']['champ19_max'];
        } ?>" class="form-control" placeholder="Nombre de chambres maximum"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 my-3 text-center">
                        <button type="submit" class="btn btn-primary mt-3 content-font--bold w-50" data-flat-btn style="border:0;"><i class="zmdi zmdi-mail-send"></i>&nbsp;&nbsp;Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['get']->value['action']) && $_smarty_tpl->tpl_vars['get']->value['action'] == 'alertes') {
            ?>
    <div class="remodal flyingForm --advancedSearch" data-remodal-id="modifier-alerte-info">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="row">
            <div class="col-lg-12">
                <div class="h3 section_heading title-font--light text-left text-white">
                    <i> MODIFIER <b>ALERTE</b> </i>
                </div>
                <?php $_smarty_tpl->_subTemplateRender(((string) $_smarty_tpl->tpl_vars['template']->value).'/modules/'.((string) $_smarty_tpl->tpl_vars['get']->value['module']).'/_inc_form_alerte.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, [], 0, true); ?>
            </div>
        </div>
    </div>
<?php
        } ?>

<!-- Notifications d'actions -->
<?php if (isset($_smarty_tpl->tpl_vars['succes']->value) && !empty($_smarty_tpl->tpl_vars['succes']->value)) {
            ?>
    <div class="alert alert-success alert-dismissible fade show vivify driveInRight" role="alert" data-alert-cstm>
        <strong><?php echo $_smarty_tpl->tpl_vars['succes']->value; ?>
</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
        } ?>

<?php if (isset($_smarty_tpl->tpl_vars['erreur']->value)) {
            ?>
    <div class="alert alert-danger alert-dismissible fade show vivify driveInRight" role="alert" data-alert-cstm>
        <strong><?php echo $_smarty_tpl->tpl_vars['erreur']->value; ?>
</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
        } ?>

<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="zmdi zmdi-chevron-up"></i></a>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/vendor/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/vendor/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/vendor/bootstrap.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/remodal/remodal.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/datatables/datatables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/datatables/dataTables.responsive.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/ajax.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    // ===== Scroll to Top ==== 
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function() {      // When arrow is clicked
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
<?php echo '</script'; ?>
>


    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('.is-dataTable').DataTable({
                language: {
                    processing: "Traitement en cours...",
                    search: "Rechercher&nbsp;:",
                    lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                    info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first: "Premier",
                        previous: "Pr&eacute;c&eacute;dent",
                        next: "Suivant",
                        last: "Dernier"
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        var snippet = [].slice.call(document.querySelectorAll('.hover'));
        if (snippet.length) {
            snippet.forEach(function (snippet) {
                snippet.addEventListener('mouseout', function (event) {
                    if (event.target.parentNode.tagName === 'figure') {
                        event.target.parentNode.classList.remove('hover')
                    } else {
                        event.target.parentNode.classList.remove('hover')
                    }
                });
            });
        }
    <?php echo '</script'; ?>
>


<?php if (isset($_smarty_tpl->tpl_vars['get']->value['action']) && ($_smarty_tpl->tpl_vars['get']->value['action'] == 'details')) {
            ?>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/map/leaflet.js"><?php echo '</script'; ?>
>

    
        <?php echo '<script'; ?>
 type="text/javascript">
            var mymap = L.map('ficheMap').setView([<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lat; ?>
, <?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lng; ?>
], 18);
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    maxZoom: 25,
                    id: 'mapbox.streets',
                    accessToken: 'your.mapbox.access.token'
                }).addTo(mymap);
                var content = "<h6><b><?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->champ20; ?>
</b><hr><br />A <?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->ville; ?>
 (<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->champ5; ?>
)</h6>";
                L.marker([<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lat; ?>
, <?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lng; ?>
]).addTo(mymap)
                            .bindPopup(content)
                            .openPopup();
                    var circle = L.circle([<?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lat; ?>
, <?php echo $_smarty_tpl->tpl_vars['carat']->value['bien']->lng; ?>
], {
                            color: 'red',
                            fillColor: '#f03',
                            fillOpacity: 0.5,
                            radius: 12
                        }).addTo(mymap);
        <?php echo '</script'; ?>
>
    
<?php
        } ?>

<?php if (isset($_smarty_tpl->tpl_vars['get']->value['action']) && $_smarty_tpl->tpl_vars['get']->value['action'] == 'alertes') {
            ?>
    
        <?php echo '<script'; ?>
 type="text/javascript">
            function modifyAlert(id) {
                $.ajax({
                    url: '/frontend/_ajax.php',
                    type: 'get',
                    data: 'app=frontend&module=carat&action=recuperationalerte&id=' + id,
                    success: function (data) {
                        var alerte = JSON.parse(data);
                        $.each(alerte, function (key, value) {
                            if (key === "rayon" && value !== "") {
                                $("#" + key + "_" + value + "_alerte").attr('checked', true);
                            } else if (key === "id_ville_bien") {
                                var vnext = '';
                                $.each(value, function (index, item) {
                                    vnext += '<li onclick="supp(this)" data-id=' + index + ' data-text=' + item + '><span class="zmdi zmdi-close-circle" title="Supprimer la ville."></span> ' + item + '</li>';

                                });
                                $("#villeschoisies").html(vnext);
                            } else if (key === "type" || key === "transaction") {
                                $("#" + key + "_alerte option[value='" + value + "']").attr('selected', true);
                            } else {
                                $("#" + key + "_alerte").val(value);
                            }
                        });
                    }
                });
            }
        <?php echo '</script'; ?>
>
    
<?php
        } ?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS_PATH_FE'); ?>
/cookies/cookie.notice.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    var defaults = {
        'messageLocales': {
            'it': 'Utilizziamo i cookie per essere sicuri che tu possa avere la migliore esperienza sul nostro sito. Se continui ad utilizzare questo sito assumiamo che tu ne sia felice.',
            'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.',
            'de': 'Wir verwenden Cookies, um sicherzustellen, dass Sie das beste Erlebnis auf unserer Website haben können. Indem Sie unsere Dienste stimmen Sie der Verwendung in Übereinstimmung mit unseren Cookies Richtlinien.',
            'fr': 'Nous utilisons des cookies afin d\'être sûr que vous pouvez avoir la meilleure expérience sur notre site. Si vous continuez à utiliser ce site, nous supposons que vous acceptez.'
        },
        'buttonLocales': {
            'en': 'Ok'
        },
        'cookieNoticePosition': 'bottom',
        'learnMoreLinkEnabled': false,
        'learnMoreLinkHref': '/cookie-banner-information.html',
        'learnMoreLinkText': {
            'it': 'Saperne di più',
            'en': 'Learn more',
            'de': 'Mehr erfahren',
            'fr': 'En savoir plus'
        },
        'buttonLocales': {
            'en': 'Ok'
        },
        'expiresIn': 30,
        'buttonBgColor': '#d35400',
        'buttonTextColor': '#fff',
        'noticeBgColor': '#000',
        'noticeTextColor': '#fff',
        'linkColor': '#009fdd'
    };
<?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
        $(document).ready(function () {
            $('.slick-button-go-one').click(function () {
                $.ajax({
                    url: '/frontend/_ajax.php',
                    type: 'get',
                    data: 'app=frontend&module=carat&action=emptyallsearchsession',
                    success: function () {
                        location.reload();
                    }
                });
            });
            $('#id_type_bien_plus_critere, #id_type_bien').change(function () {
                if ($(this).val() === "1" || $(this).val() === "7" || $(this).val() === "10") {
                    $('.hide-when-commerce-change-ch').removeClass('hide');
                } else {
                    $('.hide-when-commerce-change-ch').addClass('hide');
                }

                if ($(this).val() === "12") {
                    $('.hide-when-commerce-change').addClass('hide');
                } else {
                    $('.hide-when-commerce-change').removeClass('hide');
                }
            });

            $('.id-bien-panier-a-envoyer').click(function () {

                var todo;

                if ($(this).prop('checked')) {
                    todo = 1;
                } else {
                    todo = -1;
                }

                var id = $(this).attr('data-id');

                $.ajax({
                    url: '/frontend/_ajax.php',
                    type: 'get',
                    data: 'app=frontend&module=carat&action=sendfrompanier&todo=' + todo + '&id=' + id,
                    success: function () {
                    }
                });
            });
        });
    <?php echo '</script'; ?>
>

</body>
</html>
<?php
    }
}
