<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notifications extends Model
{
    /** @use HasFactory<\Database\Factories\NotificationsFactory> */
    use HasFactory;
    protected $guarded = [];

    public function transaction() : HasMany
    {
        return $this->hasMany(Transactions::class);
    }

    public function sender() :BelongsTo
    {
        return $this->belongsTo(User::class, 'from');
    }

    public function to() :BelongsTo
    {
        return $this->belongsTo(User::class, 'to');
    }
}
