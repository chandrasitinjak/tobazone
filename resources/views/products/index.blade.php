@extends ('products.layout')

@section('content')
	<h1 class="text-center">Product View </h1>

	<div class="row">
		<a href = "{{url('/products/create')}}" class = "btn btn-primary pull-right"> Create</a>   
		<table class="table table-stripped">
			<thead>
				<td> Name </td>
				<td> Price </td>
				<td> Stock </td>
				<td> Sold </td>
				<td> Description </td>
				<td> Spesification </td>
				<td> Image </td>
				<td> Color </td>
			</thead>
	
			<tbody>
				@foreach($products as $product)
					<tr>
						<td> <a href="{{ url('/products', $product->id) }}"> {{ $product->name }} </a> </td>
						<td> {{ $product->price }} </td>
						<td> {{ $product->stock }} </td>
						<td> {{ $product->sold }} </td>
						<td> {{ $product->description }} </td>
						<td> {{ $product->spesification }} </td>
						<td> {{ $product->image }} </td>
						<td> {{ $product->color }} </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection 