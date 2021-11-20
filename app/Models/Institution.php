<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model {
    use HasFactory;

    protected $fillable = [
        'name', 
        'region', 
        'country'
    ];

    protected $appends = ['department_count', 'student_count'];

    public function getDepartmentCountAttribute() {
        return $this->departments()->count();
    }

    public function getStudentCountAttribute() {
        return $this->students()->count();
    }

    public function departments() {
        return $this->hasMany(Department::class, 'institution_id');
    }

    public function students() {
        return $this->hasMany(Student::class, 'institution_id');
    }
}
