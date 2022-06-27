<div class="table-responsive">
    <input type="hidden" id="thisPage" value="{{($page)?$page:1}}">
  <table class="table table-striped" width="100%">
    <thead>
      <tr>
          <th width="10%">No.</th>
          <th>Nama Barang</th>
          <th>Foto</th>
          <th width="5%">Default</th>
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
            <td>{{$d->product->name}}</td>
            <td>
                <img src="{{url($d->photo)}}" width="50px" style="cursor: pointer" alt="photo {{$d->product->name}}">
            </td>
            <td>{!! $d->is_default?'<label class="badge badge-success">Yes</label>':'<label class="badge badge-danger">Tidak</label>' !!}</td>
            <td>
                <button class="hapusBarang btn btn-sm btn-danger"
                    data-name="{{$d->product->name}}"
                    data-url="{{route('produk-galeri.destroy',$d->id)}}"
                ><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @empty
        <tr class="text-center text-danger">
            <td colspan="5">Maaf, Data Foto Barang tidak ada</td>
        </tr>
        @endforelse
    </tbody>
  </table>
  {!! $data->links() !!}
</div>
