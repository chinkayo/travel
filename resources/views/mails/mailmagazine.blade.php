<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$mailmagazinecontent->subject}}</title>
</head>
<body>
  {!!nl2br($mailmagazinecontent->content)!!}
</body>
</html>