<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('cssuser/cart.css') }}">
    <script type="text/javascript" src="{{ url('cssuser/cart.js') }}"></script>
    <script type="text/javascript" src="{{ url('cssuser/ajax_cart.js') }}"></script>
    <title>Cart Belanja</title>

</head>
<body>
    <!-- STAR CONTAINER -->
    <div class="container">
        <div class="spanduk">
            
            <h6>APOTEK SEHAT BAHAGIA</h6>
            <h1 style="color: #DCD12D;">CART BELANJA</h1>
        </div>

        <div class="spanduk" style="min-height:100px;border:none;">
                <div class="itemlist" id="itemlist">
                    <?php $rou = App::make('url')->to('/'); $i = 1; $x=1;
                    foreach ($cart as $key) {
                        
                        if($i == 1){
                            echo  '<div class="item" style="background-color: rgb(205,133,63)">';
                            $i = 0;
                        }else{
                            echo  '<div class="item" style="background-color: rgb(205,133,63)">';
                            $i = 1;
                        }
                        echo '<img src="'.$rou.'/product_image/'.$key->product->product_image[0]->image_name.'">';
                        echo '<div class="desc">';
                        echo $key->product->product_name.'<br>';
                        for($x=0;$x<(int)$key->product->product_rate;$x++){
                        echo '<img src="'.$rou.'/fotoweb/rating.png" style="left:0px;top:0px;width:15px;height:15px;">';
                            }
                        echo '<br>';
                        echo '<span style="opacity:.7;">Rp. '.number_format($key->product->price).'<span><br>';
                        echo '<span style="opacity:.9;font-size:12pt;">Qty. '.number_format($key->qty).'<span>';
                        echo '</div>';
                        echo '<button style="font-size:7pt;right:260px;" onclick="buttonklik('.$key->id.','.$key->product->price * $key->qty.')" id="'.$key->id.'">CHECKOUT</button>';
                        echo '<a href="/buy/'.$key->product_id.'">';
                        echo '<button style="font-size:7pt;">PREVIEW ITEM</button>';
                        echo '</a>';
                        echo '<button style="font-size:7pt;right:40px;background: #821d1d;" onclick="del('.$key->id.','.$key->price.')">DELETE</button>';
                        echo '</div>';
                    
                    }
                    ?>
                </div>
        </div>

        <!-- CHECKOUT PANEL -->
        <div class="checkoutpanel">
            <h1>CHECKOUT ITEM</h1>
            <div class="total">
                <div class="totalfont" style="opacity:.6;">TOTAL</div>
                <div class="totalnumber" id="total">Rp. 0</div>
            </div>
            <form action="{{ url('user/cart/checkout') }}" method="post">
                {{ csrf_field() }}
               
                <?php
                    foreach ($cart as $key) {
                        echo '<input type="hidden" value="0" id="form'.$key->id.'" name="status['.$key->id.']">';
                    }
                ?>
                <button id="checkbutton">CHECKOUT</button>
            </form>
        </div>
        <!-- END CHECKOUTPANEL -->

    <!-- END CONTAINER -->
    <?php  
        if(isset($_GET['alert'])){
            echo '<script>alert("select item first");</script>';
        }
    ?>
</body>
</html>