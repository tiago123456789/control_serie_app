<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

    protected $fillable = [
        "number", "serie_id"
    ];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
