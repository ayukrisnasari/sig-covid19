<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kelola Data Covid-19 Provinsi Bali</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <!-- Leaflet (JS/CSS) -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  
  <!-- Leaflet-KMZ -->
  <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" class="init">
	
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    
        </script>
  <style>
    html,
    body,
    #map {
        height: 400px;
        width: 100%;
        padding: 0;
        margin: 0;
    }
    .gradient-header-big {
            color: white;
            width: 100%;
            background: linear-gradient(90deg, rgba(176,24,49,1) 0%, rgba(242,57,57,1) 35%, rgba(255,255,255,1) 100%);
        }
</style>
</head>
<body>

<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand " href="/" style="margin-left: 100px;">
      <img src="https://4.bp.blogspot.com/-ELlrLdH0frM/WSz4AjqIWaI/AAAAAAAAASY/EF5ayA5zXn05TXw53cRUVTJeh6lzUJDDwCLcB/s400/Lambang%2BDaerah%2BProvinsi%2BBali%2B2.png" width="30" height="30" class="d-inline-block align-top" alt="">
   </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/data">Kelola Data</a>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto" style="margin-right: 100px;">
          <!-- Authentication Links -->
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
      </ul>
  </div>
</nav>
<div class="container-fluid p-0">
        <div class="gradient-header-big">
            <div class="row m-0" style="">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center" style="padding-bottom:100px;">
                    <div class="row justify-content-center">
                            <h1 style="padding-top:100px;">
                                <span class="py-3" id="text-beranda">
                                    Data  Sebaran Kasus Covid-19 s/d {{$date}} di Provinsi Bali  </span>
                            </h1>
                    </div>
                    
                </div>
                <div class="col-md-2"></div>                    
            </div>
        </div>
    </div>

    <div class="mx-auto" style="bottom:0;margin-top:-80px; padding-left:300px;">
	<div class="row">
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
				<h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Positif </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$positif}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
      <h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Dalam Perawatan</h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$rawat}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
      <h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Sembuh </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$sembuh}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
			<h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Meninggal </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$meninggal}}</p>
			</div>
		</div>
	</div>
	
</div>
<div class="row">
					<div class="col-md-6" style="margin-bottom:20px;">
						<div class="card" style="margin-bottom:10px;">
							<div class="card-body">
								<h6 class="card-title" style="font-family: 'product_sansregular';font-weight:bold;margin-bottom:0px;"> Tambah Data</h6>
				
								<div class="table-responsive">
               <br><br>
        <div class="card">
            <div class="card-body">
              
              <form action="/data" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tanggal</label>
                    <input type="date" class="form-control" name="tgl_data"  placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Kabupaten</label>
                  <select class="form-control" name="kabupaten" >
                    @foreach ($kabupaten as $item)
                        <option value="{{$item->id}}">{{$item->kabupaten}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah dalam Perawatan</label>
                    <input type="number" class="form-control" name="rawat" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah Sembuh</label>
                    <input type="number" class="form-control" name="sembuh" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Jumlah Meninggal</label>
                    <input type="number" class="form-control" name="meninggal" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
								</div><br>
								
							</div>
						</div>

					</div>
					<div class="col-md-6">
						<div class="card" style="margin-bottom:10px;">
							<div class="card-body">
								<h6 class="card-title" style="font-family: 'product_sansregular';font-weight:bold;margin-bottom:0px;">Data Penyebaran</h6>
								<div class="table-responsive">
                  <table id="example" class="table table-striped" >
                    <thead>
                      <tr>
                        <th valign="top" style="text-align:center" class="px-0" style="font-size:8px;font-family: 'product_sansregular';">No</th>
                        <th valign="top" style="text-align:center" class="px-0" style="font-size:8px;font-family: 'product_sansregular';">Kabupaten</th>
                        <th valign="top" style="text-align:center" class="px-0" style="font-size:8px;font-family: 'product_sansregular';">Sembuh</th>
                        <th valign="top" style="text-align:center" class="px-0" style="font-size:8px;font-family: 'product_sansregular';">Positif</th>
                        <th valign="top" style="text-align:center" class="px-0" style="font-size:8px;font-family: 'product_sansregular';">Dalam Perawatan</th>
                        <th valign="top" style="text-align:center" class="px-0" style="font-size:8px;font-family: 'product_sansregular';">Meninggal</th>
                        <th valign="top" style="text-align:center" class="px-0" style="font-size:8px;font-family: 'product_sansregular';">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($test as $item)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->kabupaten }}</td>
                        <td>
                        <div class="badge badge-pill badge-success" style="font-size:11px;font-family: 'product_sansregular';">{{$item->sembuh }}</td>
                        <td>
                        <div class="badge badge-pill badge-danger" style="font-size:11px;font-family: 'product_sansregular';">{{ $item->positif }}</td>
                        <td>
                        <div class="badge badge-pill badge-warning" style="font-size:11px;font-family: 'product_sansregular';">{{ $item->rawat }}</td>
                        <td>
                        <div class="badge badge-pill badge-secondary" style="font-size:11px;font-family: 'product_sansregular';">{{ $item->meninggal }}</td>
                        <td>
                          <form action="/data/{{$item->id_kabupaten}}" method="GET">
                            <button class="btn-outline-secondary" type="submit">
                                Detail
                            </button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
							
								<br>
								
							</div>
						</div>
  </div>
  <hr>
</div>
<div class="container-fluid" style="background-color:#FBFBFB;">
	<div class="container">
		<div class="row" style="padding-top:20px;padding-bottom:20px;">
			<div class="col-md-6" id="footerLogo">
			</div>
			<div class="col-md-6">
				<div class="container-fluid">
					<p style="text-align:center;margin-top:10px;margin-bottom:0px;color:#838383;">Ni Komang Ayu  Krisnasari | 1705551046</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://pendataan.baliprov.go.id/assets/frontend/map/leaflet.markercluster-src.js"></script>
<script type="text/javascript" class="init">
<script>

    var map = L.map('map');
    map.setView(new L.LatLng(-8.5723206,114.6667599),8.76);

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      maxZoom: 17,
      attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
      opacity: 0.90
    });

  OpenTopoMap.addTo(map);

    // Instantiate KMZ parser (async)
    var kmzParser = new L.KMZParser({
        onKMZLoaded: function (layer, name) {
            control.addOverlay(layer, name);
            layer.addTo(map);
        }
    });
    // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
    kmzParser.load('baliregency.kmz');
    // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');

    var control = L.control.layers(null, null, {
        collapsed: false
    }).addTo(map);
</script>
</body>
</html>
