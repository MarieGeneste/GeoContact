/*
 * Gestion des actions diverses / générales sur l'ensemble des pages
 */

//Cache les blocs non utilisé automatiquement.
function OnlyOneVisible(actived) {
    let blocks = ['#add-dep', '#edit-dep', '#add-loc', '#edit-loc', '#add-contact', '#edit-contact'];
    for (i = 0; i < blocks.length; i++) {

        if (blocks[i] != actived) {
            $(blocks[i]).hide();
        } else {
            $(blocks[i]).show();
            $(blocks[i]).attr("tabindex", -1).focus();
        };
    };
};

$('.close-panel').on('click', function () {
    $(this).parent().parent().parent().parent().hide();
});


$('.add-dep-btn').on('click', function () {
    OnlyOneVisible('#add-dep');
});

$('.edit-dep-btn').on('click', function () {
    OnlyOneVisible('#edit-dep');
});

$('.add-loc-btn').on('click', function () {
    OnlyOneVisible('#add-loc');
});

$('.edit-loc-btn').on('click', function () {
    OnlyOneVisible('#edit-loc');
});

$('.add-contact-btn').on('click', function () {
    OnlyOneVisible('#add-contact');
});

$('.edit-contact-btn').on('click', function () {
    OnlyOneVisible('#edit-contact');
});


/**
 * Gestion des cookies
 */
$('#cookiesAccepted').click(function () {
    document.cookie = "cookiesChoosed=true; max-age=1578000";
    $('#cookies').hide();
});

$('#cookiesRefused').click(function () {
    document.cookie = "cookiesChoosed=true; max-age=1578000";
    $('#cookies').hide();
});


$(document).ready(function () {
    CheckCookieDisplayed();
});


function CheckCookieDisplayed() {
    var checkCookie = getCookie("cookiesChoosed");

    if (checkCookie == null) {
        $('#cookies').removeClass('d-none');
    }

}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    } else {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
}


/**
 * FORMULAIRES CONTACT
 */

// Lors de l'édition d'un département
$(".edit-contact-btn").click(function () {

    $(".contact-delete-btn").removeClass('d-none');
    $(".contact-delete-btn + button").text('Modifier');

    // Récupère toutes les données du département à éditer
    var contactId = $(this).find('#contact-id').val();
    var contactOrganisme = $(this).find('#contact-organisme').val();
    var contactNom = $(this).find('#contact-nom').val();
    var contactPrenom = $(this).find('#contact-prenom').val();
    var contactAdrNum = $(this).find('#contact-adr-num').val();
    var contactAdrBis = $(this).find('#contact-adr-bis').val();
    var contactAdrTypes = $(this).find('#contact-adr-types').val();
    var contactAdrVoie = $(this).find('#contact-adr-voie').val();
    var contactAdrLoc = $(this).find('#contact-adr-loc').val();
    var contactAdrCompl = $(this).find('#contact-adr-compl').val();
    var contactEmail = $(this).find('#contact-email').val();
    var contactTel = $(this).find('#contact-tel').val();
    var contactSite = $(this).find('#contact-site').val();
    var contactNote = $(this).find('#contact-note').val();

    // Insert l'action dans le formulaire
    $("form").attr("action", "User/contactUpdate")

    // Insert les données du dep à éditer dans le formulaire d'édition
    $("input[name=ctc-id-hidden]").val(contactId);
    $("input[name=ctc-organisme]").val(contactOrganisme);
    $("input[name=ctc-nom]").val(contactNom);
    $("input[name=ctc-prenom]").val(contactPrenom);
    $("input[name=ctc-adr-num]").val(contactAdrNum);
    $("select[name=ctc-adr-bis]").val(contactAdrBis);
    $("select[name=ctc-adr-type]").val(contactAdrTypes);
    $("input[name=ctc-adr-voie]").val(contactAdrVoie);
    $("select[name=ctc-adr-loc]").val(contactAdrLoc);
    $("input[name=ctc-adr-compl]").val(contactAdrCompl);
    $("input[name=ctc-email]").val(contactEmail);
    $("input[name=ctc-tel]").val(contactTel);
    $("input[name=ctc-site]").val(contactSite);
    $("textarea[name=ctc-note]").val(contactNote);

    // Fait apparaitre le formulaire d'édition
    $("#edit-contact").slideDown();
});

// Gestion de la suppression d'un contact
$('.contact-delete-btn').click(function () {
    // Insert l'action dans le formulaire
    $("form").attr("action", "User/contactDelete")
    $("button[type=submit]").text('Confirmer suppr ?');
    $("button[type=submit]").removeClass('btn-success');
    $("button[type=submit]").addClass('btn-warning');
});

// Ajoute http devant une URL si besoins
function checkURL (data) {
    var string = data.value;
    if (!~string.indexOf("http") && string.length >= 4) {
      string = "http://" + string;
    }
    data.value = string;
    return data
}