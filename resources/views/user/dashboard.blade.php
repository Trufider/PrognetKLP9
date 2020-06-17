<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="{{ asset('cssuser/dashboarduser.css') }}">
            <script type="text/javascript" src="{{ url('cssuser/javadashboard.js') }}"></script>
            <title>Halaman Utama</title>
        </head>
        <body onload="load()">



        <!-- AWAL CONTAINER -->
            <div class="container">
                <!-- SLOGAN -->
                <div class="spanduk" style="color: white;">SAHABAT KESEHATAN KELUARGA</div>
                <!-- SLOGAN -->



                <!-- CONTACT -->
                <div class="spanduk">
                    <div class="box" style="left:140px;margin-top:2px;color: white">Selamat Datang, {{ Auth::guard('user')->user()->name }}  <a class="nav-link" href="{{ route('logout') }}">Log Out</a></div>

                    <div class="box" style="right:40px;width:200px;height:100%;">
                        <input type="text" id="search" placeholder="Cari disini">
 
     
  
                    </div>


   

                    
                </div>
                <!-- CONTACT -->

                <!-- JUDUL -->
                <div class="spanduk" style="height:130px;border:none;">
                    <h6>Izin Terdaftar Apotek Nomor 529/33/DPMPTSP/2020</h6>
                    <h1 style="color: #DCD12D;">APOTEK SEHAT BAHAGIA</h1>
                    <ul>
                        <li>Halaman Utama</li>
                        <li>Obat dan Vitamin</li>
                        <li>Alat Kesehatan</li>
                        <li>Tebus Resep Dokter</li>
                        <li>Tanya Dokter</li>
                        <li><a href="{{ url('user/notification/').'/'.Auth::guard('user')->user()->id }}" style="text-decoration: none;color:white;">Notifications</a></li>
                    </ul>
                </div>
                <!-- JUDUL -->

                <!-- GAMBAR -->
                <div class="topnav">
                    <div class="box1" id="box1">
                        <div class="arrow" onclick="previusSlides(-1)"></div>
                    </div> 

                    <div class="box2" id="box2">
                    <div class="arrow" onclick="plusSlides(1)"></div>
                    </div>

                </div>
                <!-- GAMBAR -->

                <!-- NAVIGATION -->
                <div style="color: white;" class="navigation">
                <div class="line" id="nav1"></div>
                <div class="line" id="nav2"></div>
                <div class="line" id="nav3"></div>
                </div>
                <!-- NAVIGATION -->

                <!-- COVID19 -->
                <div class="spanduk2" style="padding:25px; box-sizing:border-box;">
                    <h2>CEGAH <span style="color: #DCD12D;">COVID-19!</span></h2>
                    <p style="color: white;text-align: justify;font-size: 27px">Peningkatan kasus virus corona Covid-19 masih berlangsung di berbagai penjuru dunia, hingga saat ini belum ditemukan vaksin yang tepat untuk menangkalnya. Maka dari itu, menerapkan hidup bersih dan sehat merupakan salah satu tindakan pencegahan yang perlu dilakukan. Rutin mencuci tangan dengan sabun dan kenakan masker apabila harus bepergian keluar rumah.</p>
                    <div class="box">
                        <span style="color:#DCD12D;">OneMed: Surgical Mask<br></span>
                        <span style="font-size:15pt;color: white;">Rp 80.000,-</span>
                        <p style="color: white;text-align: justify;">Onemed: Surgical Mask adalah alat yang digunakan untuk melindungi pernapasan dari virus dan bakteri yang berbahaya apabila terhirup oleh hidung. Terbuat dari bahan kain yang halus, sehingga nyaman saat digunakan. Karet didesain dengan kelenturan yang...</p>
                        <button>SELENGKAPNYA</button>
                    </div>

                    <span id="fall2">
                    <img src="{{ url('fotoweb/fall2020.jpg') }}">
                    <img src="{{ url('fotoweb/fall20203.jpg') }}">
                    <img src="{{ url('fotoweb/fall20202.jpg') }}">
                    </span>
                </div>

                <!-- COVID19 -->

                <!-- DICARI -->
                <div class="item" id="thum">
                <h1 style="color: #DCD12D;">PRODUK POPULER!</h1>
                <p style="color: white;">CEGAH PENULARAN COVID-19 MENGGUNAKAN PRODUK DIBAWAH INI</p>
	 	<br>
                <?php

                    foreach ($item as $it) {
                        echo '<div class="thumbnail">'?>
                            <img src="{{ url('product_image').'/'.$it->product_image[0]->image_name }}">
                        <?php
                        echo '<div class="desc">';
                        echo $it->product_name."<br>";
                        echo "Rp ".number_format($it->price,2);
                        echo '</div>';
                        echo '<a href="buy/'.$it->id.'">';
                        echo '<button> BELI </button>';
                        echo '</a>';
                        echo '</div>';
                    }
                ?>
                
                </div>
                <!-- DICARI -->

            </div>
        <!-- AKHIR CONTAINER -->
                
        </body>
        </html>