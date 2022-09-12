<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'Classrooms';
    public $timestamps = true;
    protected $guarded = [];


    // علاقة بين الصفوف المراحل الدراسية لجلب اسم المرحلة في جدول الصفوف

    public function Section()
    {
        return $this->hasMany(Section::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function SectionClass()
    {
        return $this->hasMany(Section::class);
    }

    public function classes()
    {
        return $this->hasMany(Package::class);
    }
}
