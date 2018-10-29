@extends ('products.layout')

@section('content')
	<h1 class="text-center"> CRUD Product</h1>

	<div class="row">
		<div class="col-md-6 col-md-offset-9">
			<form method="post" action="{{url('/products/store')}}">
				@csrf
				<div>
					<label> Name </label>
					<input type="text" name="name" class="form-control">
				</div>
				<div>
					<label> Price </label>
					<input type="text" name="price" class="form-control">
				</div>
				<div>
					<label> Stock </label>
					<input type="text" name="stock" class="form-control">
				</div>
				<div>
					<label> Sold </label>
					<input type="text" name="sold" class="form-control">
				</div>
				<div>
					<label> Description </label>
					<input type="text" name="description" class="form-control">
				</div>
				<div>
					<label> Specification </label>
					<input type="text" name="specification" class="form-control">
				</div>
				<div>
					<label> Color </label>
					<input type="text" name="color" class="form-control">
				</div>
				<div>
					<label> Image </label>
					<input type="text" name="image" class="form-control">
				</div>
				<div>
					<button type="submit" class="brn btn-success btn-block">Create</button>
				</div>
			</form>
	</div>
@endsection