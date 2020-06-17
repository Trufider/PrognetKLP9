


@extends('adminhome')



 @section('content')

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

			<input type="button" class="w3-button w3-block w3-green" style="width:25%" value="Tambah Product Image" onclick="location.href='/productimage/create'">
			<br>
			@if($all_productimage->isEmpty())
				Belum ada data ...
			@else
			<br><br>
			<table align="center", border="10" class="w3-table-all">
				<tr  class="w3-blue">
					<th>No</th>
					<th>Product</th>
					<th>Image</th> 
					<th>Aksi</th> 

				</tr>
				@foreach($all_productimage as $pn)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$pn->product->product_name}}</td>
					<td>


					
				<!--<div class="carousel-inner my-auto" style="height: 11rem;">
                   <div class="carousel-item active" >
                        <img src="{{ asset('/product_image/') }}" class="d-block w-100" alt="{{ $pn->image_name }}">
                    </div>
                </div>-->

                <img src="/product_image/{{$pn->image_name}}" alt="$pn->image_name"style="width:500px;height:600px;"></td>

               <!-- <div class="row">
                	<div class="col-md-8">
                		<strong> Originali Image</strong>
                		<br/>
                		<img id="image_name" src=""/>
                	</div>
                	
                </div>-->

				<td>
				<br><br>
							<span>
								<!--<input type="button" class="w3-button w3-yellow w3-border" style="width:100%" value="Edit" onclick="location.href='/productimage/{{$pn->id}}/edit'"><br><br>-->

								<form style="display:inline-block;" action="productimage/{{$pn->id}}" method="post">
									@csrf
									@method('DELETE')
									<input type="submit" class="w3-button w3-red w3-border" style="width:100%" value="Delete">
								</form><br>
								
							</span>
						</td>
					</tr>
			

				
				@endforeach
				</table>

				
		

					

			@endif
		@endsection






























				