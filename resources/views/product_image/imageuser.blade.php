@extends('userhome')



 @section('content')

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

			<!--<input type="button" class="w3-button w3-block w3-green" style="width:25%" value="Tambah Product" onclick="location.href='/product/create'">-->
			<br>
			@if($all_product_image->isEmpty())
				Belum ada data ...
			@else
			<table align="center", border="10" class="w3-table-all">
				<tr  class="w3-blue">
					
					<th>Product Name</th>
					<th>Image</th>
					<!--<th>Aksi</th>--> 

				</tr>

				@foreach($all_product_image as $pn)
					<tr>
					
						<td>{{$pn->product->product_name}}</td>
						<td><img src="/image_name/{{$pn->image_name}}"></td>


						<!--<td>
							<span>
								<input type="button" class="w3-button w3-yellow w3-border" style="width:100%" value="Edit" onclick="location.href='/product/{{$pn->id}}/edit'"><br><br>
								<form style="display:inline-block;" action="product/{{$pn->id}}" method="post">
									@csrf
									@method('DELETE')
									<input type="submit" class="w3-button w3-red w3-border" style="width:275%" value="Delete">
								</form><br>
								
							</span>
						</td>-->
					</tr>
				@endforeach
			</table>

					

			@endif
		@endsection