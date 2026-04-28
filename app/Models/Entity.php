<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'is_client',
        'is_supplier',
        'nif',
        'name',
        'address',
        'postal_code',
        'city',
        'country_id',
        'phone',
        'mobile',
        'website',
        'email',
        'gdpr_consent',
        'notes',
        'is_active',
    ];

    protected $casts = [
        'number' => 'integer',
        'is_client' => 'boolean',
        'is_supplier' => 'boolean',
        'gdpr_consent' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function scopeClients($query)
    {
        return $query->where('is_client', true);
    }

    public function scopeSuppliers($query)
    {
        return $query->where('is_supplier', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
