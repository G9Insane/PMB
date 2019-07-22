<?php

namespace App\Http\Controllers;

use App\Models\CalonMahasiswa;
use App\Models\Jurusan;
use App\Models\JurusanKuotum;
use App\User;
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

        $data = Jurusan::updateOrCreate(['j_id'=> $request->j_id], $request->except('jurusan_kuota'));
        if ($data) {
            JurusanKuotum::updateOrCreate([
                'jk_jurusan_id' => $data->j_id
            ], ['jk_jurusan_id' => $data->j_id, 'jk_kuota' => $request->jk_kuota,]);
        }
        return response()->json('data');
    }

    public function jurusanDelete($id)
    {
        $data = Jurusan::where('j_id',$id)->delete();
        return response()->json($data);
    }

    public function hasilList($id)
    {
        $data = new stdClass();
        $data->no = 1;
        $data->jurusan = Jurusan::with('jurusan_kuota')->get();
        $data->hasil = CalonMahasiswa::with('user.hasil_seleksis','jurusan.jurusan_kuota')
            ->where('cm_jurusan_id',$id)->get();
        return view('pages.hasil',compact('data'));
    }

    public function calonMahasiswaList()
    {
        $data = new stdClass();
        $data->no = 1;
        $data->jurusan = Jurusan::with('jurusan_kuota')->get();
        $data->mhs = CalonMahasiswa::with('jurusan')->get();
        return view('pages.calonmahasiswa',compact('data'));
    }

    public function calonMahasiswaEdit($id)
    {
        $data = CalonMahasiswa::leftJoin('users','cm_user_id','=','id')->where('id',$id)->first();
        return response()->json($data);
    }

    public function calonMahasiswaSave(Request $request)
    {

        $request->merge([
            'password' => bcrypt($request->password),
        ]);

        $data = User::updateOrCreate(  ['id'=> $request->id],
            $request->only('id','name','email','password')
        );
        $request->request->add(
            ['cm_nama' => $request->name]
        );

        if ($data){
            CalonMahasiswa::updateOrCreate([
                'cm_user_id' => $data->id
            ],
                $request->except('id','name','email','password')
            );
        }
        return response()->json($data,200);
    }

    public function calonMahasiswaDelete($id)
    {
        $data = CalonMahasiswa::where('cm_id',$id)->delete();
        return response()->json($data);
    }
}
