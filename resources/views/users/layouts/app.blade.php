<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Title  -->
  <title> @yield('title')</title>

  <!-- Favicon  -->
  <link rel="icon" href="/user-assets/img/core-img/favicon.ico">

  <!-- Core Style CSS -->
  <link rel="stylesheet" href="/user-assets/css/core-style.css">
  <link rel="stylesheet" href="/user-assets/style.css">
</head>

<body>
  @include('users.layouts.header')
  @include('users.layouts.cart')
  @yield('content')
  @include('users.layouts.footer')
  @include('users.layouts.script')
</body>

</html>