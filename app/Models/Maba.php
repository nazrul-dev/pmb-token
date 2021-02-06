<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Support\Facades\Crypt;

class Maba extends Model
{
    use Uuid, HasFactory;
    protected $table = "maba";
    protected $guarded = [];
    protected $primaryKey = 'uuid';    
    public $incrementing = false;
    protected $keyType = 'string';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function token(){
        return $this->belongsTo(Token::class, 'token_uuid');
    }
    public function biodata(){
        return $this->hasOne(Biodata::class);
    }
    public static function cekberkas($id){
        $berkas = Biodata::find($id);
        if($berkas->ijazah && $berkas->ktp && $berkas->akta && $berkas->kartu_keluarga && $berkas->passphoto){
            return true;
        }
        return false;
    }

    public static function signature2($request){

        $request = explode("`", Crypt::decryptString($request));
        $findToken = Token::where(['token' => $request[1], 'email' => $request[0]])->firstOrFail();
       return $findToken;
      
    }
}
