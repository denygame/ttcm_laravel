<!DOCTYPE html>
<html lang="en">
<head>
    <title>T2HD Admin</title><meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <base href="{{asset('')}}">
    <link rel="stylesheet" href="source/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="source/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="source/admin/css/matrix-login.css" />
    <link href="source/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />

</head>
<body>
    <div id="loginbox">

        <form id="loginform" method="post" class="form-vertical" action="{{ route('postadminlogin') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
           <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                    <input type="text" placeholder="Username" name="username" value="{{ Session::get('username') }}" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                    <input type="password" placeholder="Password" name="password" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            {{-- <span class="pull-left"><a class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> --}}
            <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
        </div>
    </form>


    {{-- <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
        </div>
    </form> --}}
</div>

<script src="source/admin/js/jquery.min.js"></script>  
<script src="source/admin/js/matrix.login.js"></script> 
</body>
</html>