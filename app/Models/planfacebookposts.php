<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planfacebookposts extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'post_date',
        'image_link',
        'post_id_from_facebook',
        'post_link',
        'error_message',
        'is_published',
        'facebook_page_id'
    ];

    public function facebook_page()
    {
        return $this->belongsTo(facebookPage::class,'facebook_page_id');
    }
}
