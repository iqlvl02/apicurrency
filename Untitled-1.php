<?php

use Illuminate\Support\Facades\Route;

Route::get('/currency/{base}/{target}', function ($base, $target) {
    $rates = [
        "USD" => ["PHP" => 56.0, "EUR" => 0.92],
        "PHP" => ["USD" => 0.018, "EUR" => 0.016],
        "EUR" => ["USD" => 1.09, "PHP" => 61.0]
    ];

    $base = strtoupper($base);
    $target = strtoupper($target);

    if (isset($rates[$base][$target])) {
        return response()->json([
            "rate" => $rates[$base][$target]
        ]);
    } else {
        return response()->json([
            "error" => "Rate not available"
        ], 404);
    }
});
