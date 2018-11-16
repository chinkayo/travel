@extends("layout.mypage.layout")
@section("content")

</br>
<div class="container">
@foreach($events as $event)
        <div class="row">
            <div class="col-lg-0">
            </div>
                <div class="col-lg-6">
                    <img src="{{ asset('storage/' . $event->image) }}" width="250" height="150" class="img-rounded">
                </div>
                <div class="col-lg-6">
                    <div>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>イベント名</th>
                                <td><a href="#">{{$event->title}}</a></td>
                            </tr>
                            <tr>
                                <th>目的地</th>
                                <td>{{ $event->location->area->value }} {{ $event->location->value }}</td>
                            </tr>
                            <tr>
                                <th>イベント開始時間</th>
                                <td>{{$event->start_date}}</td>
                            </tr>
                            <tr>
                                <th>イベント終了時間</th>
                                <td>{{$event->finish_date}}</td>
                            </tr>
                            <tr>
                                <th>申し込み開始時間</th>
                                <td>{{$event->start_apply_date}}</td>
                            </tr>
                            <tr>
                                <th>定員</th>
                                <td>{{$event->capacity}}</td>
                            </tr>
                            <tr>
                                <th>現在の人数</th>
                                <td>{{ $event->application_number() }}
                                    </td>
                            </tr>
                            <tr>
                                <th>イベント募集状態</th>
                                <td>
                                    {{ $event->eventstatus->value }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <div class="col-lg-0">
            </div>
            <hr id="hr2"class="hr"/></br>
        </div>@endforeach
        {{ $events->links() }}
</div>

@endsection
