@extends('layouts.app')
@section('title')Laporan @endsection
@section('header-body')Laporan @endsection
@section('breadcrumb')<div class="breadcrumb-item">Laporan</div>@endsection


@section('body')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group mx-4">
                      <label for="">Tanggal Dimulai</label>
                      <input type="datetime-local" class="form-control tanggalTransaksi" name="startdate" id="startdate" value="{{date('Y-m-d\TH:i', strtotime(\Carbon\Carbon::now()->startOfMonth()->toDateString()))}}" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group mx-4">
                      <label for="">Tanggal Berakhir</label>
                      <input type="datetime-local" class="form-control tanggalTransaksi" name="enddate" id="enddate" value="{{date('Y-m-d\TH:i', strtotime(\Carbon\Carbon::now()->endOfMonth()->toDateString()))}}" aria-describedby="helpId" placeholder="">
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tableReport" width="100%">
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Pembeli</th>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tfoot class="text-right">
                                <tr class="text-right">
                                    <td colspan="5" ></td>
                                    <td class="text-right">Total Keseluruhan</td>
                                    <td id="jumlah"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('end')

@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@endpush

@push('js')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    var table = null;
    let start = '';
    let end = '';
    $(document).ready(function(){
        start = $('#startdate').val();
        end = $('#enddate').val();
        ajaxJumlah();
        table = $('#tableReport').DataTable({
            dom: 'Bfrtip',
            buttons: [
                { extend: 'print', footer: true },
                { extend: 'excel', footer: true },
                { extend: 'pdf', footer: true }
            ],
            processing: true,
            paging: false,
            ajax: {
                url: "{{url('report')}}",
                data: function(d){
                    d.start = start;
                    d.end = end;
                }
            },
            columns: [
                {
                    data: 'transaction.kode',
                    className: 'text-center'
                },
                {
                    data: 'transaction.created_at',
                    render: function(k, v, r) {
                        return changeTimestaptoDateIndonesia(k);
                    },
                },
                {
                    data: 'transaction.name'
                },
                {
                    data: 'product.name'
                },
                {
                    data: 'product.price',
                    render: function(k, v, r) {
                        return changeIDR(k);
                    },
                    className: 'text-right'
                },
                {
                    data: 'jumlah',
                    className: 'text-center'
                },
                {
                    data: 'id',
                    render: function(k, v, r) {
                        return changeIDR(r.product.price * r.jumlah);
                    },
                    className: 'text-right'
                },
            ],
        });
    });

    $('.tanggalTransaksi').change(function(){
        start = $('#startdate').val();
        end = $('#enddate').val();
        ajaxJumlah();
        table.ajax.reload();
    });

    function ajaxJumlah() {
        $('#jumlah').html('<i class="fa fa-spinner fa-spin"></i>');
        $.ajax({
            url: "{{url('report/data')}}",
            data: {
                start: start,
                end: end
            },
            success: function(data) {
                $('#jumlah').html(changeIDR(data));
            }
        });
    }

    // format date english to indonesia
    function changeTimestaptoDateIndonesia(timestamp) {
        var date = new Date(timestamp);
        var tahun = date.getFullYear();
        var bulan = date.getMonth();
        var tanggal = date.getDate();
        var hari = date.getDay();
        switch(hari) {
         case 0: hari = "Minggu"; break;
         case 1: hari = "Senin"; break;
         case 2: hari = "Selasa"; break;
         case 3: hari = "Rabu"; break;
         case 4: hari = "Kamis"; break;
         case 5: hari = "Jum'at"; break;
         case 6: hari = "Sabtu"; break;
        }
        switch(bulan) {
         case 0: bulan = "Januari"; break;
         case 1: bulan = "Februari"; break;
         case 2: bulan = "Maret"; break;
         case 3: bulan = "April"; break;
         case 4: bulan = "Mei"; break;
         case 5: bulan = "Juni"; break;
         case 6: bulan = "Juli"; break;
         case 7: bulan = "Agustus"; break;
         case 8: bulan = "September"; break;
         case 9: bulan = "Oktober"; break;
         case 10: bulan = "November"; break;
         case 11: bulan = "Desember"; break;
        }
        return hari + ", " + tanggal + " " + bulan + " " + tahun;
    }


    // change format idr (Rp.)
    function changeIDR(value) {
        return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
</script>
@endpush
