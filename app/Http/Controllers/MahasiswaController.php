<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $mahasiswa = Prodi::with('mahasiswa')->get();
        if($request->ajax()){
            return datatables()->of($mahasiswa)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash fa-sm"></i></button>';       
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
    
            return view('data.mahasiswa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        //    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->id;

        $messages = [

        ];

        //validate data
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'kd_prodi' => 'required',
        ], $messages);


        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => $messages,
                'data'    => $validator->errors()
            ],401);

        }else {


            $mahasiswa   =   Mahasiswa::updateOrCreate(['id' => $id],
                        [
                            'nim' => $request->nim,
                            'nama' => $request->nama,
                            'alamat' => $request->alamat,
                            'kd_prodi' => $request->kd_prodi,
                        ]); 

        
            
            if ($mahasiswa) {

                return response()->json([
                    'success' => true,
                    'message' => 'Mahasiswa Berhasil Ditambahkan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Mahasiswa Gagal Ditambahkan!',
                ], 401);
            }
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $mahasiswa  = Mahasiswa::where($where)->first();
     
        return response()->json($mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::where('id',$id)->get();
        $mahasiswa->delete();
     
        return response()->json($mahasiswa);
    }

}
