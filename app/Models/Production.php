<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Production extends Model
{
    public function productionType(): BelongsTo
    {
        return $this->belongsTo(ProductionType::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'genre_production');
    }

    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Interest::class, 'interest_production');
    }
}
