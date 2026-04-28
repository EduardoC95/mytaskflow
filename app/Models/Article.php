<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'name',
        'description',
        'price',
        'vat_rate_id',
        'photo_path',
        'notes',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function vatRate()
    {
        return $this->belongsTo(VatRate::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
