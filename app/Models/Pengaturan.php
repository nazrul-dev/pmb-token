<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;
    protected $table = "pengaturan";
    protected $guarded = [];

    public static function get_gelombang($angkatan, $gelombang){

       
        $one  = Maba::with('token')->where('arsip', 1)->first();
        $two  = $one->token->where(['gelombang' => $gelombang, 'angkatan' => $angkatan])->first();

      
       if($two === null){
            return true;
        }else{
            return false;
        }

    }
}
