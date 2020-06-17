<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('cssuser/product_review.css') }}">
    <script type="text/javascript" src="{{ url('cssuser/product_review.js') }}"></script>
    <title>Preview Produk</title>
</head>
<body>
    <!-- START CONTAINER -->
    <div class="container">
        <div class="spanduk">
            <h6>APOTEK SEHAT BAHAGIA</h6>
            <h1 style="color: #DCD12D;">PREVIEW DETAIL PRODUK</h1>
        </div>

        <div class="spanduk" style="height:440px;">
            <div class="box" id="boxing">
                <img src="{{ url('product_image/') .'/'. $product->image[0]->image_name }}" alt="">
            </div>

            <div class="box2">
               <div class="item1">
               {{ $product->product_name }} <br>
               <?php
                    for ($i=0; $i < $product->product_rate; $i++) { ?>
                        <img src="{{ url('fotoweb/rating.png') }}">
                <?php
                    }
                ?><br>
                <span style="font-size:20pt;opacity:.7;">
                {{ 'Rp '.number_format($product->price) }}
                </span>
                </div>
                <div class="item2">{{ $product->description }}</div>
                <div class="item3">
                <button onclick="hyperlink()" >TAMBAH PRODUK</button>
                <button style="width:30px;" onclick="minklik()">-</button>
                <div class="qty" id="qty">1</div>
                <button style="width:30px;margin-left:30px;" onclick="klik()">+</button>
                <form action="{{ url('user/cart') }}" method="GET">
                    {{ csrf_field() }}
                    {{ method_field('GET') }}
                    <input type="hidden" name="kondisi" value="insert">
                    <input type="hidden" name="id_barangnya" value="{{ $product->id }}">
                    <input type="hidden" name="qty" value="1" id="qtysend">
                    <button style="display:none;" id="hiddenbutton"></button>
                </form>
                    
               </div>
            </div>
            
        </div>

    </div>
    <!-- END CONTAINER -->
    
</body>
</html>