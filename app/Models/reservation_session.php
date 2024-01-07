<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation_session extends Model
{
    public $timestamps = false;

    protected $guarded = [
        'id'
    ];    

    use HasFactory;

    public function reservation_group() {
        return $this->hasMany(reservation_group::class, 'reservation_sessions_id');
    }
}
