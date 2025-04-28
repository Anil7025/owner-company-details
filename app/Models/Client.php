<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        // Company Info
        'owner_name', 'owner_email', 'designation', 'business_name', 'business_cat', 'owner_phone', 'location', 'owner_image',
         // Company Info
        'company_name', 'company_email', 'company_gst', 'company_website', 'company_address', 'video', 'company_logo', 'description', 'facebook', 'youtube', 'instagram', 'company_image','linkedin','status'
    ];
}
