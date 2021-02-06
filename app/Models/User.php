<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Uuid;
class User extends Authenticatable
{
    use Uuid, HasFactory, Notifiable;
    protected $primaryKey = 'uuid';    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function maba(){
        return $this->hasOne(Maba::class);
    }
}
