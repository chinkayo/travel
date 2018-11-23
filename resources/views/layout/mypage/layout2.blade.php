<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>eventdetail</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <style>
      .one_staff {
          margin: 5px;
          padding: 5px;
      }

      th{text-align:center;}
      h2{text-align:center;}

  </style>
</head>


<body>
    </br></br>
    <h2>@yield("content0")</h2></br>
    <div class="container">
        <div class="row one_staff">
            <div class="col-6">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            @yield("content")
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div>
                    @yield("content2")
                </div>
            </div>
        </div>
    </div>

        <div class="container">
              <div class="row">
                    <div class="col-0"></div>
                    <div class="col-12">
                        @yield("content3")
                    </div>
                    <div class="col-0"></div>
              </div>
        </div></br>

        <div class="container">
                <div class="row">
                    <div class="col-5"></div>
                        <div class="col-5">
                            @yield("content4")
                        </div>
                    <div class="col-2"></div>
                </div>
        </div></br>

</body>
</html>
