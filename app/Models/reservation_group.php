<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation_group extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];    

    public function reservation_session() {
        return $this->belongsTo(reservation_session::class, 'reservation_sessions_id');
    }

    public function group_member() {
        return $this->hasMany(group_member::class, 'reservasi_id');
    }
}
