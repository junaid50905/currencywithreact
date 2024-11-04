<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ExchangeRate;
use App\Models\Profit;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * gettingData
     */
    public function gettingData()
    {
        // images
        $images = Content::where('type', 'image')
        ->select(
            'image as image_url',
            'duration')
        ->orderBy('id', 'desc')->get();
        // videos
        $videos = Content::where('type', 'video')
        ->select('video as video_url', 'duration')
        ->orderBy('id', 'desc')->get();
        // exchange rate
        $currency = Content::where('type', 'currency')->first();

        $exchange_rates = DB::table('exchange_rates')
                        ->join('currencies', 'exchange_rates.currency_id', '=', 'currencies.id')
                        ->select(
                            'currencies.name as currency_name',
                            'currencies.code as currency_code',
                            'currencies.flag as currency_flag',
                            'currencies.symbol as currency_symbol',
                            'exchange_rates.buying_rate',
                            'exchange_rates.selling_rate'
                        )
                        ->orderBy('exchange_rates.id', 'desc')
                        ->get();

        $exchange_rate_duration = $currency ? $currency->duration : 1000;
        // profit
        $profit = Content::where('type', 'profit')->first();
        // profits
        $profits = Profit::with(['profitRates' => function ($query) {
            $query->select(
                'id',
                'profit_id',
                'title as profitRate_title',
                'rate as profitRate_rate'
            );
        }])
        ->select('id', 'title')
        ->orderBy('id', 'desc')->get();


        // profit duration
        $profit_duration = $profit ? $profit->duration : 1000;

        
        return response()->json(
            [
                'images' => $images,
                'videos' => $videos,
                'exchange_rates' => $exchange_rates,
                'exchange_rate_duration' => $exchange_rate_duration,
                'profits' => $profits,
                'profit_duration' => $profit_duration,
            ]
        );

    }
}
