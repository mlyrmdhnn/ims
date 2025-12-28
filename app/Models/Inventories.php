<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventories extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function warehouse()
    {
        return $this->belongsTo(Warehouses::class);
    }

    public function item()
    {
        return $this->belongsTo(Items::class);
    }

    // AMBIL inventory_units BERDASARKAN item_id
    public function inventoryUnits()
    {
        return $this->hasMany(Inventory_units::class, 'item_id', 'item_id');
    }
}

