<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transaksi Printing </title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Transaksi <i>Printing</i></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Pembayaran</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Transaksi sekarang</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Hutang</a>
            </li>
            <li>
              <a href="{{ route('home.index') }}"><img src="img/home.png" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
        <h1 class="text-uppercase mb-0">Transaksi <i>Printing</i></h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Aplikasi Pencatatan Transaksi <i>Printing</i> Laboratorium Enterprise Application</h2>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Transaksi <i>Printing</i> </h2>
        <hr class="star-dark mb-5">

        {{ Form::open(['route' => 'transaksi.store', 'method' => 'post'] ) }}
        <div style="color: white" class="container" >
    	    <div class="jumbotron" style="background-color: #42a5f5; color: white">
                <div class="form-group">
                    <label for="id_asisten">Nama Asisten</label>
                    {{ Form::select('id_asisten', $asisten, null, [ 'class' => 'form-control', 'placeholder' => 'Nama Asisten', 'required'])}}
                </div>
                <div class="form-group">
                    <label for="kustomer">Nama Pelanggan</label>
                    {{ Form::text('kustomer', null, ['class' => 'form-control', 'placeholder' => 'Nama Pelanggan', 'required'])}}
                </div>

                <div class="form-group">
                    <label for="diskon">Asisten</label>
                    <input type="checkbox" class="form-control" id="diskon" name="diskon" onchange="sum()" style="height: 30px; width: 30px">
                </div>

                <div class="form-group">
                    <label for="kertas">Jumlah Kertas</label>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            {{ Form::number('hitam', 0, ['id' =>'hitam' ,'class' => 'form-control','placeholder' => 'Hitam','onchange' => 'sum()' ])}}
                        </div>
                        <div class="col-md-4 mb-3">
                            {{ Form::number('warna', 0, ['id' =>'warna' ,'class' => 'form-control','placeholder' => 'Warna','onchange' => 'sum()' ])}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="total">Total Biaya</label>
                    {{ Form::number('total', 0, ['id' =>'total' ,'class' => 'form-control',])}}
                </div>

                <div class="form-group">
                    <label for="bill">Uang yang di bayar</label>
                    {{ Form::number('pembayaran', null, ['id' =>'bayar' ,'class' => 'form-control', 'onkeyup' => 'debt()'])}}

                    {{ Form::hidden('selisih', 0, ['id' =>'selisih' ,'class' => 'form-control', ])}}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan</button>
                </div>
    		</div>
    	</div>
        {{ Form::close() }}

      </div>
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center"> <a class="text-center text-uppercase text-white" data-toggle="collapse" href="#collapse1">Transaksi Hari Ini</a></h2>
        <hr class="star-light mb-5">
        <div class="container">
    				
    					
		    			<h1 style="color: white" >Tabel Transaksi</h1>
		    			<div id="collapse1" class="panel-collapse collapse">
		    				
                <table class="table table-striped table-bordered" border="1" cellpadding="10" cellspacing="0" style="background-color: black; text-align: center">
			    				             <thead>
                      <tr>
					              <th>No.</th>
					              <th>Nama Kostumer</th>
                        <th>Nama Asisten</th>
                        <th>Hitam</th>
                        <th>Warna</th>
					              <th>Total Biaya</th>
                        <th>Uang yang Dibayar</th>
                        <th>status</th>
					            </tr>
                                </thead>

                                <tbody>

                      <?php use Carbon\Carbon; ?> 
                      @foreach($transaksi as $transaksi)
                        @if($transaksi->created_at->ToDateString() ==  Carbon::today('Asia/Jakarta')->ToDateString())
                          <tr>
    					              <td>{{ $transaksi->id_trans }}</td>         
                            <td>{{ $transaksi->kustomer}}</td>
                            <td>{{ $asisten[$transaksi->id_asisten]}}</td>
                            <td>{{$transaksi->hitam}}</td>
                            <td>{{$transaksi->warna}}</td> 
    					              <td>{{ $transaksi->total }}</td>
                            <td>{{ $transaksi->pembayaran }}</td>
                            <td>
                              @if ($transaksi->pembayran < $transaksi->total)
                                  Lunas
                              @else
                                  Belum Lunas
                              @endif
                            </td>
                          </tr>
                        @endif
                      @endforeach

                                </tbody>            
			    			</table>

		    			</div>

    				
    			</div>
        
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center"><a class="text-center text-uppercase text-secondary mb-0" data-toggle="collapse" href="#collapse2">Pembayaran Hutang</a></h2>
        <hr class="star-dark mb-5">
        <div class="container">
    				<div class="jumbotron" style="background-color: #42a5f5">
    					
						<h1>Tabel Pembayaran Hutang</h1>
						<div id="collapse2" class="panel-collapse collapse">

							<form action="" method="post" name="form2">
								<table class="table table-striped table-bordered" border="1" cellpadding="10" cellspacing="0" style="background-color: white; text-align: center">
                      <thead>
                        <tr>
						              <th>No.</th>
						              <th>Nama Konsumen</th>
						              <th>Nama Asisten</th>
                          <th>tanggal Berhutang</th>
                          <th>hitam</th>
                          <th>warna</th>
						              <th>Total Hutang</th>
						              <th>Pelunasan Hutang</th>
						            </tr>
                      </thead>

                      <tbody id="table">
                        @foreach($hutang as $value)
                          <tr>  
                            <td>{{ $value->id_hutang }}</td>
                            <td>{{ $value->kustomer }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $value->updated_at}}</td>
                            <td>{{ $value->hitam }}</td>
                            <td>{{ $value->warna }}</td>
                            <td>{{ $value->jumlah_hutang }}</td>
                            <td>
                              {{ Form::open(['method' => 'PATCH', 'route' => ['transaksi.update',$value->id_hutang]] ) }}
                                <div class="form-row">
                                  <div class="col-md-8">
                                    {{ Form::text('blin', 0, ['id' => 'blin','class' => 'form-control']) }}
                                    {{ Form::text('d_total', $value->jumlah_hutang, ['id' => 'd_total',]) }} 
                                    {{ Form::text('d_pay', $value->jumlah_hutang, ['id' => 'd_pay','class' => 'form-control','onkeyup' => 'repay()']) }} 
                                  </div>
                                  <div class="col-md-4">
                                    {{ Form::submit('Bayar', ['class' => 'btn btn-primary form-control'])}}
                                  </div>
                                </div>
                              {{ Form::close() }}
                            </td>
                          </tr>  	
                        @endforeach
                      </tbody>
                      				            
                   	            
								</table>
							</form>
						</div>

    				</div>
    			</div>
        
      </div>
    </section>

    <!-- Footer -->
   

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>

@push('javascript')
<script>
    function confirmLunas(url){
        if(confirm('Anda yakin akan menyelesaikan pembayaran user ini? ')){
            $hutang->status = 'sudah';
        }
    }
</script>
@endpush

<!--  Script Penjumlahan Transaksi -->
<script>
  function sum(){
  var x = document.getElementById("hitam").value;
  var y = document.getElementById("warna").value;


  var m = parseInt(x);
  var n = parseInt(y);

  if(document.getElementById("diskon").checked == true){
    var z = m*300 + n*500;
  }

  else {
    var z = m*500 + n*1000;
  }

  document.getElementById("total").value = z;
  document.getElementById("bayar").value = z;
}

  function debt(){
    var x = document.getElementById("total").value;
    var y = document.getElementById("bayar").value;
    var z = y-x;

    if (z < 0) {
      z= -z;
    } 

    else{
      z= 0;
    }
    document.getElementById("selisih").value = z;
}

function repay(){
    var x = document.getElementById("d_total").value;
    var y = document.getElementById("d_pay").value;
    var z = x-y;

    document.getElementById("blin").value = z;
}

</script>