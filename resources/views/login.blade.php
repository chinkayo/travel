@extends('layouts.master')
@section('title')
    login
@endsection
@section('content')
  <div class="wrapper">
    <form class="form-signin" action="{{route('post_login')}}" method="POST">
      {{ csrf_field() }}
      <h2 class="form-signin-heading">このメッセージがいらない。</h2>
      <input type="text" class="form-control" name="email" placeholder="Email Address" value="{{old('email')}}"/>
      @if ($errors->has('email'))
          <p>{{$errors->first('email')}}</p>
      @endif
      <input type="password" class="form-control" name="password" placeholder="Password"/>
      @if ($errors->has('password'))
          <p>{{$errors->first('password')}}</p>
      @endif
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
    </form>
  </div>
@endsection
