    var Isnew = true;

    lihat();

    var id_konfirmasi = null;

    function tambahKonfirmasi()
    {
        // alert("hi");
        if ($("#frmKonfirmasi").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/konfirmasi/tambah.php';
                _data = $("#frmKonfirmasi").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/konfirmasi/edit.php';
                _data = $("#frmKonfirmasi").serialize() + "& id_konfirmasi="+id_konfirmasi;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmKonfirmasi")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Konfirmasi Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Konfirmasi di Edit";

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
        $('#tblKonfirmasi').dataTable().fnDestroy();
        $.ajax({
            url : "php/konfirmasi/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblKonfirmasi").dataTable({
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
                        {"sTitle": "Nama","mData": "nama_konsumen"},
                        {"sTitle": "Tanggal Konfirmasi","mData": "tanggal"},
                        {"sTitle": "Yang Mengkonfirmasi","mData": "nama"},
    
                                     


                        {
                            "sTitle":"Opsi",
                            "mData": "id_konfirmasi",
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
            url : 'php/konfirmasi/ambil.php',
            dataType : 'JSON',
            data : {id_konfirmasi:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_konfirmasi = data.id_konfirmasi
                $('#id_bukti_transfer').val(data.id_bukti_transfer).trigger('change');

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
            content: 'Yakin ingin menghapus Data Konfirmasi?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/konfirmasi/hapus.php',
                        dataType : 'JSON',
                        data : {id_konfirmasi:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Konfirmasi Terhapus');
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