<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{

    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $fillable=[
            'course_id',
            'teacher_id',
            'title',
            'description'
    ];

    public function course(): BelongsTo{
        return $this->belongsTo(Course::class);
    }

    public function teacher():BelongsTo{
        return $this->belongsTo(Teacher::class);
    }

    public function enrollments():HasMany{
        return $this->belongsToManyMany(Student::class, 'enrollments','student_id', 'subject_id')->withTimestamp();
    }
}
