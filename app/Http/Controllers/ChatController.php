<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
  public function chat(Request $request)
  {
      $inputText=$request->chat;
      if($inputText!=null) {
          $responseText = $this->generateResponse($inputText);
      
          $messages = [
              ['title' => '入力されたデータ', 'content' => $inputText],
              ['title' => '分析結果', 'content' => $responseText]
          ];
          return view('chat.create', ['messages' => $messages]);
      
      }
      return view('chat.create');
  }

  public function generateResponse($inputText) {
      $result = OpenAI::completions()->create([
          'model' => 'gpt-3.5-turbo-instruct',
          'prompt' => $inputText.'を読み取って、ソースコードの間違いを指摘してください。',
          'temperature' => 0.8,
          'max_tokens' => 300,
      ]);
      return $result['choices'][0]['text'];
  }

  
}
