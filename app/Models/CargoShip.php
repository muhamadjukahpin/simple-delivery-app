<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CargoShip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function port()
    {
        return $this->belongsTo(Port::class, 'port_id');
    }

    public function toPortId()
    {
        return $this->belongsTo(Port::class, 'to_port_id');
    }
}
