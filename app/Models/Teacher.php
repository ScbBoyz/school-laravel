<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'nidn',
        'name',
        'phone',
        'address',
        'gender',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
