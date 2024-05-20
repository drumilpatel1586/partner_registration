<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class states extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = [
        'state_name',
        'state_code',
        'state_country',
    ];

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
    public function city()
    {
        return $this->hasMany(cities::class);
    }
}
