    var Isnew = true;
    lihat();

    var id_rumah = null;

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
                                return'<button class="btn btn-xs btn-outline-success" title="Pilih" onclick="ambil('+ mData +')"><i class="fa fa-eye"></i></button>';
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
                // $("html, body").animate({scrollTop: 0}, "slow");
                Isnew = false
                id_rumah = data.id_rumah  
                $('#id_rumahh').html(data.id_rumahh);   
                $('#biaya_pemesanan_rumah').html(data.biaya_pemesanan_rumah);             
                $('#biaya_uang_muka').html(data.biaya_uang_muka);             
                $('#harga_jual').html(data.harga_jual);             
                $('#alamat_rumah').html(data.alamat_rumah);             
                $('#blok_rumah').html(data.blok_rumah);             
                $('#no_rumah').html(data.no_rumah);             
                $('#status').html(data.status);                          
                $('#tipe_rumah').html(data.tipe_rumah);                      
                $('#luas_tanah').html(data.luas_tanah);             
                $('#luas_bangunan').html(data.luas_bangunan);             
                $('#kamar_mandi').html(data.kamar_mandi);             
                $('#kamar_tidur').html(data.kamar_tidur);             
                $('#listrik').html(data.listrik);             
                $('#sumur').html(data.sumur);             
                $('#lantai').html(data.lantai);             
                $('#luas_jalan').html(data.luas_jalan);             
                $('#fasilitas_umum_terdekat').html(data.fasilitas_umum_terdekat);                     
                $('#frmInformasiRumahDetail').modal('show');
            },
            error:function(xhr, status, error){
                alert(xhr.responseText);
            }
        });

    }

