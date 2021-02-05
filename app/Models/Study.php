<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class Study extends Model
{
    use HasFactory;
    protected $guarded = [];
  

   
    
    public function biodata(){
        return $this->hasMany(Biodata::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
}
