<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable=[
            'name',
            'email'
    ];




    public function enrollments():BelongsToMany
    {
        return $this->belongsToMany(subject::class,'enrollments','student_id', 'subject_id');
    }

    public function grade():HasManyThrough
    {
        return $this->hasManyThrough(Grade::class, Enrollment::class, 'student_id', 'enrollment_id', 'id', 'id');
    }

}
