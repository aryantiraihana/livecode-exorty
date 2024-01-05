@extends('layouts.template')

@section('content')

    @if(Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif
    
    @if(Session::get('deleted'))
    <div class="alert alert-warning"> {{ Session::get('deleted') }} </div>
    @endif
    
    <h3>Data Produk</h3>
    <p><a href="/" style="text-decoration: none"> Home / </a>Data Produk</p>
    
    
    <div class="p-2"><a href="{{ route('produk.create') }}" class="btn btn-primary mt-2 btn-sm" style="width: 150px;">Tambah</a></div>
  
    <br>
    <table class="table">
        
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>                
                <th scope="col">Harga</th>                
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($produk as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['produk'] }}</td>               
                    <td>{{ $item['price'] }}</td>               
                 
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('produk.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$item['id']}}">
                                Hapus 
                            </button>
                    </td>
                </tr>
                <div class="modal fade" id="exampleModal-{{$item['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        </div>

                        <div class="modal-body">
                            Yakin ingin menghapus data ini? 
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('produk.delete', $item['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')    
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>  
                        </div>

                    </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection