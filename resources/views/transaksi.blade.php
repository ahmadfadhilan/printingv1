<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Transaction Printing</title>

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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Transaction Printing</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Printing</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Transaction</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Debt</a>
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
        <h1 class="text-uppercase mb-0">Transaction Printing</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Aplikasi Printing Di Laboratorium Enterprise Application</h2>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Transaksi Printer</h2>
        <hr class="star-dark mb-5">
        {{ Form::open(['route' => 'transaksi.store', 'method' => 'post'] ) }}
        <div style="color: white" class="container" >
    	    <div class="jumbotron" style="background-color: #42a5f5; color: white">
                <div class="form-group">
                    <label for="id_asisten">Nama Asisten</label>
                    {{ Form::select('id_asisten', $asisten, null, [ 'class' => 'form-control', 'placeholder' => 'Nama Asisten'])}}
                </div>
                <div class="form-group">
                    <label for="nama_printing">Nama Customer</label>
                    {{ Form::text('nama_printing', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="kertas">Jumlah Kertas</label>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            {{ Form::text('hitam', null, ['class' => 'form-control','placeholder' => 'Hitam'])}}
                        </div>
                        <div class="col-md-4 mb-3">
                            {{ Form::text('warna', null, ['class' => 'form-control','placeholder' => 'Warna'])}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="total">Total Biaya</label>
                    {{ Form::text('total', null, ['class' => 'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="bill">Uang yang di bayar</label>
                    {{ Form::text('bill', null, ['class' => 'form-control'])}}
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
        <h2 class="text-center"> <a class="text-center text-uppercase text-white" data-toggle="collapse" href="#collapse1">Transaction Today</a></h2>
        <hr class="star-light mb-5">
        <div class="container">
    				
    					
		    			<h1 style="color: white" >Tabel Transaksi</h1>
		    			<div id="collapse1" class="panel-collapse collapse">
		    				
                        <table class="table table-striped table-bordered" border="1" cellpadding="10" cellspacing="0" style="background-color: black; text-align: center">
			    				<thead>
                                <tr>
					              <th>No.</th>
					              <th>Nama Konsumen</th>
					              <th>Nama Asisten</th>
					              <th>Total Biaya</th>
					            </tr>
                                </thead>
                                <tbody>
                                @foreach($transaksi as $transaksi)
					            <tr>  
					              <td>{{ $transaksi->id_trans }}</td>
					              <td>{{ $transaksi->nama_printing }}</td>
					              <td>{{ $asisten[$transaksi->id_asisten]}}</td>
					              <td>{{ $transaksi->total }}</td>
					            </tr>		
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
        <h2 class="text-center"><a class="text-center text-uppercase text-secondary mb-0" data-toggle="collapse" href="#collapse2">payment of debt</a></h2>
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
						              <th>Total Hutang</th>
						              <th>Konfirmasi Lunas</th>
						            </tr>
                                </thead>
                                <tbody>
                                @foreach($hutang as $hutang)
					            <tr>  
					              <td>{{ $hutang->id_hutang }}</td>
					              <td>{{ $hutang->nama_printing }}</td>
					              <td>{{ $hutang->nama }}</td>
					              <td></td>
                                  <td>{{ $hutang->jumlah_hutang }}</td>
                                  <td>
                                  @if($hutang->status == 'belum')
                                     <button class="btn-success btn" type="submit" name="lunas">Lunas</button>
                                    @else
                                        <a>Sudah Lunas</a>
                                 @endif
						            
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
