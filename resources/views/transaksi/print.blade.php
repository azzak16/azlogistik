<!DOCTYPE html>
<html>
<head>
    <title>Slip Gaji</title>
    <style>
        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .header {
            display: grid;
            grid-template-columns: auto 1fr;
            align-items: center;
            margin-bottom: 20px;
        }

        .company-logo {
            max-width: 100%;
            height: auto;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            margin: 0 0 10px 0;
            text-align: center;
        }

        .company-address {
            font-size: 14px;
            margin: 0 0 5px 0;
            text-align: center;
        }

        .section {
            margin-bottom: 10px;
        }

        .section h3 {
            margin: 0;
        }

        .section span {
            float: right;
        }

        .total {
            font-weight: bold;
        }

        .border-bot {
            border-bottom: 2px solid black;
        }

        .slip {
            font-weight: bold;
            font-size: 14px;
            margin: 5px 0 0 0;
            text-align: center;
        }

        .title-body{
            text-decoration: underline;
            font-weight: bold;
            font-size: 16px;
            margin: 0;
        }

        .column2 {
            display: flex;
            justify-content: space-between;
        }

        #strip thead tr th {
            width: 10%;
            background-color: grey;
            border-top: 2px solid black;
            border-bottom: 2px solid black;
        }
        .section-right {
            display: flex;
            flex-direction: row-reverse;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="img-header">
        </div>
        <div class="header">
            <img src="{{ asset('dist/img/AZLogistik.jpg') }}" alt="Logo Perusahaan" class="company-logo">
            <div class="company-info">
                <h2 class="company-name">PT.AZLogistik Dot Com</h2>
                <p class="company-address">jl. Kedung Doro No. 101 A, RT.001/RW.06,</p>
                <p class="company-address border-bot">Kedungdoro, kec. Tegalsari, Kota SBY, Jawa Timur 60261</p>
                <p class="slip" style="text-decoration: underline">Slip Gaji Karyawan</p>
            </div>
        </div>

        <div class="section">
            <table>
                <tr>
                    <td style="width: 100px">NIK</td>
                    <td style="width: 10px">:</td>
                    <td>{{ $transaksi->karyawan->nik }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $transaksi->karyawan->name }}</td>
                </tr>
                <tr>
                    <td>Golongan</td>
                    <td>:</td>
                    <td>{{ $transaksi->karyawan->golongan->type }}</td>
                </tr>
            </table>
        </div>

        <div class="section column2">
            <div>
                <p class="title-body">PENGHASILAN</p>
                <table>
                    <tr>
                        <td style="width: 150px">Gaji Pokok</td>
                        <td style="width: 100px">:</td>
                        <td style="width: 100px; text-align: right">Rp {{ number_format($transaksi->karyawan->golongan->gaji_pokok, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Uang Kehadiran</td>
                        <td>:</td>
                        <td style="text-align: right">Rp {{ number_format($transaksi->uang_kehadiran_baru, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Uang Lembur</td>
                        <td>:</td>
                        <td style="text-align: right">Rp {{ number_format($transaksi->uang_lembur_baru, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-weight:bold;">Total (A)</td>
                        <td style="border-top: 1px solid black; text-align: right; font-weight:bold;">Rp {{ number_format($transaksi->karyawan->golongan->gaji_pokok + $transaksi->uang_kehadiran_baru + $transaksi->uang_lembur_baru, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>

            <div>
                <p class="title-body">POTONGAN</p>
                <table>
                    <tr>
                        <td style="width: 150px; height: 60px; vertical-align:top">Potongan Absen</td>
                        <td style="width: 100px;vertical-align:top">:</td>
                        <td style="width: 100px; text-align: right;vertical-align:top">RP {{ number_format($transaksi->total_potongan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-weight:bold;">Total (A)</td>
                        <td style="border-top: 1px solid black; text-align: right; font-weight:bold;">Rp {{ number_format($transaksi->total_potongan, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="section">
            <table id="strip">
                <thead>
                    <tr style="">
                        <th style="text-align: center">PENERIMAAN BERSIH (A-B) &nbsp&nbsp&nbsp = &nbsp&nbsp&nbsp Rp {{ number_format($transaksi->gaji_total, 0, ',', '.') }}</th>
                        <input type="hidden" id="gaji-total" value="{{ $transaksi->gaji_total }}">
                    </tr>
                    <tr>
                        <th id="terbilang" style="text-align: center">Terbilang: # dasdasdsadsaasd #</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="section-right">
            <table>
                <tr>
                    <td style="width: 250px; height: 100px; vertical-align: top; text-align:center">Manager Operasional</td>
                </tr>
                <tr>
                    <td style="text-align: center">Vania Stephanie</td>
                </tr>
            </table>
        </div>

    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/@develoka/angka-terbilang-js/index.min.js"></script>
<script>
    $(document).ready(function () {
        var number = $('#gaji-total').val();
        var words = angkaTerbilang(number);

        $('#terbilang').html(`Terbilang: # ${words} #`);
    });
</script>
</body>
</html>
