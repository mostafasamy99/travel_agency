<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'number_of_days',
        'is_public',
        'slug',
    ];

    public function tours()
    {
    return $this->hasMany(Tour::class);
    }
}
