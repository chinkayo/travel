@extends("layout.mypage.layout")

@section("content")

@if(count($errors)>0)
    <p>入力に問題があります。再入力してください。</p>
@endif
   </br>
<form action="/travel/insertsuccess" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="container">
      <div class="row">
          <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <P>タイトル＊</P>
            </div>
            <div class="col-lg-5">
                <input name="title" type="text" value="{{old('title')}}">
            </div>
            <div class="col-lg-3"></div>
      </div>
    </div>
    @if($errors->has('title'))
        <p>ERROR:{{$errors->first('title')}}</p>
     @endif

    <div class="container">
      <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <P>area＊</P>
            </div>
            <div class="col-lg-5">
                    <select name="area">
                        <option>地域を選択</option>
                       @foreach($mtb_areas as $mtb_area)
                       <option value="{{ $mtb_area->id }}">{{ $mtb_area->value }}</option>
                       @endforeach
                   </select>
            </div>
            <div class="col-lg-3"></div>
      </div>
    </div>

    @if($errors->has('area'))
        <p>ERROR:{{$errors->first('area')}}</p>
     @endif


    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>location＊</P>
                </div>
                <div class="col-lg-5">
                   <select name="location">
                       <option>都道府県を選択</option>
                       @foreach($mtb_locations as $mtb_location)
                       <option value="{{ $mtb_location->id }}"
                           @if($mtb_location->id == old('location'))
                           selected
                           @endif
                           >{{ $mtb_location->value }}</option>
                       @endforeach
                   </select>
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    @if($errors->has('location'))
　           <p>ERROR:{{$errors->first('location')}}</p>
    @endif

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>イベントタイプ＊</P>
                </div>

                @foreach($mtb_event_types as $mtb_event_type)
                <div class="col-0">
                    <input id="checkbook1" name="eventtype" type="radio" value="{{ $mtb_event_type->id }}"
                        @if($mtb_event_type->id == old("eventtype"))
                        checked
                        @endif
                    />{{ $mtb_event_type->value }}
                </div>
                @endforeach
                <div class="col-3"></div>
          </div>
    </div>
    @if($errors->has('eventtype'))
　           <p>ERROR:{{$errors->first('eventtype')}}</p>
    @endif

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <p>開始時間＊</p>
                </div>
                <div class="col-lg-5">
                    <input type="date" name="start_date">
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    @if($errors->has('start_date'))
　           <p>ERROR:{{$errors->first('start_date')}}</p>
    @endif

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <p>終了時間＊</p>
                </div>
                <div class="col-lg-5">
                    <input type="date" name="finish_date">
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    @if($errors->has('finish_date'))
　           <p>ERROR:{{$errors->first('finish_date')}}</p>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-3">
                <P>申し込み開始時間＊</P>
            </div>
            <div class="col-lg-5">
                <input type="date" name="start_apply_date">
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

    @if($errors->has('start_apply_date'))
　           <p>ERROR:{{$errors->first('start_apply_date')}}</p>
    @endif

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>申し込み終了時間＊</P>
                </div>
                <div class="col-lg-5">
                    <input type="date" name="deadline">
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    @if($errors->has('deadline'))
　           <p>ERROR:{{$errors->first('deadline')}}</p>
    @endif

    <div class="container">
          <div class="row">
               <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>定員＊</P>
                </div>
                <div class="col-lg-5">
                    <input type="number" name="quantity" min="1" max="50">
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    @if($errors->has('quantity'))
　           <p>ERROR:{{$errors->first('quantity')}}</p>
    @endif

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>最小人数＊</P>
                </div>
                <div class="col-lg-5">
                    <input type="number" name="minquantity" min="1" max="50">
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>
    @if($errors->has('minquantity'))
　           <p>ERROR:{{$errors->first('minquantity')}}</p>
    @endif

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>旅行会社</P>
                </div>
                <div class="col-lg-5">
                    <select name="company">
                        <option value="0">あり</option>
                        <option value="1">なし</option>
                    </select>
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>価格</P>
                </div>
                <div class="col-lg-5">
                    <input name="price" type="text">
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    <div class="container">
        <div class="row">
              <div class="col-lg-1"></div>
              <div class="col-lg-3">
                    <P>価格備考</P>
              </div>
          <div class="col-lg-5">
                <input  name="priceremark" type="text">
          </div>
          <div class="col-lg-3"></div>
        </div>
    </div>

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>画像＊</P>
                </div>
                <div class="col-lg-5">
                    <input type="file" name="picture">
                </div>
                <div class="col-lg-3"></div>
          </div>
    </div>

    @if($errors->has('picture'))
　           <p>ERROR:{{$errors->first('picture')}}</p>
    @endif

    <div class="container">
          <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <P>イベント詳細</P>
                </div>
                <div class="col-lg-5">
                    <textarea name="detail" rows="10" cols="45"></textarea>
                </div>
                <div class="col-lg-3"></div>
          </div>
  </div></br>

    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-5">
            </div>
            <div class="col-lg-1">
                <input id="submit" type="submit" value="提出">
            </div>
            <div class="col-lg-2"></div>
      </div>
    </div>
</form>


@endsection
