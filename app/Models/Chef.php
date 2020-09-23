<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    protected $fillable = [
        'name', 'position','image','twitter_link','facebook_link', 'google_plus_link','instagram_link','ip','status'
    ];
}
