
$('#btn-reload').click(function(){
    window.location.replace("alternatif.php")
});



$('#tambahAlternatif').click(function(){
    let nama = $('#tambah_nama').val();
    let c1 = $('#tambah_c1').val();
    let c2 = $('#tambah_c2').val();
    let c3 = $('#tambah_c3').val();
    let c4 = $('#tambah_c4').val();
    let c5 = $('#tambah_c5').val();
    let c6 = $('#tambah_c6').val();
    let c7 = $('#tambah_c7').val();

    $.post("./backend/tambah_alternatif.php", {nama : nama, c1 : c1, c2 : c2, c3 : c3, c4 : c4, c5 : c5, c6 : c6, c7 : c7}, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        swal("Data Alternatif berhasil ditambahkan", {
            icon: "success",
        }).then(function(response){
            location.reload();
        });
    });

});



updateAlternatif = (id) => {
    axios.get('./backend/get_detail_alternatif.php', {
        params: {
          id: id
        }
    })
    .then(function (response) {
        console.log(response.data);
        let data = response.data;
        $('#update_id').val(data.id);
        $('#update_nama').val(data.nama);
        $('#update_c1').val(data.c1);
        $('#update_c2').val(data.c2);
        $('#update_c3').val(data.c3);
        $('#update_c4').val(data.c4);
        $('#update_c5').val(data.c5);
        $('#update_c6').val(data.c6);
        $('#update_c7').val(data.c7);
    })
    .then(function(response){
        $('#modalUpdate').modal('show');
    })
    .catch(function (error) {
        console.log(error);
    });
      
}



$('#updateAlternatif').click(function(){
    let id = $('#update_id').val();
    let nama = $('#update_nama').val();
    let c1 = $('#update_c1').val();
    let c2 = $('#update_c2').val();
    let c3 = $('#update_c3').val();
    let c4 = $('#update_c4').val();
    let c5 = $('#update_c5').val();
    let c6 = $('#update_c6').val();
    let c7 = $('#update_c7').val();

    $.post("./backend/update_alternatif.php", { id : id, nama : nama, c1 : c1, c2 : c2, c3 : c3, c4 : c4, c5 : c5, c6 : c6, c7 : c7}, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        swal("Data Kriteria berhasil diperbarui", {
            icon: "success",
        }).then(function(response){
            location.reload();
        });

    });

});



deleteKriteria = (id) => {
    swal({
        title: "Hapus Kriteria",
        text: "Apakah anda yakin akan menghapus data kriteria ini ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            axios.post('./backend/delete_alternatif.php', {
                hello : id
            })
            .then(function (response) {
                console.log(response);
                axios.get('./backend/delete_alternatif.php', {
                    params: {
                      id: id
                    }
                })
                .then(function (response) {
                    console.log(response);
                    swal("Data Alternatif berhasil dihapus", {
                        icon: "success",
                    }).then(function(response){
                        location.reload();
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
                
            })
            .catch(function (error) {
                console.log(error);
            });

            
        } 
    });
}

