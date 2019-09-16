<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        "number", "season_id", "watched"
    ];
}
