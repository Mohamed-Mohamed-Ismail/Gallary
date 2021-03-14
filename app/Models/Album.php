<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = array('name', 'cover_image');

    public function Photos()
    {
        return $this->hasMany('App\Models\Image');
    }
}
