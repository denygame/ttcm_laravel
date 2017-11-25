<!doctype html>
<html class="no-js"lang="en"dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width", initial-scale="1.0">
  <title>@yield('title')</title>
  <base href="{{asset('')}}">
  <link rel="stylesheet" href="source/css/foundation.css">
  <link rel="stylesheet" href="source/css/app.css">
  <link rel="stylesheet" href="source/css/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="source/css/backend.css">

</head>
<body class="regular">
  @include('header')

  @yield('content')

  @include('footer')

  <!-- JS DECLARE -->
  <script src="source/js/vendor/jquery.js"></script>
  <script src="source/js/vendor/what-input.js"></script>
  <script src="source/js/vendor/foundation.js"></script>
  <script src="source/js/app.js"></script>
  <script src="source/js/backend/myScript.js"></script>
  <script src="source/js/backend/fly.js"></script>
  <!-- END JS DECLARE -->
</body>
</html>