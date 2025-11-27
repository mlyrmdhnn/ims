<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class item_history extends Model
{
    /** @use HasFactory<\Database\Factories\ItemHistoryFactory> */
    use HasFactory;
    public function itemsHistory() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
