    var Isnew = true;

    lihat();

    var id_uang_muka = null;

    function tambahUangMuka()
    {
        // alert("hi");
        if ($("#frmUangMuka").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {
                _url = 'php/uang_muka/tambah.php';
                _data = $("#frmUangMuka").serialize();
                _method = 'POST';

            }
            else
            {
                _url = 'php/uang_muka/edit.php';
                _data = $("#frmUangMuka").serialize() + "& id_uang_muka="+id_uang_muka;
                _method = 'POST';
            }
            $.ajax({
                type : _method,
                data : _data,
                url : _url,
                dataType : 'JSON',

                success : function(data){

                    lihat();
                    $("#frmUangMuka")[0].reset();

                    var msg;

                    if (Isnew)
                    {
                        msg = "Data Uang Muka Tersimpan";

                    }
                    else 
                    {
                        msg = "Data Uang Muka di Edit";

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
        $('#tblUangMuka').dataTable().fnDestroy();
        $.ajax({
            url : "php/uang_muka/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tblUangMuka").dataTable({
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
                        {"sTitle": "NIK","mData": "nik"},
                        {"sTitle": "Tanggal","mData": "tgl_uang_muka"},
                        {"sTitle": "Jumlah Uang Muka","mData": "jml_uang_muka"},
                        // {
                        //     "sTitle":"Bukti Transfer",
                        //     "mData": "foto_bukti_transfer",
                        //     "render": function(mData, type, row, meta){
                        //         // return "<img src= \"/../fotosiswa" + mData + "\" height=\"50\"/>";
                        //         return '<img  height="50" src="../konsumen/php/pemesanan_rumah_bukti/upload/' + mData + ' "/>';

                        //     }
                        // },
                                     


                        {
                            "sTitle":"Opsi",
                            "mData": "id_uang_muka",
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
            url : 'php/uang_muka/ambil.php',
            dataType : 'JSON',
            data : {id_uang_muka:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_uang_muka = data.id_uang_muka
                $('#id_pemesanan_rumah').val(data.id_pemesanan_rumah).trigger('change');
                $('#jml_uang_muka').val(data.jml_uang_muka);
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
            url : 'php/uang_muka/ambilDetail.php',
            dataType : 'JSON',
            data : {id_uang_muka:id},

            success:function(data){
                // $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_uang_muka = data.id_uang_muka      
                $('#nik').html(data.nik);   
                $('#nama_konsumen').html(data.nama_konsumen);            
                $('#no_rumah').html(data.no_rumah);             
                $('#tipe_rumah').html(data.tipe_rumah);                                         
                $('#jml_uang_pemesanan_rumah1').html(data.jml_uang_pemesanan_rumah);  
                $('#tgl_pesan_rumah').html(data.tgl_pesan_rumah);  
                $('#tenor').html(data.tenor);  
                $('#tgl_uang_muka').html(data.tgl_uang_muka);  
                $('#blok_rumah').html(data.blok_rumah);  
                $('#alamat_rumah').html(data.alamat_rumah);  
                $('#pengguna').html(data.nama);  
                $('#jml_uang_muka1').html(data.jml_uang_muka);  
                                                       
                $('#frmUangMukaRumahDetail').modal('show');
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
            url : 'php/uang_muka/ambil.php',
            dataType : 'JSON',
            data : {id_uang_muka:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_uang_muka = data.id_uang_muka
                window.location= "cetak/bukti_uang_muka.php?id_uang_muka=" + id_uang_muka;
                
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
            content: 'Yakin ingin Uang Muka?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'php/uang_muka/hapus.php',
                        dataType : 'JSON',
                        data : {id_uang_muka:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Uang Muka Terhapus');
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