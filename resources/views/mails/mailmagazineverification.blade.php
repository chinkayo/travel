<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Confirmation</title>
</head>
<body>
  <a href="{{route('verify',$maillist->token)}}">Please Verify Your Email</a>
</body>
</html>