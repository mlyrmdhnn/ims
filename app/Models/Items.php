<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Items extends Model
{
    /** @use HasFactory<\Database\Factories\ItemsFactory> */
    use HasFactory;

    protected $guarded = [];

    public function inventories() :HasMany
    {
        return $this->hasMany(Inventories::class);
    }

    public function inventoryUnits() :HasMany
    {
        return $this->hasMany(Inventory_units::class);
    }
}
