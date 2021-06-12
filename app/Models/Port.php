<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'country_id', 'address'];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cargo_ships()
    {
        return $this->hasMany(CargoShip::class);
    }
}
