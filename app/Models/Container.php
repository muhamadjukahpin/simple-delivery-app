<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'number_plate', 'country_id', 'is_available'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
