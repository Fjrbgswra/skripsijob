
// $('#myTabel').paginate({ limit: 3 });


$('#tambahKriteria').click(function(){
    let kode = $('#tambah_kode').val();
    let nama = $('#tambah_nama').val();
    let atribut = $('#tambah_atribut').val();
    let bobot = $('#tambah_bobot').val();

    $.post("./backend/tambah_kriteria.php", { kode : kode, nama : nama, atribut : atribut, bobot : bobot}, function(data, status){
        // alert("Data: " + data + "\nStatus: " + status);
        location.reload();
    });

});



updateKriteria = (id) => {
    axios.get('./backend/get_detail_kriteria.php', {
        params: {
          id: id
        }
    })
    .then(function (response) {
        console.log(response.data);
        let data = response.data;
        $('#update_kode').val(data.kode);
        $('#update_nama').val(data.nama);
        $('#update_atribut').val(data.atribut);
        $('#update_bobot').val(data.bobot);
        $('#update_id').val(data.id);
    })
    .then(function(response){
        $('#modalUpdate').modal('show');
    })
    .catch(function (error) {
        console.log(error);
    });
      
}



$('#updateKriteria').click(function(){
    let kode = $('#update_kode').val();
    let nama = $('#update_nama').val();
    let atribut = $('#update_atribut').val();
    let bobot = $('#update_bobot').val();
    let id = $('#update_id').val();

    $.post("./backend/update_kriteria.php", { id : id, kode : kode, nama : nama, atribut : atribut, bobot : bobot}, function(data, status){
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
            axios.post('./backend/delete_kriteria.php', {
                hello : id
            })
            .then(function (response) {
                console.log(response);
                axios.get('./backend/delete_kriteria.php', {
                    params: {
                      id: id
                    }
                })
                .then(function (response) {
                    console.log(response);
                    swal("Data Kriteria berhasil dihapus", {
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

