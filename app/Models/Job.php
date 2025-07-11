<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'work_place',
        'gender_preference',
        'education_level',
        'work_experience',
        'from_date',
        'to_date',
    ];

// العلاقة مع الشركة
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function favoredByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
