<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instagramPage extends Model
{
    use HasFactory;

    protected $filalble=[
        'page_name',
        'id_from_instagram'
    ];
}