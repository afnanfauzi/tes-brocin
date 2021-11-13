<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Mahasiswa;
use App\Prodi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {

        $dosen = Prodi::with(['dosen','mahasiswa'])->get();
        if($request->ajax()){
            return datatables()->of($dosen)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Info Dosen" class="edit btn btn-info btn-sm open-info" title="Lihat Detail Dosen"><i class="fa fa-info fa-sm" style="padding:6px"></i></a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    
            return view('data.dosen');
    }

    public function show(Prodi $prodi)
    {
        $where = array('kd_prodi' => $id);
        $where2 = array('kd_prodi'=>$id);
        $post  =  Prodi::with('dosen')->where($where)->get();
        $mahasiswa = Prodi::with('Mahasiswa')->where($where2)->get();

        if ($post) {

            return response()->json([
                'success' => true,
                'message' => 'Data Dosen Ada',
                'dosen' => $post,
                'mahasiswa' => $mahasiswa,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Dosen Tidak Ada',
            ], 404);
        }
    }
}
