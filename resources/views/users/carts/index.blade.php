@extends('users.layouts.app') 
@section('content')
  @if(Auth::check())
    <div id="cart">
      <cart :user-id="{{Auth::user()->id}}" />
    </div>
  @else
  <div id="cart">
      <cart />
    </div>
  @endif
  
@endsection


<script>
  function deleteCart(id) {
    jQuery.ajax({
      url: 'carts/delete/' + id,
      type: 'POST',
      data: {
        _token: "{{ csrf_token() }}"
      },
      dataType: 'json',
      success: function( data ) {
        console.log(data);
      }       
    })
  }

</script>