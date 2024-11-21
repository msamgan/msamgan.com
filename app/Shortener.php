<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Shortener
{
    public static function shorten(string $url): string
    {
        $apiUrl = 'https://ms0.org/api/shorten';
        $token = 'e10b8e2925ad882bc3b2f690d0dd3719599cc3476c92b8201098740de186fb79';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post($apiUrl, ['url' => $url]);

        return $response->json()['shot_url'];
    }
}
