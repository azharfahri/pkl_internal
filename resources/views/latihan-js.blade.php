@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Latihan Javascript</h1>
    <p>ini contoh javascript</p>
    <button id="alertButton" class="btn btn-primary">klik</button>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('alertButton')
        .addEventListener('click', () => alert('Tombol telah di klik'));
    });
</script>
@endpush
