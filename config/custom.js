$(document).ready(function () {
    relasiPengguna();
  


});

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

