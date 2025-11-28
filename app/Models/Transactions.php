<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transactions extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionsFactory> */
    use HasFactory;
    protected $fillable = [
        'notif_id',
        'transaction_no',
        'owner_transaction'
    ];

    public function transaction() : BelongsTo
    {
        return $this->belongsTo(Notifications::class, 'notif_id');
    }
    public function ownerTransaction() :BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_transaction');
    }
}
