@extends('layouts.home')
@section('title', 'karyawan')
@section('content')

<h1>Golongan</h1>

<div class="card">
    <div class="card-body">

        <div class="group">
            <a href="{{ route('golongan.create') }}" class="btn">Tambah</a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Gaji Pokok</th>
                        <th>Uang Kehadiran</th>
                        <th>Uang Lembur</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td class="text-tengah">{{ $item->type }}</td>
                        <td class="text-kanan">Rp {{ number_format($item->gaji_pokok, 0, ',', '.') }}</td>
                        <td class="text-kanan">Rp {{ number_format($item->uang_kehadiran, 0, ',', '.') }}</td>
                        <td class="text-kanan">Rp {{ number_format($item->uang_lembur, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection

