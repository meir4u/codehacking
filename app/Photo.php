<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['file'];

    protected $uploads = '/images/';

    public function user(){
      return $this->hasOne('App\User');
    }

    public function getFileAttribute($img){
      return $this->uploads.$img;
    }
}
