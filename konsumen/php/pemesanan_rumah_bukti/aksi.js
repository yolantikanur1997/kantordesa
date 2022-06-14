    var Isnew = true;
    lihat();

    var id_bukti_transfer = null;

    function tambahPemesananBukti()
    {
        // alert("hi");
        if ($("#frmPemesananBukti").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {

                const fileupload = $('#fileupload').prop('files')[0];

                let formData = new FormData();
                formData.append('id_pemesanan', $('#id_pemesanan').val());
                formData.append('fileupload', fileupload);

                 _url = 'php/pemesanan_rumah_bukti/tambah.php';
                _data =  formData,
                _method = 'POST';

            }
            else
            {
              alert("Ada kesalahan");
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                cache: false,
                processData: false,
                contentType: false,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmPemesananBukti")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Bukti Pemesanan Rumah Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Bukti Pemesanan Rumah di Edit";

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
        $('#tblPemesananBukti').dataTable().fnDestroy();
        $.ajax({
            url : "php/pemesanan_rumah_bukti/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblPemesananBukti").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Tanggal Upload","mData": "tgl_upload"},
                        
                        {
                            "sTitle":"Foto",
                            "mData": "foto_bukti_transfer",
                            "render": function(mData, type, row, meta){
                                // return "<img src= \"/../fotosiswa" + mData + "\" height=\"50\"/>";
                                return '<img  height="50" src="../konsumen/php/pemesanan_rumah_bukti/upload/' + mData + ' "/>';

                            }
                        },
                        {
                            "sTitle":"Opsi",
                            "mData": "id_bukti_transfer",
                            "render": function(mData, type, row, meta){
                                return'<button class="btn btn-xs btn-danger" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button>';
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
    //     function ambil(id)
    // {
    //     $.ajax({
    //         type : 'POST',
    //         url : 'php/dashboard/ambil.php',
    //         dataType : 'JSON',
    //         data : {id_bukti_transfer:id},

    //         success:function(data){
    //             $("html, body").animate({scrollTop: 0}, "slow");
    //             Isnew = false
    //             id_bukti_transfer = data.id_bukti_transfer
    //             $('#no_hp').val(data.no_hp);
    //             $('#alamat').val(data.alamat);
    //             $('#deskripsi').val(data.deskripsi);
    //             // window.location= "beranda.php?id_bukti_transfer=" + id_bukti_transfer;
                
    //             // $('#frmKelas').modal('show');
    //         },
    //         error:function(xhr, status, error){
    //             alert(xhr.responseText);
    //         }
    //     });

    // }

    //  function ambilFoto(id)
    // {
    //     $.ajax({
    //         type : 'POST',
    //         url : 'php/dashboard/ambil.php',
    //         dataType : 'JSON',
    //         data : {id_bukti_transfer:id},

    //         success:function(data){
    //             $("html, body").animate({scrollTop: 0}, "slow");
    //             Isnew = false
    //             id_bukti_transfer = data.id_bukti_transfer
    //             window.location= "index2.php?id_bukti_transfer=" + id_bukti_transfer;
                
    //             // $('#frmKelas').modal('show');
    //         },
    //         error:function(xhr, status, error){
    //             alert(xhr.responseText);
    //         }
    //     });

    // }

        function hapus(id)
    {
        $.confirm({

            theme: 'boostrap',
            content: 'Yakin ingin menghapus Bukti Transfer?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/pemesanan_rumah_bukti/hapus.php',
                        dataType : 'JSON',
                        data : {id_bukti_transfer:id},

                        success:function(data){
                            lihat();
                            $.alert('Bukti Transfer Terhapus');
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