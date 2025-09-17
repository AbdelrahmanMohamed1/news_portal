<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'site_name',
        'site_logo',
        'site_favicon',
        'contact_email',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'phone_number',
        'country',
        'city',
        'street',
    ];
}
