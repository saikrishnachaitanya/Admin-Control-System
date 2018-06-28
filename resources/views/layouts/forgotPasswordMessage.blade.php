<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href = "{{ url('img/favicon.png')}}" rel = "icon"  type = "image/png" />
    <title>Pioneer</title>
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

             <div class="col-md-6" style="margin-top:20px;">
                <h2 class="font-bold">Welcome to Pioneer Group</h2><br>
                    <img class="img-responsive" src="img/pioneer.jpg" width="300px" height="70px">

            </div><br>
            <div class="col-md-6">
                <div class="ibox-content">
                  <h1> Mail send successfully. </h1>
                  <h3> Please visit the link in your mail to Reset Password</h3>
                </div>
           
            <a href = "{{ url('login') }}"> 
                     <strong>Login</strong>
            </a>
        </div> 
        </div>
 
        <div class="row">
            <div class="col-md-6">
                Copyright Pioneer Group  <small>© 2017-2018</small>
            </div>
            <!-- <div class="col-md-6 text-right">
              
            </div> -->
        </div>
    </div>
</body>

</html>




