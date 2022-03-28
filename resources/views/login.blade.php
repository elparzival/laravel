<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiencias</title>
    <link rel="icon" href="{{URL::asset('android-icon-192x192.png')}}"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <style>
      body {
        font-family: "Arial", sans-serif; font-size: 14px;
      }
      .btn 
      {
        text-align: center;
        font-size: 12px;
      }
      .dropdown-item
      { 
        font-family: 'Arial', sans-serif;
        color:grey;
        font-size: 14px;
        margin: 0px;
      }
      .form-control
      {
        font-family: 'Arial', sans-serif;
        color:grey;
        font-size: 14px;
        margin: 0px;
      }
      .update
      {
        position: fixed;
        top: 0px;
        left: 0px;
        min-height: 100%;
        min-width: 100%;
        background-image: url("https://miro.medium.com/max/1400/1*CsJ05WEGfunYMLGfsT2sXA.gif");
        background-position:center center;
        background-repeat:no-repeat;
        background-color: white;
        z-index: 500 !important;
        opacity: 0.8;
        overflow: hidden;
      }
      .footer-basic 
      {
        padding:40px 0;
        background-color:#ffffff;
        color:#4b4c4d;
      }
      .footer-basic .copyright 
      {
        margin-top:15px;
        text-align:center;
        font-size:13px;
        color:#aaa;
        margin-bottom:0;
      }
      .content2 
      {
        margin-left: 10px;
        margin-right: 10px;
      }
   </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="{{URL::asset('/LogodeFiscalia.jpg')}}" alt="Logo" class="rounded float-left" style="max-width: 60px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
    </ul>
  </div>
</nav>


<!-- content -->
<div class="container">
    <br>
    <div class="col-md-5" style="margin-left:300px;">
       <div class="card">
              <div class="card-header"><strong>Login</strong></div>
              <div class="card-body">
                     <form id="login_form">
                            @csrf
                            <div class="input-group mb-3">
                                   <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                                   </div>
                                   <input type="text" id="txt_user" class="form-control" placeholder="Username">
                            </div>
                            
                            <div class="input-group mb-3">
                                   <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                                   </div>
                                   <input type="password" id="txt_password" class="form-control" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                     </form>
              </div>
       </div>
    </div>
    <div id="loading" class="update" style="display: none;"></div>
</div>

<div class="footer-basic">
  <footer>
      <p class="copyright">Mauro Pro © 2022</p>
  </footer>
</div>

<!-- scripts -->
<script>
  $(document).ready(function(){
      $('#login_form').submit(function(e){
        var _token = $("input[name=_token]").val(); 
        var user = $("#txt_user").val();
        var password = $("#txt_password").val();
        console.log(_token);
        e.preventDefault();
          $.ajax({
              method: "POST",
              url: "{{ route('auth.login') }}",
              dataType: "json",
              data: 
              { 
                    user : user,
                    password : password,
                    _token : _token 
              },
              beforeSend: function () {
                    $("#loading").show();
              },
              success: function (response) {
                    console.log(response.result);
                    switch(response.result)
                    {
                      case "ok":
                        window.location.href = "/home";
                        break;
                      case "no_key":
                        toastr.warning('Token inválido');
                        break;
                      case "no_user":
                        toastr.warning('Usuario no registrado');
                        break;
                    }
              },
              complete: function () {
                    $("#loading").hide();
              },
              error: function () {
                    alert(response.d);
              }
          });
      });
  });
</script>
<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
</body>
</html>