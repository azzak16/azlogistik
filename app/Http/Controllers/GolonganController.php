<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GolonganController extends Controller
{
   public function index()
   {
        $data = Golongan::get();

        return view('golongan.index', compact('data'));
   }

   public function create()
   {
    return view('golongan.create');
   }

   public function store(Request $request)
   {
        DB::beginTransaction();

        $lembur = $request->gaji_pokok / (8.5 * 22);


        $lembur_bulat = bulat($lembur);

        $golongan = Golongan::create([
            'type'              => $request->type,
            'gaji_pokok'        => $request->gaji_pokok,
            'uang_kehadiran'    => $request->uang_kehadiran,
            'uang_lembur'       => $lembur_bulat
        ]);

        if (!$golongan) {
            DB::rollback();
            return response()->json([
                'status' => false,
                'message'     => $golongan
            ], 400);
        }

        DB::commit();
        return response()->json([
            'status'     => true,
            'message'   => 'oke',
            'url'     => route('golongan.index'),
        ], 200);
   }
}
