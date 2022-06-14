$(document).ready(function () {
    relasiTipeRumah();
    relasiFasilitasRumah();
    relasiInformasiRumah();
    ambilKode();
    relasiKonsumen();
    relasiUangMuka();
    ambilKodeUangMuka();
    relasiBuktiTransfer();
    relasiAkun();


});

function relasiTipeRumah()
    {
        $.ajax({
            type : 'GET',
            url : 'php/tipe_rumah/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#tipe_rumah').append($("<option>" , {
                        value: data[i].id_tipe,
                        text:[data[i].kode_tipe_rumah,data[i].tipe_rumah],
                    }));
                }

            }
        });


    }

    function relasiFasilitasRumah()
    {
        $.ajax({
            type : 'GET',
            url : 'php/fasilitas_umum/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#fasilitas').append($("<option>" , {
                        value: data[i].id_fasilitas_umum,
                        text:data[i].kode_fasilitas
                    }));
                }

            }
        });


    }
        function relasiInformasiRumah()
    {
        $.ajax({
            type : 'GET',
            url : 'php/informasi_rumah/lihatRelasi.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_rumah').append($("<option>" , {
                        value: data[i].id_rumah,
                        text: [data[i].tipe_rumah,data[i].no_rumah,data[i].blok_rumah]
                    }));
                }

            }
        });


    }

 function ambilKode()
  {
    $("#id_rumah").change(function(t){

      $.ajax({
        type : "POST",
        url : 'php/pemesanan_rumah/ambil.php',
        dataType : "JSON",
        data : {id_rumah:$("#id_rumah").val()},

        success:function(data)
        {
          console.log(data);
          $("#jml_uang_pemesanan_rumah").val(data[0].biaya_pemesanan_rumah);

        },
        error:function()
        {

        }
      });

    });
  }
   function ambilKodeUangMuka()
  {
    $("#id_pemesanan_rumah").change(function(t){

      $.ajax({
        type : "POST",
        url : 'php/uang_muka/ambilKode.php',
        dataType : "JSON",
        data : {id_pemesanan:$("#id_pemesanan_rumah").val()},

        success:function(data)
        {
          console.log(data);
          $("#jml_uang_muka").val(data[0].biaya_uang_muka);

        },
        error:function()
        {

        }
      });

    });
  }

   function relasiKonsumen()
    {
        $.ajax({
            type : 'GET',
            url : 'php/konsumen/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_konsumen').append($("<option>" , {
                        value: data[i].id_konsumen,
                        text: [data[i].nik,data[i].nama_konsumen]
                    }));
                }

            }
        });


    }

function relasiUangMuka()
    {
        $.ajax({
            type : 'GET',
            url : 'php/pemesanan_rumah/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_pemesanan_rumah').append($("<option>" , {
                        value: data[i].id_pemesanan,
                        text:[data[i].nik,data[i].nama_konsumen],
                    }));
                }

            }
        });

}

function relasiBuktiTransfer()
    {
        $.ajax({
            type : 'GET',
            url : 'php/konfirmasi/lihatBukti.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_bukti_transfer').append($("<option>" , {
                        value: data[i].id_bukti_transfer,
                        text:[data[i].nik,data[i].nama_konsumen],
                    }));
                }

            }
        });

}
function relasiAkun()
    {
        $.ajax({
            type : 'GET',
            url : 'php/akun/lihat.php',
            dataType : 'JSON',
            success:function(data){

                for(var i = 0; i< data.length; i++)
                {
                    $('#id_akun').append($("<option>" , {
                        value: data[i].kode_akun,
                        text:[data[i].kode_akun,data[i].nama_akun],
                    }));
                }

            }
        });

}
