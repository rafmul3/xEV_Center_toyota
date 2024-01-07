<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allow_day extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'Allow_Days';
        
    protected $guarded = [
        'id'
    ];    
}
