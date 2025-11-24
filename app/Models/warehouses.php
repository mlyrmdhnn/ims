<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class warehouses extends Model
{
    /** @use HasFactory<\Database\Factories\WarehousesFactory> */
    use HasFactory;
    protected $table = 'warehouses';
    protected $guarded = [];

    public function staff() :HasMany
    {
        return $this->hasMany(User::class);
    }
}
