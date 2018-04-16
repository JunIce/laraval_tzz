<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumInfo extends Model
{
    protected $table = 'album_info';
    protected $primaryKey = 'aid';   

    public function hasManyPhoto()
    {
        return $this->hasMany('App\AlbumPhoto', 'aid', 'aid');
    }
}
