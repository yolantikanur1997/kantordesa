var Isnew = true;
relasiJenisSurat();
relasiPengguna();
lihat();

var id_pengajuan_surat = null;

function relasiJenisSurat()
{
    $.ajax({
        type : 'GET',
        url : 'aksi/dataJenisSurat/lihat.php',
        dataType : 'JSON',
        success:function(data){

            for(var i = 0; i< data.length; i++)
            {
                $('#id_jenis_surat').append($("<option>" , {
                    value: data[i].id_jenis_surat,
                    text: data[i].nama_surat,
                }));
            }

        }
    });


}
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
function tambahPengajuanSurat()
{
    // alert("hi");
    if ($("#formPengajuanSurat").valid()) {
        var _url = '';
        var _data = '';
        var _method;

        if (Isnew == true)
        {
            _url = 'aksi/dataPengajuanSurat/tambah.php';
            _data = $("#formPengajuanSurat").serialize();
            _method = 'POST';

        }
        else
        {
            _url = 'aksi/dataPengajuanSurat/edit.php';
            _data = $("#formPengajuanSurat").serialize() + "& id_pengajuan_surat="+id_pengajuan_surat;
            _method = 'POST';
        }
        $.ajax({
            type : _method,
            data : _data,
            url : _url,
            dataType : 'JSON',

            success : function(data){

                lihat();
                $("#formPengajuanSurat")[0].reset();

                var msg;

                if (Isnew)
                {
                    msg = "Data Pengajuan Surat Tersimpan";

                }
                else 
                {
                    msg = "Data Pengajuan Surat di Edit";

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
    $('#tabelPengajuanSurat').dataTable().fnDestroy();
    $.ajax({
        url : "aksi/dataPengajuanSurat/lihat.php",
        type : "GET",
        dataType : 'JSON',

        success:function(data)
        {

            $("#tabelPengajuanSurat").dataTable({
                "aaData" : data,
                "scrollX": true, //scrol tabel
                "aoColumns": [
                 {
                        "sTitle":"No",
                        "render": function(mData, type, row, meta){
                           return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {"sTitle": "Nomor Surat","mData": "no_pengajuan_surat"},
                    {"sTitle": "Pengguna","mData": "nama"},
                    {"sTitle": "Nama Surat","mData": "nama_surat"},
                    {"sTitle": "Tanggal Pengajuan","mData": "tanggal_pengajuan"},
                    {"sTitle": "Status","mData": "status"},
                    {
                        "sTitle":"Opsi",
                        "mData": "id_pengajuan_surat",
                        "render": function(mData, type, row, meta){
                            return'<button class="btn btn-xs btn-info" title="Pilih" onclick="lihatData('+ mData +')"><i class="fa fa-eye"></i></button> <button class="btn btn-xs btn-warning" title="Pilih" onclick="ambil('+ mData +')"><i class="fa fa-edit"></i></button>  <button class="btn btn-xs btn-danger" title="Hapus" onclick="hapus('+mData+')"><i class="fa fa-trash"></i></button> <button class="btn btn-xs btn-success" title="Cetak" onclick="cetak('+mData+')"><i class="fa fa-print"></i></button>';
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
        url : 'aksi/dataPengajuanSurat/ambil.php',
        dataType : 'JSON',
        data : {id_pengajuan_surat:id},

        success:function(data){
            $("html, body").animate({scrollTop: 0}, "slow");
            Isnew = false
            id_pengajuan_surat = data.id_pengajuan_surat
            $('#no_pengajuan_surat').val(data.no_pengajuan_surat);
            $('#id_pengguna').val(data.id_pengguna).trigger('change');            
            $('#id_jenis_surat').val(data.id_jenis_surat).trigger('change');
            $('#tanggal_pengajuan').val(data.tanggal_pengajuan);      
            $('#tanggal_selesai').val(data.tanggal_selesai);      
            $('#keperluan').val(data.keperluan);      
            $('#komentar').val(data.komentar);      
            $('#status').val(data.status).trigger('change');        
        },
        error:function(xhr, status, error){
            alert(xhr.responseText);
        }
    });

}
    function lihatData(id)
{
    $.ajax({
        type : 'POST',
        url : 'aksi/dataPengajuanSurat/ambil.php',
        dataType : 'JSON',
        data : {id_pengajuan_surat:id},

        success:function(data){
            $("html, body").animate({scrollTop: 0}, "slow");
            Isnew = false
            id_pengajuan_surat = data.id_pengajuan_surat
            $('#no_pengajuan_surat2').html(data.no_pengajuan_surat);
            $('#nama_surat2').html(data.nama_surat);
            $('#tanggal_pengajuan2').html(data.tanggal_pengajuan);            
            $('#tanggal_selesai2').html(data.tanggal_selesai);            
            $('#keperluan2').html(data.keperluan);            
            $('#komentar2').html(data.komentar);            
            $('#status2').html(data.status);            
            $('#nama2').html(data.nama);            
            $('#nik').html(data.nik);            
            $('#modalPengajuanSurat').modal('show');
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
        content: 'Yakin ingin menghapus Data Pengajuan Surat?',
        theme: 'light',
        buttons: {

            Ya:function() {

                $.ajax({
                    type : 'POST',
                    url : 'aksi/dataPengajuanSurat/hapus.php',
                    dataType : 'JSON',
                    data : {id_pengajuan_surat:id},

                    success:function(data){
                        lihat();
                        $.alert('Data Pengajuan Surat Terhapus');
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

function cetak(id)
{
    $.ajax({
        type : 'POST',
        url : 'aksi/dataPengajuanSurat/ambil.php',
        dataType : 'JSON',
        data : {id_pengajuan_surat:id},

        success:function(data){
            $("html, body").animate({scrollTop: 0}, "slow");
            Isnew = false
            id_pengajuan_surat = data.id_pengajuan_surat
            window.location= "cetak/cetakPengajuanSurat.php?id_pengajuan_surat=" + id_pengajuan_surat;
            
        },
        error:function(xhr, status, error){
            alert(xhr.responseText);
        }
    });

}
