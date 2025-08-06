<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory;

    protected $casts = [
        'registration_date' => 'datetime'
    ];

    protected $guarded = [];

    public function owner() {
        return $this->belongsTo(Owner::class);
    }

    public function passes() {
        return $this->hasMany(VehiclePass::class);
    }
}
