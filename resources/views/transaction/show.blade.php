<div class="row container mt-2">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <strong>Nama</strong>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9" id="name">
        {{$data->name}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->name}}" tipenya="name" title="Edit Nama Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <strong>Email</strong>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9" id="email">
        {{$data->email}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->email}}" tipenya="email" title="Edit Email Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <strong>Nomer</strong>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9" id="number">
        {{$data->number}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->number}}" tipenya="number" title="Edit Nomor Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <strong>Alamat</strong>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9" id="address">
        {{$data->address}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->address}}" tipenya="address" title="Edit Alamat Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <strong>Total Transaksi</strong>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
        Rp. {{number_format($data->transaction_total, 0, ".", ".")}}
    </div>
</div>
<div class="row container mt-4">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <strong>Status Transaksi</strong>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9 statusTran">
        @if($data->transaction_status == 'PENDING')
        <label class="badge badge-info">
        @elseif($data->transaction_status == 'SUCCESS')
        <label class="badge badge-success">
        @elseif($data->transaction_status == 'FAILED')
        <label class="badge badge-warning">
        @else
        <label>
        @endif
        {{$data->transaction_status}}
        </label>
    </div>
</div>
<div class="row container mt-4">
    <div class="col-sm-12 col-md-3 col-lg-3">
        <strong>Pembelian</strong>
    </div>
    <div class="col-sm-12 col-md-9 col-lg-9">
        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>
            </tr>
            @foreach ($data->details as $item)
                <tr>
                    <td>{{$item->product->name}}</td>
                    <td>{{$item->product->type}}</td>
                    <td>Rp. {{number_format($item->product->price, 0, ".", ".")}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>


{{-- <table class="table table-striped">
    <tr>
        <th>Nama</th>
        <td >{{$data->name}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->name}}" tipenya="name" title="Edit Nama Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i></td>
    </tr>
    <tr>
        <th>Email</th>
        <td id="email">{{$data->email}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->email}}" tipenya="email" title="Edit Email Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i></td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td id="number">{{$data->number}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->number}}" tipenya="number" title="Edit Nomor Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td id="address">{{$data->address}} <i url="{{route('transaksi.update',$data->id)}}" isi="{{$data->address}}" tipenya="address" title="Edit Alamat Pemesan" class="editForm fas fa-pencil-alt text-warning" style="cursor: pointer"></i></td>
    </tr>
    <tr>
        <th>Total Transaksi</th>
        <td>Rp. {{number_format($data->transaction_total, 0, ".", ".")}}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>
            @if($data->transaction_status == 'PENDING')
            <label class="badge badge-info">
            @elseif($data->transaction_status == 'SUCCESS')
            <label class="badge badge-success">
            @elseif($data->transaction_status == 'FAILED')
            <label class="badge badge-warning">
            @else
            <label>
            @endif
            {{$data->transaction_status}}
            </label>
        </td>
    </tr>
    <tr>
        <th>Pembelian</th>
        <td>
        </td>
    </tr>
</table> --}}
<hr>
<div class="row container text-center">
    <div class="col-4">
        <button class="actionStatus btn btn-sm btn-success"
            data-name="{{$data->kode}}"
            data-status="SUCCESS"
            data-url="{{route('transaksi.update',$data->id)}}">
            <i class="fas fa-check"></i> Set Sukses
        </button>
    </div>
    <div class="col-4">
        <button class="actionStatus btn btn-sm btn-warning"
            data-name="{{$data->kode}}"
            data-status="FAILED"
            data-url="{{route('transaksi.update',$data->id)}}">
            <i class="fas fa-check"></i> Set Gagal
        </button>
    </div>
    <div class="col-4">
        <button class="actionStatus btn btn-sm btn-info"
            data-name="{{$data->kode}}"
            data-status="PENDING"
            data-url="{{route('transaksi.update',$data->id)}}">
            <i class="fas fa-check"></i> Set Pending
        </button>
    </div>
</div>
<hr>
