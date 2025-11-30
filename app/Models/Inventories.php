<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventories extends Model
{
    /** @use HasFactory<\Database\Factories\InventoriesFactory> */
    use HasFactory;

    protected $guarded = [];
    // warehouse items

    public function warehouse() :BelongsTo
    {
        return $this->belongsTo(warehouses::class);
    }

    public function item() :BelongsTo
    {
        return $this->belongsTo(Items::class);
    }
}
