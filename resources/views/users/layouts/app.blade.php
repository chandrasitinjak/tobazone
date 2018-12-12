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
  <title> @yield('title', 'UlosZone')</title>

  <link rel="shortcut icon" href="/images/assets/icon.ico">

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
    <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          {{--<div class="modal-header">--}}
            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="float-right" style="margin: 10px 10px 0">×</span></button>
          {{--</div>--}}
          <div class="modal-body">
            <img src="" class="enlargeImageModalSource" style="width: 200%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>