<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    protected $fillable = [
        'message',
    ];

    // db-relationships, BelongsTo
    // we can grab the user associated with this chirp
    public function user(): BelongsTo //(type hinted)
    {
        return $this->belongsTo(User::class);
    }
}
