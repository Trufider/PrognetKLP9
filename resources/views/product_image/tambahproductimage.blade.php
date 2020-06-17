
@extends('adminhome')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
		@section('content')

			<form class="w3-container w3-card-4" action="{{ route('newProductImage') }}" method="POST" //enctype="multipart/form-data">
				@csrf
			

			<p>
				<label for="product_id">Product Name </label>
				<select class="w3-input w3-border" name="product_id">
					@foreach($products as $product)
					<option value="{{$product->id}}">{{$product->product_name}}</option>
					@endforeach
				</select>
			</p>

			<div class="col-md-6">

				<label for="image_name">Image Name</label>
				<input id="image_name" type="file" name="image_name">
			</div>

			<!--<p>
					<label for="image_name">Image Name</label>
					<input type="file" class="w3-input w3-border" name="image_name" >
				</p>
				<br>
			
		<div class="form-group">
            <label class="font-weight-bolder" for="product_image">Product Image</label>
            <div class="custom-file">
                <input type="file" accept="image/*" name="image_name" id="product_image" class="custom-file-input" >
                <label class="custom-file-label" for="product_image">Select the product image</label>
                <script>
                $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
                </script>
            </div>-->
				

				<p>
					<center>
					<button type="submit" class="w3-button w3-block w3-green" style="width:100%"> Simpan </button>
					<br>
					<!-- <input type="button" class="w3-button w3-block w3-blue" style="width:25%" value="Kembali" onclick="location.href='/penduduk'">-->
					</center>
				</p>
			</form>
		@endsection	




































		