@extends('layouts.master')
@section('title')
    Welcome to Travel.com
@endsection
@section('content')
    <div class="bg d-flex justify-content-center align-items-center">
      <div class="text-center" style="color:white">
        <h1>みんなで遊べば、地球は楽しい。</h1>
        <p>人生が長い道なら、その道草が旅なんだ。</p>
        <a class="btn btn-outline-light">もっと詳しく</a>
      </div>
    </div>
    <h1 class="display-4">おすすめの企画</h1>
    <p class="subtext">自分なりの旅行を体験しましょう</p>
    <div class="container plans">
      <div class="row">
        @foreach ($events as $event)
        <div class="col-3 center">
          <img src="{{ url('/images/gray.jpg') }}" alt="">
          <p>{{$event->title}}</p>
          <p>{{$event->MtbPrefecture->value}}</p>
          <p>募集状態</p>
        </div>
        @endforeach
      </div>
      <div class="row center">
        <a class="btn btn-outline-dark">もっと見る</a>
      </div>
    </div>

    <div class="types d-flex justify-content-center">
      <div class="text-center container">
        <h1 class="display-4 type-title">企画タイプ</h1>
        <p class="subtext-2">見たことのない色を、見に行こう</p>
        <div class="text-center row">
          <div class="col-2"><a href="#">haha</a></div>
          <div class="col-2"><a href="#">haha</a></div>
          <div class="col-2"><a href="#">haha</a></div>
          <div class="col-2"><a href="#">haha</a></div>
          <div class="col-2"><a href="#">haha</a></div>
          <div class="col-2"><a href="#">haha</a></div>
        </div>
      </div>
      
    </div>    
@endsection