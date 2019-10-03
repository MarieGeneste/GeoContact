/*
* Gestion des actions diverses / générales sur l'ensemble des pages
*/


$('.add-dep-btn').on('click', function(){
    $('#add-dep').toggle();
});

$('.edit-dep-btn').on('click', function(){
    $('#edit-dep').toggle();
});

$('.add-loc-btn').on('click', function(){
    $('#add-loc').toggle();
});

$('.edit-loc-btn').on('click', function(){
    $('#edit-loc').toggle();
});

$('#cookiesAccepted').click(function(){
    document.cookie = "cookiesChoosed=true; max-age=1578000";
    $('#cookies').hide();
});

$('#cookiesRefused').click(function(){
    document.cookie = "cookiesChoosed=true; max-age=1578000";
    $('#cookies').hide();
});

// SI cookies existe alors on masque l'encart
$(document).ready(function(){
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
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
} 