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
    <link rel="stylesheet" type="text/css" href="{{asset('datatables.min.css')}}"/>
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

    <!-- Transaksi Printing Section -->
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
                    <label for="kustomer">NIM Pelanggan (nama jika NIM tidak ada)</label>
                    {{ Form::text('kustomer', null, ['class' => 'form-control', 'placeholder' => 'Nama Pelanggan', 'required', 'id' => 'kustomer'])}}
                </div>

                <div class="form-group" style="display: none">
                    <label for="diskon">Asisten</label>
                    <input type="checkbox" class="form-control" id="diskon" name="diskon" onchange="sum()" style="height: 30px; width: 30px;">
                </div>

                <div class="form-group">
                    <label for="kertas">Jumlah Kertas</label>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            {{ Form::number('hitam', null, ['id' =>'hitam' ,'class' => 'form-control','placeholder' => 'Hitam','onkeyup' => 'sum()','min' => 0 ])}}
                        </div>
                        <div class="col-md-4 mb-3">
                            {{ Form::number('warna', null, ['id' =>'warna' ,'class' => 'form-control','placeholder' => 'Warna','onkeyup' => 'sum()','min' => 0  ])}}
                        </div>
                        <div class="col-md-4 mb-3">
                          {{ Form::number('kertas', null, ['id' =>'kertas' ,'class' => 'form-control','placeholder' => 'Kertas Kosong','onkeyup' => 'sum()','min' => 0  ])}}
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="total">Total Biaya</label>
                    {{ Form::number('total', 0, ['id' =>'total' ,'class' => 'form-control', 'min' => 0, 'readonly' ])}}
                </div>

                <div class="form-group">
                    <label for="bill">Uang yang di bayar</label>
                    {{ Form::number('pembayaran', null, ['id' =>'bayar' ,'class' => 'form-control', 'onkeyup' => 'debt()', "onkeypress" => "if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;", 'min' => 0 ])}}
                </div>

                <div class="form-group">
                    <label for="selisih">Kembalian</label>
                    {{ Form::text('selisih', 0, ['id' =>'selisih' ,'class' => 'form-control', 'readonly' ])}}
                </div>

                <div class="form-group">
                    <button id="button1" type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan</button>
                </div>
    		</div>
    	</div>
        {{ Form::close() }}

      </div>
    </section>

    <!-- Transaksi Hari Ini Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center"> <a class="text-center text-uppercase text-white" data-toggle="collapse" href="#collapse1">Transaksi Hari Ini</a></h2>
        <hr class="star-light mb-5">
        <div class="container">
    									
		    			<h1 style="color: white" >Tabel Transaksi</h1>
		    			<div id="collapse1" class="panel-collapse collapse">
		    				
                <table id="t_trans" class="table table-striped table-bordered display" border="1" cellpadding="10" cellspacing="0" style="width:100%; background-color: white; color:black">
			    				             <thead>
                      <tr>
					              <th>No.</th>
					              <th>Nama Kostumer</th>
                        <th>Nama Asisten</th>
                        <th>Hitam</th>
                        <th>Warna</th>
                        <th>Kertas Kosong</th>
                        <th>Waktu Transaksi</th>
					              <th>Total Biaya</th>
                        <th>Uang yang Dibayar</th>
                        <th>status</th>
					            </tr>
                                </thead>

                                <tbody>

                      <?php use Carbon\Carbon; ?> 
                      @foreach($transaksi as $transaksi)
                        @if($transaksi->created_at->ToDateString() ==  Carbon::today('Asia/Jakarta')->ToDateString(''))
                          <tr>
    					              <td>{{ $transaksi->id_trans }}</td>         
                            <td>{{ $transaksi->kustomer}}</td>
                            <td>{{ $asisten[$transaksi->id_asisten]}}</td>

                            @if ($transaksi->hitam == null)
                              <td>{{0}}</td>
                            @else  
                              <td>{{$transaksi->hitam}}</td>
                            @endif

                            @if ($transaksi->warna == null)
                              <td>{{0}}</td>
                            @else
                              <td>{{$transaksi->warna}}</td>
                            @endif
                            
                            @if ($transaksi->kertas == null)
                              <td>{{0}}</td>
                            @else
                              <td>{{$transaksi->kertas}}</td>
                            @endif

                            <td> {{$transaksi->created_at->format('h:i:s A')}} </td>
    					              <td>{{ $transaksi->total }}</td>
                            <td>{{ $transaksi->pembayaran }}</td>
                            <td>
                              @if ($transaksi->pembayaran < $transaksi->total)
                                  Belum Lunas
                              @else
                                  Lunas
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

    <!-- Utang Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center"><a class="text-center text-uppercase text-secondary mb-0" data-toggle="collapse" href="#collapse2">Pembayaran Hutang</a></h2>
        <hr class="star-dark mb-5">
        <div class="container">
    				<div class="jumbotron" style="background-color: #42a5f5">
    					
						<h1>Tabel Pembayaran Hutang</h1>
						<div id="collapse2" class="panel-collapse collapse">

								<table id="t_hutang" class="table table-striped table-bordered  display" border="1" cellpadding="10" cellspacing="0" style=" width:100%; background-color:white; text-align: center">
                      <thead>
                        <tr>
						              <th>No.</th>
                          <th>Nama Konsumen</th>
						              <th>Nama Asisten</th>
                          <th>tanggal Berhutang</th>
                          <th>hitam</th>
                          <th>warna</th>
                          <th>Kertas Kosong</th>
						              <th>Total Hutang</th>
						              <th>Pelunasan Hutang</th>
						            </tr>
                      </thead>

                      <tbody>
                        @foreach($hutang as $value)
                          <tr>  
                            <td>{{ $value->id_hutang }}</td>
                            <td>{{ $value->kustomer }}</td>
                            <td></td>
                            <td>{{ $value->updated_at}}</td>
                            <td>{{ $value->hitam }}</td>
                            <td>{{ $value->warna }}</td>
                            <td>{{ $value->kertas }}</td>
                            <td>{{ $value->jumlah_hutang }}</td>
                            <td>
                              <div>
                                {{ Form::button('Bayar', ['class' => 'btn btn-info form-control', 'data-toggle' => 'modal', 'data-target' => '#someModal_'.$value->id_hutang]) }}
                              </div>
                              
                                  <!-- Modal -->
                                {!! Form::model($value, ['route' => ['transaksi.update', $value->id_hutang], 'method' => 'PUT'] ) !!} 
                                <div id="someModal_{{$value->id_hutang}}" class="modal fade" role="dialog">
                                  <div class="modal-dialog">  
                                    <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Pembayaran Hutang</h4>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form-group">
                                                  <label for="id_asisten">Nama Asisten</label>
                                                  {{ Form::select('d_asisten', $asisten, null, [ 'id' => 'd_asisten','class' => 'form-control', 'placeholder' => 'Nama Asisten', 'required'])}}
                                              </div>
                                              
                                              <div class="form-group">
                                                <label for="">Total Hutang</label>
                                                {{ Form::text('d_total', $value->jumlah_hutang, ['id' => 'd_total_'.$value->id_hutang, 'class' => 'form-control', 'readonly']) }} 
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label for="">Sisa Hutang</label>
                                                  {{ Form::text('sisa', $value->jumlah_hutang, ['id' => 'sisa_'.$value->id_hutang,'class' => 'form-control', 'readonly']) }}
                                              </div>

                                              <div class="form-group">
                                                <label for="">Uang Angsuran</label>
                                                {{ Form::text('d_pay', null, ['id' => 'd_pay_'.$value->id_hutang,'class' => 'form-control','onkeyup' => 'repay('.$value->id_hutang.')', "onkeypress" => "if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;", 'required']) }} 
                                              </div>

                
                                            </div>
                                            <div class="modal-footer">
                                              {{ Form::submit('Bayar', ['class' => 'btn btn-primary form-control'])}}
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  {!! Form::close() !!}           
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

    {{-- Data Table Plugin adn Script --}}
  <script src="{{asset('jquery-3.3.1.js')}}"></script>
  <script type="text/javascript" src="{{asset('datatables.min.js')}}"></script>
  <script>
      $(document).ready(function() {
        $('#t_trans').DataTable();
      } );
  </script>
  <script>
    $(document).ready(function() {
      $('#t_hutang').DataTable();
    } );
  </script>
    {{--End  --}}

    <script src=" {{asset('notify.js')}} "></script>
    

  </body>

