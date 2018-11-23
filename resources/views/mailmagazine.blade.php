<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{url('css/form.css')}}" >
  <title>メールマガジン内容登録</title>
</head>
<body>
    <div class="form-container">
        <h1>Email Content</h1>

        <form  method="post" id="reused_form" action="{{route('post_mailmagazine')}}">
          {{ csrf_field() }}
          <label for="name">Subject:</label>
          <input id="name" type="text" name="subject" maxlength="50">
          <p>
            @if ($errors->has('subject'))
                {{$errors->first('subject')}}
            @endif
          </p>
          <label for="time">Send Email At:</label>
          <input id="time" type="time" name="time">
          <p>
              @if ($errors->has('time'))
                  {{$errors->first('time')}}
              @endif
          </p>
          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="10" maxlength="6000"></textarea>
          <p>
              @if ($errors->has('message'))
                  {{$errors->first('message')}}
              @endif
          </p>
          <button class="button-primary" type="submit" >Post</button>
        </form>
</body>
</html>