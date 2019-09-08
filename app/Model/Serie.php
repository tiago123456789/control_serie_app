<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
        "name"
    ];

    protected $hidden = [
        "created_at", "updated_at"
    ];
}
