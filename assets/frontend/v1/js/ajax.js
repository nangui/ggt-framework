/* fonctions utilisées. */

function getXhr() {
    var xhr = null;
    if (window.XMLHttpRequest) // Firefox et autres
        xhr = new XMLHttpRequest();
    else if (window.ActiveXObject) { // Internet Explorer
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    } else { // XMLHttpRequest non supporté par le navigateur
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
        xhr = false;
    }
    return xhr
}

/**
 *Cette fonction charge un document dans une div, si cadreCible est renseigné.
 */
function loadDataTable(url, classTable, classTbody) {
    var xhr = getXhr()
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function () {
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if (xhr.readyState == 4) {
            resultat = xhr.responseText;
            $("." + classTable).dataTable();
            $("." + classTbody).html(resultat);
        }
    };
    //contre le cache
    url = traiteUrl(url);
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
}

function loadDataTableWithForm(url, classTable, classTbody, idForm, avider) {
    var xhr = getXhr()
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function () {
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if (xhr.readyState == 4) {
            resultat = xhr.responseText;

            if (resultat != -2) {
                $('.' + classTable).dataTable();
                $('.' + classTbody).html(resultat);
                if (avider != '') {
                    $('#' + avider).find("input").val("");
                    $('#' + avider).find("select").val("");
                }
            } else {
                alert("Cet enregistrement existe déjà.");
            }
        }
    };

    var chainePost = "";
    var nbElts = -1;
    if (document.getElementById(idForm)) {
        elts = document.getElementById(idForm).elements;
        nbElts = elts.length;
    }
    for (var i = 0; i < nbElts; i++) {
        var identifiant = elts[i].id;
        var nom = elts[i].name;
        var valeur = elts[i].value;
        //pour remplacer ' en \'
        valeur = valeur.replace(/\'/g, "\\\'");
        //pour remplacer " en \"
        valeur = valeur.replace(/\"/g, "\\\"");
        //if ((identifiant) && (valeur != "")) {
        if (identifiant) {
            if (chainePost != "")
                chainePost += "&" + nom + "=" + valeur;
            else
                chainePost += nom + "=" + valeur;
        }
    }
    //contre le cache
    url = traiteUrl(url);
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(chainePost);
}

/**
 *Cette fonction charge un document dans une div, si cadreCible est renseigné.
 */
function loadDocument(url, cadreCible, reload = '', loader = '', datepickerreload = "") {
    var xhr = getXhr()
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function () {
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if (xhr.readyState == 4) {
            resultat = xhr.responseText;
            console.log(resultat)
            if (reload == 'oui') {
                document.location.reload();
            }
            if (reload == 'redirect') {
                var url = window.location.href;
                var array_url = url.split('?');
                $(location).attr("href", array_url[0]);
            }
            if (cadreCible != '') {
                document.getElementById(cadreCible).innerHTML = resultat;

                if (datepickerreload == 'oui') {
                    $(".datetime-francais-reload").datetimepicker({
                        format: 'dd-mm-yyyy',
                        minView: 2,
                        maxView: 4,
                        language: 'fr',
                        autoclose: true,
                        ignoreReadonly: true,
                        toolbarPlacement: 'top',
                        showClose: true,
                        showClear: true,
                        showTodayButton: true,
                        icons: {
                            time: 'glyphicon glyphicon-time',
                            clear: 'glyphicon glyphicon-trash',
                            close: 'glyphicon glyphicon-remove',
                            up: 'glyphicon glyphicon-chevron-up',
                            date: 'glyphicon glyphicon-calendar',
                            today: 'glyphicon glyphicon-screenshot',
                            down: 'glyphicon glyphicon-chevron-down',
                            next: 'glyphicon glyphicon-chevron-right',
                            previous: 'glyphicon glyphicon-chevron-left'
                        }
                    });
                }

            }
        }
    }

    if (loader == 'oui') {

        document.getElementById("ajax-loader").className = 'affdiv';
    }
//contre le cache
    url = traiteUrl(url);
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
}


function loadDoc2cibles(url, cadreCible1, cadreCible2) {

    var xhr = getXhr()

    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function () {
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if (xhr.readyState == 4) {
            resultat = xhr.responseText;
            document.getElementById(cadreCible1).innerHTML = resultat;
            document.getElementById(cadreCible2).innerHTML = resultat;
        }
    }

    url = traiteUrl(url);
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
}
/**
 *Cette fonction charge un document dans un input, si cadreCible est renseigné.
 */
function loadDocumentValue(url, cadreCible) {
    var xhr = getXhr()
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function () {
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if (xhr.readyState == 4) {
            resultat = xhr.responseText;
            if (cadreCible != '') {
                document.getElementById(cadreCible).value = resultat;
            }
        }
    }

    //contre le cache
    url = traiteUrl(url);
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send();
}

/**
 * Cette fontion post le json (data) vers une url donnée
 * xhr de type Content-Type => application/json
 */
function postDataJson(url, data) {
    var xhr = getXhr();
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhr.send(JSON.stringify(data));
    return xhr;
}

function cocheOuDecocheTout(id) {
    $('input:checkbox').prop('checked', id.checked);
}

function cocheOuDecocheTout2(id, classe) {
    $('.' + classe + ' input:checkbox').prop('checked', id.checked);
}

function sontCoches(classe = '') {
    var id = [];
    selecteur = (classe === '') ? '' : '.' + classe + ' ';
    $(selecteur + 'input[type="checkbox"]:checked').each(function (i, v) {
        if ($(v).val() != "[ Selectionner tout ]") {
            id.push($(v).val());
        }
    });
    return id;
}

/* fonctions non utilisées. */

/**
 *  Cette fonction permet de faire un submit avec ajax
 *  Elle fait le meme travail que ajaxSubmit et ajaxSave
 *  Donc il faut supprimer ces deux fonctions
 *  Elle recolte tous les champs se trouvant dans le form et les envoie au
 *  controller passer au param url
 *
 */
function ajaxSubmit(url, formId, cadreCible) {
    var xhr = getXhr()
    // On défini ce qu'on va faire quand on aura la réponse
    xhr.onreadystatechange = function () {
        // On ne fait quelque chose que si on a tout reçu et que le serveur est ok
        if (xhr.readyState == 4) {
            resultat = xhr.responseText;
            document.getElementById(cadreCible).innerHTML = resultat;
        }
    }
    var chainePost = "";
    var nbElts = -1;
    if (document.getElementById(formId)) {
        elts = document.getElementById(formId).elements;
        nbElts = elts.length;
    }
    for (var i = 0; i < nbElts; i++) {
        var identifiant = elts[i].id;
        var nom = elts[i].name;
        var valeur = elts[i].value;
        //pour remplacer ' en \'
        valeur = valeur.replace(/\'/g, "\\\'");
        //pour remplacer " en \"
        valeur = valeur.replace(/\"/g, "\\\"");
        if ((identifiant) && (valeur != "")) {
            if (chainePost != "")
                chainePost += "&" + nom + "=" + valeur;
            else
                chainePost += nom + "=" + valeur;
        }
    }

    /*à changer si possible pour eviter de fixer le nom de l'id, utilisé seulement si on a un multiselect qui se nomme correspondance*/
    if ((document.getElementById("correspondance")) && (document.getElementById("correspondance").options.length > 1)) {
        var selectBox = document.getElementById("correspondance");
        var j = 0;
        for (var i = 0; i < selectBox.options.length; i++) {
            if ((selectBox.options[i].selected)) {
                chainePost += "&type_" + j + "=" + selectBox.options[i].value;
                j++;
            }
        }
        chainePost += "&taille=" + j;
    }

//contre le cache
    url = traiteUrl(url);
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(chainePost);
}

function traiteUrl(url) {
    var caractere = url.substr((url.length - 3), 3);
    var d = new Date();
    var maj = d.getYear() + "ie" + d.getMonth() + "t" + d.getDate() + "r" + d.getHours() + "i" + d.getMinutes() + "c" + d.getSeconds() + "k" + d.getMilliseconds();
    if (caractere == "php")
        url += "?maj=" + maj;
    else
        url += "&maj=" + maj;
    return url;
}

function setNull(cadreCible) {
    if (document.getElementById(cadreCible)) {
        document.getElementById(cadreCible).innerHTML = null;
    }
}

function setValeur(cadreCible, valeur1, valeur2) {
    if (document.getElementById(cadreCible)) {
        if (document.getElementById(cadreCible).value == valeur1)
            document.getElementById(cadreCible).value = valeur2;
        else
            document.getElementById(cadreCible).value = valeur1;
    }
}

function changeDisplay(idcadre) {
    if (document.getElementById(idcadre).style.display == "none")
    {
        document.getElementById(idcadre).style.display = "block";
    } else {
        document.getElementById(idcadre).style.display = "none";
    }
}
function sendInfoChecked(url, cadreCible, prefixe_champ, taille) {
    var xhr = getXhr();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            resultat = xhr.responseText;
            document.getElementById(cadreCible).innerHTML = resultat;
        }
    }

    var chainePost = "";
    var compteur = 0;
    for (var j = 0; j < taille; j++) {
        if (document.getElementById(prefixe_champ + j).checked == true) {
            var valeur = document.getElementById(prefixe_champ + j).value;
            if (chainePost != "")
                chainePost += "&" + prefixe_champ + compteur + "=" + valeur;
            else
                chainePost += prefixe_champ + compteur + "=" + valeur;
            compteur++;
        }
    }

    chainePost += "&taille_resultat=" + compteur + "&taille_liste=" + taille;
//contre le cache
    url = traiteUrl(url);
    xhr.open("POST", url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(chainePost);
}

/**
 * Redirection 
 */
function redirection(url, traite = '', blank = '') {
//contre le cache
    if (traite == 1) {
        url = traiteUrl(url);
    }

    if (blank === 1) {
        window.open(url, "_blank");
    } else {
        document.location = url;
}
}

/**
 * Redirection lors d'un click un row d'une dataGrid (verification si présence url)
 */
$('.datatableGrid, .datatableGridModal').on('click', 'tbody tr', function () {
    var url = $($(this)[0]).data('href');
    if (url) {
        window.location.href = $(this).data('href');
    }
});

/**
 * Afficher le détail_row d'un row d'une table
 */
$('.show-details-btn').on('click', function (e) {
    e.preventDefault();
    $(e.target.parentElement).closest('tr').next().toggleClass('open');
    $(e.target.parentElement).find('.zmdi').toggleClass('zmdi-long-arrow-down').toggleClass('zmdi-long-arrow-up');
});

/**
 * Supprime les valeurs dupliquer dans un array
 */
function arrayDeleteDuplicateVal(arr) {
    return arr.filter(function (item, pos) {
        return arr.indexOf(item) == pos;
    });
}

/**
 * Supprime les valeurs null et vide dans un tableau
 */
function cleanArray(arr) {
    return arr.filter(function (item, pos) {
        return (item != '' && item);
    });
}

/**
 * Retorune le nieme index d'une pattern 'pat' dans une chaine de caractère 'str'
 * @param {*} str chaine de caractere
 * @param {*} pat pattern
 * @param {*} n la nième position du pattern à rechercher
 */
function nthIndex(str, pat, n) {
    var L = str.length, i = 0;
    while (n > 0 && i < L) {
        n--;
        i = str.indexOf(pat, i);
        if (i < 0)
            break;
        i++;
    }
    return i;
}

function addToSelection(id, replace = '', imgp = '') {
    if (id.length === 0) {
        return;
    }
    $.ajax({
        url: '/frontend/_ajax.php',
        type: 'get',
        data: 'app=frontend&module=carat&action=ajouteraupanier&id=' + id,
        success: function (data) {
            if (data == 1) {
                var content = '<div class="alert alert-success alert-dismissible fade show vivify driveInRight hideit" role="alert" data-alert-cstm>' +
                        '<strong>Le bien a été ajouté dans votre panier avec succès.</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';
                if (replace == 'li') {
                    var permute = '<li><a onclick=\'deleteFromSelection("' + id + '", "li", "' + imgp + '");\' class="cursor-pointer" title="Retirer des favoris"><img data-icon src="' + imgp + '/icons/icons8-favorite_chat.png" alt=""></a></li>';
                } else {
                    var permute = '<a onclick=\'deleteFromSelection("' + id + '");\' title="Supprimer de la selection" class="h5 cursor-pointer"><i class="zmdi zmdi-check text-secondary"></i>&nbsp; EST DANS VOTRE SÉLECTION</a>';
                }
                $("#mypaniercare_" + id).html(permute);
                $(".counter").text(parseInt($(".counter").text()) + 1);
            } else {
                if (data == -6) {
                    //var message = 'Vous devez d\'abord ajouter votre adresse e-mail.';
                    window.location.replace("/ma-selection");
                    return;
                } else {
                    var message = 'Ce bien existe déjà dans votre panier.';
                }
                var content = '<div class="alert alert-danger alert-dismissible fade show vivify driveInRight hideit" role="alert" data-alert-cstm>' +
                        '<strong>' + message + '</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';
            }

            $("body").append(content);
        }
    });
}

function deleteFromSelection(id, replace = '', imgp = '', remove = '') {
    if (id.length === 0) {
        return;
    }
    $.ajax({
        url: '/frontend/_ajax.php',
        type: 'get',
        data: 'app=frontend&module=carat&action=supprimerdupanier&id=' + id,
        success: function (data) {
            if (data == 1) {

                var content = '<div class="alert alert-success alert-dismissible fade show vivify driveInRight hideit" role="alert" data-alert-cstm>' +
                        '<strong>Le bien a été supprimé de votre panier avec succès.</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';

                if (remove == 'remove') {
                    $(".bien-panier-" + id).remove();
                } else {

                    if (replace == 'li') {
                        var permute = '<li><a onclick=\'addToSelection("' + id + '", "li", "' + imgp + '");\' class="cursor-pointer" title="Ajouter aux favoris"><img data-icon src="' + imgp + '/icons/icons8-popular_topic.png" alt=""></a></li>';
                    } else {
                        var permute = '<a onclick=\'addToSelection("' + id + '");\' title="Ajouter à la selection" class="h5 cursor-pointer"><i class="zmdi zmdi-plus-circle-o text-secondary"></i>&nbsp; AJOUTER A MA SÉLECTION</a>';
                    }
                    $("#mypaniercare_" + id).html(permute);
                }
                $(".counter").text(parseInt($(".counter").text()) - 1);
            } else {

                var message = 'Erreur lors de la suppression. Veuillez réessayer.';

                var content = '<div class="alert alert-danger alert-dismissible fade show vivify driveInRight hideit" role="alert" data-alert-cstm>' +
                        '<strong>' + message + '</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                        '</div>';
            }

            $("body").append(content);

        }
    });
}

function supp(selecteur) {
    $.ajax({
        type: "GET",
        url: "/frontend/_ajax.php",
        data: 'app=frontend&module=carat&action=autocompletesuppvillebien&ville=' + $(selecteur).attr("data-id"),
        success: function (data) {
            if (data == 1) {
                $(selecteur).hide();

            }
        }
    });
}