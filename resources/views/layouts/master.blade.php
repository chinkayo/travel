<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/master.css') }}" type="text/css">
    <!--awesome font icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <title>@yield('title')</title>
  </head>

  <body>
      <header>
          <nav class="navbar navbar-expand-sm navbar-light bg-faded container" style="height:5em">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>

              <!-- Brand -->
              <a class="navbar-brand" href="{{route('index')}}">Travel</a>

              <!-- Links -->
              <div class="collapse navbar-collapse justify-content-end" id="nav-content">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('lists')}}">企画一覧</a>
                  </li>
                  @if (Auth::check())
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('logout')}}">ログアウト</a>
                    </li>
                  @else
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('get_login')}}">ログイン</a>
                    </li>
                  @endif
                  @if (Auth::guest())
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('get_signup')}}">登録</a>
                    </li>
                  @endif
                </ul>
              </div>
            </nav>
      </header>
      @yield('content')

      <footer class="page-footer font-small teal pt-4" style="background-color:#2c3e50;color:white">

          <!-- Footer Text -->
          <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

              <!-- Grid column -->
              <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">ニューズレター</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae harum esse fugiat. Itaque, culpa?</p>
                <form class="input-group" action="{{route('newsletter')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="email" class="form-control form-control-sm" placeholder="Your email" aria-label="Your email" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <input class="btn btn-sm btn-outline-white" type="submit" value="Sign up">
                    </div>
                </form>
                @if ($errors->has('email'))
                  <p>{{$errors->first('email')}}</p>
                @endif
        
              </div>
              <!-- Grid column -->

              <hr class="clearfix w-100 d-md-none pb-3">

              <!-- Grid column -->
              <div class="col-md-6 mb-md-0 mb-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">住所</h5>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio deserunt fuga perferendis modi earum commodi aperiam temporibus quod nulla nesciunt aliquid debitis ullam omnis quos ipsam, aspernatur id excepturi hic.</p>

              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->

          </div>
          <!-- Footer Text -->
        </footer>
        <!-- Footer -->
  </body>

</html>
