<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded = [];
    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    public function materials()
    {
        return $this->belongsTo('App\Models\Material', 'material_id');
    }
}
