@extends ('Product.layout')

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
				
			</tbody>
		</table>
	</div>
@endsection 