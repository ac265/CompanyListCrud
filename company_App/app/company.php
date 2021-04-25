<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = [
        'company_name',
        'internet_address',
    ];

    public function addresses()
    {
        return $this->hasMany(address::class);
    }


    public function people()
    {
        return $this->hasMany(person::class);
    }

    public function profile()
    {
        return $this->hasOne(profile::class);
    }


}
