<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\pengunjung;
use App\Models\User;
use App\Models\reservation_group;

class UserController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($credentials )) {
            $request->session()->regenerate();
            return redirect()->intended('/validateCode');
        }

        return back()->with('loginerror', 'login Gagal');

    }

    public function logout() {
        Auth::logout();
        
        return redirect()->intended('/pengunjung');
    }

    public function validateCode() {

        return view('admin.checkin');

    }

    public function deleteUser(Request $request) {

        User::where('id', $request->id)->delete();
        
        return redirect('/userRole')->with('success', 'Data Berhasil dihapus'); 

    }

    public function ConfirmationCode(Request $request) {
        $reservasi_group = reservation_group::where('group_code', $request->booking_code)->first(); 
        if ($reservasi_group == null) {
            return back()->with('message', 'Code Salah');
        }
        return view('admin.checkinConfirmation', compact('reservasi_group'));
    
    }
}
