<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Mail;
use App\Mail\sendFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\pengunjung;
use App\Models\reservation_group;
use App\Models\Group_Member;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Schema;
use App\Jobs\sendFeedbackJob;


class PengunjungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pengunjung.registrasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $rulesGroup = [
        'reservation_sessions_id' => 'required',
        'pic_name' => 'required',
        'nama_group' => 'required',
        'tanggal' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required|numeric|min:9',
        'email' => 'required|email:dns',
        'group_code',
        ];
        $validateGroupMasages = [
            'reservation_sessions_id.required'=>'Session Wajib Diisi!',
            'pic_name.required'=>'Nama Wajib Diisi!',
            'nama_group.required'=>'Nama Group Wajib Diisi!',
            'tanggal.required'=>'Tanggal Wajib Diisi!',
            'alamat.required'=>'Alamat Wajib Diisi!',
            'no_telp.required'=>'Nomor Telepon Wajib Dipilih!',
            'email.required'=>'Email Wajib Di isi!',
            'email.email'=>'pastikan email anda sudah benar',
        ];

        $rulesPengunjung = [
            'visitor_name' => 'required|max:16',
            'gender' => 'required',
            'age' => 'required|numeric|min:18',
            'job_title' => 'required',
            'emailPengunjung' => 'required|email:dns',
            'intitution_category' => 'required',
        ];

        $validatePengunjungMasages = [
            'visitor_name.required'=>'Nama Pengunjung Wajib Diisi!',
            'gender.required'=>'Jenis Kelamin Wajib Diisi!',
            'age.required'=>'Umur Wajib Diisi!',
            'age.min'=>'Wajib berumur 18',
            'job_title.required'=>'Pekerjaan Wajib Diisi!',
            'intitution_category.required'=>'Institusi Wajib Diisi!',
            'emailPengunjung.required'=>'Email Wajib Di Isi!',
            'emailPengunjung.email'=>'pastikan email anda sudah benar',
        ];
        $validatedGroup = $request->validate($rulesGroup,$validateGroupMasages);
        
        $count = count($request['visitor_name']);

        for ($i = 0 ; $i < $count ; $i++ )
            {
                $pengunjung = new pengunjung();
                $pengunjung->visitor_name = $request['visitor_name'][$i];
                $pengunjung->gender = $request['gender'][$i];
                $pengunjung->age = $request['age'][$i];
                $pengunjung->job_title = $request['job_title'][$i];
                $pengunjung->intitution_category = $request['intitution_category'][$i];
                Validator::make($pengunjung->toArray(), $rulesPengunjung, $validatePengunjungMasages);
            }
        $validatedGroup['group_code'] = mt_rand(1000, 9999);
        $validatedGroup['total_member'] = $count;
        reservation_group::create($validatedGroup);
        $groupid = reservation_group::where('group_code', $validatedGroup['group_code'])->value('id');

        for ($i = 0 ; $i < $count ; $i++ )
        {
            $pengunjung = new pengunjung;
            $group_member = new group_member;
            $pengunjung->visitor_name = $request['visitor_name'][$i];
            $pengunjung->email = $request['emailPengunjung'][$i];
            $pengunjung->gender = $request['gender'][$i];
            $pengunjung->age = $request['age'][$i];
            $pengunjung->job_title = $request['job_title'][$i];
            $pengunjung->intitution_category = $request['intitution_category'][$i];
            $pengunjung->save();

            $groupMember = [
                'pengunjung_id' => $pengunjung->id,
                'reservasi_id' => $groupid,
            ];
            group_member::create($groupMember);
        }

        return redirect('/pengunjung/reservasiConfirmation/'.Crypt::encryptString($groupid));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function reservasiConfirmation($id)
    {
        $decryptedID = Crypt::decryptString($id);
        $reservation_group = reservation_group::where('id', $decryptedID)->first();
        
        if ( $reservation_group->registration_confirmation_at != null ){
            return back()->with('message', 'Data sudah di registrasi sebelumnya silakan check email anda untuk melihat barcode');
        }

        $cryptCode = Crypt::encryptString($reservation_group->group_code);
        return view('pengunjung.visitor_detail_user',compact('reservation_group', 'cryptCode'));
    }

    public function attendConfirmation(Request $request)
    {

        if($request['member'] == null) {
            return redirect('/validateCode')->with('message', 'Data Tidak Valid'); 
        }

        if(now()->format("m/d/Y") != $request['tanggal']) {
            return redirect('/validateCode')->with('message', 'Tanggal tidak valid'); 
        }

        $count = count($request['member']);
        $reservasi = group_member::where('id', $request->groupid)->first();
        $reservasi = reservation_group::where('id', $reservasi['reservasi_id'])->first();
        reservation_group::where('id', $reservasi['id'])->update([
        'total_member' => $count,
        ]);
        
        for ($i = 0 ; $i < $count ; $i++ ) {
            
            group_member::where('id', $request['member'][$i])->update([
                'Kehadiran' => true,
            ]);
        }

        reservation_group::where('id', $request['groupid'])->update([
            'group_code' => null,
            'attend_confirmation_at' => now(),
        ]);

        return redirect('/validateCode')->with('message', 'Data sudah berhasil di tambahkan'); 
        }

}
