<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\allow_day;
use App\Models\dayoff;
use App\Models\activity_log;
use App\Models\reservation_session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $kuota = setting::pluck('kuota')->first();
        $dateInterval = setting::pluck('date_interval')->first();
        
        return view('admin.setting', compact('kuota', 'dateInterval'));
    }

    public function dayOff()
    {
        $dayOff = dayoff::paginate(5);
        // dd($dayOff);
        return view('admin.dayOffDashboard', compact('dayOff'));
    }
    
    public function dayOffCreate()
    {
        
        return view('admin.dayOffCreate');
    }
        
    public function dayOffStore(Request $request)
    {
        $validateDay = [
            'date' => 'required|date_format:Y-m-d',
            'status_day' => 'required',
            ];
            
        $validateDayMasages = [
            'date.date_format'=>'Waktu harus di isi dengan format jam:menit (09:00)',
            'status_day.required'=>'Data tidak boleh kosong',
        ];

        $validateData = $request->validate($validateDay,$validateDayMasages);
        
        activity_log::create([
            'user_id' => Auth::user()->id,
            'description' => "telah menambahkan day off untuk tanggal ".$request->date." dengan deskripsi ".$request->status_day,
        ]);

        dayoff::create($validateData);
        
    return redirect('/setting/dayOff')->with('success', 'Data sudah berhasil di update'); 
    }

    public function dayOffEdit($id)
    {
        $dayOff = dayoff::where('id', $id)->first();

        $dayOff->start_time = substr($dayOff->start_time, 0, 5);
        $dayOff->end_time = substr($dayOff->end_time, 0, 5);
        
        
        return view('admin.dayOffEdit', compact('dayOff'));
    }

    public function dayOffDelete(Request $request)
    {
        if($request['id'] == 0 ||$request['id'] ==  null ) {
            return redirect('/setting/dayOff')->with('success', 'Minimal pilih satu data untuk dihapus'); 
        }
        $count = count($request['id']);
        for ($i = 0 ; $i < $count ; $i++ ) {
            
            $day = dayoff::find($request['id'][$i]);
            activity_log::create([
                'user_id' => Auth::user()->id,
                'description' => "telah Manghapus day off untuk tanggal ".$day->date." dengan deskripsi ".$day->status_day,
            ]);
            $day->delete();
        }  
        
        
        return redirect('/setting/dayOff')->with('success', 'Data sudah berhasil di Hapus'); 
    }
    
    public function dayOffUpdate(Request $request)
    {
        $validateDay = [
            'date' => 'required|date_format:Y-m-d',
            'status_day' => 'required',
        ];
        
        $validateDayMasages = [
            'date.date_format'=>'Waktu harus di isi dengan format jam:menit (09:00)',
            'status_day.required'=>'Data tidak boleh kosong',
        ];
        
        $validateData = $request->validate($validateDay,$validateDayMasages);
        $dayoff =  dayoff::where('id', $request->id)->first();
        dayoff::where('id', $request->id)->update([
            'date' => $request->date,
            'status_day' => $request->status_day,
        ]);
        
        activity_log::create([
            'user_id' => Auth::user()->id,
            'description' => "telah mengedit day off untuk tanggal ".$dayoff->date." menjadi tanggal ".$request->date." dengan deskripsi ".$request->status_day,
        ]);
        
    return redirect('/setting/dayOff')->with('success', 'Data sudah berhasil di update'); 
    }

    public function reservationSession()
    {
        $reservationSession = reservation_session::paginate(5);
        return view('admin.reservationSessionDashboard', compact('reservationSession'));
    }

    public function reservationSessionEdit($id)
    {
        $reservationSession = reservation_session::where('id', $id)->first();

        $reservationSession->start_time = substr($reservationSession->start_time, 0, 5);
        $reservationSession->end_time = substr($reservationSession->end_time, 0, 5);
        
        return view('admin.reservationSessionEdit', compact('reservationSession'));
    }

    public function reservationSessionCreate()
    {
        
        return view('admin.reservationSessionCreate');
    }

    public function reservationSessionDelete(Request $request)
    {
        if($request['id'] == 0 ||$request['id'] ==  null ) {
            return redirect('/setting/reservationSession')->with('success', 'Minimal pilih satu data untuk dihapus'); 
        }
        
        $count = count($request['id']);

        for ($i = 0 ; $i < $count ; $i++ ) {
            
            $reservasi = reservation_session::find($request['id'][$i]);
            activity_log::create([
                'user_id' => Auth::user()->id,
                'description' => "telah menghapus reservasi bernama ".$reservasi->session_name." yang dimulai pada ".$reservasi->start_time. " sampai ".$reservasi->end_time,
            ]);

            $reservasi->delete();
        }  
        

        return redirect('/setting/reservationSession')->with('success', 'Data sudah berhasil di Hapus'); 
    }

    public function reservationSessionStore(Request $request)
    {
        $validateSession = [
            'session_name' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            ];
            
        $validateSessionMasages = [
            'start_time.date_format'=>'Waktu harus di isi dengan format jam:menit (09:00)',
            'end_time.date_format'=>'Waktu harus di isi dengan format jam:menit (09:00)',
        ];
        $validateData = $request->validate($validateSession,$validateSessionMasages);

        activity_log::create([
            'user_id' => Auth::user()->id,
            'description' => "telah menambahkan reservasi bernama ".$request->session_name." yang dimulai pada ".$request->start_time. " sampai ".$request->end_time,
        ]);

        reservation_session::create($validateData);
        
    return redirect('/setting/reservationSession')->with('success', 'Data sudah berhasil di update'); 
    }

    public function reservationSessionUpdate(Request $request)
    {
        $validateSession = [
            'session_name' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ];
        
        $validateSessionMasages = [
            'start_time.date_format'=>'Waktu harus di isi dengan format jam:menit (09:00)',
            'end_time.date_format'=>'Waktu harus di isi dengan format jam:menit (09:00)',
        ];
        
        $validateData = $request->validate($validateSession,$validateSessionMasages);
        $reservasi = reservation_session::where('id', $request->id)->first();
        reservation_session::where('id', $request->id)->update([
            'session_name' => $request->session_name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        activity_log::create([
            'user_id' => Auth::user()->id,
            'description' => "telah mengedit reservasi bernama ".$reservasi->session_name." yang dimulai pada ".$reservasi->start_time. " sampai ".$reservasi->end_time,
        ]);
        
    return redirect('/setting/reservationSession')->with('success', 'Data sudah berhasil di update'); 
    }

    public function updateAllowDays(Request $request)
    {   
        $activity = $request->allow_days;
        $request->allow_days = str_replace(" ", "", $request->allow_days);
        $request->allow_days = strtolower($request->allow_days);    
        $request->allow_days = explode(",", $request->allow_days);
        $request->allow_days = array_unique($request->allow_days);
        allow_day::truncate();
        
       foreach ($request->allow_days as $day) {
        switch ($day) {
            case 'senin':
                allow_day::create([
                    'allow_days' => '1'
                ]);
                break;
            case 'selasa':
                allow_day::create([
                    'allow_days' => '2'
                ]);
                break;
            case 'rabu':
                allow_day::create([
                    'allow_days' => '3'
                ]);
                break;
            case 'kamis':
                allow_day::create([
                    'allow_days' => '4'
                ]);
                break;
            case "jum'at":
                allow_day::create([
                    'allow_days' => '5'
                ]);
                break;
            case 'sabtu':
                allow_day::create([
                    'allow_days' => "6"
                ]);
                break;
            case 'minggu':
                allow_day::create([
                    'allow_days' => "0"
                ]);
                break;
    }};       
    activity_log::create([
        'user_id' => Auth::user()->id,
        'description' => "telah mengganti allow days menjadi ".$activity,
    ]);
    return redirect('/setting')->with('success', 'Data sudah berhasil di update'); 
    }

}
