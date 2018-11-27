<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('css/master.css') }}" type="text/css">
  <!--awesome font icon-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


  <title>recommendation</title>
</head>
<body>
    <div class="center">Hello {{$user->givenname}}</div>
    <div class="container plans">
        <div class="row">
          @foreach ($events as $event)
          <div class="col-lg-3 center">
            <a href="{{route('get_event_detail',["event_id"=>$event->id])}}"><img src="{{'storage/'.$event->image}}" alt="{{$event->title}}"></a>
            <a href="{{route('get_event_detail',["event_id"=>$event->id])}}"><p>{{$event->title}}</p></a>
            <p>{{$event->start_date}}から{{$event->finish_date}}まで</p>
            <p>{{$event->eventstatus->value}}</p>
          </div>
          @endforeach
        </div>
    </div>
</body>
</html>