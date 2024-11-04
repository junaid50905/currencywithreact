<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;
    protected $table = 'exchange_rates';
    protected $fillable =
    [
        'currency_id',
        'created_by',
        'updated_by',
        'buying_rate',
        'selling_rate'
    ];
}
