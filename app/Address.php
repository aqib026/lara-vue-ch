<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    /**
     * Get owners associated with an address.
     *
     * @return belongsTo
     */
    public function owner():BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    /**
     * Get cars associated with an address.
     *
     * @return HasMany
     */
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
