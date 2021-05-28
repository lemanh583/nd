<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $primaryKey = "id_role";
    public function user(){
        return $this->hasMany(User::class,'id_role','id_role');
    }
   
}
