<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Confirmation</title>
</head>
<body>
  Hello {{$user->givenname}}
  <a href="{{route('verify',$user->token)}}">あなたは申し込んだイベントの審査が通過しました。</a>
</body>
</html>
