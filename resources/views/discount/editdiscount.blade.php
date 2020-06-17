@extends('adminhome')

		

		@section('content')

			 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

			 
		<form class="w3-container w3-card-4" action="{{ route('updateDiscount', $discount->id)}}" method="POST">
				@csrf
				@method('patch')

			<p>
				<label for="product_id">Product </label>
				<select class="w3-input w3-border" name="product_id">
					@foreach($products as $product)
					<option value="{{$product->id}}" @if($discount->product_id==$product->id) selected @endif> {{$product->product_name}}</option>
					@endforeach
				</select>
			</p>
			<br>

			<p>
				<label for="percentage">Percentage (%)</label>
				<input type="number" class="w3-input w3-border" name="percentage" value="{{$discount->percentage}}" >
			</p>
			<br>

			<p>
				<label for="start">Start</label>
				<input type="date" class="w3-input w3-border" name="start" value="{{$discount->start}}" >
			</p>
			<br>

			<p>
				<label for="end">NIK</label>
				<input type="date" class="w3-input w3-border" name="end" value="{{$discount->end}}" >
			</p>
			<br>
				
			<p>
				<center>
					<input type="submit" class="w3-button w3-block w3-green"  style="width:100%" value="Simpan">
				</center>
			</p>
			</form>
		@endsection	