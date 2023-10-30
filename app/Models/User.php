<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'family_name',
        'first_name',
        'sex',
        'grade',
        'lesson_times',
        'goal',
        'email',
        'password',
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
    
    public function matchings()   
    {
        return $this->hasMany(Matching::class);
    }
    
    public function chattings()
    {
        return $this->hasMany(Chatting::class);
    }
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    
    public function subject_user($subject_id, $user_id)
    {
        $check = \DB::table('subject_user')
                ->where('subject_id', $subject_id)
                ->where('user_id', $user_id)
                ->count();
        return $check;
    }
}
