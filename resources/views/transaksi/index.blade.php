@extends('layouts.home')
@section('title', 'transaksi')
@section('content')

<h1>Halaman Transaksi</h1>


<div class="card">
    <div class="card-body">
        <div class="group">
            <a href="{{ route('transaksi.create') }}" class="btn">Tambah</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jumlah Kehadiran</th>
                    <th>Jumlah Cuti</th>
                    <th>Jam Lembur (1 bulan) dalam jam</th>
                    <th>Hasil THP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td class="text-tengah">{{ $loop->iteration }}</td>
                    <td>{{ $item->karyawan->name }} [ {{ $item->karyawan->golongan->type }} ]</td>
                    <td class="text-tengah">{{ $item->jumlah_kehadiran }}</td>
                    <td class="text-tengah">{{ $item->jumlah_cuti }}</td>
                    <td class="text-tengah">{{ $item->jumlah_lembur }}</td>
                    <td class="text-kanan">Rp {{ number_format($item->gaji_total, 0, ',', '.') }}</td>
                    <td class="text-tengah">
                        <a href="{{ route('transaksi.print', $item->id) }}">Print</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>


@endsection
