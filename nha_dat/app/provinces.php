<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinces extends Model
{
    protected $primaryKey = 'id_pro';
    
    public function district(){
        return $this->hasMany(districts::class,'id_pro','id_pro');
    }

    public function village(){
        return $this->hasManyThrough(villages::class,districts::class);
    } 

}
