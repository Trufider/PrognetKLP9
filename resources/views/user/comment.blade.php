<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('cssuser/comment.css') }}">
    <script type="text/javascript" src="{{ url('cssuser/comment.js') }}"></script>
    <script src="{{ url('fontawesome-free-5.13.0-web\js\all.min.js') }}"></script>
</head>
<body>
    
<!-- AWAL CONTAINER -->
<div class="container">
        <div class="spanduk">
            <h6>APOTEK SEHAT BAHAGIA</h6>
            <h1 style="color: #DCD12D;">REVIEW PRODUK</span> </h1>
        </div>

        <div class="spanduk" style="border:none;">
            <div class="box">
                <div class="box2">
                    <img src="{{ url('product_image/').$product->product_image[0]->image_name }}" alt="">
                    <label>{{$product->product_name}}</label>
                </div>

                <form action="{{ url('/user/comment/').'/'.$product->id }}" method="post">
                    {{ csrf_field() }}
                    <label style="top:90px;left:85px;">Review</label>
                    <input type="text" style="top:120px;left:0px;width:400px;" name="preview">
                    
                    <label style="position:absolute;top:180px;left:290px;">Rate</label>

                    <input type="hidden" name="product_rate" id="rate" value="5">
                    <p class="text-center h1" id="starp" style="position:absolute;top:200px;left:410px;font-size:20pt;">
                    <?php
                    for ($i=1; $i <= $product->product_rate ; $i++) { 
                        echo '<i class="fas fa-star" onclick="starfun('.$i.')" style="cursor:pointer;" id="star'.$i.'"></i>';
                    }
                    for ($x=$i; $x <= 5; $x++) { 
                        echo '<i class="far fa-star" onclick="starfun('.$x.')" style="cursor:pointer;" id="star'.$x.'"></i>';
                    }
                    ?>
                    </p>

            <script>
            function starfun(rate){
                document.getElementById("rate").value=rate;
                if(rate==1){
                    document.getElementById("starp").innerHTML='<i class="fas fa-star" onclick="starfun(1)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(2)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(3)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(4)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(5)" style="cursor:pointer;"></i>';
                }else if(rate==2){
                    document.getElementById("starp").innerHTML='<i class="fas fa-star" onclick="starfun(1)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(2)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(3)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(4)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(5)" style="cursor:pointer;"></i>';
                }else if(rate==3){
                    document.getElementById("starp").innerHTML='<i class="fas fa-star" onclick="starfun(1)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(2)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(3)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(4)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(5)" style="cursor:pointer;"></i>';
                }else if(rate==4){
                    document.getElementById("starp").innerHTML='<i class="fas fa-star" onclick="starfun(1)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(2)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(3)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(4)" style="cursor:pointer;"></i><i class="far fa-star" onclick="starfun(5)" style="cursor:pointer;"></i>';
                }else if(rate==5){
                    document.getElementById("starp").innerHTML='<i class="fas fa-star" onclick="starfun(1)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(2)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(3)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(4)" style="cursor:pointer;"></i><i class="fas fa-star" onclick="starfun(5)" style="cursor:pointer;"></i>';
                }
            }
        </script>
                    
                    
                    <button type="submit" style="position:absolute;top:300px;left:450px;">Submit</button>

                </form>

            </div>
        </div>      

</div>
</body>
</html>