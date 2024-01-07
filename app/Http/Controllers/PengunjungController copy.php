<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\pengunjung;

class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $katakunci = $request->$katakunci;
        // if(strlen($katakunci)){
        //     $data = pengunjung::where('nama', 'like', "%$katakunci%")
        //             ->orWhere('nohp', 'like', "%$katakunci%")
        //             ->orWhere('email', 'like', "%$katakunci%");
        // } else {
        //     $data = pengunjung::orderBy('id','desc')->get();
        // }
        
        // return view('pengunjung.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengunjung.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('visitor_name',$request->visitor_name);
        Session::flash('gender',$request->gender);
        Session::flash('age',$request->umur);
        Session::flash('job_title',$request->job_title);
        Session::flash('institution_category',$request->institution_category);

        $request->validate([
            'visitor_name'=>'required:pengunjung,visitor_name',
            'gender'=>'required:pengunjung,gender',
            'age'=>'required:pengunjung,age',
            'job_title'=>'required:pengunjung,job_title',
            'institution_category'=>'required:pengunjung,institution_category',
        ],[
            'visitor_name.required'=>'Nama Wajib Diisi!',
            'gender.required'=>'Gender Wajib Diisi!',
            // 'nohp.numeric'=>'Nomer Handphone Wajib Dalam Angka!',
            'age.required'=>'Umur Wajib Diisi!',
            'job_title.required'=>'Pekerjaan Wajib Diisi!',
            'institution_category.required'=>'Institusi Wajib Dipilih!',
        ]);
        $data = [
            'visitor_name'=>$request->visitor_name,
            'gender'=>$request->gender,
            'age'=>$request->age,
            'job_title'=>$request->job_title,
            'institution_category'=>$request->institution_category,
        ];
        pengunjung::create($data);
        return redirect()->to('pengunjung')->with('success', 'Terimakasih Sudah Mendaftarkan Diri Untuk Mengunjungi xEV Center, Kami Tunggu Kehadiran Anda :)');
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
        $data = pengunjung::where('visitor_name', $id)->first();
        return view('pengunjung.edit')->with ('data', $data);
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
        $request->validate([
            'visitor_name'=>'required:pengunjung,visitor_name',
            'gender'=>'required:pengunjung,gender',
            'age'=>'required:pengunjung,age',
            'job_title'=>'required:pengunjung,job_title',
            'institution_category'=>'required:pengunjung,institution_category',
        ],[
            'visitor_name.required'=>'Nama Wajib Diisi!',
            'gender.required'=>'Gender Wajib Diisi!',
            // 'nohp.numeric'=>'Nomer Handphone Wajib Dalam Angka!',
            'age.required'=>'Umur Wajib Diisi!',
            'job_title.required'=>'Pekerjaan Wajib Diisi!',
            'institution_category.required'=>'Institusi Wajib Dipilih!',
        ]);
        $data = [
            'visitor_name'=>$request->visitor_name,
            'gender'=>$request->gender,
            'age'=>$request->umur,
            'job_title'=>$request->job_title,
            'institution_category'=>$request->institution_category,
        ];
        pengunjung::where('visitor_name' ,$id)->update($data);
        return redirect()->to('pengunjung')->with('success', 'Data Telah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pengunjung::where('visitor_name', $id)->delete();
        return redirect()->to('pengunjung')->with('success', 'Berhasil Menghapus Data');
    }
}
