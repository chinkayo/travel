<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>evntform</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>
    input{
        width:350px;
        height:30px;
    }
    #submit{
        width:60px;
        height:30px;}
    #checkbook1{
        width:15px;
        height:15px;
    }
    #checkbook2{
        width:15px;
        height:15px;
    }
    #checkbook3{
        width:15px;
        height:15px;
    }
    #checkbook4{
        width:15px;
        height:15px;
    }

        h2{text-align:center;}
        button{width:130px;height:40px;}
        #buttonlist{
            border:1px solid #a1a1a1;
        	padding:10px 40px;
        	width:50px;
            height:400px;
        	border-radius:5px;
        }
        #content{
            border:1px solid #a1a1a1;
        	padding:10px 40px;
        	width:50px;
            height:1100px;
        	border-radius:5px;
        }
        .hr{ width:1150px;eight:1px;border:none;border-top:1px solid #C0C0C0;}
        #hr2{width:700px;eight:1px;border:none;border-top:1px solid #C0C0C0;}

</style>
</head>

<body>
    </br></br>
    <h2>マイページ</h2>
    </br>
    <hr class="hr" />
    </br>


    <div class="container">
        <div class="row">
            <div class="col-lg-3" id="buttonlist">
                <center>
                    <a href="{{ route('show_detail_status', ['application_statuses_id' =>1]) }}"><button type="button" class="btn btn-default">審査待ち</button></br></br></a>
                    <a href="{{ route('show_detail_status', ['application_statuses_id' =>2]) }}"><button type="button" class="btn btn-default">審査通過</button></br></br></a>
                    <a href="{{ route('show_detail_status', ['application_statuses_id' =>3]) }}"><button type="button" class="btn btn-default">審査落ち</button></br></br></a>
                    <a href="event_statuses"><button type="button" class="btn btn-default">発表済み</button></br></br></a>
                    <a href="eventform"><button type="button" class="btn btn-info">イベント新規</button></br></br></a>
                    <button type="button" class="btn btn-danger"><a href="{{route('logout')}}">ログアウト</a></button>
                </center>
            </div>

            <div class="col-lg-1">
            </div>

            <div class="col-lg-8" id="content">
                @yield("content")
            </div>


        </div>
    </div></br></br></br>
</body>
</html>
