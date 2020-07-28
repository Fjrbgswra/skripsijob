
kata2bobot = (kata) => {
    let bobot = 0
    if(kata == "Tidak Penting"){
        bobot = 0
    }else if(kata == "Netral"){
        bobot = 10
    }else{
        bobot = 20
    }
    return bobot
}

$('#simpan_kriteria').click(function(){
    let C1 = kata2bobot($('#c1').val());
    let C2 = kata2bobot($('#c2').val());
    let C3 = kata2bobot($('#c3').val());
    let C4 = kata2bobot($('#c4').val());
    let C5 = kata2bobot($('#c5').val());
    let C6 = kata2bobot($('#c6').val());
    let C7 = kata2bobot($('#c7').val());
    $.post("./backend/update_semua_kriteria.php", {C1 : C1, C2 : C2, C3 : C3, C4 : C4, C5 : C5, C6 : C6, C7 : C7}, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        swal("Kriteria / Bobot Kepentingan berhasil diperbarui", {
            icon: "success",
        }).then(function(response){
            location.reload();
        });
    });

});





