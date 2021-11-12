<?php

namespace App\Http\Controllers;

use App\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {

        $dosen = Dosen::with('prodi')->get();
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

    public function show($id)
    {
        $where = array('id' => $id);
        $post  =  Dosen::with('prodi')->where($where)->get();

        if ($post) {

            return response()->json([
                'success' => true,
                'message' => 'Data Dosen Ada',
                'success' => $post,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Dosen Tidak Ada',
            ], 404);
        }
    }
}
