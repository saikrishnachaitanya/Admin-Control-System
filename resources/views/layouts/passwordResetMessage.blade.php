<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "{{ url('img/favicon.png')}}" rel = "icon"  type = "image/png" />
    <title>Admin Control System</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> 
    <!-- <link href="font-awesome/css/font-awesome.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.css')}}"> 
    <!-- <link href="css/animate.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}"> 
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> 

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">
             <form class="m-t" role="form" action="login" method="post">
             <div class="col-md-6" style="margin-top:20px;">
                <h2 class="font-bold">Welcome to Pioneer Group</h2><br>
                    <img class="img-responsive" src="{{url('img/pioneer.jpg')}}" width="300px" height="70px">

            </div><br>
            <div class="col-md-6">
                <div class="ibox-content">
                   <h1> {{ $message }} </h1>
                   
                </div>
                <a href="{{URL::to('login')}}">
                            <strong>login</strong>
                        </a>
            </div>
        </div>
     
        <div class="row">
            <div class="col-md-6">
                Copyright Chaitanya  <small>© 2017-2018</small>
            </div>
            <!-- <div class="col-md-6 text-right">
              
            </div> -->
        </div>
    </div>
</body>

</html>
