<div class="table-responsive">
    <input type="hidden" id="thisPage" value="{{($page)?$page:1}}">
  <table class="table table-striped" width="100%">
    <thead>
      <tr>
          <th width="10%">No.</th>
          <th>Nama Barang</th>
          <th>Tipe Barang</th>
          <th>Harga Barang</th>
          <th width="10%">Ketersediaan</th>
          <th width="15%">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @php
            if($page && $page!= 1){
                $i=($page*10)-10;
            }else{
                $i= 0;
            }
        @endphp
        @forelse ($data as $d)
        <tr>
            <td>{{++$i}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->type}}</td>
            <td>{{$d->price}}</td>
            <td>{{$d->quantity}}</td>
            <td>
                <button class="btn btn-sm btn-success toFoto" data-url="{{route('produk.show',$d->id)}}"><i class="fas fa-image"></i></button>
                <button class="btn btn-sm btn-warning editBarang"
                   data-name="{{$d->name}}"
                   data-type="{{$d->type}}"
                   data-price="{{$d->price}}"
                   data-berat="{{$d->berat}}"
                   data-quantity="{{$d->quantity}}"
                   data-description="{{$d->description}}"
                   data-url="{{route('produk.update',$d->id)}}"
                >
                    <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="hapusBarang btn btn-sm btn-danger"
                    data-name="{{$d->name}}"
                    data-url="{{route('produk.destroy',$d->id)}}"
                ><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @empty
        <tr class="text-center text-danger">
            <td colspan="6">Maaf Data Barang tidak ada</td>
        </tr>
        @endforelse
    </tbody>
  </table>
  {!! $data->appends(request()->except('page'))->links() !!}
</div>
