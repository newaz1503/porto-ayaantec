<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend_asset/assets/images/favicon.png')}}">
    <title></title>
    
    <!-- page css -->
    <link href="{{asset('backend_asset/dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('backend_asset/dist/css/style.min.css')}}" rel="stylesheet">
</head>
<body>
    @yield('body')
    
</body>
</html>
<script src="{{asset('backend_asset/assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('backend_asset/assets/node_modules/popper/popper.min.js')}}"></script>
<script src="{{asset('backend_asset/assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!--Custom JavaScript -->
<script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>