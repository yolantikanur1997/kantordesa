    var Isnew = true;
    lihat();

    var id_tipe = null;

    function tambahTipeRumah()
    {
        // alert("hi");
        if ($("#frmTipeRumah").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/tipe_rumah/tambah.php';
                _data = $("#frmTipeRumah").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/tipe_rumah/edit.php';
                _data = $("#frmTipeRumah").serialize() + "& id_tipe="+id_tipe;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmTipeRumah")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Tipe Rumah Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Tipe Rumah di Edit";

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
        $('#tblTipeRumah').dataTable().fnDestroy();
        $.ajax({
            url : "php/tipe_rumah/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblTipeRumah").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Kode","mData": "kode_tipe_rumah"},
                        {"sTitle": "Tipe Rumah","mData": "tipe_rumah"},
                        {
                            "sTitle":"Opsi",
                            "mData": "id_tipe",
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
            url : 'php/tipe_rumah/ambil.php',
            dataType : 'JSON',
            data : {id_tipe:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_tipe = data.id_tipe
                $('#kode_tipe_rumah').val(data.kode_tipe_rumah);
                $('#tipe_rumah').val(data.tipe_rumah);
                $('#luas_tanah').val(data.luas_tanah);
                $('#luas_bangunan').val(data.luas_bangunan);
                $('#kamar_mandi').val(data.kamar_mandi);
                $('#kamar_tidur').val(data.kamar_tidur);
                $('#listrik').val(data.listrik);
                $('#sumur').val(data.sumur).trigger('change');
                $('#lantai').val(data.lantai);
                
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
            content: 'Yakin ingin menghapus Data Tipe Rumah?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/tipe_rumah/hapus.php',
                        dataType : 'JSON',
                        data : {id_tipe:id},

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