@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit Category</h4>
        <form action="{{ route('admin.category.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama" value="{{ $category->nama }}" required>
                        <label for="tb-name">Nama Category</label>
                        @error('nama')
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

