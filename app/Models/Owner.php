<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    /** @use HasFactory<\Database\Factories\OwnerFactory> */
    use HasFactory;

    protected $guarded = [];

    public $casts = [
        'expiry_date' => 'datetime'
    ];

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }

    public function getFullNameAttribute() {
        return $this->last_name . ", " . $this->first_name;
    }
}
