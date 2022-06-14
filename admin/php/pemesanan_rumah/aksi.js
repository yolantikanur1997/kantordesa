    var Isnew = true;

    lihat();

    var id_pemesanan = null;

    function tambahPemesananRumah()
    {
        // alert("hi");
        if ($("#frmPemesanan").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/pemesanan_rumah/tambah.php';
                _data = $("#frmPemesanan").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/pemesanan_rumah/edit.php';
                _data = $("#frmPemesanan").serialize() + "& id_pemesanan="+id_pemesanan;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmPemesanan")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Pemesanan Rumah Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Pemesanan Rumah di Edit";

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
        $('#tblPemesananRumah').dataTable().fnDestroy();
        $.ajax({
            url : "php/pemesanan_rumah/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblPemesananRumah").dataTable({
                    "aaData" : data,
                    "scrollX": true, //scrol tabel
                    "aoColumns": [
                     {
                            "sTitle":"No",
                            "render": function(mData, type, row, meta){
                               return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {"sTitle": "Nama","mData": "nama_konsumen"},
                        {"sTitle": "Tanggal","mData": "tgl_pesan_rumah"},
                        {"sTitle": "Tipe Rumah","mData": "tipe_rumah"},
                        // {
                        //     "sTitle":"Bukti Transfer",
                        //     "mData": "foto_bukti_transfer",
                        //     "render": function(mData, type, row, meta){
                        //         // return "<img src= \"/../fotosiswa" + mData + "\" height=\"50\"/>";
                        //         return '<img  height="50" src="../konsumen/php/pemesanan_rumah_bukti/upload/' + mData + ' "/>';

                        //     }
                        // },
                        {"sTitle": "Status","mData": "status"},
                                     


                        {
                            "sTitle":"Opsi",
                            "mData": "id_pemesanan",
                            "render": function(mData, type, row, meta){
                                return'<button class="btn btn-xs btn-warning" title="Pilih" onclick="ambil('+ mData +')"><i class="fa fa-edit"></i></button>  <button class="btn btn-xs btn-danger" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button> <button class="btn btn-xs btn-info" title="Pilih" onclick="ambilDetail('+ mData +')"><i class="fa fa-eye"></i></button><button class="btn btn-xs btn-success" title="Cetak" onclick="cetakBukti('+ mData +')"><i class="fa fa-print"></i></button>';
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
            url : 'php/pemesanan_rumah/ambilEdit.php',
            dataType : 'JSON',
            data : {id_pemesanan:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_pemesanan = data.id_pemesanan
                $('#id_rumah').val(data.id_rumah).trigger('change');
                $('#tenor').val(data.tenor).trigger('change');
                $('#status').val(data.status).trigger('change');
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }
    
    function cetakBukti(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/pemesanan_rumah/ambilEdit.php',
            dataType : 'JSON',
            data : {id_pemesanan:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_pemesanan = data.id_pemesanan
                window.location= "cetak/bukti_pemesanan.php?id_pemesanan=" + id_pemesanan;
                
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }

     
function ambilDetail(id)
    {
        $.ajax({
            type : 'POST',
            url : 'php/pemesanan_rumah/ambilDetail.php',
            dataType : 'JSON',
            data : {id_pemesanan:id},

            success:function(data){
                // $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_pemesanan = data.id_pemesanan                   
                $('#tenor1').html(data.tenor);   
                $('#nik').html(data.nik);   
                $('#nama_konsumen').html(data.nama_konsumen);            
                $('#alamat_rumah').html(data.alamat_rumah);               
                $('#blok_rumah').html(data.blok_rumah);             
                $('#no_rumah').html(data.no_rumah);             
                $('#status').html(data.status);                          
                $('#tipe_rumah').html(data.tipe_rumah);                                         
                $('#jml_uang_pemesanan_rumah1').html(data.jml_uang_pemesanan_rumah);  
                $('#tgl_pesan_rumah').html(data.tgl_pesan_rumah);  
                $('#status1').html(data.status);  
                $('#foto_bukti_transfer').html('<img src="../konsumen/php/pemesanan_rumah_bukti/upload/'+data.foto_bukti_transfer+'" width="200px" height="200px"/>'); 
                                                       
                $('#frmPemesananRumahDetail').modal('show');
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
            content: 'Yakin ingin menghapus Data Pemesanan Rumah?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/pemesanan_rumah/hapus.php',
                        dataType : 'JSON',
                        data : {id_pemesanan:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Pemesanan Rumah Terhapus');
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