</html>


<!--  Script Penjumlahan Transaksi -->
<script>

  function sum(){
  var w = document.getElementById("kertas").value;  
  var x = document.getElementById("hitam").value;
  var y = document.getElementById("warna").value;
  var m = 0;
  var z = 0;
  var n = 0;
  var o = 0;

  if(x!=null && !isNaN(parseInt(x))){
    m = parseInt(x);
  }

  if(y!=null && !isNaN(parseInt(y))){
    n = parseInt(y);
  }

  if(y!=null && !isNaN(parseInt(y))){
    o = parseInt(w);
  }

  if(document.getElementById("diskon").checked==true){
      z = m*300 + n *500 + w*100;
  }
  else{
      z = m*500 + n*1000 + w*100;
  }

  document.getElementById("total").value = z;
  document.getElementById("bayar").value = z;
}


  function debt(){
    var x = document.getElementById("total").value;
    var y = document.getElementById("bayar").value;
    var z = y-x;

    // if (z < 0) {
    //   z= 0;
    // } 

    document.getElementById("selisih").value = z;
}

function repay(id){

    console.log(id);
    var x = document.getElementById("d_total_"+id).value;
    var y = document.getElementById("d_pay_"+id).value;
    var z = +x - +y;

    document.getElementById("sisa_"+id).value = z;
}
</script>

<script>
<?= "let nim = $nim;" ?>

$('#kustomer').keyup(function(){
	let a = $('#kustomer').val();
	for(let i = 0; i<nim.length; i++){
		if(a == nim[i]){
			$('#diskon').prop('checked', true);
			sum();
            return 0;
		}
    }		
    $('#diskon').prop('checked', false);
	sum();
});
