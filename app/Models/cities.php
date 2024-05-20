<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'city_name',
        'state_id',
    ];

    public function state(){
        
        return $this->belongsTo(states::class);
    }
  
}
