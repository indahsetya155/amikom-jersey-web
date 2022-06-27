<script>
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });
    function fetch_data(page){
        $.ajax({
            url:"{{route('gallery.data',$product->id)}}?page="+page,
            success:function(data)
            {
             $('#table_data').html(data);
            }
        });
    }

$('#tambahBarang').click(function () {
    $('#modalBarang .modal-title').html('Tambah Foto Barang');
    $('#myForm').trigger("reset");
    $('#btnAction').html('Simpan');
    $('#btnAction').removeClass('btn-warning');
    $("#myForm").attr('action', '{{route("produk-galeri.store")}}');
    $("#myForm").attr('method', 'POST');
    $("#method").val('POST');
    $('#btnAction').addClass('btn-primary');
    $('.progress').hide();
    $('#modalBarang').modal('show');
});

$('#btnAction').click(function () {
    $('.notifError').remove();
    var bar = $('.bar');
    var percent = $('.percent');
    var urlnya = $('#myForm').attr('action');

    $('#myForm').ajaxForm({
    	url: urlnya,
        beforeSend: function() {
    $('#btnAction').addClass('btn-progress disabled');
    $('#btnAction').attr('disabled','disabled');
            $('.progress').show();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
    	error: function (response) {
            $('.progress').hide();
            $('#btnAction').removeAttr('disabled');
            $('#btnAction').removeClass('btn-progress disabled');
            $.each(response.responseJSON.errors,function(field_name,error){
                $(document).find('[name='+field_name+']').after('<span class="notifError text-strong text-danger"> <strong>' +error+ '</strong></span>');
            });
    	},
        success: function(xhr) {
            $('.progress').hide();
            $('#btnAction').removeAttr('disabled');
            $('#btnAction').removeClass('btn-progress disabled');
            $('.notifError').remove();
            $('#modalBarang').modal('hide');
            fetch_data($('#thisPage').val());
        }
    });
});

$(document).on('click', '.hapusBarang', function() {
        //// Delete Letter
        var nama = $(this).data('name');
        var urlnya = $(this).data('url');
        swal({
            title: `Hapus Barang?`,
            text: 'Apakah Anda Yakin Menghapus Foto Barang '+nama+'?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then( (goPost) =>{
            if(goPost)   {
                $.ajax({
                    url: urlnya,
                    type: "POST",
                    // headers:{
                    //     'Authorization':'Bearer '+ $('#csrf').val(),
                    //     'Accept': 'application/json'
                    // },
                    data: {
                        _token: "{{csrf_token()}}",
                        _method: 'DELETE'
                    },
                    success: function() {
                        swal(" Dihapus!", "Anda berhasil menghapus Foto barang "+nama, "success");
                        fetch_data($('#thisPage').val());
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
</script>
