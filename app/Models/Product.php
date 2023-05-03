<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

        // define campos editáveis pelo usuário
        protected $fillable = [
            'uuid',
            'name',
            'slug',
            'category_id',
            'price',
            'amount',
            'description'
        ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
