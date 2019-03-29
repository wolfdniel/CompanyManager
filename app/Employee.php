<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function company()
    {
        return $this->hasMany(Employee::class, 'company');
    }

    protected $fillable = [
        'name',
        'email',
        'phone'
    ];
}
