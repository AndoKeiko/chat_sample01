<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Log;

class Chat02Controller extends Controller
{
    public function index()
    {
        return view('chat02');
    }

    public function chat(Request $request)
    {
        try {
            $message = $request->input('message');
            
            // Gemini Facadeを使用してコンテンツを生成
            $response = Gemini::geminiPro()->generateContent($message);
            
            return response()->json(['response' => $response->text()]);
        } catch (\Exception $e) {
            Log::error('Gemini API error: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while processing your request.'], 500);
        }
    }
}