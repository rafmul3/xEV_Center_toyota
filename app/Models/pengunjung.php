<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_name','gender','age','job_title','institution_category'];
    protected $table = 'pengunjung';

    public function group_member() {
        return $this->hasMany(group_member::class);
    }
}
