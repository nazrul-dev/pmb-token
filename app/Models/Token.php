<?php
namespace App\Models;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Token extends Model
{
    use Uuid;
    protected $table        = "token";
    protected $guarded      = [];
    protected $primaryKey   = 'uuid';
    public $incrementing    = false;
    protected $keyType      = 'string';
    use HasFactory;
    public function maba(){
        return $this->hasOne(Maba::class);
    }
    public static function generate_token() {
        // Default tokens contain no "ambiguous" characters: 1,i,0,o
        $num_segments = 4;
        $segment_chars = 4;
        $tokens = '1234567890';
        $license_string = '';
        // Build Default License String
        for ($i = 0; $i < $num_segments; $i++) {
            $segment = '';
            for ($j = 0; $j < $segment_chars; $j++) {
                $segment .= $tokens[rand(0, strlen($tokens)-1)];
            }
            $license_string .= $segment;
            if ($i < ($num_segments - 1)) {
                $license_string .= '-';
            }
        }
        // If provided, convert Suffix
        if(isset($suffix)){
            if(is_numeric($suffix)) {   // Userid provided
                $license_string .= '-'.strtoupper(base_convert($suffix,10,36));
            }else{
                $long = sprintf("%u\n", ip2long($suffix),true);
                if($suffix === long2ip($long) ) {
                    $license_string .= '-'.strtoupper(base_convert($long,10,36));
                }else{
                    $license_string .= '-'.strtoupper(str_ireplace(' ','-',$suffix));
                }
            }
        }
        return $license_string;
    }
    public static function generate_password(){
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');
        $password = substr($random, 0, 10);
        return $password;
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->generate = Auth::id();
         
        });
    }

    public function generated(){
        return $this->belongsTo(User::class, 'generate');
    }


}
