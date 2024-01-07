<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\setting;
use App\Models\allow_day;
use App\Models\activity_log;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;



class Seting extends Component
{
    
    use WithPagination;
    
    public $dateInterval, $kuota, $allow_days, $days;

    private $logs;


    public function render()
    {
        $this->allow_days = allow_day::pluck('allow_days');
        $this->logs = activity_log::orderBy('id', 'desc')->paginate(5);
        // dd($this->logs);
        $daysArray = [];
        foreach ($this->allow_days as $day) {
        switch ($day) {
            case '0':
                $daysArray[] = 'Minggu';
                break;
            case '1':
                $daysArray[] = 'Senin';
                break;
            case '2':
                $daysArray[] = 'Selasa';
                break;
            case '3':
                $daysArray[] = 'Rabu';
                break;
            case '4':
                $daysArray[] = 'Kamis';
                break;
            case '5':
                $daysArray[] = "Jum'at";
                break;
            case '6':
                $daysArray[] = "Sabtu";
                break;
    }
}
    $this->days = $daysArray;
    $this->allow_days = implode(',', $daysArray);
    
        return view('livewire.setting', ['logs' => $this->logs]);
    }

    public function updateDateInterval()
    {

        
        setting::where('id', '1')->update([
            'date_interval' => $this->dateInterval
        ]);
        
        activity_log::create([
            'user_id' => Auth::user()->id,
            'description' => "telah mengganti Date Interval menjadi ".$this->dateInterval,
        ]);

        session()->flash('success', 'Data Date Interval berhasil disimpan!!!!');

    }

    public function updateKuota()
    {
        
        setting::where('id', '1')->update([
            'kuota' => $this->kuota
        ]);

        activity_log::create([
            'user_id' => Auth::user()->id,
            'description' => "telah mengganti kuota menjadi ".$this->kuota,
        ]);

        session()->flash('success', 'Data Kuota berhasil disimpan!!!!');

    }

}
