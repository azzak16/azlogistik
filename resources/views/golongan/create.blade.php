@extends('layouts.home')
@section('title', 'karyawan')
@section('content')

<h1>Tambah Golongan</h1>

<div>
<div class="card">
    <div class="card-body">
        <form action="" method="POST" id="form">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gaji_pokok">Gaji Pokok</label>
                <input type="number" name="gaji_pokok">
            </div>
            <div class="form-group">
                <label for="tyuang_kehadirane">Uang Kehadiran</label>
                <input type="number" name="uang_kehadiran">
            </div>

            <div class="form-group">
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
                    url : "{{ route('golongan.store') }}",
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
