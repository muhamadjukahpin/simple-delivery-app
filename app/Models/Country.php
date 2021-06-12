<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public function ports()
    {
        return $this->hasMany(Port::class);
    }

    public function containers()
    {
        return $this->hasMany(Container::class);
    }
}
