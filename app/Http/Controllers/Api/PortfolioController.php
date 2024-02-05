<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::paginate(12);

        return response()->json([
            'results' => $portfolios
        ]);
    }

    public function show($slug)
    {
        $portfolio = Portfolio::with('type')->where('slug', $slug)->first();

        if ($portfolio) {
            return response()->json([
                'result' => $portfolio,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
}
