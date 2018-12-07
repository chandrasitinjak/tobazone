<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title  -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title> @yield('title')</title>

  <link rel="icon" href=http://sstatic.net/stackoverflow/img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="/user-assets/css/core-style.css">
  <link rel="stylesheet" href="/user-assets/style.css">

</head>

<body>
  <div id="app">
    @include('users.layouts.header')
    @include('users.layouts.cart')
    @yield('content')
    @include('users.layouts.footer')
    @include('users.layouts.script')
  </div>
</body>

</html>