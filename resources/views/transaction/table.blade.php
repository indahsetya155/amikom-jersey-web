<div class="table-responsive">
    <input type="hidden" id="thisPage" value="{{($page)?$page:1}}">
  <table class="table table-striped" width="100%">
    <thead>
      <tr>
          <th width="10%" class="text-center">No.</th>
          <th>ID Transaksi</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Nomor</th>
          <th>Total Transaksi</th>
          <th width="10%" class="text-center">Ststus</th>
          <th width="15%" class="text-center">Aksi</th>
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
            <td>{{$d->kode}}</td>
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
            <td class="text-center">
                @if($d->transaction_status == 'PENDING')
                <div class="btn-group">
                    <button class="actionStatus btn btn-sm btn-success"
                        data-name="{{$d->kode}}"
                        data-status="SUCCESS"
                        data-url="{{route('transaksi.update',$d->id)}}">
                        <i class="fas fa-check"></i>
                    </button>
                    <button class="actionStatus btn btn-sm btn-warning"
                        data-name="{{$d->kode}}"
                        data-status="FAILED"
                        data-url="{{route('transaksi.update',$d->id)}}">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endif
                <button class="btn btn-sm btn-light lihatTransaksi"
                    data-kode="{{$d->kode}}"
                    data-url="{{route('transaksi.show',$d->id)}}">
                    <i class="fas fa-eye text-primary"></i></i>
                </button>
                <button class="hapusTransaksi btn btn-sm btn-danger"
                    data-name="{{$d->kode}}"
                    data-url="{{route('transaksi.destroy',$d->id)}}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        @empty
        <tr class="text-center text-danger">
            <td colspan="8">Maaf Data Transaksi tidak ada</td>
        </tr>
        @endforelse
    </tbody>
  </table>
  {!! $data->appends(request()->except('page'))->links() !!}
</div>
