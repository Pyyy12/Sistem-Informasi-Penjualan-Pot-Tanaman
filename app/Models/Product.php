<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'pot_size_id',
        'soil_type_id',
        'title',
        'slug',
        'material',
        'target_plant',
        'price',
        'stock',
        'image_url',
        'description',
        'is_featured',
    ];

    public function potSize(): BelongsTo
    {
        return $this->belongsTo(PotSize::class);
    }

    public function soilType(): BelongsTo
    {
        return $this->belongsTo(SoilType::class);
    }
}