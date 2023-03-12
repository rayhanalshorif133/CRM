<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function depurture_airport()
    {
        return $this->belongsTo(Airport::class, 'depature_airport_id');
    }

    public function arrival_airport()
    {
        return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function handle_by_user()
    {
        return $this->belongsTo(User::class, 'handle_by');
    }
}
