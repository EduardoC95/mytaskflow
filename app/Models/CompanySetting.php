<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_path',
        'name',
        'address',
        'postal_code',
        'city',
        'tax_number',
    ];
}
