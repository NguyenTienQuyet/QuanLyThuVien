<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'imageName', 'imageURL'
    ];

    public function bookImage()
    {
        return $this->hasOne(BookImage::class);
    }
}
