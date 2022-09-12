<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'updated_at',
        'created_at',
        'clases_id',
        'section_id',
        'id',

    ];

public function sections()
{
    return $this->belongsTo(Section::class , 'section_id');
}

public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classroom::class ,'clases_id');
    }





}
