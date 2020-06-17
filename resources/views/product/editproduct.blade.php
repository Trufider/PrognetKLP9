@extends('adminhome')


		

		@section('content')

		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


		<form class="w3-container w3-card-4" action="/product/{{$product->id}}" method="POST">
				@csrf
				@method('patch')

			<p>
				<label for="product_name">Product Name</label>
				<input type="text" class="w3-input w3-border" name="product_name" value="{{$product->product_name}}" >
			</p>
			<br>

				<p>
				<label for="price">Price </label>
				<input type="number" class="w3-input w3-border" name="price" value="{{$product->price}}" >
			</p>
			<br>

				<p>
				<label for="description">Description </label>
				<input type="text" class="w3-input w3-border" name="description" value="{{$product->description}}" >
			</p>
			<br>

				<p>
				<label for="stock"> Stock</label>
				<input type="number" class="w3-input w3-border" name="stock" value="{{$product->stock}}" >
			</p>
			<br>

				<p>
				<label for="weight"> Weight</label>
				<input type="text" class="w3-input w3-border" name="weight" value="{{$product->weight}}" >
			</p>
			<br>
			
			<p>
				<center>
					<input type="submit" class="w3-button w3-block w3-green"  style="width:100%" value="Simpan">
				</center>
			</p>
			</form>
		@endsection	