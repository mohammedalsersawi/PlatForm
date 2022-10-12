<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];
// علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

public function My_classs()
{
    return $this->belongsTo(Classroom::class);
}
public function grades()
{
    return $this->belongsTo(Grade::class);
}
public function users()
{
    return $this->belongsTo(User::class ,'user_id');
}
// // علاقة الاقسام مع المعلمين
// public function teachers()
// {
//     return $this->belongsToMany(Teacher::class, 'teacher_sections');
// }

public function lessons()
{
    return $this->hasMany(lesson::class);
}

public function sections()
{
    return $this->hasMany(Package::class);
}


}


