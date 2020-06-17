@extends('adminhome')



 @section('content')

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

			<input type="button" class="w3-button w3-block w3-green" style="width:25%" value="Tambah Discount" onclick="location.href='/discount/create'">
			<br><br>
			@if($all_discount->isEmpty())
				Belum ada data ...
			@else
			<table align="center", border="10" class="w3-table-all">
				<tr  class="w3-blue">
					<th>No</th>
					<th>Product</th>
					<th>Pecentage</th>
					<th>Start</th>
					<th>End</th>
					<th>Aksi</th> 

				</tr>

				@foreach($all_discount as $pn)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$pn->product->product_name}}</td>
						<td>{{$pn->percentage}}</td>
						<td>{{$pn->start}}</td>
						<td>{{$pn->end}}</td>
						<td>
							<span>
								<input type="button" class="w3-button w3-yellow w3-border" style="width:100%" value="Edit" onclick="location.href='/discount/{{$pn->id}}/edit'"><br><br>
								<form style="display:inline-block;" action="discount/{{$pn->id}}" method="post">
									@csrf
									@method('DELETE')
									<input type="submit" class="w3-button w3-red w3-border" style="width:270%" value="Delete">
								</form><br>
								
							</span>
						</td>
					</tr>
				@endforeach
			</table>

					

			@endif
		@endsection