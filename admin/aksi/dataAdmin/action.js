var Isnew = true;
lihat();

var id_admin = null;

function tambahAdmin()
{
    // alert("hi");
    if ($("#formAdmin").valid()) {
        var _url = '';
        var _data = '';
        var _method;

        if (Isnew == true)
        {
            _url = 'aksi/dataAdmin/tambah.php';
            _data = $("#formAdmin").serialize();
            _method = 'POST';

        }
        else
        {
            _url = 'aksi/dataAdmin/edit.php';
            _data = $("#formAdmin").serialize() + "& id_admin="+id_admin;
            _method = 'POST';
        }
        $.ajax({
            type : _method,
            data : _data,
            url : _url,
            dataType : 'JSON',

            success : function(data){

                lihat();
                $("#formAdmin")[0].reset();

                var msg;

                if (Isnew)
                {
                    msg = "Data admin Tersimpan";

                }
                else 
                {
                    msg = "Data admin di Edit";

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
    $('#tabelAdmin').dataTable().fnDestroy();
    $.ajax({
        url : "aksi/dataAdmin/lihat.php",
        type : "GET",
        dataType : 'JSON',

        success:function(data)
        {

            $("#tabelAdmin").dataTable({
                "aaData" : data,
                "scrollX": true, //scrol tabel
                "aoColumns": [
                 {
                        "sTitle":"No",
                        "render": function(mData, type, row, meta){
                           return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {"sTitle": "Nama","mData": "nama"},
                    {"sTitle": "Username","mData": "username"},
                    {
                        "sTitle":"Opsi",
                        "mData": "id_admin",
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
        url : 'aksi/dataAdmin/ambil.php',
        dataType : 'JSON',
        data : {id_admin:id},

        success:function(data){
            $("html, body").animate({scrollTop: 0}, "slow");
            Isnew = false
            id_admin = data.id_admin
            $('#nama').val(data.nama);
            $('#username').val(data.username);
            $('#password').prop("disabled",true);
            
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
        content: 'Yakin ingin menghapus Data admin?',
        theme: 'light',
        buttons: {

            Ya:function() {

                $.ajax({
                    type : 'POST',
                    url : 'aksi/dataAdmin/hapus.php',
                    dataType : 'JSON',
                    data : {id_admin:id},

                    success:function(data){
                        lihat();
                        $.alert('Data admin Terhapus');
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