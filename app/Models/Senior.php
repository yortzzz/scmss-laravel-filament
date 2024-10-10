<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senior extends Model
{
    use HasFactory;

    protected $fillable = [
        'osca_id',
        'last_name',
        'first_name',
        'middle_name',
        'extension',
        'birthday',
        'age',
        'gender',
        'civil_status',
        'religion',
        'birth_place',
        'address',
        'gsis_id',
        'philhealth_id',
        'illness',
        'disability',
        'educational_attainment',
        'is_active',
        'registry_number',

    ];
}
