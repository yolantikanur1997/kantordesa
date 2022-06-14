    var Isnew = true;
    lihat();

    var id_fasilitas_umum = null;

    function tambahFasilitasRumah()
    {
        // alert("hi");
        if ($("#frmFasilitas").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/fasilitas_umum/tambah.php';
                _data = $("#frmFasilitas").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/fasilitas_umum/edit.php';
                _data = $("#frmFasilitas").serialize() + "& id_fasilitas_umum="+id_fasilitas_umum;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmFasilitas")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Fasilitas Umum Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Fasilitas Umum di Edit";

                    }
                    $.alert({
                        title: 'Sukses',
                        content: msg,
                        type: 'GREEN',
                        boxWidth: '400px',
                        theme: 'light',
                        useBootstrap: false,
                        autoClose: 'ok|2000'


                    });
                },
                error: function(xhr, status, error){
                    alert(xhr);
                    console.log(xhr.responseText);

                    $.alert({
                        title: 'Gagal',
                        content: 'Ada kesalahan! coba lagi',
                        type: 'red',
                        autoClose: 'ok|2000'
                    });
                    $('#save').prop('disabled',false);
                    $('#save').html('');
                    $('#save').append('Simpan');

                }
            });
        }
    }
    function lihat()
    {
        $('#tblFasilitas').dataTable().fnDestroy();
        $.ajax({
            url : "php/fasilitas_umum/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblFasilitas").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Kode","mData": "kode_fasilitas"},
                        {"sTitle": "Luas Jalan","mData": "luas_jalan"},
                        {"sTitle": "Fasilitas Umum Terdekat","mData": "fasilitas_umum_terdekat"},
                        {
                            "sTitle":"Opsi",
                            "mData": "id_fasilitas_umum",
                            "render": function(mData, type, row, meta){
                                return'<button class="btn btn-xs btn-warning" title="Pilih" onclick="ambil('+ mData +')"><i class="fa fa-edit"></i></button>  <button class="btn btn-xs btn-danger" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button>';
                            }
                      
                        }
                    ]
                });

            },
            error: function(xhr)
            {
                console.log('Request Status: ' + xhr.status);
                console.log('Status Text: ' + xhr.statusText);
                console.log(xhr. responsetext);
                var text = $($.parseHTML(xhr.responsetext)).filter('.trace-message').text();

            }


        });

    }
        function ambil(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/fasilitas_umum/ambil.php',
            dataType : 'JSON',
            data : {id_fasilitas_umum:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_fasilitas_umum = data.id_fasilitas_umum
                $('#kode_fasilitas').val(data.kode_fasilitas);
                $('#luas_jalan').val(data.luas_jalan);
                $('#fasilitas_umum_terdekat').val(data.fasilitas_umum_terdekat);
               
                
                // $('#frmKelas').modal('show');
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }

        function hapus(id)
    {
        $.confirm({

            theme: 'boostrap',
            content: 'Yakin ingin menghapus Data Fasilitas Rumah?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/fasilitas_umum/hapus.php',
                        dataType : 'JSON',
                        data : {id_fasilitas_umum:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Tipe Rumah Terhapus');
                        },
                        error:function(xhr, status, error){
                            alert(xhr.responseText);
                        }
                    });
                },
                Tidak: function () {
                    $.alert('Dibatalkan!');
                },

            }
        });
    }