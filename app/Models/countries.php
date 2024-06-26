<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'country_name',
        'country_code',
        'country_phonecode',
    ];

    public function states()
    {
        return $this->hasMany(States::class);
    }
}
