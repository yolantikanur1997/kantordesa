    var Isnew = true;
    lihat();

    var id_rumah = null;

    function tambahInformasiRumah()
    {
        // alert("hi");
        if ($("#frmInformasiRumah").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/informasi_rumah/tambah.php';
                _data = $("#frmInformasiRumah").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/informasi_rumah/edit.php';
                _data = $("#frmInformasiRumah").serialize() + "& id_rumah="+id_rumah;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmInformasiRumah")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Informasi Rumah Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Informasi Rumah di Edit";

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
        $('#tblInformasiRumah').dataTable().fnDestroy();
        $.ajax({
            url : "php/informasi_rumah/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblInformasiRumah").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Tipe Rumah","mData": "tipe_rumah"},
                        {"sTitle": "Kode Fasilitas Umum","mData": "kode_fasilitas"},
                        {"sTitle": "Status","mData": "status"},
                        {
                            "sTitle":"Opsi",
                            "mData": "id_rumah",
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
            url : 'php/informasi_rumah/ambil.php',
            dataType : 'JSON',
            data : {id_rumah:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_rumah = data.id_rumah
                $('#tipe_rumah').val(data.id_tipe).trigger('change');
                $('#fasilitas').val(data.id_fasilitas_umum).trigger('change');
                $('#biaya_pemesanan_rumah').val(data.biaya_pemesanan_rumah);
                $('#biaya_uang_muka').val(data.biaya_uang_muka);
                $('#harga_jual').val(data.harga_jual);
                $('#plafon_kredit').val(data.plafon_kredit);
                $('#alamat').val(data.alamat_rumah);
                $('#blok_rumah').val(data.blok_rumah);
                $('#no_rumah').val(data.no_rumah);
                $('#status').val(data.status).trigger('change');
                
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
            content: 'Yakin ingin menghapus Data Informasi Rumah?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/informasi_rumah/hapus.php',
                        dataType : 'JSON',
                        data : {id_rumah:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Informasi Rumah Terhapus');
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