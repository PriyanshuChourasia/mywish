<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoutineGroup extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'group_name',
        'day_one',
        'day_two',
        'day_three',
        'day_four',
        'day_five',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routine_one()
    {
        return $this->hasOne(Routine::class, 'id','day_one');
    }
    public function routine_two()
    {
        return $this->hasOne(Routine::class, 'id','day_two');
    }
    public function routine_three()
    {
        return $this->hasOne(Routine::class, 'id','day_three');
    }
    public function routine_four()
    {
        return $this->hasOne(Routine::class, 'id','day_four');
    }
    public function routine_five()
    {
        return $this->hasOne(Routine::class, 'id','day_five');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id','group_name');
    }

   
}
