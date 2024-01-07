<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';
      
    protected $guarded = [
        'id'
    ];   
    
    public function pengunjung() {
        return $this->belongsTo(pengunjung::class);
    }

}
