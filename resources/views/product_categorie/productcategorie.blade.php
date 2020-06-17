@extends('adminhome')



 @section('content')

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

			<input type="button" class="w3-button w3-block w3-green" style="width:25%" value="Tambah Product Categorie" onclick="location.href='/productcategorie/create'">
			<br><br>
			@if($all_productcategorie->isEmpty())
				Belum ada data ...
			@else
			<table align="center", border="10" class="w3-table-all">
				<tr  class="w3-blue">
					<th>No</th>
					<th>Category Name</th>
					<th>Aksi</th> 

				</tr>
				@foreach($all_productcategorie as $pn)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$pn->category_name}}</td>
						<td>
							<span>
								<input type="button" class="w3-button w3-yellow w3-border" style="width:100%" value="Edit" onclick="location.href='/productcategorie/{{$pn->id}}/edit'"><br><br>

								<form style="display:inline-block;" action="productcategorie/{{$pn->id}}" method="post">
									@csrf
									@method('DELETE')
									<input type="submit" class="w3-button w3-red w3-border" style="width:540%" value="Delete">
								</form><br>
								
							</span>
						</td>
					</tr>
				@endforeach
			</table>

					

			@endif
		@endsection