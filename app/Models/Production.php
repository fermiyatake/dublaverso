<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Tags\HasTags;

class Production extends Model
{
    use HasTags;
    
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

    public function studios(): BelongsToMany
    {
        return $this->belongsToMany(Studio::class, 'production_studio');
    }

    public function blocks(): HasMany
    {
        return $this->hasMany(Block::class);
    }
}
