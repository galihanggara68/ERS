function openNav(){
    document.getElementById('sideNav').style.width = "20%";
}

function closeNav(){
    document.getElementById('sideNav').style.width = "0";
}

$('#__addmapel').on('click', function(){
    var el = $('.mapel-group .row:last-of-type').clone();
    $('.mapel-group').append(el);
});

$('.mapel-group').on('click', '#__delmapel', function(){
    if($('.mapel-group .row').length == 1){
        return;
    }
    $(this).closest('.row').remove();
});