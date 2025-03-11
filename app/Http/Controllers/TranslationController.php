<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TranslationController extends Controller
{
    public function index()
    {
        return view('translate');
    }

    public function translate(Request $request)
    {
        $text = $request->input('text');
        $targetLanguage = $request->input('language');

        $client = new Client();
        $apiKey = env('TRANSLATION_API_KEY');
        $url = 'https://translation.googleapis.com/language/translate/v2';

        $response = $client->post($url, [
            'query' => [
                'key' => $apiKey,
                'q' => $text,
                'target' => $targetLanguage,
            ],
        ]);

        $responseBody = json_decode($response->getBody(), true);
        $translatedText = $responseBody['data']['translations'][0]['translatedText'];

        return view('translate', [
            'originalText' => $text,
            'translatedText' => $translatedText,
            'targetLanguage' => $targetLanguage,
        ]);
    }
}
