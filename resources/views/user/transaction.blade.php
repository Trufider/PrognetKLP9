<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="{{ url('cssuser/transaction.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('cssuser/transaction.css') }}">
    <script src="{{ url('fontawesome-free-5.13.0-web\js\all.min.js') }}"></script>

    <title>Transaksi Produk</title>

    <script>
        var rou = "http\://localhost\:8000";
    </script>
</head>
<body>
    <!-- AWAL CONTAINER -->
    <div class="container">
        <div class="spanduk">
            <h6>APOTEK SEHAT BAHAGIA</h6>
            <h1 style="color: #DCD12D;">TRANSAKSI PRODUK</h1>
        </div>

    <!-- MAIN BOX -->
    <div class="mainbox">
        <div class="peringatan">
            <label>BUYER INFO</label>
            <p>Silahkan selesaikan transaksi anda dengan mengupload bukti pembayaran.</p>
        </div>
        
        
        <?php
        $i=0;
        $rou = App::make('url')->to('/'); $x=1;
        // dd($array_transaksi);
        foreach ($array_transaksi as $transaksi) {
            
            if($i == 0){
                echo '<div class="mastertransaksi" style="background-color:rgb(205,133,63);" id="transaksi'.$transaksi->id.'" value="0">';
                echo '<div class="transaksi" style="background-color:rgb(205,133,63);">';
                $i = 1;
            }elseif($i == 1){
                echo '<div class="mastertransaksi" style="background-color:rgb(205,133,63);"  id="transaksi'.$transaksi->id.'">';
                echo '<div class="transaksi" style="background-color:rgb(205,133,63);" >';
                $i = 0;
            }
            echo '<div class="box" style="width:100px;">';
            echo '<label>Transaction ID</label><br>';
            echo '<span style="font-size:20px;">'.$transaksi->id.'</span>';
            echo '</div>';
            echo '<div class="box" style="width:120px;">';
            echo '<label>Total Transaction</label><br>';
            echo 'Rp. '.number_format($transaksi->total,0,'.','.');
            echo '</div>';
            echo '<div class="box" style="width:100px;">';
            echo '<label>Status</label><br>';
            if($transaksi->status == 'expired'){
                echo '<span style="color:#fc1b03;text-transform:uppercase;width:200px;" id="status'.$transaksi->id.'">'.$transaksi->status.'</span>';
            }elseif($transaksi->status == 'unverified'){
                echo '<span style="text-transform:uppercase;width:200px;" id="status'.$transaksi->id.'">'.$transaksi->status.'</span>';
            }elseif($transaksi->status=='success'){
                echo '<span style="color:white;text-transform:uppercase;width:200px;" id="status'.$transaksi->id.'">'.$transaksi->status.'</span>';
            }else{
                echo '<span style="text-transform:uppercase;width:200px;">'.$transaksi->status.'</span>';
            }
            echo '</div>';
            echo '<div class="box" style="flex-grow:0.5;">';
            echo '<label>Courier</label><br>';
            echo $transaksi->courier->courier;
            echo '</div>';
            echo '<div class="box" style="width:100px;border:none;height:200px;">';
            
            if($transaksi->status == 'unverified'){
                echo '<button onclick="klik(\'transaksi'.$transaksi->id.'\'),hitungmundur(\'time'.$transaksi->id.'\',\''.$transaksi['timeout'].'\','.$transaksi->id.')">Detail</button>';
                echo '<button onclick="upload('.$transaksi->id.')">Upload</button>';
            }else{
                echo '<button onclick="(klik(\'transaksi'.$transaksi->id.'\'))">Detail</button>';
                echo '<button style="opacity:.45;cursor: default;" disabled>Upload</button>';
            }
            echo '</div>';
           

            echo '</div>';
            // TRANSAKSI
            
            echo '<div class="itemlist" style="height:80px;display:flex;width:95%;padding-right:10px;">';
            echo '<div style="width:260px;height:40px;margin:0px 10px;border-bottom:1px solid pink;">';
            echo '<label>Address</label><br>';
            echo $transaksi->province.','.$transaksi->regency.','.$transaksi->address;
            echo '</div>';

            echo '<div style="width:190px;height:40px;margin:0px 10px;border-bottom:1px solid pink;">';
            echo '<label>Countdown</label><br>';
            
            if($transaksi->status == "unverified"){
            echo '<div id="time'.$transaksi->id.'">Please Wait...</div>';
            }else{
            echo '<div id="time'.$transaksi->id.'">0 days = 0:0:0</div>';
            }
            echo '</div>';

            echo '<div style="width:100px;height:40px;margin:0px 10px;">';
            echo '<label></label><br>';
            echo '<form action="'.$rou.'/user/canceltransaction/'.$transaksi->id.'" method="POST">';
            echo csrf_field();
            echo '<button style="background:#5e1010;">Cancel</button>';
            echo '</form>';
            echo '</div>';

            echo '</div>';
            // AKHIR ITEMLIST
            
            if($i == 0){
                echo '<div class="itemlist" style="border:1px solid #474747;left:10px;width:550px">';
                echo  '<label id="labellist">Item List</label>';    
            }else{
                echo '<div class="itemlist" style="border:1px solid white;left:10px;width:550px">';
                echo  '<label id="labellist">Item List</label>';    
            }
            
            
            
            foreach ($transaksi->transaction_detail as $item) {
                // dd($item->product->product_image[0]->image_name);
                if($i == 1){
                echo '<div class="item" style="background-color:#0A7E8C;">';
                }elseif ($i == 0) {
                echo '<div class="item" style="background-color:#0A7E8C;">';
                }
                echo '<img src="'.$rou.'/product_image/'.$item->product->product_image[0]->image_name.'">';
                echo '<label style="top:10px;">'.$item->product->product_name.'</label>';
                echo '<label style="top:30px;">'.$item->qty.' Unit(s)</label>';
                echo '<label style="top:50px">Rp. '.number_format($item->selling_price,0,'.','.').'</label>';
                echo '<div class="tanggapan">';
                echo '<a href="/user/comment/'.$item->product->id.'">';
                if($transaksi->status == 'success'){
                    echo '<button>Comment</button>';
                }else{
                    echo '<button disabled>Comment</button>';
                }
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            

            echo '</div>';
            // AKHIR MATER TRANSAKSI
        }
            
            echo '<div class="footer">';
            echo '<img src="" style="z-index: 1;" id="ba">';
            echo '</div>';
    ?>
    


    </div>
    <!-- AKHIR MAIN BOX -->
    
    <div class="history">
        <div class="comment">Review Produk</div>
        <div class="commentbox">
            <?php
                foreach ($review as $view) {
                    
                    echo '<div class="bubble">';
                    echo '<img src="'.url('product_image').'/'.$view->product->product_image[0]->image_name.'">';
                    echo '<label>'.$view->product->product_name.' Rate :';
                    for ($s=0; $s < $view->rate; $s++) { 
                        echo '<i class="fas fa-star"></i>';
                    }
                    echo '</label>';
                    echo '<div class="content">';
                    echo $view->content;
                    echo '</div>';
                    echo '</div>';

                        if ($view->response){
                            echo '<div class="bubble2">';
                            echo '<label>By Admin '.$view->response->admin->username.'</label>';
                            echo '<div class="content" style="margin-top:5px;">';
                            echo $view->response->content;
                            echo '</div>';
                            echo '</div>';
                        }else{
                            echo '<div class="bubble2" style="height:50px;">';
                            echo '<label>Admin : No Respone Yet</label>';
                            echo '</div>';
                        }
                }
            ?>
        </div>
    </div>
   
    
    
    </div>
    <!-- AKHIR CONTAINER -->
    <!-- <div class="footer">
        <img src="{{ url('fotoweb/black_pattern.jpg') }}" style="z-index: -10;" id="ba">
    </div> -->

    <div class="paneltransfer" id="paneltransfer">
        <button id="cancel" onclick="cancelproof()">X</button>
        <div class="proof">
            <img src="{{ url('fotoweb/noimage.png') }}" alt="" id="blah">
        </div>
        <div class="up">

        <form action="{{ url('user/proofment') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('post') }}

        <input type="hidden" name="id_proof" value="" id="id_pic">

        <input type="file" 
    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" required name="proof" id="inpt">

            <button style="position:absolute;top:50px;">SEND</button>
            </form>
        </div>

    </div>
    
    <!-- BLOCK SISTEM -->
    <div class="block" id="blocksystem"></div>
</body>
</html>