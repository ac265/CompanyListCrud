<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{

    public function company()
    {

    return $this->belongsTo(company::class);
    }

}
