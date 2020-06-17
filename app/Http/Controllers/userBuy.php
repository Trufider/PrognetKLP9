<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Mail\verifyuser;
use \Mail;
use Illuminate\Support\Facades\DB;
use Session;
use \stdClass;
use App\product;
use App\product_image;
use App\cart;
use App;
use App\transaction;
use App\transaction_detail;
use App\product_review;

use App\Notifications\UserNotification;
use App\model_notifuser;
use Illuminate\Notifications\Notification;

class userBuy extends Controller
{
    public function tampilanproduk($id){
        $product = product::find($id);
        $product->image =DB::select('SELECT product_images.`image_name` FROM product_images INNER JOIN products ON products.`id` = product_images.`product_id` WHERE products.`id`= ?',array($id));

        $notif = "halo ".Auth::guard('user')->user()->name.", anda melihat produk".$product->product_name." silahkan dibeli";
        $user = Auth::guard('user')->user();
        
        $user->notify(new UserNotification($notif));

        return view('user/produk_review',compact('product'));
    }

    public function cart(Request $request){
        
        $user = Auth::guard('user')->user()->id;
      
        $exis = DB::select('SELECT id FROM carts WHERE user_id = ? AND product_id =? AND carts.status = "notyet"',array($user,$request->id_barangnya));
        if ($exis == []){
            $new = new cart;
            $new->user_id = $user;
            $new->product_id = $request->id_barangnya;
            $new->qty = $request->qty;
            $new->status = "notyet";
            $new->save();
        }elseif($exis != []){
            $new2 = cart::find($exis[0]->id);
            $new2->qty = $request->qty;
            $new2->save();
        }

            return redirect('user/cartview');
    }

    public function cartview(){
        $user = Auth::guard('user')->user()->id;

        $cart = cart::where('user_id','=',$user)
        ->where('status','=','notyet')
        ->get();
        
        return view('user/cart',compact('cart'));
    }

    // AJAX DELETE CART
    public function delete($id_item){
        
        $delete = cart::find($id_item)->delete();
        $user = Auth::guard('user')->user()->id;
        $cart = cart::where('user_id','=',$user)->get();
        
        if($delete){
            
            $rou = App::make('url')->to('/'); $i = 1;$x=1;$send="";
            foreach ($cart as $key) {
                
                if($i == 1){
                    $send =  $send.'<div class="item" style="background-color: rgb(205,133,63)">';
                    $i = 0;
                }else{
                    $send =  $send.'<div class="item" style="background-color: rgb(205,133,63)">';
                    $i = 1;
                }
                
                $send = $send.'<img src="'.$rou.'/product_image'.$key->product->product_image[0]->image_name.'">';
                $send = $send.'<div class="desc">';
                $send = $send.$key->product->product_name.'<br>';
                $send = $send.'';
                for($x=0;$x<(int)$key->product->product_rate;$x++){
                $send = $send.'<img src="'.$rou.'/fotoweb/rating.png" style="left:0px;top:0px;width:15px;height:15px;">';
                }
                $send = $send.'<br>';
                $send = $send.'<span style="opacity:.7;">Rp. '.number_format($key->product->price).'<span><br>';
                $send = $send.'<span style="opacity:.9;font-size:12pt;">Qty. '.number_format($key->qty).'<span>';
                $send = $send.'</div>';
                $send = $send.'<button style="font-size:7pt;right:260px;" onclick="buttonklik('.$key->id.','.$key->product->price * $key->qty.')" id="'.$key->id.'">CHECKOUT</button>';
                $send = $send.'<a href="buy/'.$key->product->id.'">';
                $send = $send.'<button style="font-size:7pt;">PREVIEW ITEM</button>';
                $send = $send.'</a>';
                $send = $send.'<button style="font-size:7pt;right:40px;background:#821d1d;" onclick="del('.$key->id.','.$key->product->price.')">DELETE</button>';
                $send = $send.'</div>';
              
           }
        }
        
        return $send;
    }

