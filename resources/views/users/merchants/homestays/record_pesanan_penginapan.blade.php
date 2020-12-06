@extends('users.layouts.app')
@section('title') {{ "Success Orders" }}
@endsection

@section('content')

<div class="container">
    @include('users.merchants.profile')

    <div class="row">

        @include('users.merchants.sidebar')
        <div id="on-process-order-list" class="col-12 col-md-9 col-lg-9">
            <new-order :user-id="{{ Auth::user()->id}} "/>
        </div>

    </div>
</div>
@endsection

<script>
    function deletes() {
        var txt;
        var r = confirm("Press a button!");
        if (r == true) {
            $.delete('//merchant/homestay/delete/' + 2, function (res) {
                alert(res)
            });
            alert("You pressed OK!");
        } else {
            alert("You pressed Cancel!");
        }
    }

</script>
