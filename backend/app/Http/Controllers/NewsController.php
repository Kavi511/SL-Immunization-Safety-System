<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $apiKey = 'a87ae3b50c884cfb9750058e6abfcf46'; // Replace with your API key
        $endpoint = 'https://newsapi.org/v2/everything'; // Update based on your chosen API

        // Make an API request
   
        $response = Http::get($endpoint, [
            'q' => 'vaccines AND humans ', // Query for vaccine-related news for humans
            'language' => 'en', // Filter for English news
            'sortBy' => 'publishedAt', // Sort by the latest articles
            'apiKey' => $apiKey,
            
            
        ]);
        // Decode JSON response
        $news = $response->json();

        // Pass news data to the view
        return view('news.index', compact('news'));
    }
}
