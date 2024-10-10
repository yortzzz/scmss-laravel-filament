<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    // protected $casts = [
    //     'senior_id' => 'array',
    // ];
    protected $fillable = [
       'date',
       'description',
       'benefit_id',
       'senior_id',
       'amount',

    ];

    public function benefit()
    {
        return $this->belongsTo(Benefit::class);
    }
    public function senior()
    {
        return $this->belongsTo(Senior::class);
    }
   
}
