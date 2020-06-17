@extends('adminhome')

		  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

		@section('content')
			<form class="w3-container w3-card-4" action="{{ route('newProductCategorie') }}" method="POST">
				@csrf
			
				<p>
					<label for="category_name">Category Name</label>
					<input type="text" class="w3-input w3-border" name="category_name" >
				</p>
				<br>
				
				<p>
					<center>
					<input type="submit" class="w3-button w3-block w3-green" style="width:100%" value="Simpan"><br>
					<!--<input type="button" class="w3-button w3-block w3-blue" style="width:25%" value="Kembali" onclick="location.href='/courier'">-->
				</center>
				</p>
			</form>
		@endsection	