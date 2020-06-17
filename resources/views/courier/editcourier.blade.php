@extends('adminhome')


		

		@section('content')

		 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


		<form class="w3-container w3-card-4" action="/courier/{{$courier->id}}" method="POST">
				@csrf
				@method('patch')
			<p>
				<label for="courier">Courier</label>
				<input type="text" class="w3-input w3-border" name="courier" value="{{$courier->courier}}" >
			</p>
			<br>
			
			<p>
				<center>
					<input type="submit" class="w3-button w3-block w3-green"  style="width:100%" value="Simpan">
				</center>
			</p>
			</form>
		@endsection	