<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\AdminResetPassword as ResetPasswordNotification;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'first_name',
        'family_name',
        'sex',
        'age',
        'institution',
        'grade',
        'teach_experience',
        'record',
        'comment',
        'portrait_url',
        'zoom_link',
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
    
    public function chattings()
    {
        return $this->hasMany(Chatting::class);
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
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    
    public function admin_subject($admin_id, $subject_id)
    {
        $check = \DB::table('admin_subject')
                ->where('admin_id', $admin_id)
                ->where('subject_id', $subject_id)
                ->count();
        return $check;
    }
}
