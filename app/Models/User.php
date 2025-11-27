<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'name',
        'role',
        'password',
        'phone',
        'isCLient',
        'warehouse_id',
        'isClient'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function warehouse() :BelongsTo
    {
        return $this->belongsTo(warehouses::class);
    }

    public function notifFrom() :BelongsTo
    {
        return $this->belongsTo(Notifications::class, 'from');
    }

    public function notifTo() :BelongsTo
    {
        return $this->belongsTo(Notifications::class, 'to');
    }

    public function inventoryUnits() :HasMany
    {
        return $this->hasMany(Inventory_units::class);
    }

    public function itemsHistory() :HasMany
    {
        return $this->hasMany(item_history::class);
    }
}
