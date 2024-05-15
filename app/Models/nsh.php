<?php

namespace App\Models\NSH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nsh extends Model
{
    use HasFactory;

    protected $table = 'nshs';

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
       'mobile',
       'assigned_zone'
    ];
}
