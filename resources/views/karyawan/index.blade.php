@extends('layouts.home')
@section('title', 'karyawan')
@section('content')

<h1>Halaman karyawan</h1>


<div class="card">
    <div class="card-body">
        <div class="group">
            <a href="{{ route('karyawan.create') }}" class="btn">Tambah</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nik</th>
                    <th>Golongan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="text-tengah">{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nik }}</td>
                    <td class="text-tengah">{{ $item->golongan->type }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
