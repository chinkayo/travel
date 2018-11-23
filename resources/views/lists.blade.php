@extends('layouts.master')
@section('title')
    企画一覧
@endsection
@section('content')
    <section class="wrapper1 style2 alt">
      <div class="container">
        <form action="{{route('lists')}}" method="get">
          {{ csrf_field() }}
          <div class="row">
          <input type="text" name="keyword" placeholder="keyword" value="{{ $request->get('keyword') ? $request->get('keyword') : '' }}">
          </div>
          <div class="row">
            @foreach ($areas as $area)
              <input type="checkbox" name="areas[]" value="{{$area->id}}"
              {{ $request->get("areas") && is_array($request->get("areas")) && in_array($area->id, $request->get("areas")) ? "checked" : "" }}
              >{{$area->value}}
            @endforeach
          </div>
          <div class="row">
              @foreach ($eventTypes as $eventType)
                <input type="checkbox" name="types[]" value="{{$eventType->id}}"
                
                {{ $request->get("types") && is_array($request->get("types")) && in_array($eventType->id, $request->get("types")) ? "checked" : "" }}
                
                >{{$eventType->value}}
              @endforeach
          </div>
          <div class="row">
              @foreach ($eventStatuses as $eventStatus)
                <input type="checkbox" name="statuses[]" value="{{$eventStatus->id}}"
                
                {{ $request->get("statuses") && is_array($request->get("statuses")) && in_array($eventStatus->id, $request->get("statuses")) ? "checked" : "" }}
                
                
                >{{$eventStatus->value}}
              @endforeach
          </div>
          <div class="row">
            <button type="submit">Search</button>
          </div>
        </form>
      </div>
        @if (count($events)>0)
          @foreach ($events as $event)
            <div class="inner">
              <div class="spotlight">
                <div class="image">
                  <img src="{{'storage/'.$event->image}}" alt="" />
                </div>
                <div class="content">
                  <h3>{{$event->title}}</h3>
                  <p>{{$event->location->area->value}}</p>
                  <p>{{$event->eventType->value}}</p>
                  <p>{{$event->eventStatus->value}}</p>
                  <ul class="actions">
                    <li><a href="#" class="button alt">Details</a></li>
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="d-flex justify-content-center">
            <p>no result</p>
          </div>
        @endif


    </section>
      <div class="d-flex justify-content-center">
            {{ $events->appends($_GET)->links() }}
      </div>
@endsection