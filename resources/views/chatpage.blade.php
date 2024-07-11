<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <form action="{{route('chatpage')}}">
    @csrf
    <textarea name="" id="">@isset($result['task']){{$result['task']}} @endisset</textarea>
  </form>
  @isset($response)
    <p>{!!$response['content']!!}</p>
  @endisset
</body>
</html>