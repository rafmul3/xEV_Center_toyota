<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\reservation_group;
use App\Models\Group_Member;
use App\Models\pengunjung;

class ConfirmasiKehadiran extends Component
{
    
    public $reservasi_group;
    public $kuotaDisabled = True; 

    public $visitor_name,$gender,$age,$job_title,$institution_category,$emailPengunjung;

    public $pengunjung = 0;

    public function mount($reservasi_group)
    {
    $this->reservasi_group = reservation_group::where('id', $this->reservasi_group->id)->first();
    }

    public function render()
    {
        return view('livewire.confirmasi-kehadiran');
    }
    
    public function addVisitor()
    {
        $this->pengunjung = 1;
    }

    public function addVisitorData()
    {
        $validatedData = $this->validate([
            'visitor_name' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric|min:18',
            'job_title' => 'required',
            'institution_category' => 'required',
            'emailPengunjung' => 'required',
        ]);

        $pengunjung = new pengunjung;
        $group_member = new group_member;
        $pengunjung->visitor_name = $validatedData['visitor_name'];
        $pengunjung->email = $validatedData['emailPengunjung'];
        $pengunjung->gender = $validatedData['gender'];
        $pengunjung->age = $validatedData['age'];
        $pengunjung->job_title = $validatedData['job_title'];
        $pengunjung->intitution_category = $validatedData['institution_category'];
        $pengunjung->save();
        
        $group_member->pengunjung_id = $pengunjung->id;
        $group_member->reservasi_id = $this->reservasi_group->id;
        $group_member->save();

        $this->pengunjung = 0;

        $this->reset(['visitor_name', 'gender','age','job_title','institution_category']);

        reservation_group::where('id', $this->reservasi_group->id)->increment('total_member');

        session()->flash('message', 'Data berhasil ditambahkan.');
        $this->reservasi_group = reservation_group::where('id', $this->reservasi_group->id)->first();

    }
}
