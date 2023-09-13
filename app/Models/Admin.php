<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'family_name',
        'sex',
        'age',
        'institution',
        'grade',
        'email',
        'password',
    ];
    
     protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function matchings()   
    {
        return $this->hasMany(Matching::class);
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
