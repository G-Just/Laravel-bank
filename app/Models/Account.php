<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'IBAN',
        'balance',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
