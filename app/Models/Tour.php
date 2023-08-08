<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'starting_date',
        'ending_date',
        'price',
        'travel_id'
    ];
    public function travel()
    {
    return $this->belongsTo(Travel::class);
    }
}
