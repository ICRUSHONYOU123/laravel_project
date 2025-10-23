<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseKey extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'license_keys';

    // Mass assignable columns
    protected $fillable = [
        'key',
    ];
}
