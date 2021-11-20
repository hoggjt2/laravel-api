<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model {
    use HasFactory;

    protected $fillable = [
        'name', 
        'institution_id'
    ];

    public function institution() {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function courses() {
        return $this->hasMany(Course::class, 'department_id');
    }
}
