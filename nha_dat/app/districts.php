<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class districts extends Model
{
    protected $primaryKey = 'id_dis';
    public function province(){
        return $this->belongsTo(districts::class,'id_pro','id_pro');
    }
    public function village(){
        return $this->hasMany(villages::class,'id_vil','id_vil');
    }
}
