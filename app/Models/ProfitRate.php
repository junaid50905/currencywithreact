<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitRate extends Model
{
    use HasFactory;
    protected $table = 'profit_rates';
    protected $fillable = ['profit_id', 'title', 'rate'];

    


}
