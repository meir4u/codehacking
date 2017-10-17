<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['file'];

    protected $uploads = '/images/';
    protected $no_img = 'no-profile-img.gif';

    public function user(){
      return $this->hasOne('App\User');
    }

    public function getFileAttribute($img){
      if(empty($img))
        return $this->uploads . $this->no_img;

      return $this->uploads.$img;
    }
}
