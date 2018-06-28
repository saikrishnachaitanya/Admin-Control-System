<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "{{ url('img/favicon.png')}}" rel = "icon"  type = "image/png" />
    <title>Pioneer | Login </title>
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
                <h2 class="font-bold">Welcome to Admin Control System</h2><br>
                   <!-- <img class="img-responsive" src="img/Writers-Guru.jpg" width="300px" height="70px">-->

            </div><br>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="login_page" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="forgot_password">
                            <strong>Forgot password?</strong>
                        </a>
                    </form>
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-6">
                Copyright Sonali Miashra <small>© 2017-2018</small>
            </div>
            <!-- <div class="col-md-6 text-right">
              
            </div> -->
        </div>
    </div>
</body>

</html>
