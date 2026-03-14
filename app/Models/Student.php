<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes, \App\Traits\CreatedByScope;

    /**
     * The column that identifies the creator (teacher).
     */
    public $creatorColumn = 'teacher_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'teacher_id',
        'name',
        'email',
        'age',
        'grade',
    ];

    /**
     * Get the teacher that owns the student.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the parents for the student.
     */
    public function parents()
    {
        return $this->hasMany(ParentModel::class, 'student_id');
    }
}
