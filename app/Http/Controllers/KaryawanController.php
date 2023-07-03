<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {
        $data = Karyawan::with('golongan')->get();

        return view('karyawan.index', compact('data'));
    }

    public function create()
    {
        $golongans = Golongan::get(['id', 'type']);

        return view('karyawan.create', compact('golongans'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $karyawan = Karyawan::create([
            'name'               => $request->name,
            'nik'               => $request->nik,
            'golongan_id'        => $request->golongan_id,
        ]);

        if (!$karyawan) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message'     => $karyawan
            ], 400);
        }

        DB::commit();
        return response()->json([
            'status'     => true,
            'message'   => 'oke',
            'url'     => route('karyawan.index'),
        ], 200);
    }
}
