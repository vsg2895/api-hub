<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\Client as PassportClient;

class Client extends PassportClient
{
    public static function getClientTypeOptions($type): array
    {
        return [
            lcfirst($type) === 'personal_access_client',
            lcfirst($type) === 'password_client',
        ];
    }
}
