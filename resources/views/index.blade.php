<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gemini AI</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-16">
  <form action="{{route('entry')}}" name="toGoeminiText" method="post">
    @csrf
    <textarea name="" id="" class="w-full">@isset($result['task']){{$result['task']}} @endisset</textarea>
  </form>
  @isset($result)
    <p>{!!$result['content']!!}</p>
  @endisset
</body>
</html>