<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $attributes = [
        'balance' => 0
    ];
    protected $fillable = [
        'client_id',
        'IBAN'
    ];
}
