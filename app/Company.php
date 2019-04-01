<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'company');
    }

    protected $fillable = [
        'name',
        'city',
        'logo',
        'website'
    ];
}
