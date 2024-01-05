@extends('layouts.template')

@section('content')

<form action="{{ route('transaksi.store') }}" method="POST" class="card p-5 shadow p-3 mb-5 bg-body rounded border-0">
    @csrf

    <div class="form-group">
        <label for="date_time" class="col-sm-2 col-form-label">Tanggal</label>
        <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="date_time" name="date_time">
        </div>
    </div>
    
    <div class="form-group">
        <label for="name_customer" class="col-sm-2 col-form-label">Nama Pembeli</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name_customer" name="name_customer">
        </div>
    </div>

    <div class="form-group">
        <label for="qty" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="qty" name="qty">
        </div>
    </div>

    <div class="form-group">
        <label for="produk" class="col-sm-2 col-form-label">Menu</label>
        <div class="col-sm-10">
            <select name="produk_id[]" id="produk_id" class="form-select">
                <option selected hidden disabled>Pesanan 1</option>
                @foreach ($produk as $item)
                    <option value="{{ $item->id }}">{{ $item->produk }}</option>
                @endforeach
            </select>
            <div id="wrap-produk"></div>
            <br>
            <p style="cursor: pointer" class="text-primary" id="add-select">+ tambah pesanan</p>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 btn-sm" style="width: 150px;">Tambah Data Pembelian</button>
</form>

@endsection

@push('script')
    <script>
        let no = 2;
        
        $("#add-select").on("click", function() {
           
            let el = `<br><select name="produk_id[]" id="produk_id" class="form-select">
            <option selected hidden disabled>Pesanan ${no}</option>
                @foreach ($produk as $item)
                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                @endforeach
            </select>`;
            $("#wrap-medicines").append(el);
            no++;
        });
    </script>
@endpush