<script>
$(document).on('click', '.pagination a', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('?')[1];
    $('#queryURL').val(page);
    fetch_data(page);
});

function fetch_data(page){
    $('#table-body').html('<tr class="text-center"><td colspan="8"><i class="fas fa-spinner fa-pulse"></i> Sedang Memuat Tabel..</td></tr>');
    $.ajax({
        url:"{{route('transaksi.data')}}?"+page,
        success:function(data)
        {
         $('#table_data').html(data);
        }
    });
};

$("#search").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        $('#queryURL').val('search='+$(this).val());
        $('#table-body').html('<tr class="text-center"><td colspan="8"><i class="fas fa-spinner fa-pulse"></i> Sedang Memuat Tabel..</td></tr>');
    $.ajax({
        url:"{{route('transaksi.data')}}?search="+$(this).val(),
        success:function(data)
        {
         $('#table_data').html(data);
        }
    });
    }
});


$(document).on('click', '.lihatTransaksi', function(){
    var modalID = $('#myModal');
    modalID.find('.modal-title').text('Detail Transaksi '+$(this).data('kode'));
    modalID.find('.modal-body').html('<div class="container text-center"><h4><i class="fas fa-spinner fa-pulse"></i> Sedang Memuat..</h4></div>');
    modalID.modal('show');
    modalID.find('.modal-body').load($(this).data('url'));
});

$(document).on('click', '.hapusTransaksi', function() {
    var nama = $(this).data('name');
    var urlnya = $(this).data('url');
    swal({
        title: `Hapus Transaksi?`,
        text: 'Apakah Anda Yakin Menghapus Transaksi '+nama+'?',
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then( (goPost) =>{
        if(goPost)   {
            $.ajax({
                url: urlnya,
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    _method: 'DELETE'
                },
                success: function() {
                    swal(" Dihapus!", "Anda berhasil menghapus Transaksi "+nama, "success");
                    fetch_data($('#queryURL').val());
                },
                error: function(xhr) {
                    swal("Error "+xhr.status+"!", xhr.responseJSON, "error");
                }
            });
        }else{
            swal("Batal Dihapus");
        }
    });
});


$(document).on('click', '.editForm', function(){
    element = $(this).attr('tipenya');
    isi = $(this).attr('isi');
    url = $(this).attr('url');
    place = $(this).attr('title');
    lokasi = $('#'+element);
    jns = (element == 'number')?'number':'text';


    lokasi.html(
        '<form id="'+element+'Form" method="POST"> @method("PUT") @csrf '+
            '<div class="form-group">'+
                '<div class="input-group">'+
                  '<input type="'+jns+'" class="form-control form-control-sm" name="'+element+'" value="'+isi+'" placeholder="'+place.substring(5)+'" required>'+
                  '<div class="input-group-append">'+
                    '<button type="submit" url="'+url+'" isi="'+isi+'" tipenya="'+element+'" title="'+place+'" class="btnSimpan btn btn-sm btn-success" type="button">Simpan</button>'+
                    '<button type="button" url="'+url+'" isi="'+isi+'" tipenya="'+element+'" title="'+place+'" class="btnBatal btn btn-sm btn-secondary" type="button">Batal</button>'+
                  '</div>'+
                '</div>'+
              '</div>'+
        '</form>'
    );
});


$(document).on('click', '.btnBatal', function(){
    element = $(this).attr('tipenya');
    isi = $(this).attr('isi');
    url = $(this).attr('url');
    place = $(this).attr('title');

    lokasi = $('#'+element);
    lokasi.html(
        isi+' <i url="'+url+'" isi="'+isi+'" tipenya="'+element+'" title="'+place+'" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i>'
    );
});

$(document).on('click', '.btnSimpan', function(event){
    event.preventDefault();
    $('.notifError').remove();
    $(':input').removeClass('is-invalid');
    btn=$(this);
    btn.addClass('btn-progress disabled');
    btn.attr('disabled','disabled');
    element = $(this).attr('tipenya');
    urlnya = $(this).attr('url');
    place = $(this).attr('title');
    formName = document.getElementById(element+'Form');
        $.ajax({
          url:urlnya,
          method:"POST",
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          data: new FormData(formName),
          success:function(data)
          {
            isi = $(document).find('[name='+element+']').val();
            lokasi = $('#'+element);
            lokasi.html(
                isi+' <i url="'+url+'" isi="'+isi+'" tipenya="'+element+'" title="'+place+'" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i>'
            );
            console.log(isi);
            fetch_data($('#queryURL').val());
          },
          error: function (response) {
            btn.removeAttr('disabled');
            btn.removeClass('btn-progress disabled');
            $.each(response.responseJSON.errors,function(field_name,error){
                $(document).find('[name='+field_name+']').parent().after('<span class="notifError text-strong text-danger"> <strong>&nbsp;' +error+ '&nbsp;</strong></span>');
                $(document).find('[name='+field_name+']').addClass('is-invalid');
            });
    	}
    });
});

$(document).on('click', '.actionStatus', function() {
    var nama = $(this).data('name');
    var urlnya = $(this).data('url');
    var status = $(this).data('status');
    swal({
        title: `Transaksi `+status+`?`,
        text: 'Apakah Anda Yakin Mengubah status transaksi '+nama+' menjadi '+status+'?',
        icon: "info",
        buttons: true,
        dangerMode: false,
    })
    .then( (goPost) =>{
        if(goPost)   {
            $.ajax({
                url: urlnya,
                type: "POST",
                data: {
                    _token: "{{csrf_token()}}",
                    _method: 'PUT',
                    transaction_status:status
                },
                success: function() {
                    swal("Berhasil!", "Anda berhasil mengubah status Transaksi "+nama, "success");
                    ubahStatus(status);
                    fetch_data($('#queryURL').val());
                },
                error: function(xhr) {
                    swal("Error "+xhr.status+"!", xhr.responseJSON, "error");
                }
            });
        }else{
            swal("Batal Diubah");
        }
    });
});
function ubahStatus(status) {
    if(status == "SUCCESS"){
        $('.statusTran').html('<label class="badge badge-success">'+status+'</label>');
    }else if(status == "PENDING"){
        $('.statusTran').html('<label class="badge badge-info">'+status+'</label>');
    }else if(status == "FAILED"){
        $('.statusTran').html('<label class="badge badge-warning">'+status+'</label>');
    }else{
        $('.statusTran').html('<label>'+status+'</label>');
    }
}
</script>
