<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'entity_id',
        'first_name',
        'last_name',
        'role',
        'phone',
        'mobile',
        'email',
        'gdpr_consent',
        'notes',
        'is_active',
    ];

    protected $casts = [
        'number' => 'integer',
        'gdpr_consent' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
