<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory_units extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryUnitsFactory> */
    use HasFactory;

    protected $guarded = [];

    public function warehouse() :BelongsTo
    {
        return $this->belongsTo(warehouses::class);
    }

    public function item() :BelongsTo
    {
        return $this->belongsTo(Items::class);
    }

    public function owner() :BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
