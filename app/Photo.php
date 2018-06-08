<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // mass assignment
    protected $fillable = ['path'];

    // polymorph this one to many others
    public function imageable(){
        return $this->morphTo();
    }
}
