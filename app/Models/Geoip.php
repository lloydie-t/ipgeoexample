<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geoip extends Model
{
    protected $guarded = ['id'];
    protected $fillabel = ['ip_address'
    ,'iso_code'
    ,'country_code'
    ,'country_name'
    ,'town'];
    use HasFactory;
}
