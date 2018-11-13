@extends('layouts.master')
@section('title')
    sign up
@endsection
@section('content')
<div class="wrapper">
  <form class="form-signin" action="{{route('post_signup')}}" method="POST">      
    {{ csrf_field() }}
    <h2 class="form-signin-heading">Please sign up</h2>
    <input type="text" class="form-control" name="familyname" placeholder="苗字" value="{{old('familyname')}}"/>
    @if ($errors->has('familyname'))
      <p>{{$errors->first('familyname')}}</p>
    @endif
    <input type="text" class="form-control" name="givenname" placeholder="名前" value="{{old('givenname')}}"/>
    @if ($errors->has('givenname'))
      <p>{{$errors->first('givenname')}}</p>
    @endif
    <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}"/>
    @if ($errors->has('email'))
      <p>{{$errors->first('email')}}</p>
    @endif
    <input type="password" class="form-control" name="password" placeholder="Password"/>
    @if ($errors->has('password'))
      <p>{{$errors->first('password')}}</p>
    @endif
    <input type="password" class="form-control pass" name="password_confirmation" placeholder="Password Confirmation"/>
    @if ($errors->has('password_confirm'))
      <p>{{$errors->first('password_confirm')}}</p>
    @endif      
    <label class="checkbox">
      <input type="checkbox" value="agreed" name="agreed"> 利用規則に同意します。
      @if ($errors->has('agreed'))
        <p>{{$errors->first('agreed')}}</p>
      @endif
    </label>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign up">
  </form>
</div>
@endsection