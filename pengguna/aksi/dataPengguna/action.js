var Isnew = true;
lihat();

var id_pengguna = null;

function tambahPengguna()
{
    // alert("hi");
    if ($("#formPengguna").valid()) {
        var _url = '';
        var _data = '';
        var _method;

     
            _url = 'aksi/dataPengguna/edit.php';
            _data = $("#formPengguna").serialize() + "& id_pengguna="+id_pengguna;
            _method = 'POST';
        
        $.ajax({
            type : _method,
            data : _data,
            url : _url,
            dataType : 'JSON',

            success : function(data){

                lihat();
                $("#formPengguna")[0].reset();

                var msg;

            
                    msg = "Data Pengguna di Edit";

                
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
    $('#tabelPengguna').dataTable().fnDestroy();
    $.ajax({
        url : "aksi/dataPengguna/lihat.php",
        type : "GET",
        dataType : 'JSON',

        success:function(data)
        {

            $("#tabelPengguna").dataTable({
                "aaData" : data,
                "scrollX": true, //scrol tabel
                "aoColumns": [
                 {
                        "sTitle":"No",
                        "render": function(mData, type, row, meta){
                           return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {"sTitle": "Nomor KK","mData": "no_kk"},
                    {"sTitle": "NIK","mData": "nik"},
                    {"sTitle": "Nama","mData": "nama"},
                    {
                        "sTitle":"Opsi",
                        "mData": "id_pengguna",
                        "render": function(mData, type, row, meta){
                            return'<button class="btn btn-xs btn-warning" title="Pilih" onclick="ambil('+ mData +')"><i class="fa fa-edit"></i></button>';
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
        url : 'aksi/dataPengguna/ambil.php',
        dataType : 'JSON',
        data : {id_pengguna:id},

        success:function(data){
            Isnew = false
            id_pengguna = data.id_pengguna
            $('#no_kk').val(data.no_kk).prop("readonly",true);   
            $('#nik').val(data.nik).prop("readonly",true);            
            $('#nama').val(data.nama);                                 
            $('#tempat_lahir').val(data.tempat_lahir);                                 
            $('#tanggal_lahir').val(data.tanggal_lahir);                                 
            $('#jenis_kelamin').val(data.jenis_kelamin).trigger('change');                                 
            $('#alamat').val(data.alamat);                                 
            $('#rt').val(data.rt);                                 
            $('#rw').val(data.rw);                                 
            $('#kelurahan').val(data.kelurahan);                                 
            $('#kecamatan').val(data.kecamatan);                                 
            $('#agama').val(data.agama).trigger('change');                                         
            $('#status_perkawinan').val(data.status_perkawinan).trigger('change');                                     
            $('#pekerjaan').val(data.pekerjaan);                                 
            $('#kewarganegaraan').val(data.kewarganegaraan); 
            $('#modalFormPengguna').modal('show');
        },
        error:function(xhr, status, error){
            alert(xhr.responseText);
        }
    });

}
