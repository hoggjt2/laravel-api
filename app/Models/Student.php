<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'dob', 
        //'phone', 
        'email',
        'institution_id'
    ];

    public function institution() {
        return $this->belongsTo(Institution::class, 'institution_id');
    }
}
