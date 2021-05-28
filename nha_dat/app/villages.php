<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class villages extends Model
{
    protected $primaryKey = 'id_vil';
    public function district(){
        return $this->belongsTo(districts::class,'id_vil','id_vil');
    }
}
