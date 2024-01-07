<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\reservation_session;
use App\Models\reservation_group;
use App\Models\setting;
use App\Models\dayoff;
use App\Models\allow_day;

class Registrasi extends Component
{

    public $reservation_group, $date,$sessions,$sessionselected,$dateInterval,$allow_days,$day_off;
    public $kuotaDisabled = True; 

    public $pengunjung = 1;
    // public $kuota= 20;
    
    public function mount()
    {       
      
        $this->allow_days = allow_day::pluck('allow_days')->all();
        $this->allow_days = json_encode($this->allow_days);
        $this->sessions = reservation_session::all();
        $this->day_off = dayoff::pluck('date')->all();
        $this->day_off = json_encode($this->day_off);
        $this->kuota = setting::pluck('kuota')->first();
        $this->dateInterval = setting::pluck('date_interval')->first();
        
        return view('livewire.registrasi'
        );
    }

    public function switchroom()
    {
        $this->pengunjung++;
    }

    public function updatedDate($value) {
        $this->date = $value;
      }


      public function updatedSessionselected($value) {
        $this->sessionSelected = $value;
        $this->checkKuota($this->date, $this->sessionSelected);
        $this->kuotaDisabled = False;
      }

    public function checkKuota($tanggal, $sesi) {
      $this->reservation_group = reservation_group::where('tanggal', $tanggal)->where('reservation_sessions_id', $sesi)->get();
      $this->reservation_group = collect($this->reservation_group)->sum('total_member');
      $kapasitas = setting::pluck('kuota')->first();
      // dd($this->reservation_group);
      if ($this->reservation_group == $kapasitas){
        $this->kuota = 0;
        $this->pengunjung = 0 ;
        return;
      } elseif ($this->reservation_group == 0) {
        $this->kuota = $kapasitas;
        return;
      } else {
        $this->kuota = $kapasitas - $this->reservation_group;
        return;
      }
      
    }
}
