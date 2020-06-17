<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('cssuser/checkout.css') }}">
    <script type="text/javascript" src="{{ url('cssuser/checkout.js') }}"></script>
    
    <title>Check Out</title>

    <script>
        var berat = {{ $berat }};
        var total_harga = <?php echo $total_harga[0]->total_harga; ?>
    </script>
</head>
<body onload="ribuan({{$total_harga[0]->total_harga}}),firstinstall()">

    <!-- CONTAINER -->
    <div class="container">
    <!-- SPANDUK ATAS -->
    <div class="spanduk">
            <h6>APOTEK SEHAT BAHAGIA</h6>
            <h1 style="color: #DCD12D;">PRODUK CHECKOUT</span> </h1>
    </div>
    <!-- END SPANDUK -->

    <!-- AWAL ALAMAT -->
    <div class="alamat">
        <h4 style="position:relative;border-bottom:1px solid white;padding=bottom:5px;">ADDRESS</h4>
        <p style="position:relative;text-transform:uppercase;">{{ Auth::guard('user')->user()->name.' (House)' }}</p>


        <!-- FORM KIRIM -->
        <form action="{{ url('user/transaction') }}" method="POST">
            {{ csrf_field() }}
                    <select name="province" onchange="ajaxcity(this.value)" id="provinsi" required>
                        <option value="" id="firstprov">Province</option>
                        <?php
                            foreach ($provinsi as $key) {
                                echo '<option value="'.$key->province_id.'">'.$key->province.'</option>';
                            }
                        ?>
                    </select>
                    <select name="city" id=city onchange="citychange(this.value)" required>
                        <option value="" id="first">City</option>
                    </select>
                    
                    <select name="kurir" onchange="ajaxkurir(this.value)" id="kurir" required>
                        <option value="" id="firstkurir">Courier</option>
                    </select>
                    
                    <input type="hidden" name="total_harga" value="{{ $total_harga[0]->total_harga }}">

                    <input type="text" value="{{ ' Weight Total '.$berat.' g' }}" readonly >
                    
                    <input type="hidden" name="weight" value="{{ $berat }}">
                    
                    <select name="layanan" id="layanan" style="width:100%;" onchange="simpanharga(this.value)" required>
                        <option value=""  id="firstlayanan">Services</option>
                    </select>
                    
                    <input type="text" name="address" placeholder="Specific Address" style="width:100%;padding-left:5px;" required id="firstaddress">
                    
                    <input type="submit" id="hiddenbutton" style="display:none;" value="">

                    <?php
                        $item_send = $item;
                        $item_send = json_encode($item_send);
                    ?>
                    <input type="hidden" value="{{ $cart }}" name="cart">
                    <input type="hidden" value="{{ $item_send }}" name="items">

        </form>
        <!-- END FORM -->
    </div>
    <!-- AKHIR  ALAMAT-->
            
    <div class="itemlist">
    
    <?php
    $i = 1;
    $y = 0;
    $rou = App::make('url')->to('/');
    foreach ($item as $key) {
        // AWAL ITEM
        if($i == 1){
            echo  '<div class="item" style="background-color: rgb(205,133,63)">';
            $i = 0;
        }else{
            echo  '<div class="item" style="background-color: rgb(205,133,63)">';
            $i = 1;
        }
        echo '<img src="'.$rou.'/product_image/'.$key->product->product_image[0]->image_name.'">';
        echo '<div class="desc"><br>';
        echo $key->product->product_name.'<br>';
        for ($y=0; $y < (int)$key->product->product_rate; $y++) { 
            echo '<img src="'.$rou.'/fotoweb/rating.png" style="left:0px;top:0px;width:15px;height:15px;z-index:10;">';
        }
        echo '<br>';
        echo '<span style="font-size:14pt;opacity:.7;">';
        $hargaitem = number_format($key->product->price * $key->qty,0,'.','.');
        echo 'Sub Total Rp. '.$hargaitem.'<br>';
        echo '<span>';
        echo '<span style="font-size:12pt;opacity:.7;">';
        echo 'Weight '.$key->qty.' x '.$key->product->weight.' g<br>';
        echo '</span>';
        
        echo '</div>';
        // AKHIR ITEM
        echo '<a href="'.$rou.'/user/cart">';
        echo '<button id="cart">EDIT ON CART</button>';
        echo '</a>';
        echo '</div>';
        

    }
    ?>

    </div>

    <div class="paneltotal" id="total">
    <h4 style="position:relative;border-bottom:1px solid white;">PAYMENT SUMMARY</h4>
    
    <label>Items</label>
    <input type="text" style="width:95%;text-align:right;font-size:25pt;margin-bottom:20px;" id="totalhar" readonly value="">

    <label>Shipping</label>
    <input type="text" id="ongkir" style="width:95%;text-align:right;font-size:25pt;margin-bottom:20px;" readonly value="Rp. 0">

    <label>Total Payment</label>
    <input type="text" id="totalpaye" style="width:95%;text-align:right;font-size:25pt;margin-bottom:20px;" readonly value="Rp. {{number_format($total_harga[0]->total_harga,0,'.','.' )}}">
    
    <div class="warn" id="warn">
        <p>&emsp;We still use the transfer method to make transactions on this website, so make sure you have a debit card or bank account from your favorite bank, make yourself comfortable and buy whatever you want. Click the payment button to continue</p>
    </div>

    <button onclick="buttonclick()">PAYMENT</button>
    </div>
    
    <!-- FOOTER -->
    <div class="footer">
    </div>
    </div>
    <!-- CONTAINER -->
    <?php 
    $error =Session::get('error');
    if(isset($error)){ ?>
        <script>alert("something wrong")</script>
    <?php
    }
    ?>
    
</body>
</html>