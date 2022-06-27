<script>
monthNow = '{{date("m")}}';
selectMoth = $('#orders-month');
$(document).ready(function() {
    changeMonth(monthNow);
    grafik(monthNow);
    data(monthNow);
    fetch_data();
})

$(document).on('click','.orderMonth', function() {
    isi = $(this).attr('month');
    changeMonth(isi);
    grafik(isi);
    data(isi);
    fetch_data();
});

$(document).on('click', '.pagination a', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('?')[1];
    $('#queryURL').val(page);
    fetch_data(page);
});

$(document).on('keyup','#search', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        $('#queryURL').val('search='+$(this).val());
        $('#table-body').html('<tr class="text-center"><td colspan="6"><i class="fas fa-spinner fa-pulse"></i> Sedang Memuat Tabel..</td></tr>');
    $.ajax({
        url:"{{url('dashboard/table')}}/"+selectMoth.attr('isi')+"?search="+$(this).val(),
        success:function(data)
        {
         $('#table_data').html(data);
        }
    });
    }
});


function fetch_data(page){
    $('#table-body').html('<tr class="text-center"><td colspan="6"><i class="fas fa-spinner fa-pulse"></i> Sedang Memuat Tabel..</td></tr>');
    $.ajax({
        url:"{{url('dashboard/table')}}/"+selectMoth.attr('isi')+"?"+page,
        success:function(data)
        {
         $('#table_data').html(data);
        }
    });
};

function grafik(bulan){
    $('#top-5-scroll').html('<h2 class="text-center"><i class="fas fa-spinner fa-pulse"></i> Sedang Memuat..</h2>');
    $.ajax({
        url:"{{url('dashboard/grafik')}}?bulan="+bulan,
        success:function(data)
        {
         $('#top-5-scroll').html(data);
        }
    });
};
function data(bulan){
    pending = $('#pending');
    failed  = $('#failed');
    success = $('#success');
    hasil   = $('#hasil');
    total   = $('#total');

    pending.html('<i class="fas fa-spinner fa-pulse"></i>');
    failed.html('<i class="fas fa-spinner fa-pulse"></i>');
    success.html('<i class="fas fa-spinner fa-pulse"></i>');
    hasil.html('<i class="fas fa-spinner fa-pulse"></i>');
    total.html('<i class="fas fa-spinner fa-pulse"></i>');
    $.ajax({
        url:"{{url('dashboard/data')}}?bulan="+bulan,
        success:function(data)
        {
            pending.html(data.pending);
            failed.html(data.failed);
            success.html(data.success);
            hasil.html(UbahRibuan(data.income));
            total.html(data.pending+data.failed+data.success + ' Transaksi');
        }
    });
};

function changeMonth(isi) {
    bulan = $(document).find('[month="'+isi+'"]');
    namaBulan = bulan.html();
    console.log(bulan);
    console.log(isi);
    $('#orders-month').html(namaBulan);
    $('#orders-month').attr('isi',isi);
    $('.orderMonth').removeClass('active');
    bulan.addClass('active');
}

function UbahRibuan(bilangan) {
  var	reverse = bilangan.toString().split('').reverse().join('');
  ribuan 	= reverse.match(/\d{1,3}/g);
  ribuan	= ribuan.join('.').split('').reverse().join('');
  return ribuan;
}
</script>

