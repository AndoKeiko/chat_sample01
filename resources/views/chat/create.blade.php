<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-12">
  <form action="{{route('chat.post')}}" method="POST">
    @csrf
    <textarea name="chat" type="text" class="w-full"></textarea>
    <button type="submit" class="bg-blue-500 bg-white">送信</button>
  </form>
  @isset($messages)
  <div id="chat-contents">
  @foreach($messages as $message)
    {{$message['title']}}<div class="bg-opacity-30 bg-blue-100 p-4">{{$message['content']}}</div>
  @endforeach
  </div>
  @endisset
</body>
</html>