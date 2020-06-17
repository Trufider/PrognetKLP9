<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/dist/css/bootstrap.min.css') }}">

    <title>NOTIFICATION</title>
</head>
<body style="background-color: #0A7E8C;">
<div class="container bg" style="min-height:700px; background-color: #0A7E8C;">

<div class="row d-flex justify-content-center bg "style="min-height:700px; background-color: rgb(205,133,63);">
<div class="col-6 bg" style="background-color: #0A7E8C;">
<h2 class="text-light">HALAMAN NOTIFIKASI USER</h2><a href="{{ url('user/mark/').'/'.Auth::guard('user')->user()->id }}" class="badge badge-info">[ TANDAI TELAH DIBACA ]</a>
<a href="{{ url('/userhome') }}" class="badge badge-danger">[ KEMBALI ]</a>
<ul class="list-group">
  
    <?php
        foreach ($notifications as $key => $value) { ?>
            <li class="list-group-item mt-bg">{{ '['.$value->created_at.'] ' }}{{ $value->data }}</li>
    <?php } ?>
</ul>
</div>
</div>

</div>

</body>
</html>