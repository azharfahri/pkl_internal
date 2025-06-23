@extends('layouts.admin')
@section('content')
    <div class="container">
        <table>
            <tbody>
            @forelse ($category as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->slug }}</td>
                <td>Edit | Delete</td>
            </tr>
            @empty
            <h1>belum ada data</h1>
            @endforelse
        </tbody>
        </table>
    </div>
@endsection
