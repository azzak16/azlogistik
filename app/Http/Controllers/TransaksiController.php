<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with(['karyawan', 'karyawan.golongan'])->get();

        return view('transaksi.index', compact('data'));
    }

    public function create()
    {
        $karyawans = Karyawan::with('golongan')->get();

        return view('transaksi.create', compact('karyawans'));
    }

    public function store(Request $request)
    {
        // Gaji total = Gaji pokok + Uang kehadiran
        // 1 bulan hari kerja efektif adalah 22 hari

        // 1 hari kerja adalah 8.5 jam

        // Jika karyawan memiliki jatah cuti maka gaji pokok diterima utuh
        // akan tetapi uang kehadiran tidak diperoleh sebesar ketentuan per kehadiran pada poin 3
        //
        // Jika karyawan tidak memiliki jatah cuti maka gaji pokok dipotong sebesar gaji pokok
        // sesuai golongan karyawan dibagi 1 bulan hari kerja efektif per hari,
        // disamping itu uang kehadiran tidak diperoleh sebesar ketentuan per kehadiran pada poin 3

        // Ketentuan uang lembur dihitung per jam bedasarkan gaji pokok dibagi (1 hari kerja * 1 bulan hari kerja efektif)

        // Hasil dari uang lembur dan uang potongan yang sudah dibabarkan pada poin ke 6 dan 7 dibulatkan ke bawah 3 digit dari belakang

        $karyawan = Karyawan::with('golongan')->find($request->karyawan_id);

        if ($request->jumlah_cuti > 0) {
            $sisa = 22 - $request->jumlah_kehadiran;

            if ($request->jumlah_cuti - $sisa > 0) {
                $potongan = 0;

                $data = $this->hitungTotal($karyawan, $potongan, $request->jumlah_kehadiran, $request->jumlah_lembur);

            }else{
                $jumlah_kehadiran = ($request->jumlah_cuti - $sisa) + 22;
                $potongan = bulat($karyawan->golongan->gaji_pokok / $jumlah_kehadiran);

                $data = $this->hitungTotal($karyawan, $potongan, $jumlah_kehadiran, $request->jumlah_lembur);
            }


        }else{

            $potongan = bulat($karyawan->golongan->gaji_pokok / $request->jumlah_kehadiran);

            $data = $this->hitungTotal($karyawan, $potongan, $request->jumlah_kehadiran, $request->jumlah_lembur);

        }

        DB::beginTransaction();
        $transaksi = Transaksi::create([
            'karyawan_id'        => $request->karyawan_id,
            'jumlah_kehadiran'        => $request->jumlah_kehadiran,
            'jumlah_cuti'        => $request->jumlah_cuti,
            'jumlah_lembur'        => $request->jumlah_lembur,
            'gaji_total'        => $data['gaji_total'],
            'total_potongan'        => $potongan,
            'gaji_pokok_baru'        => $data['gaji_pokok_baru'],
            'uang_kehadiran_baru'        => $data['uang_kehadiran_baru'],
            'uang_lembur_baru'        => $data['uang_lembur_baru'],
        ]);

        if (!$transaksi) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message'     => $transaksi
            ], 400);
        }

        DB::commit();
        return response()->json([
            'status'     => true,
            'message'   => 'oke',
            'url'     => route('transaksi.index'),
        ], 200);
    }

    public function print($id)
    {
        $transaksi = Transaksi::with(['karyawan', 'karyawan.golongan'])->find($id);
        return view('transaksi.print', compact('transaksi'));
    }

    public function hitungTotal($karyawan, $potongan, $jumlah_kehadiran, $jumlah_lembur)
    {
        $gaji_pokok_baru = $karyawan->golongan->gaji_pokok - $potongan;
        $uang_kehadiran_baru = $karyawan->golongan->uang_kehadiran * $jumlah_kehadiran;
        $uang_lembur_baru = $karyawan->golongan->uang_lembur * $jumlah_lembur;

        $gaji_total = $gaji_pokok_baru + $uang_kehadiran_baru + $uang_lembur_baru;

        $data = [
            'gaji_pokok_baru' => bulat($gaji_pokok_baru),
            'uang_kehadiran_baru' => bulat($uang_kehadiran_baru),
            'uang_lembur_baru' => bulat($uang_lembur_baru),
            'gaji_total' => bulat($gaji_total),
        ];

        return $data;
    }
}
