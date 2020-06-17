
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">

    <script src="{{ url('fontawesome-free-5.13.0-web\js\all.min.js') }}"></script>

    <title>Halaman Admin</title>

    <!-- Bootstrap core CSS -->
<link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ url('cssadmin/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><span style="text-transform:uppercase;"> </span></a>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="/admin/logout"></a>
    </li>
  </ul>
</nav>



    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-clipboard"></i> Report</h1>
      </div>
      <div class="card-body">
        <h5 class="card-title">Report transaksi tahun </h5>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Bulan</th>
                      <th>Transaksi expired</th>
                      <th>Transaksi dibatalkan</th>
                      <th>Transaksi delivered</t>
                      <th>Jumlah Transaksi Keseluhuran</th>
                      <th>Pemasukan Bulanan</th>
                    </tr>
                  </thead>
                  <tbody>
                        <tr>
                            <td> Januari </>
<td> 5 </>
<td> 1 </>
<td> 1 </>
<td> 7 </>
<td> 500000 </>
                        </tr>
                        <tr>
                            <td> Februari </>
<td> 3 </>
<td> 1 </>
<td> 1 </>
<td> 5 </>
<td> 700000 </>
                        </tr>
                        <tr>
                             <td> Maret </>
<td> 2 </>
<td> 3 </>
<td> 1 </>
<td> 6 </>
<td> 250000 </>
                        </tr>
                        <tr>
                            <td> April </>
<td> 2 </>
<td> 1 </>
<td> 1 </>
<td> 4 </>
<td> 300000 </>
                        </tr>
                        <tr>
                           <td> Mei </>
<td> 4 </>
<td> 1 </>
<td> 2 </>
<td> 7 </>
<td> 700000 </>
                        </tr>
                        <tr>
                            <td> Juni </>
<td> 2 </>
<td> 1 </>
<td> 1 </>
<td> 4 </>
<td> 750000 </>

                        </tr>
                        <tr>
                            <td> Juli </>
<td> 4 </>
<td> 2 </>
<td> 1 </>
<td> 7 </>
<td> 800000 </>
                        </tr>
                        <tr>
                             <td> Agustus </>
<td> 2 </>
<td> 2 </>
<td> 1 </>
<td> 5 </>
<td> 500000 </>
                        </tr>
                        <tr>
                            <td> September </>
<td> 5 </>
<td> 2 </>
<td> 2 </>
<td> 9 </>
<td> 150000 </>
                        </tr>
                        <tr>
                            <td> Oktober </>
<td> 2 </>
<td> 1 </>
<td> 1 </>
<td> 4 </>
<td> 760000 </>
                        </tr>
                        <tr>
                            <td> November </>
<td> 3 </>
<td> 2 </>
<td> 1 </>
<td> 6 </>
<td> 780000 </>
                        </tr>
                        <tr>
                            <td> Desember </>
<td> 2 </>
<td> 2 </>
<td> 1 </>
<td> 5 </>
<td> 260000 </>
                        </tr>
                        <tr>
                            <td><b>Total</b></td>
<td> 30 </>
<td> 19 </>
<td> 14 </>
<td> 69 </>
<td> 6450000 </>

                            
                        </tr>
                  </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">
        <h5 class="card-title">Grafik transaksi tahun </h5>
        <div class="row">
           
        </div>    
        </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        <script src="{{ url('cssadmin/dashboard.js') }}"></script>      
        
</body>
</html>
