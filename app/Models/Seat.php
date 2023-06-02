<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'time',
        'subject_id',
        'student_id',
        'seat_number',
        'booking_date',
        'booking_time',
        'revoke_reason',
        'revoke_time',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    
}
