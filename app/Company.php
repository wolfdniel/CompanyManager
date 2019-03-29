<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'user');
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
