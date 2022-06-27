@extends('layouts.app')

@push('css')
<script src="{{asset('assets/js/page/chart.min.js')}}"></script>
@endpush

@section('body')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="card card-statistic-2">
        <div class="card-stats">
          <div class="card-stats-title">Statistik Pesanan -
            <div class="dropdown d-inline">
              <a class="font-weight-600 text-primary dropdown-toggle" style="cursor: pointer" data-toggle="dropdown" id="orders-month">Agustus</a>
              <ul class="dropdown-menu dropdown-menu-sm">
                <li class="dropdown-title">Pilih Bulan</li>
                <li><a month="01" style="cursor: pointer" class="orderMonth dropdown-item">Januari</a></li>
                <li><a month="02" style="cursor: pointer" class="orderMonth dropdown-item">Februari</a></li>
                <li><a month="03" style="cursor: pointer" class="orderMonth dropdown-item">Maret</a></li>
                <li><a month="04" style="cursor: pointer" class="orderMonth dropdown-item">April</a></li>
                <li><a month="05" style="cursor: pointer" class="orderMonth dropdown-item">Mei</a></li>
                <li><a month="06" style="cursor: pointer" class="orderMonth dropdown-item">Juni</a></li>
                <li><a month="07" style="cursor: pointer" class="orderMonth dropdown-item active">Juli</a></li>
                <li><a month="08" style="cursor: pointer" class="orderMonth dropdown-item">Agustus</a></li>
                <li><a month="09" style="cursor: pointer" class="orderMonth dropdown-item">September</a></li>
                <li><a month="10" style="cursor: pointer" class="orderMonth dropdown-item">Oktober</a></li>
                <li><a month="11" style="cursor: pointer" class="orderMonth dropdown-item">November</a></li>
                <li><a month="12" style="cursor: pointer" class="orderMonth dropdown-item">Desember</a></li>
              </ul>
            </div>
          </div>
          <div class="card-stats-items">
            <div class="card-stats-item">
              <div class="card-stats-item-count" id="pending">XX</div>
              <div class="card-stats-item-label">Pending</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count" id="success">XX</div>
              <div class="card-stats-item-label">Success</div>
            </div>
            <div class="card-stats-item">
              <div class="card-stats-item-count" id="failed">XX</div>
              <div class="card-stats-item-label">Failed</div>
            </div>
          </div>
        </div>
        <div class="card-icon shadow-primary bg-primary">
          <i class="fas fa-archive"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pesanan</h4>
          </div>
          <div class="card-body" id="total">XX Transaksi</div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="card card-statistic-2">
        <div class="mb-2">&nbsp;</div><br>
        <div class="card-icon shadow-primary bg-primary text-white">
          Rp.
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pembelian</h4>
          </div>
          <div class="card-body" id="hasil">
            xxx.xxxx
          </div>
        </div>
        <div style="height: 80%" class="mt-5">&nbsp;</div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4>Riwayat Transaksi</h4>
        </div>
        <input type="hidden" id="formSearch">
        <div class="card-body" id="table_data">
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <h4>Grafik Pesanan</h4>
        </div>
        <div class="card-body" id="top-5-scroll">
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
@include('dashboard.js')
@endpush
