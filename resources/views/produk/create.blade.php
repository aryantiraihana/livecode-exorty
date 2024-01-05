@extends('layouts.template')

@section('content')

<form action="{{ route('produk.store') }}" method="POST" class="card p-5 shadow p-3 mb-5 bg-body rounded border-0">
    @csrf

    <div class="form-group">
        <label for="produk" class="col-sm-2 col-form-label">Produk</label>
        <div class="col-sm-10">
            <select class="form-select" id="produk" name="produk">
                <option selected disabled hidden>Pilih</option>
                <option value="mie ayam">Mie Ayam</option>
                <option value="bakso">Bakso</option>
                <option value="soto ayam">Soto Ayam</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="price" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price">
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 btn-sm" style="width: 150px;">Tambah Data</button>
</form>

@endsection