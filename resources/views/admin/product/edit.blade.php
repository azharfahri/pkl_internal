@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit Product</h4>
        <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="categori_id">
                            <option disabled>Pilih Kategori</option>
                            @foreach ($categories as $data)
                            <option value="{{ $data->id }}" {{ $product->categori_id == $data->id ? 'selected' : ''}}>
                                {{ $data->nama }}
                            </option>
                            @endforeach
                        </select>
                        <label for="tb-name">Nama Category</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama" value="{{ $product->nama }}" required>
                        <label for="tb-name">Nama product</label>
                        @error('nama')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="deskripsi" value="{{ $product->deskripsi }}" required>
                        <label for="tb-name">Deskripsi</label>
                        @error('deskripsi')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="harga" value="{{ $product->harga }}" required>
                        <label for="tb-name">harga</label>
                        @error('harga')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="stok" value="{{ $product->stok }}" required>
                        <label for="tb-name">stok</label>
                        @error('stok')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="gambar" accept="image/*" required>
                        <label for="tb-name">Gambar</label>
                        <small class="text-muted">
                            kosongkan jika tidak ining mengubah gambar
                        </small>
                        @if ($product->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'. $product->gambar) }}" class="rounded-circle" width="100">
                        </div>
                        @endif
                        @error('gambar')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-md-flex align-items-center">
                        <div class="ms-auto mt-3 mt-md-0">
                            <button type="submit" class="btn btn-primary">
                                <i></i>
                                submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
