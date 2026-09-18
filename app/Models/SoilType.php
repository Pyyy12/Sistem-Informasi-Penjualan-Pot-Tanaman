<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SoilType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'texture_drainage', 'best_for_plants'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}