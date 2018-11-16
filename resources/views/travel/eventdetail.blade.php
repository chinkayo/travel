@extends("layout.mypage.layout2")
@foreach($events as $event)

@section("content0")
{{$event->title}}
@endsection

@section("content")
    <img  src="{{ asset('storage/' . $event->image) }}" width="480" height="350">
@endsection

@section("content2")
<table class="table table-striped">
    <tbody>
    <tr>
        <th>イベント名</th>
        <td>{{$event->title}}</td>
    </tr>
    <tr>
        <th>目的地</th>
        <td>{{ $event->location->area->value }} {{ $event->location->value }}</td>
    </tr>
    <tr>
        <th>開催期間</th>
        <td>{{$event->start_date}}～{{$event->finish_date}}</td>
    </tr>
    <tr>
        <th>申し込み開始時間</th>
        <td>{{$event->start_apply_date}}</td>
    </tr>
    <tr>
        <th>申し込み終了時間</th>
        <td>{{$event->deadline}}</td>
    </tr>
    <tr>
        <th>募集状態</th>
        <td>{{ $event->eventstatus->value }}</td>
    </tr>
    <tr>
        <th>最小人数</th>
        <td>{{$event->minimum}}</td>
    </tr>
    <tr>
        <th>旅行会社</th>
        <td>
            @if($event->travel_company_flg==0)
            <p>使用</p>
            @else
            <p>不使用</p>
            @endif
        </td>
    </tr>
    <tr>
        <th>定員</th>
        <td>{{$event->capacity}}</td>
    </tr>
    <tr>
        <th>イベントタイプ</th>
        <td>
            {{ $event->eventtype->value }}
        </td>
    </tr>
    </tbody>
</table>
@endsection

@section("content3")
<p>イベント詳細：</p>
<p>
    {{$event->event_detail}}
</p>
@endforeach
@endsection
