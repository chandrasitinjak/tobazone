@extends ('products.layout')

@section('content')
	<h1 class="text-center">Product View </h1>

  <a href="{{ url('products/edit', $product->id) }}"> Edit </a>
  <form method="post" action="{{ url('/products/delete', $product->id)}}"> 
    @csrf
    <button type="submit"> Delete </button>
  </form>
	<div class="row">
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
					<tr>
						<td> <a href="{{ url('/products', $product->id) }}"> {{ $product->name }} </a> </td>
						<td> {{ $product->price }} </td>
						<td> {{ $product->stock }} </td>
						<td> {{ $product->sold }} </td>
						<td> {{ $product->description }} </td>
						<td> {{ $product->specification }} </td>
						<td> {{ $product->images }} </td>
						<td> {{ $product->color }} </td>
					</tr>
			</tbody>
		</table>
	</div>
@endsection 