<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\JurusanKuotum;
use Illuminate\Http\Request;
use stdClass;

class AdminController extends Controller
{
    public function jurusanList()
    {
        $data = new stdClass();
        $data->no = 1;
        $data->jurusan = Jurusan::with('jurusan_kuota')->get();
        return view('pages.jurusan', compact('data'));
    }

    public function jurusanEdit($id)
    {
        $data = Jurusan::leftJoin('jurusan_kuota','jk_jurusan_id','=','j_id')->where('j_id',$id)->first();
        return response()->json($data);
    }

    public function jurusanSave(Request $request)
    {

        $data = Jurusan::updateOrCreate(
            ['j_id'=> $request->j_id],

                $request->except('jurusan_kuota')
            );
        if ($data) {
            JurusanKuotum::updateOrCreate([
                'jk_jurusan_id' => $data->j_id
            ], [
                'jk_jurusan_id' => $data->j_id,
                'jk_kuota' => $request->jk_kuota,
            ]);
        }
        return $request->all();
    }

    public function jurusanDelete($id)
    {
        $data = Jurusan::where('j_id',$id)->delete();
        return response()->json($data);
    }

    public function hasilList()
    {
        return view('pages.hasil');
    }

    public function calonMahasiswaList()
    {
        return view('pages.calonmahasiswa');
    }
}
