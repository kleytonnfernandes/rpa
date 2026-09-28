<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'legal_name', 'trade_name', 'cnpj', 'state_registration', 'state',
        'tax_regime', 'email', 'phone', 'address', 'city', 'postal_code',
    ];
}
