<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "{{ url('img/favicon.png')}}" rel = "icon"  type = "image/png" />
    <title>Admin Control System | Reset Password </title>
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
                    <img class="img-responsive" src="{{url('img/pioneer.jpg') }}" width="300px" height="70px">

            </div><br>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="set_new_password" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email" disabled value={{$email}} required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" id="confirm_password" name="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" placeholder="Password" name="token" value={{$token}} >
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Submit</button>

                        
                    </form>
                </div>
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
<script type="text/javascript">
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</html>
