@extends('adminhome')



		@section('content')

		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


		<form class="w3-container w3-card-4" action="/productcategorie/{{$product_categorie->id}}" method="POST">
				@csrf
				@method('patch')
			<p>
				<label for="category_name">Category Name</label>
				<input type="text" class="w3-input w3-border" name="category_name" value="{{$product_categorie->category_name}}" >
			</p>
			<br>
			
			<p>
				<center>
					<input type="submit" class="w3-button w3-block w3-green"  style="width:100%" value="Simpan">
				</center>
			</p>
			</form>
		@endsection	