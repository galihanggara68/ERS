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

// Logout
$('#logout').on('click', function(e){
    if(window.confirm('Apakah anda yakin ?') == false){
        return false;
    }
    return true;
});

$('#delete').on('click', function(e){
    if(window.confirm('Apakah anda yakin ?') == false){
        return false;
    }
    return true;
});

$('#mapel_id').on('click', function(){
    $.ajax({
        url: "api/siswa",
        type: "POST",
        dataType: "JSON",
        data: {'mapel_id':$(this).val()},
        success: function(data){
            $('#form-pilih').append(data);
        }
    });
});