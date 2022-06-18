    var Isnew = true;
    lihat();
    relasiPengguna();

    var id_berkas = null;


    function relasiPengguna()
    {
        $.ajax({
            type : 'GET',
            url : 'aksi/dataPengguna/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_pengguna').append($("<option>" , {
                        value: data[i].id_pengguna,
                        text:[data[i].nik,data[i].nama],
                    }));
                }

            }
        });


    }
    function tambahBerkas()
    {
        // alert("hi");
        if ($("#formBerkas").valid()) {
            var _url = '';
            var _data = '';
            var _method;

            if (Isnew == true)
            {

                const fileupload = $('#fileupload').prop('files')[0];

                let formData = new FormData();
                formData.append('id_pengguna', $('#id_pengguna').val());
                formData.append('jenis_berkas', $('#jenis_berkas').val());
                formData.append('fileupload', fileupload);

                 _url = 'aksi/dataBerkas/tambah.php';
                _data =  formData,
                _method = 'POST';

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
                    $("#formBerkas")[0].reset();

                    var msg;

        
                        msg = "Data Berkas Tersimpan";
    
                    
                
                  
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
        $('#tabelBerkas').dataTable().fnDestroy();
        $.ajax({
            url : "aksi/dataBerkas/lihat.php",
            type : "GET",
            dataType : 'JSON',

            success:function(data)
            {

                $("#tabelBerkas").dataTable({
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
                        {"sTitle": "Nama","mData": "nama"},
                        {"sTitle": "Jenis Berkas","mData": "jenis_berkas"},
                        
                        {
                            "sTitle":"Foto",
                            "mData": "nama_berkas",
                            "render": function(mData, type, row, meta){
                                // return "<img src= \"/../fotosiswa" + mData + "\" height=\"50\"/>";
                                return '<img  height="50" src="../admin/aksi/dataBerkas/gambar/' + mData + ' "/>';

                            }
                        },
                        {
                            "sTitle":"Opsi",
                            "mData": "id_berkas",
                            "render": function(mData, type, row, meta){
                                return'</button><button class="btn btn-xs btn-danger" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button>';
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
            url : 'aksi/dataBerkas/ambil.php',
            dataType : 'JSON',
            data : {id_berkas:id},

            success:function(data){
                $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_berkas = data.id_berkas
                $('#id_pengguna').val(data.id_pengguna).trigger("change");
                $('#jenis_berkas').val(data.jenis_berkas).trigger("change");         
                $('#fileupload').val(data.nama_berkas);
                // $('#frmKelas').modal('show');
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }

    //  function ambilFoto(id)
    // {
    //     $.ajax({
    //         type : 'POST',
    //         url : 'php/dashboard/ambil.php',
    //         dataType : 'JSON',
    //         data : {id_berkas:id},

    //         success:function(data){
    //             $("html, body").animate({scrollTop: 0}, "slow");
    //             Isnew = false
    //             id_berkas = data.id_berkas
    //             window.location= "index2.php?id_berkas=" + id_berkas;
                
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
            content: 'Yakin ingin menghapus Data Berkas?',
            theme: 'light',
            buttons: {

                Ya:function() {

                    $.ajax({
                        type : 'POST',
                        url : 'aksi/dataBerkas/hapus.php',
                        dataType : 'JSON',
                        data : {id_berkas:id},

                        success:function(data){
                            lihat();
                            $.alert('Data Berkas Terhapus');
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