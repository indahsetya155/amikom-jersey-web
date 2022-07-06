<script>
    $(document).on('click', '.pagination a', function(event){
        event.preventDefault();
        var page = $(this).attr('href').split('?')[1];
        $('#queryURL').val(page);
        fetch_data(page);
    });
    function fetch_data(page){
        $.ajax({
            url:"{{route('product.data')}}?"+page,
            success:function(data)
            {
             $('#table_data').html(data);
            }
        });
    }

$("#search").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        $('#queryURL').val('search='+$(this).val());
    $.ajax({
        url:"{{route('product.data')}}?search="+$(this).val(),
        success:function(data)
        {
         $('#table_data').html(data);
        }
    });
    }
});

$(document).on('click', '.toFoto', function(event){
    var url = $(this).data('url');
    window.location.href = url;
});

$(document).on('click', '.editBarang', function(event){
    $('#name').val($(this).data('name'));
    $('#type').val($(this).data('type'));
    setDataFromTheEditor($(this).data('description'));
    $('#price').val($(this).data('price'));
    $('#berat').val($(this).data('berat'));
    $('#quantity').val($(this).data('quantity'));
    $('#modalBarang .modal-title').html('Edit Barang');
    $('#btnAction').html('Edit');
    $('#btnAction').removeClass('btn-primary');
    $("#myForm").attr('action', $(this).data('url'));
    $("#myForm").attr('method', 'PUT');
    $("#method").val('PUT');
    $('#btnAction').addClass('btn-warning');
    $('.progress').hide();
    $('.notifError').remove();
    changeColorValidateCKEditor(false);
    $(':input').removeClass('is-invalid');
    $('#modalBarang').modal('show');
});

$('#tambahBarang').click(function () {
    $('#modalBarang .modal-title').html('Tambah Barang');
    $('#myForm').trigger("reset");
    setDataFromTheEditor('');
    $('#btnAction').html('Simpan');
    $('#btnAction').removeClass('btn-warning');
    $("#myForm").attr('action', '{{route("produk.store")}}');
    $("#myForm").attr('method', 'POST');
    $("#method").val('POST');
    $('.notifError').remove();
    $('#btnAction').addClass('btn-primary');
    $('.progress').hide();
    changeColorValidateCKEditor(false);
    $(':input').removeClass('is-invalid');
    $('#modalBarang').modal('show');
});

$('#btnAction').click(function () {
    $('.notifError').remove();
    changeColorValidateCKEditor(false);
    $(':input').removeClass('is-invalid');
    // $(':textarea').removeClass('is-invalid');
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
                $(document).find('[name='+field_name+']').parent().after('<span class="notifError text-strong text-danger"> <strong>' +error+ '</strong></span>');
                $(document).find('[name='+field_name+']').addClass('is-invalid');
                if(field_name == 'description')changeColorValidateCKEditor(true);
            });
    	},
        success: function(xhr) {
            $('.progress').hide();
            $('#btnAction').removeAttr('disabled');
            $('#btnAction').removeClass('btn-progress disabled');
            $('.notifError').remove();
            changeColorValidateCKEditor(false);
            $(':input').removeClass('is-invalid');
            $('#modalBarang').modal('hide');
            fetch_data($('#queryURL').val());
        }
    });
});

$(document).on('click', '.hapusBarang', function() {
        //// Delete Letter
        var nama = $(this).data('name');
        var urlnya = $(this).data('url');
        swal({
            title: `Hapus Barang?`,
            text: 'Apakah Anda Yakin Menghapus Barang '+nama+'?',
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
                        swal(" Dihapus!", "Anda berhasil menghapus barang "+nama, "success");
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

let theEditor;
ClassicEditor
    .create( document.querySelector( '#description' ), {
        removePlugins: ['blockQuote', 'italic'],
        toolbar: [ 'Heading','|','bold', 'bulletedList', 'numberedList' , 'Link' ]
    } )
    .then( editor => {
        theEditor = editor; // Save for later use.
    } )
    .catch( error => {
        console.error( error );
    } );

function getDataFromTheEditor() {
    return theEditor.getData();
}
function setDataFromTheEditor(data) {
    return theEditor.setData(data);
}

function changeColorValidateCKEditor(status) {
    if(status){
        $('.ck-editor__editable').css('border-color','#dc3545');
    }else{
        $('.ck-editor__editable').css('border-color','#c4c4c4');
    }
}
</script>
