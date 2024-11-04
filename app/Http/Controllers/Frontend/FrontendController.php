<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ExchangeRate;
use App\Models\Profit;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * welcome
     */
    public function welcome()
    {
        // images
        $images = Content::where('type', 'image')->orderBy('id', 'desc')->get();
        // videos
        $videos = Content::where('type', 'video')->orderBy('id', 'desc')->get();
        // exchange rate
        $currency = Content::where('type', 'currency')->first();
        $exchange_rates = ExchangeRate::orderBy('id', 'desc')->get();
        $exchange_rate_duration = $currency ? $currency->duration : 1000;
        // profits
        $profit = Content::where('type', 'profit')->first();
        $profits = Profit::orderBy('id', 'desc')->get();
        $profit_duration = $profit ? $profit->duration : 1000;
        return view('ui.frontend.welcome', compact('exchange_rates', 'images', 'exchange_rate_duration', 'videos', 'profits', 'profit_duration'));
    }
}
