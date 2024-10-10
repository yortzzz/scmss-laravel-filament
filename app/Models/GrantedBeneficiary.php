<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantedBeneficiary extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch',
        'payroll_id',
        'is_claimed',
        
    ];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}
