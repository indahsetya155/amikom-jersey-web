@extends('layouts.app')
@section('title')List Gallery {{$product->name}} @endsection
@section('header-body')Product Gallery {{$product->name}} @endsection
@section('breadcrumb')<div class="breadcrumb-item">Produk Gallery</div>@endsection


@section('body')
<div class="section-body">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h4>Foto Produk Galeri {{$product->name}}</h4>
            <div class="card-header-action">
                <button class="btn btn-sm btn-primary" id="tambahBarang"><i class="fas fa-plus-circle"></i> Tambah Foto </button>
            </div>
        </div>
        <div class="card-body">
            <div id="table_data">
                @include('list-gallery.table')
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
            <form id="myForm" action="#" method="#" enctype="multipart/form-data">
            @csrf<input type="hidden" name="_method" id="method">
            <div class="modal-body">
                <div class="form-group">
                  <label for="products_id">Nama Barang</label>
                  <input type="text" class="form-control" value="{{$product->name}}" readonly>
                  <input type="hidden" name="products_id" value="{{$product->id}}">
                </div>
                <div class="form-group">
                  <label for="phot">Foto Product</label>
                  <input type="file" class="form-control" name="photo" id="photo" placeholder="foto produk" aria-describedby="fileHelpId">
                </div>
                <div class="form-group">
                    <label for="">Jadikan Default ?</label><br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="is_default" value="1" checked>
                        Yes
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="is_default" value="0">
                        No
                      </label>
                    </div>
                </div>
                <div id="lihatGambar"></div>
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

@push('js')
<script src="{{ asset('assets/js/jquery.form.min.js')}}"></script>
@include('list-gallery.js')
@endpush
