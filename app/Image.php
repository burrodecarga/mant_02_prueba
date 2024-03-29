<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable=[ 'url', 'body'];

    public function imageable(){
        return $this->morphTo();
    }
}
