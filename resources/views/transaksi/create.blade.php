@extends('layouts.home')
@section('title', 'karyawan')
@section('content')

<h1>Tambah Karyawan</h1>

<div>
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" id="form">
                @method('POST')
                @csrf

                <div class="group">
                    <label for="karyawan_id">Nama Karyawan</label>
                    <select name="karyawan_id" id="karyawan_id">
                        @foreach ($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}">{{ $karyawan->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="group">
                    <label for="jumlah_kehadiran">Jumlah Kehadiran</label>
                    <input type="number" name="jumlah_kehadiran">
                </div>
                <div class="group">
                    <label for="jumlah_cuti">Jumlah Cuti</label>
                    <input type="number" name="jumlah_cuti">
                </div>
                <div class="group">
                    <label for="jumlah_lembur">Jumlah Lembur</label>
                    <input type="number" name="jumlah_lembur">
                </div>

                <div class="group">
                    <a href="#" id="submit" class="btn">Create</a>
                </div>
            </form>
        </div>
    </div>

</div>


@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#submit').on('click', function () {
                $.ajax({
                    url : "{{ route('transaksi.store') }}",
                    method : 'POST',
                    data: new FormData($("#form")[0]),
                    processData: false,
                    contentType: false,
                    success : function(result){
                        alert(result.message);
                        document.location = result.url;
                    },
                    error: function(response) {
                        var response = response.responseJSON;

                        alert(response.message);
                    }
                });
            })
    })
</script>
@endpush
