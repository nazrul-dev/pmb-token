<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function biodata(){
        return $this->hasMany(Biodata::class);
    }

    public function study(){
        return $this->hasMany(Study::class);
    }

    
    
   

  
}
