
<!-- FORM 02 -->
<div class="modal form02 fade" id="form02" tabindex="-1" role="dialog" aria-labelledby="form02Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form  method="POST" action="{$get.path}/publipostage/envoicourrierdepuisemail" id="formMail" role="form">
                    <!-- <label for="">label</label> -->
                    <div class="row">
                        <div class="col-lg-12 text-align-right">
                            <button class="btn btn-primary text-align-right" type="submit" onclick="
                                    event.preventDefault();
                                    if ($('#type_envoi').val() == 2) {
                                        var _variable = $('#variable_contenu').val().split('#');
                                        var variables_courriers = compteOccurence(_variable);
                                        var contenu = CKEDITOR.instances.contenu.getData();
                                        if (!checkVariablesExist(variables_courriers, contenu, '#')) {
                                            alert('Le courrier ne peut &ecirc;tre envoy&eacute; car vous avez modifi&eacute; les variables du mail. Seule la variable #liste_agence_a_vendre# peut &ecirc;tre modifi&eacute;e.');
                                            return;
                                        }
                                        if (contenu.length == 0) {
                                            alert('Le courrier ne peut &ecirc;tre envoy&eacute; car son contenu est vide.');
                                            return;
                                        }
                                    } else {
                                        if ($('#input-objet-courriel').val().length == 0) {
                                            alert('Le champ objet est obligatoire.');
                                            return;
                                        }
                                        if ($('#input-objet-message').val().length == 0) {
                                            alert('Le champ message est obligatoire.');
                                            return;
                                        }
                                    }
                                    $('#formMail').submit();
                                    "><i class="zmdi zmdi-email"></i>&nbsp;Envoyer le mail</button>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input name="email" id="input-email-courriel" class="form-control" rows="3" required readonly/>
                                <input name="id" hidden id="input-id-email-courriel"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Type d'envoi</label>
                                <select class="form-control" id="type_envoi" name="type_envoi" onchange='if ($(this).val() == 2) {
                                            $("#courrier-simple").hide();
                                            $("#input-objet-courriel").removeAttr("required");
                                            $("#input-objet-message").removeAttr("required");
                                            $("#id_courrier_type").attr("required", "required");
                                            $("#courrier-simple").hide();
                                            $("#courrier-type").show();
                                            loadDocument("{$get.path}/backend/_ajax.php?get&courrier_type_form&dequi=" + $("#dequi").val(), "id_courrier_type", "", "");
                                        } else {
                                            $("#courrier-simple").show();
                                            $("#courrier-type").hide();
                                            $("#id_courrier_type").removeAttr("required");
                                            $("#input-objet-courriel").attr("required", "required");
                                            $("#input-objet-message").attr("required", "required");
                                        }'>
                                    <option value="1">Envoi courrier simple</option>
                                    <option value="2">Envoi courrier type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" id='courrier-simple'>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input name="objet" id="input-objet-courriel" class="form-control" rows="3" required placeholder="Saisissez l'objet ..."/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="message" id="input-objet-message" class="form-control" rows="3" required="required" placeholder="Saisissez le message ..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" id='courrier-type' style="display: none;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <select class="form-control" id="id_courrier_type" name="id_courrier_type" onchange='if ($(this).val() != "") {
                                                    var valeur = $(this).val();
                                                    if (valeur != "") {
                                                        $("#textarea-hide-show").stop(true, true).delay(200).fadeIn(500);
                                                        $.ajax({
                                                            url: "/backend/_ajax.php",
                                                            type: "get",
                                                            data: "get&contenu_ckeditor&id=" + valeur,

                                                            success: function (data) {
                                                                var _json = JSON.parse(data)
                                                                if (CKEDITOR.instances.contenu) {
                                                                    CKEDITOR.instances.contenu.setData(_json[1])
                                                                }
                                                                $("#variable_contenu").val(_json[0])
                                                            }
                                                        });
                                                    }
                                                } else {
                                                    CKEDITOR.instances.contenu.setData();
                                                    $("#textarea-hide-show").stop(true, true).delay(200).fadeOut(500);
                                                }'>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="display: none;" id="textarea-hide-show">
                                    <div class="form-group">
                                        <input name="variable_contenu" id="variable_contenu" type="hidden"/>
                                        <textarea name="contenu" id="contenu" class="form-control contenu-ckeditor" rows="3" placeholder="Saisissez le message ..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type='hidden' name='dequi' id='dequi'/>
                    <button class="btn btn-primary" type="submit" onclick="
                            event.preventDefault();
                            if ($('#type_envoi').val() == 2) {
                                var _variable = $('#variable_contenu').val().split('#');
                                var variables_courriers = compteOccurence(_variable);
                                var contenu = CKEDITOR.instances.contenu.getData();
                                if (!checkVariablesExist(variables_courriers, contenu, '#')) {
                                    alert('Le courrier ne peut &ecirc;tre envoy&eacute; car vous avez modifi&eacute; les variables du mail. Seule la variable #liste_agence_a_vendre# peut &ecirc;tre modifi&eacute;e.');
                                    return;
                                }
                                if (contenu.length == 0) {
                                    alert('Le courrier ne peut &ecirc;tre envoy&eacute; car son contenu est vide.');
                                    return;
                                }
                            } else {
                                if ($('#input-objet-courriel').val().length == 0) {
                                    alert('Le champ objet est obligatoire.');
                                    return;
                                }
                                if ($('#input-objet-message').val().length == 0) {
                                    alert('Le champ message est obligatoire.');
                                    return;
                                }
                            }
                            $('#formMail').submit();
                            "><i class="zmdi zmdi-email"></i>&nbsp;Envoyer le mail</button>     
                </form>
            </div>
        </div>
    </div>
</div>
