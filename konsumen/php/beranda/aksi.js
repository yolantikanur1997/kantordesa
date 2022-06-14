    var Isnew = true;
    lihat();

    var id_foto = null;


    function lihat()
    {
        $('#tblDashboardFoto').dataTable().fnDestroy();
        $.ajax({
            url : "php/dashboard_foto/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblDashboardFoto").dataTable({
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
                            "mData": "foto",
                            "render": function(mData, type, row, meta){
                                // return "<img src= \"/../fotosiswa" + mData + "\" height=\"50\"/>";
                                return '<img  height="50" src="../marketing/php/dashboard_foto/upload/' + mData + ' "/>';

                            }
                        },
                        {
                            "sTitle":"Opsi",
                            "mData": "id_foto",
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
    //         data : {id_foto:id},

    //         success:function(data){
    //             $("html, body").animate({scrollTop: 0}, "slow");
    //             Isnew = false
    //             id_foto = data.id_foto
    //             $('#no_hp').val(data.no_hp);
    //             $('#alamat').val(data.alamat);
    //             $('#deskripsi').val(data.deskripsi);
    //             // window.location= "beranda.php?id_foto=" + id_foto;
                
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
    //         data : {id_foto:id},

    //         success:function(data){
    //             $("html, body").animate({scrollTop: 0}, "slow");
    //             Isnew = false
    //             id_foto = data.id_foto
    //             window.location= "index2.php?id_foto=" + id_foto;
                
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
            content: 'Yakin ingin menghapus Data Dashboard Foto?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/dashboard_foto/hapus.php',
                        dataType : 'JSON',
                        data : {id_foto:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Dashboard Foto Terhapus');
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