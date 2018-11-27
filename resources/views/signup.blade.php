@extends('layouts.master')
@section('title')
    sign up
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script>
$(document).ready(function(){

    $.get("{{ route('get_api_areas') }}",function(data,status){
        if(status == "success") {
            var area_locations = data;

            area_locations.forEach(function(element) {
                var area_id = element.id;
                var area_name = element.area;

                var option = $('<option/>');
                option.attr({ 'value': area_id }).text(area_name);
                $('#area_select').append(option);
            });

            $("#area_select").change(function(){

                var selected_id = this.value;

                $('#location_select').find('option').remove();

                var option = $('<option/>');
                option.text("都道府県を選択してください。");
                $('#location_select').append(option);

                area_locations.forEach(function(element){
                    if(element.id == selected_id) {
                        var locations = element.locations;

                        locations.forEach(function(location_element){
                            var option = $('<option/>');
                            option.attr({ 'value': location_element.id }).text(location_element.location);
                            $('#location_select').append(option);
                        });
                    }
                });

            });
        }
    });
});


</script>
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
    <select name="area" id="area_select">
      <option>地域を選択してください。</option>
    </select>
    <select name="location" id="location_select">
      <option>都市を選択してください。</option>  
    </select>     
    <label class="checkbox">
      <input type="checkbox" value="agreed" name="agreed"> 利用規則に同意します。
      @if ($errors->has('agreed'))
        <p>{{$errors->first('agreed')}}</p>
      @endif
    </label>
    <label class="checkbox">
      <input type="checkbox" name="mailmagazine">メールマガジンに登録。
    </label>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign up">
  </form>
</div>
@endsection