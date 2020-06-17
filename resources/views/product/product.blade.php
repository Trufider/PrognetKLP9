@extends('adminhome')



 @section('content')

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

			<input type="button" class="w3-button w3-block w3-green" style="width:25%" value="Tambah Product" onclick="location.href='/product/create'">
			<br><br>
			@if($all_product->isEmpty())
				Belum ada data ...
			@else
			<table align="center", border="10" class="w3-table-all">
				<tr  class="w3-blue">
					<th>No</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Description</th>
					<th>Stock</th>
					<th>Weight</th>
					<th>Aksi</th> 

				</tr>

				@foreach($all_product as $pn)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$pn->product_name}}</td>
						<td>{{$pn->price}}</td>
						<td>{{$pn->description}}</td>
						<td>{{$pn->stock}}</td>
						<td>{{$pn->weight}}</td>
						<td>
							<span>
								<input type="button" class="w3-button w3-yellow w3-border" style="width:100%" value="Edit" onclick="location.href='/product/{{$pn->id}}/edit'"><br><br>
								<form style="display:inline-block;" action="product/{{$pn->id}}" method="post">
									@csrf
									@method('DELETE')
									<input type="submit" class="w3-button w3-red w3-border" style="width:100%" value="Delete">
								</form><br>
								
							</span>
						</td>
					</tr>
				@endforeach
			</table>

					

			@endif
		@endsection