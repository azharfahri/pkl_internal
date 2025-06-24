@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card">
                <div class="card-header">Data Product</div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="{{ route('admin.product.create') }}" type="button" class="btn btn-primary">Tambah Produk</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Photo Product</th>

                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @forelse ($product as $item)
                            <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->category->nama }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->slug }}</td>
                            <td><img src="{{ asset('storage/'. $item->gambar) }}" class="rounded-circle" width="100"></td>
                            <td>
                                <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('admin.product.edit', $item->id) }}" type="button" class="btn btn-success">Edit</a>
                                {{-- <a href="#" type="button" class="btn btn-warning">Show</a> --}}

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <h1>belum ada data</h1>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection

