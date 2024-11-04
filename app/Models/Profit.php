<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    use HasFactory;
    protected $table = 'profits';
    protected $fillable = ['title'];

    public function profitRates()
    {
        return $this->hasMany(ProfitRate::class);
    }


}
