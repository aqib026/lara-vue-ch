<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    protected $fillable = ['make', 'model', 'year', 'owner_id'];

    /**
     * Get owners associated with a car.
     *
     * @return belongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    /**
     * Get addresses associated with a car.
     *
     * @return belongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function getTypes(): array
    {
        return json_decode(file_get_contents(storage_path() . '/json/car-data.json'), true);
    }
}
