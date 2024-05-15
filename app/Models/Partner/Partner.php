<?php

namespace App\Models\Partner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'partners';

    protected $fillable = [
        'company_name',
        'company_address',
       'company_country',
       'company_state',
       'company_city',
        'company_zip_code',
        'company_website',
        'company_landline',
        'first_name',
        'last_name',
        'job_title',
       'mobile',
        'landline',
       'email'
    //    'email_verified',
    //    'admin_verified'
    ];
}
