@extends('adminhome')

		

		@section('content')

			 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

			 
		<form class="w3-container w3-card-4" action="{{ route('updateProductCategoryDetail', $product_category_detail->id)}}" method="POST">
				@csrf
				@method('patch')

			<p>
				<label for="product_id">Product </label>
				<select class="w3-input w3-border" name="product_id">
					@foreach($products as $product)
					<option value="{{$product->id}}" @if($product_category_detail->product_id==$product->id) selected @endif> {{$product->product_name}}</option>
					@endforeach
				</select>
			</p>
			<br>
				<p>
				<label for="product__category_id">Category name </label>
				<select class="w3-input w3-border" name="product__category_id">
					@foreach($product_categories as $product_categorie)
					<option value="{{$product_categorie->id}}" @if($product_category_detail->product__category_id==$product_categorie->id) selected @endif> {{$product_categorie->category_name}}</option>
					@endforeach
				</select>
			</p>
			<br>

		
				
			<p>
				<center>
					<input type="submit" class="w3-button w3-block w3-green"  style="width:100%" value="Simpan">
				</center>
			</p>
			</form>
		@endsection	