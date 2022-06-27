<div class="form-group">
    <input type="text" class="form-control" value="{{request()->get('search')}}" id="search" placeholder="Cari Transaksi">
</div>
<div class="table-responsive">
    <input type="hidden" id="thisPage" value="{{($page)?$page:1}}">
  <table class="table table-sm table-striped" width="100%">
    <thead>
      <tr>
          <th width="10%" class="text-center">No.</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Nomor</th>
          <th>Total Transaksi</th>
          <th width="10%" class="text-center">Ststus</th>
      </tr>
    </thead>
    <tbody id="table-body">
        @php
            if($page && $page!= 1){
                $i=($page*10)-10;
            }else{
                $i= 0;
            }
        @endphp
        @forelse ($data as $d)
        <tr>
            <td class="text-center">{{++$i}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->number}}</td>
            <td>Rp. {{number_format($d->transaction_total, 0, ".", ".")}}</td>
            <td class="text-center">
                @if($d->transaction_status == 'PENDING')
                <button class="btn btn-sm btn-info" style="border-radius: 50px;cursor: default;">
                @elseif($d->transaction_status == 'SUCCESS')
                <button class="btn btn-sm btn-success" style="border-radius: 50px;cursor: default;">
                @elseif($d->transaction_status == 'FAILED')
                <button class="btn btn-sm btn-warning" style="border-radius: 50px;cursor: default;">
                @else
                <button class="btn btn-sm btn-light" style="border-radius: 50px;cursor: default;">
                @endif
                {{$d->transaction_status}}
                </button>
            </td>
        </tr>
        @empty
        <tr class="text-center text-danger">
            <td colspan="6">Maaf Data Transaksi tidak ada</td>
        </tr>
        @endforelse
    </tbody>
  </table>
  {!! $data->appends(request()->except('page'))->links() !!}
</div>


