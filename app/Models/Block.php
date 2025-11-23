<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Block extends Model
{
    public function production(): BelongsTo
    {
        return $this->belongsTo(Production::class);
    }
    
    public function works(): HasMany
    {
        return $this->hasMany(Work::class);
    }
}
