@extends ('products.layout')

@section('content')
	<h1 class="text-center"> Edit Product</h1>

	<div class="row">
		<div class="col-md-6 col-md-offset-9">
			<form method="post" action="{{url('/products/update', $product->id)}}">
				@csrf
				<div>
					<label> Name </label>
          <input type="text" name="name" value="{{ $product->name }}">
				</div>
				<div>
					<label> Price </label>
          <input type="text" name="price" value="{{ $product->price }}">
				</div>
				<div>
					<label> Stock </label>
					<input type="text" name="stock" value="{{ $product->stock }}">
				</div>
				<div>
					<label> Description </label>
					<input type="text" name="description" value="{{ $product->description }}">
				</div>
				<div>
					<label> Specification </label>
					<input type="text" name="specification" value="{{ $product->specification }}">
				</div>
				<div>
					<label> Color </label>
					<input type="text" name="color" value="{{ $product->color }}">
				</div>
				<div>
					<label> Image </label>
					<input type="text" name="image" value="{{ $product->images }}">
				</div>
				<div>
					<button type="submit" class="brn btn-success btn-block"> Update </button>
				</div>
			</form>
	</div>
@endsection