@extends('layouts.app')
@section('title')List Product @endsection
@section('header-body')List Product @endsection
@section('breadcrumb')<div class="breadcrumb-item">Produk</div>@endsection


@section('body')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <input type="hidden" id="queryURL">
                    <h4>Daftar Produk</h4>
                    <div class="card-header-action">
                        <button class="btn btn-sm btn-primary" id="tambahBarang"><i class="fas fa-plus-circle"></i> Tambah Produk</button>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" id="formSearch">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="Masukan nama barang untuk mencari Barang dan Tekan Enter untuk memproses">
                    </div>
                    <div id="table_data">
                        @include('product.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('end')
<!-- Modal -->
<div class="modal fade" id="modalBarang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">#</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form id="myForm" action="#" method="#">
            @csrf<input type="hidden" name="_method" id="method"><input type="hidden" name="id" id="id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="namabarang">Nama Barang</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama Barang">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipebarang">Tipe Barang</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="type" id="type" placeholder="Masukan Tipe Barang">
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsibarang">Deskripsi Barang</label>
                    <div class="input-group">
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukan Deskripsi Barang"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hargabarang">Harga Barang</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Masukan Harga Barang">
                    </div>
                </div>
                <div class="form-group">
                    <label for="kuantitasbarang">Kuantitas Barang</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Masukan Kuantitas Barang">
                    </div>
                </div>
                <br>
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>

                <div id="status"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnAction" class="btn">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@push('css')
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<style>
    .ck.ck-editor
    {
        width: 100%;
    }
</style>
@endpush

@push('js')
<script src="{{ asset('assets/js/jquery.form.min.js')}}"></script>
@include('product.js')
@endpush
