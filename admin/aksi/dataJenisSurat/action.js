var Isnew = true;
lihat();

var id_jenis_surat = null;

function tambahJenisSurat()
{
    // alert("hi");
    if ($("#formJenisSurat").valid()) {
        var _url = '';
        var _data = '';
        var _method;

        if (Isnew == true)
        {
            _url = 'aksi/dataJenisSurat/tambah.php';
            _data = $("#formJenisSurat").serialize();
            _method = 'POST';

        }
        else
        {
            _url = 'aksi/dataJenisSurat/edit.php';
            _data = $("#formJenisSurat").serialize() + "& id_jenis_surat="+id_jenis_surat;
            _method = 'POST';
        }
        $.ajax({
            type : _method,
            data : _data,
            url : _url,
            dataType : 'JSON',

            success : function(data){

                lihat();
                $("#formJenisSurat")[0].reset();

                var msg;

                if (Isnew)
                {
                    msg = "Data Jenis Surat Tersimpan";

                }
                else 
                {
                    msg = "Data Jenis Surat di Edit";

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
    $('#tabelJenisSurat').dataTable().fnDestroy();
    $.ajax({
        url : "aksi/dataJenisSurat/lihat.php",
        type : "GET",
        dataType : 'JSON',

        success:function(data)
        {

            $("#tabelJenisSurat").dataTable({
                "aaData" : data,
                "scrollX": true, //scrol tabel
                "aoColumns": [
                 {
                        "sTitle":"No",
                        "render": function(mData, type, row, meta){
                           return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {"sTitle": "Nama Surat","mData": "nama_surat"},
                    {"sTitle": "Keterangan","mData": "keterangan"},
                    {
                        "sTitle":"Opsi",
                        "mData": "id_jenis_surat",
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
        url : 'aksi/dataJenisSurat/ambil.php',
        dataType : 'JSON',
        data : {id_jenis_surat:id},

        success:function(data){
            $("html, body").animate({scrollTop: 0}, "slow");
            Isnew = false
            id_jenis_surat = data.id_jenis_surat
            $('#nama_surat').val(data.nama_surat);
            $('#keterangan').val(data.keterangan);            
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
        content: 'Yakin ingin menghapus Data Jenis Surat?',
        theme: 'light',
        buttons: {

            Ya:function() {

                $.ajax({
                    type : 'POST',
                    url : 'aksi/dataJenisSurat/hapus.php',
                    dataType : 'JSON',
                    data : {id_jenis_surat:id},

                    success:function(data){
                        lihat();
                        $.alert('Data Jenis Surat Terhapus');
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