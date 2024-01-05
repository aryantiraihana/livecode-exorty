@extends('layouts.template')

@section('content')
    
    <form action="{{ route('produk.update', $produk['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        
        <div class="mb-3 row">
            <label for="produk" class="col-sm-2 col-form-label">Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="produk" name="produk" value="{{ $produk['produk'] }}" readonly>
            </div>
        </div>

        {{-- <div class="mb-3 row">
            <label for="produk" class="col-sm-2 col-form-label">Produk</label>
            <div class="col-sm-10">
                <select class="form-select" id="produk" name="produk">
                    <option selected disabled hidden>Pilih</option>
                    <option value="mie ayam" {{ $produk['produk'] == 'Mie ayam' ? 'selected' : '' }}>Mie Ayam</option>
                    <option value="bakso" {{ $produk['produk'] == 'Bakso' ? 'selected' : '' }}>Bakso</option>
                    <option value="soto ayam" {{ $produk['produk'] == 'Soto ayam' ? 'selected' : '' }}>Soto Ayam</option>
                </select>
            </div>
        </div> --}}
        
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" value="{{ $produk['price'] }}" >
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Produk</button>

    </form>
@endsection