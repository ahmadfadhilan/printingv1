@php
    use Carbon\Carbon;
    $end_month = Carbon::now()->endOfMonth();    
    $str_month = Carbon::now()->startOfMonth();

    $end_week = Carbon::now('Asia/Jakarta')->endOfWeek();     
    $str_week = Carbon::now('Asia/Jakarta')->startOfWeek();

    $end_year = Carbon::now()->endOfYear();     
    $str_year = Carbon::now()->startOfYear();     
@endphp

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Freelancer - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  
    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Report</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li>
              <a href="{{ route('home.index') }}"><img src="img/home.png" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <!-- Header -->
  <header class="masthead bg-primary text-white text-center portfolio">
      <div class="container">
        <h1 class="text-center text-uppercase text-secondary mb-0">Laporan</h1>
        <hr class="star-light">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/report_day.png" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/report_week.png" alt="">            
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-3">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/report_month.png" alt="">            
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-4">
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/report_year.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </header>

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

    <!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-1">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Laporan Harian</h2>
              <hr class="star-dark mb-5">
                <table id="table1" class="table table-striped table-bordered" border="1" cellpadding="10" cellspacing="0" style="background-color: black; text-align: center; color:aliceblue">
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
                            @if ($transaksi->pembayaran > $transaksi->total)
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
              
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-2">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Laporan Mingguan</h2>
              <hr class="star-dark mb-5">
              <table id="table2" class="table table-striped table-bordered" border="1" cellpadding="10" cellspacing="0" style="background-color: black; text-align: center; color:aliceblue">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kostumer</th>
                      <th>Nama Asisten</th>
                      <th>Tanggal</th>
                      <th>Hitam</th>
                      <th>Warna</th>
                      <th>Total Biaya</th>
                      <th>Uang yang Dibayar</th>
                      <th>status</th>
                    </tr>
                </thead>

                  <tbody>
                    @foreach($transaksi_2 as $transaksi)
                      @if($transaksi->created_at <= $end_week && $transaksi->created_at >= $str_week)
                        <tr>
                          <td>{{ $transaksi->id_trans }}</td>         
                          <td>{{ $transaksi->kustomer}}</td>
                          <td>{{ $asisten[$transaksi->id_asisten]}}</td>
                          <td>{{ $transaksi->created_at->ToDateString() }}</td>
                          <td>{{$transaksi->hitam}}</td>
                          <td>{{$transaksi->warna}}</td> 
                          <td>{{ $transaksi->total }}</td>
                          <td>{{ $transaksi->pembayaran }}</td>
                          <td>
                            @if ($transaksi->pembayaran > $transaksi->total)
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
              
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-3">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Laporan Bulanan</h2>
              <hr class="star-dark mb-5">
              <table id="table3" class="table table-striped table-bordered" border="1" cellpadding="10" cellspacing="0" style="background-color: black; text-align: center; color:aliceblue">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kostumer</th>
                      <th>Nama Asisten</th>
                      <th>Tanggal</th>
                      <th>Hitam</th>
                      <th>Warna</th>
                      <th>Total Biaya</th>
                      <th>Uang yang Dibayar</th>
                      <th>status</th>
                    </tr>
                </thead>

                  <tbody>
                    @foreach($transaksi_3 as $transaksi)
                      @if($transaksi->created_at <= $end_month && $transaksi->created_at >= $str_month)
                        <tr>
                          <td>{{ $transaksi->id_trans }}</td>         
                          <td>{{ $transaksi->kustomer}}</td>
                          <td>{{ $asisten[$transaksi->id_asisten]}}</td>
                          <td>{{ $transaksi->created_at->ToDateString() }}</td>
                          <td>{{$transaksi->hitam}}</td>
                          <td>{{$transaksi->warna}}</td> 
                          <td>{{ $transaksi->total }}</td>
                          <td>{{ $transaksi->pembayaran }}</td>
                          <td>
                            @if ($transaksi->pembayaran > $transaksi->total)
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
              
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal mfp-hide" id="portfolio-modal-4">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0">Laporan Tahunan</h2>
              <hr class="star-dark mb-5">
              <table id="table4"class="table table-striped table-bordered" border="1" cellpadding="10" cellspacing="0" style="background-color: black; text-align: center; color:aliceblue">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Kostumer</th>
                      <th>Nama Asisten</th>
                      <th>Tanggal</th>
                      <th>Hitam</th>
                      <th>Warna</th>
                      <th>Total Biaya</th>
                      <th>Uang yang Dibayar</th>
                      <th>status</th>
                    </tr>
                </thead>

                  <tbody>
                    @foreach($transaksi_4 as $transaksi)
                      @if($transaksi->created_at <= $end_year && $transaksi->created_at >= $str_year)
                        <tr>
                          <td>{{ $transaksi->id_trans }}</td>         
                          <td>{{ $transaksi->kustomer}}</td>
                          <td>{{ $asisten[$transaksi->id_asisten]}}</td>
                          <td>{{ $transaksi->created_at->ToDateString() }}</td>
                          <td>{{$transaksi->hitam}}</td>
                          <td>{{$transaksi->warna}}</td> 
                          <td>{{ $transaksi->total }}</td>
                          <td>{{ $transaksi->pembayaran }}</td>
                          <td>
                            @if ($transaksi->pembayaran > $transaksi->total)
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
              
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">
                <i class="fa fa-close"></i>
                Close Project</a>
            </div>
          </div>
        </div>
      </div>
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

{{-- Data Table Plugin adn Script --}}
<script src="{{asset('jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('datatables.min.js')}}"></script>

<script>
$(document).ready(function() {
  $('#table1').DataTable();
} );
</script>
<script>
    $(document).ready(function() {
      $('#table2').DataTable();
    } );
    </script><script>
$(document).ready(function() {
  $('#table3').DataTable();
} );
</script><script>
$(document).ready(function() {
  $('#table4').DataTable();
} );
</script>
{{--End  --}}

<script src=" {{asset('notify.js')}} "></script>

  </body>

</html>
