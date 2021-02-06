<?php
namespace App\Traits;
use Webpatser\Uuid\Uuid as UuidUuid;
trait Uuid
{
    protected static function boot()
    {
        parent::boot(); 
        static::creating(function ($model) {
            $model->uuid =  (string) UuidUuid::generate(4);
        });
    }
}