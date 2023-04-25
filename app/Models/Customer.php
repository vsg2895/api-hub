<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'u_id',
        'displayName',
        'givenName',
        'jobTitle',
        'mail',
        'mobilePhone',
        'officeLocation',
        'preferredLanguage',
        'surname',
        'userPrincipalName',
        'status'
    ];

    public function phones(): HasMany
    {
        return $this->hasMany(CustomerPhone::class, 'customer_id', 'id');
    }
}
