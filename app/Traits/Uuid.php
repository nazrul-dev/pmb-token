<?php

namespace App\Traits;

use App\Models\Token;
use Webpatser\Uuid\Uuid as UuidUuid;

trait Uuid
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function (Token $token) {
            $token->uuid =  (string) UuidUuid::generate(4);

        });
    }
}