/*
* Gestion des actions diverses / générales sur l'ensemble des pages
*/

//Cache les blocs non utilisé automatiquement.
function OnlyOneVisible(actived)
{   
    let blocks = ['#add-dep','#edit-dep','#add-loc','#edit-loc'];
    for(i=0;i < blocks.length; i++)
    {

        if (blocks[i] != actived)
        {
            $(blocks[i]).hide();
        }
        else
        {
            $(blocks[i]).show();
        };
    };
};

$('.close-panel').on('click', function(){
    $(this).parent().parent().parent().parent().hide();
});


$('.add-dep-btn').on('click', function(){
    OnlyOneVisible('#add-dep');
});

$('.edit-dep-btn').on('click', function(){
    OnlyOneVisible('#edit-dep');
});

$('.add-loc-btn').on('click', function(){
    OnlyOneVisible('#add-loc');
});

$('.edit-loc-btn').on('click', function(){
    OnlyOneVisible('#edit-loc');
});

$('#cookiesAccepted').click(function(){
    document.cookie = "cookiesChoosed=true; max-age=1578000";
    $('#cookies').hide();
});

$('#cookiesRefused').click(function(){
    document.cookie = "cookiesChoosed=true; max-age=1578000";
    $('#cookies').hide();
});


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