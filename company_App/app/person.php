<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person extends Model
{
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
