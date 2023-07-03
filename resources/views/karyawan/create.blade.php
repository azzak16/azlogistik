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
                    <label for="name">Nama Karyawan</label>
                    <input type="text" name="name">
                </div>
                <div class="group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik">
                </div>
                <div class="group">
                    <label for="golongan_id">Golongan Karyawan</label>
                    <select name="golongan_id" id="golongan_id">
                        @foreach ($golongans as $golongan)
                        <option value="{{ $golongan->id }}">{{ $golongan->type }}</option>
                        @endforeach
                    </select>
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
                    url : "{{ route('karyawan.store') }}",
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
