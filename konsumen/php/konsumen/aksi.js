    var Isnew = true;
    lihat();

    var id_konsumen = null;

    function tambahKonsumen()
    {
        // alert("hi");
        if ($("#frmKonsumen").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'konsumen/php/konsumen/tambah.php';
                _data = $("#frmKonsumen").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/konsumen/edit.php';
                _data = $("#frmKonsumen").serialize() + "& id_konsumen="+id_konsumen;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmKonsumen")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Konsumen Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Konsumen di Edit";

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
        $('#tblKonsumen').dataTable().fnDestroy();
        $.ajax({
            url : "php/konsumen/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblKonsumen").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "NIK","mData": "nik"},
                        {"sTitle": "Nama Konsumen","mData": "nama_konsumen"},


                        {
                            "sTitle":"Opsi",
                            "mData": "id_konsumen",
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
            url : 'php/konsumen/ambil.php',
            dataType : 'JSON',
            data : {id_konsumen:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_konsumen = data.id_konsumen
                $('#nik').val(data.nik);
                $('#nama').val(data.nama_konsumen);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#alamat').val(data.alamat);
                $('#no_hp').val(data.no_hp);
                $('#pekerjaan').val(data.pekerjaan);
                $('#alamat').val(data.alamat);
                $('#jenis_kelamin').val(data.jenis_kelamin).trigger('change');
                $('#email').val(data.email);
                $('#no_npwp').val(data.no_npwp);
                $('#password').prop("disabled",true);
                
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
            content: 'Yakin ingin menghapus Data Konsumen?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/konsumen/hapus.php',
                        dataType : 'JSON',
                        data : {id_konsumen:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Konsumen Terhapus');
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