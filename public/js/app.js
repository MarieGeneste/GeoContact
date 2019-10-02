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
    document.cookie = "cookiesAccepted=true; max-age=1578000";
    document.cookie = "cookiesRefused=false; max-age=1578000";
    $('#cookies').remove();
});

$('#cookiesRefused').click(function(){
    document.cookie = "cookiesAccepted=false; max-age=1578000";
    document.cookie = "cookiesRefused=true; max-age=1578000";
    $('#cookies').remove();
});