       public function checkout(Request $request){
        if(isset($_POST['status'])){
        $cek =$_POST['status'];
        $cek = join(",",array_keys($cek));
        
        $cek = DB::select('SELECT * FROM carts WHERE carts.id IN ('.$cek.') AND carts.status = "notyet"');
        if($cek == []){
            return redirect('user/cartview?alert="noitems"');
        }
        
    
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: ea02ff402c001d9d1f822d841b8dccd6"
            ),
            ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        $provinsi = json_decode($response)->rajaongkir->results;
        
        $cart = $_POST['status'];$i=0;
        $cart_key = array_keys($cart);
            foreach ($cart as $key) {
                if($key != "1"){
                    unset($cart[$cart_key[$i]]);
                    
                }
                $i=$i+1;
            }
            $test = array_keys($cart);
            
            if ($cart == []){
                return redirect('user/cartview?alert="nocheckout"');
            }else{
                $cart = join(",",array_keys($cart));
                $berat = 0;
                $item =cart::whereIn('id',$test)->get();
                
                $total_harga =DB::select('SELECT SUM(carts.`qty` * products.`price`) AS total_harga FROM carts JOIN products ON products.`id` = carts.`product_id` WHERE carts.`id` IN ('.$cart.') AND carts.status ="notyet"');
                
                foreach ($item as $key) {
                    $berat = $berat + ($key->product->weight * $key->qty);
                }
                
                return view('user/checkout',compact('item','provinsi','berat','total_harga','cart'));
                
            }
        }else{
            return redirect('user/cart?alert="No items in cart"');
        }
    }

        // AJAX KABUPATEN

        public function city($prov){

            $ch = curl_init();

            curl_setopt_array($ch, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$prov,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: ea02ff402c001d9d1f822d841b8dccd6"
                ),
                ));

            $result= curl_exec($ch);
            $err = curl_error($ch);
            
            curl_close($ch);
            
            $city = json_decode($result)->rajaongkir->results;
            
            $send ='<option value="">City</option>';
            foreach ($city as $key) {
               $send = $send.'<option value="'.$key->city_id.'">'.$key->city_name.'</option>';
            }
            
            return $send;
            }

        public function cost($prov,$city,$kurir,$weight){
            $cost = curl_init();

            curl_setopt_array($cost, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "origin=114&destination=".$city."&weight=".$weight."&courier=".$kurir,
                CURLOPT_HTTPHEADER => array(
                    "key: ea02ff402c001d9d1f822d841b8dccd6"
                ),
                ));

            $result= curl_exec($cost);
            $err = curl_error($cost);
            
            curl_close($cost);
            
            $cost = json_decode($result)->rajaongkir->results[0]->costs;
            $send = new stdClass;
            $send->text = '<option value="">Service</option>';
            $send->harga[0] =0;
            $i = 1;
            foreach ($cost as $key) {
                $send->text = $send->text.'<option value="'.$key->cost[0]->value.'" >'.$key->service.' Cost : Rp.'.$key->cost[0]->value.' Est Day : '.$key->cost[0]->etd.'</option>';
                $send->harga[$i]=$key->cost[0]->value;
                $i +=1;
            }
            $send = json_encode($send);
            return $send;
        }

        public function transaction(Request $request){
            $layanan = $request->layanan;
            $total_harga = $request->total_harga;
            $prov = $request->province;
            $city = $request->city;
            $kurir = $request->kurir;
            $weight = $request->weight;
            $shipping = $request->layanan;
            $address = $request->address;
            $real_harga = $total_harga + $layanan;
            $barang = $request->items;
            $barang = json_decode($barang);
            $cart = $request->cart;
            $unset = 0;

            $barang = DB::select('SELECT carts.*,products.`price` FROM carts JOIN products ON products.`id` = carts.`product_id` WHERE carts.`id` IN ('.$cart.') AND carts.`status` = "notyet" ORDER BY carts.id');
            
            foreach ($barang as $cekstatus) {
                if ($cekstatus->status == "checkedout"){
                    unset($barang[$unset]);
                }
                    $unset = $unset + 1 ;
            }

            if($barang == []){
                return "transaksi sudah dilakukan";
            }
            
            
            
            // CALL RAJA ONGKIR
            $cost = curl_init();

            curl_setopt_array($cost, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "origin=114&destination=".$city."&weight=".$weight."&courier=".$kurir,
                CURLOPT_HTTPHEADER => array(
                    "key: ea02ff402c001d9d1f822d841b8dccd6"
                ),
                ));

            $result= curl_exec($cost);
            $err = curl_error($cost);
            $result = json_decode($result);
            curl_close($cost);
            
            $kurirnya=$result->rajaongkir->query->courier;
            $hasil =$result->rajaongkir->results[0]->costs;
            $destination=$result->rajaongkir->destination_details;
            
            foreach ($hasil as $key) {
               
                if ( $key->cost[0]->value == $shipping){
                    
                    $shipping = $key;
                    break;
                }
            }
            
            $id_kurir = DB::select('SELECT couriers.`id` FROM couriers WHERE couriers.`courier` = ?',array($kurirnya));

            $hasil = new transaction;
            $hasil->timeout =date('Y-m-d H:i:s', strtotime('+32 hours', time()));
            $hasil->address = $address;
            $hasil->regency = $destination->city_name;
            $hasil->province = $destination->province;
            $hasil->total = $real_harga;
            $hasil->shipping_cost = $layanan;
            $hasil->sub_total = $total_harga;
            $hasil->user_id = Auth::guard('user')->user()->id;
            $hasil->courier_id = $id_kurir[0]->id;
            $hasil->status = "unverified";
            $hasil->save();

            

            foreach ($barang as $barangnya) {
                $new = new transaction_detail;
                $new->transaction_id = $hasil->id;
                $new->product_id = $barangnya->product_id;
                $new->qty = $barangnya->qty;
                $new->discount = 0;
                $new->selling_price = $barangnya->price * $barangnya->qty;
                $new->created_at = time();
                $new->save();

                $change_status = cart::find($barangnya->id);
                $change_status->status = "checkedout";
                $change_status->save();
            }
            
            
            if($hasil->save()){
                $notif = "halo ".Auth::guard('user')->user()->name.", chechkout Transaksi anda dengan ID ".$hasil->id." telah berhasil dilakukan. Silahkan mengupload bukti pembayaran";
                $user = Auth::guard('user')->user();
                
                $user->notify(new UserNotification($notif));


                return redirect('user/transactionview');
            }else{
                return "something wrong";
            }

            
        }

       
        public function transactionview(){
            $impor = App::make('url')->to('/');
            $user = Auth::guard('user')->user()->id;
            $array_transaksi = transaction::where('user_id','=',$user)->get();
            $review = product_review::where('user_id','=',$user)->get();
            
            
            return view('user/transaction',compact('array_transaksi','impor','review'));
        }

        public function proofment(Request $request){
            $validator = Validator::make($request->all(),[
                'proof' => 'required|max:700'
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator->error());
            }else{
                $file = $request->file('proof');
                $tujuan = 'transaction\\';
                $file->move($tujuan,$request->id_proof.'.'.$file->getClientOriginalExtension());
                $dir = $tujuan.$request->id_proof.'.'.$file->getClientOriginalExtension();


                $transaction = transaction::find($request->id_proof);
                $transaction->proof_of_payment = $dir;
                $transaction->status = "success";
                $transaction->save();

                $notif = "halo ".Auth::guard('user')->user()->name.", Bukti transaksi dengan ID". $request->id_proof." telah berhasil dimasukkan kedalam sistem";
                $user = Auth::guard('user')->user();
                
                $user->notify(new UserNotification($notif));

                return redirect('user/transactionview');
            }
        }

        public function canceltransaction($id){
            $can = transaction::find($id);
            $can->status = "canceled";
            $can->save();
            return redirect('user/transactionview');
        }

        public function comment($id){
            $product = product::find($id);

            return view('user/comment',compact('product'));
        }

        public function commentpost(Request $request,$id)
        {
            $rev = new product_review;
            $rev->product_id = $id;
            $rev->user_id = Auth::guard('user')->user()->id;
            $rev->rate = $request->product_rate;
            $rev->content = $request->preview;
            $rev->save();

            return redirect('/user/transactionview');    
        }
    
        public function notification($id){
            $notifications =  Auth::guard('user')->user()->unreadNotifications;
            
            return view('user/notification',compact('notifications'));
        }

        public function mark($id)
        {
            model_notifuser::where('notifiable_id',$id)->update(array("read_at" => now()));
            
            return redirect()->back();
        }
    
}
