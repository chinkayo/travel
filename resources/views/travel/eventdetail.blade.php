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
    {!!nl2br($event->event_detail)!!}
</p>
@endsection

@section("content4")

    @if($event->event_status_id==1||$event->event_status_id==3||$event->event_status_id==4||$event->event_status_id==5)
    @else
        @if($event_mtb_application)
            {{ $event_mtb_application->application_status->value }}
        @else
            <form action="{{ route('post_apply_event') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="event_id" value="{{ $event->id }}">
                <input type="submit" value="申し込む" class="btn btn-default">
            </form>
        @endif
    @endif
@endsection

@endforeach
