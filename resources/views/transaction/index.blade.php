@extends('layouts.app')
@section('title')List Transaksi @endsection
@section('header-body')List Transaksi @endsection
@section('breadcrumb')<div class="breadcrumb-item">Transaksi</div>@endsection


@section('body')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <input type="hidden" id="queryURL">
                    <h4>Daftar Transaksi</h4>
                    {{-- <div class="card-header-action">
                        <button class="btn btn-sm btn-primary" id="tambahBarang"><i class="fas fa-plus-circle"></i> Tambah Produk</button>
                    </div> --}}
                </div>
                <div class="card-body">
                    <input type="hidden" id="formSearch">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="Masukan kata kunci untuk mencari Transaksi dan Tekan Enter untuk memproses">
                    </div>
                    <div id="table_data">
                        @include('transaction.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('end')
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">sm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/js/jquery.form.min.js')}}"></script>
@include('transaction.js')
@endpush
