<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_member extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'Group_Member';
    
    protected $guarded = [
        'id'
    ];    

    public function reservation_group() {
        return $this->belongsTo(reservation_group::class, 'reservasi_id');
    }

    public function pengunjung() {
        return $this->belongsTo(pengunjung::class);
    }

}
