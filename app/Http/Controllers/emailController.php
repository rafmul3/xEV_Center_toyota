<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Mail;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use App\Mail\sendMail;
use App\Mail\sendCode;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\reservation_group;
use App\Models\group_member;
use App\Models\pengunjung;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use File;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Jobs\sendFeedbackJob;


class emailController extends Controller
{
    public function emailVerifikasi(Request $request, $group_code){

        $decryptedCode = Crypt::decryptString($group_code);
        $reservasi_group = reservation_group::where('group_code', $decryptedCode)->first();        

        if ( $reservasi_group->registration_confirmation_at != null ){        
            return redirect('/pengunjung')->with('message', 'Data sudah di registrasi sebelumnya silakan check email anda untuk melihat barcode');
        }

        if ($request->email != $reservasi_group->email) {
            return back()->with('message', 'Email tidak cocok.');
        }

        if ( $reservasi_group->email_verified_at == null ){    

            $mail = [
                'code' => $reservasi_group->group_code,
                
            ];
    
            Mail::to($reservasi_group->email)->send(new sendMail($mail));
            
            reservation_group::where('id', $reservasi_group->id)->update([
                'email_verified_at' => now(),
            ]);
            }

        return view('mail.codeConfirmation',compact('reservasi_group', 'group_code'));
    }

    public function codeVerifikasi(Request $request, $cryptCode){
        $decryptedCode = Crypt::decryptString($cryptCode);
        $reservasi_group = reservation_group::where('group_code', $decryptedCode)->first(); 

        if ($request->code != $reservasi_group->group_code) {
            return back()->with('message', 'code tidak cocok, tolong check email anda dengan benar');
        }
        
        if ( $reservasi_group->registration_confirmation_at != null ){        
            return redirect('/pengunjung')->with('message', 'Data sudah di registrasi sebelumnya silakan check email anda untuk melihat barcode');
        }

        $group = $reservasi_group;
        $QRCode = asset('storage/app/public/8601.png');
        $renderer = new ImageRenderer(
                new RendererStyle(400),
                new ImagickImageBackEnd()
            );
            
            $writer = new Writer($renderer);
            $writer->writeFile($reservasi_group->group_code, $reservasi_group->group_code.'.png');
            

        $pdf = new Dompdf();
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadview('mail.pdfMail', compact('reservasi_group'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->stream();
        $mail = [
            'code' => $reservasi_group->group_code,
            'codeHash' => Crypt::encryptString($reservasi_group->group_code),
            'cryptCode' => $cryptCode,
        ];
        
        $mail['pdf'] = $pdf;

        Mail::to($reservasi_group->email)->send(new sendCode($mail));

        File::delete(public_path('/'.$reservasi_group->group_code.'.png'));

        reservation_group::where('id', $reservasi_group->id)->update([
            'registration_confirmation_at' => now()
        ]);
        
        return redirect('/pengunjung')->with('message', 'terima kasih sudah melakukan registrasi');
    }

    public function registrationDeleted($group_code,$cryptCode){
        $cryptCode = Crypt::decryptString($cryptCode);

        if ($group_code == $cryptCode){
            $reservasi_group = reservation_group::where('group_code', $group_code)->first(); 
            $tanggalRegistrasi = $reservasi_group->registration_confirmation_at;
            $tanggalRegistrasi = Carbon::parse($tanggalRegistrasi);
            $tanggalSekarang = Carbon::now();

            if ($tanggalSekarang->diffInDays($tanggalRegistrasi) <= 3){

                reservation_group::where('group_code', $group_code)->update([
                    'registration_confirmation_at' => null,
                    'email_verified_at' => null,
                    'group_code' => null,
                ]);
                return redirect('/pengunjung')->with('message', 'sudah dihapus');
            }

            return redirect('/pengunjung')->with('message', 'tidak bisa');
        }

        return redirect('/pengunjung')->with('message', 'tidak bisa');
        
    }
    
    public function blastEmail(Request $request,$id){
        
        
        $reservasi = group_member::where('reservasi_id', $id)->where('kehadiran', 1)->where('feedback', 0)->get();
        
        foreach($reservasi as $email) {
            
            $pengunjung = pengunjung::where('id', $email->pengunjung_id)->first();
        
            $mail = [
            'cryptID' => Crypt::encryptString($pengunjung->id),
            'email' => $pengunjung->email,
            ];
            
            dispatch(new sendFeedbackJob($mail));

        }
        
        return redirect('/checkinDashboard')->with('success', 'Email sudah berhasil di kirimkan'); 
        
    }
}

            // $reservation_group->pic_name

            // $path = base_path('public/8601.png');
            // $type = pathinfo($path, PATHINFO_EXTENSION);
            // $data = file_get_contents($path);
            // $pic = `data:image`. $type. `;base64,`. base64_encode($data);
            // dd($group);

        // QrCode::generate($reservasi_group->group_code, public_path('qrcode.png'));

        // reservation_group::where('id', $reservasi_group->id)->update([
        //     'email_verified_at' => now()

        // ]);