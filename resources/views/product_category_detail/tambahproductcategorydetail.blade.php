@extends('adminhome')

		  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		@section('content')
			<form class="w3-container w3-card-4" action="{{ route('newProductCategoryDetail') }}" method="POST">
				@csrf
			
			<p>
				<label for="product_id">Produt </label>
				<select class="w3-input w3-border" name="product_id">
					@foreach($products as $product)
					<option value="{{$product->id}}">{{$product->product_name}}</option>
					@endforeach
				</select>
			</p>

			<p>
				<label for="product__category_id">Produt </label>
				<select class="w3-input w3-border" name="product__category_id">
					@foreach($product_categories as $product_categorie)
					<option value="{{$product_categorie->id}}">{{$product_categorie->category_name}}</option>
					@endforeach
				</select>
			</p>
				
				<p>
					<center>
					<input type="submit" class="w3-button w3-block w3-green" style="width:100%" value="Simpan"><br>
					<!--<input type="button" class="w3-button w3-block w3-blue" style="width:25%" value="Kembali" onclick="location.href='/courier'">-->
				</center>
				</p>
			</form>
		@endsection	