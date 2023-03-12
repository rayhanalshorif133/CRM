<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServices extends Model
{
    use HasFactory;

    function service()
    {
        return $this->belongsTo(Service::class);
    }
}
