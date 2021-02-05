<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Webpatser\Uuid\Uuid;

class Biodata extends Model
{
    use HasFactory;
    protected $table = "biodata";
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Uuid::generate(4);
        });
    }
    public function maba(){
        return $this->belongsTo(Maba::class, 'maba_id');
    }

    public function getfakultas(){
        return $this->belongsTo(Faculty::class, 'fakultas');
    }

    public function getprodi(){
        return $this->belongsTo(Study::class, 'prodi');
    }
 
    public static function generate_registrasi_number($angkatan,$gelombang)
    {
        $dateCode = 'PMB/AGK'.$angkatan.'/GE'.$gelombang.'/'. date('Ymd') . '/' . self::integerToRoman(date('m')) . '/' . self::integerToRoman(date('d')) . '/';

        $lastOrder = self::select([DB::raw('MAX(biodata.no_registrasi) AS last_code')])
            ->where('no_registrasi', 'like', $dateCode . '%')
            ->first();

        $lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;

        $orderCode = $dateCode . '00001';
        if ($lastOrderCode) {
            $lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
            $nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);

            $newCode = $dateCode . $nextOrderNumber;
        }

        if (self::_isOrderCodeExists($orderCode)) {
            return $newCode;
        }

        return $orderCode;
    }

    private static function _isOrderCodeExists($orderCode)
    {
        return self::where('no_registrasi', '=', $orderCode)->exists();
    }

    private static function integerToRoman($integer)
    {
        $integer = intval($integer);
        $result = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

        foreach ($lookup as $roman => $value) {
            $matches = intval($integer / $value);
            $result .= str_repeat($roman, $matches);
            $integer = $integer % $value;
        }

        return $result;
    }
}
