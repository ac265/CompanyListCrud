<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $fillable = [
        'name',
        'address_latitude',
        'address_longitude',
    ];

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
