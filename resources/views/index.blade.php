<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Covid-19 Provinsi Bali</title>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
  <!-- Leaflet (JS/CSS) -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.css" />
  <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.Default.css" />
  <!-- Leaflet-KMZ -->
  <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <style>
    html,
    body,
    #map {
        height: 400px;
        width: 100%;
        padding: 0;
        margin: 0;
    }
    @font-face {
            font-family: 'ProximaNovaReg';
            src: url('/fonts/ProximaNova-Regular.woff');
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
    <a class="navbar-brand ml-5" href="/">
      <img src="https://4.bp.blogspot.com/-ELlrLdH0frM/WSz4AjqIWaI/AAAAAAAAASY/EF5ayA5zXn05TXw53cRUVTJeh6lzUJDDwCLcB/s400/Lambang%2BDaerah%2BProvinsi%2BBali%2B2.png" width="30" height="30" class="d-inline-block align-top" alt="">
  
    </a>
    
    <div class="collapse navbar-collapse" style="padding-left:50px;padding-right:50px;" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="/data">Kelola Data</a>
			</li>
			
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
                                    PROVINSI BALI TANGGAP COVID-19                                </span>
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
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$positif[0]->positif}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
      <h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Dalam Perawatan</h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$rawat[0]->rawat}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
      <h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Sembuh </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$sembuh[0]->sembuh}}</p>
			</div>
		</div>
		<div class="col-md-2" style="margin-bottom:5px;">
			<div class="container" style="background:#fff;border-radius:10px;padding:15px;box-shadow: 0 15px 20px rgba(0, 0, 0, 0.1);">
			<h4 style="font-family: 'product_sansregular';text-align:center;font-size:10pt;">Meninggal </h4>
				<p style="font-family: 'product_sansregular';text-align:center;color:#ca2438;font-weight:bold;font-size:20pt;margin-bottom:15px;margin-top:10px;">{{$meninggal[0]->meninggal}}</p>
			</div>
		</div>
	</div>
	
</div>


 
  <div class="row pt-1">
        <div class="col-4">
            <div class="card-body">
              <h10 style="margin-bottom:px;text-align:left;">Lihat Data Berdasarkan Tanggal</h10>
              <form action="/search" method="POST">
                @csrf
                    <div class="form-group">
                      <input type="date" class="form-control" name="tanggal" id="tanggalSearch"  @if(isset($tanggal)) value="{{$tanggal}}" @endif>
                    </div>
                    <button type="submit" class="btn btn-danger btn-flat">Telusuri</button>
                </div>
              </form>
          </div>
      </div>
</div>
<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<h3 style="text-align:left;margin-bottom:5px;margin-top:30px;font-family: 'product_sansregular'font-size:17pt;color:#ca2438;font-weight:bold;" class="heading-responsive text-center">Peta Sebaran  COVID-19 Per Kabupaten</h3>
				<p style="margin-bottom:5px;text-align:left; "class="heading-responsive text-center">Data per tanggal <strong>{{$tanggalSekarang}}</strong></p><br><br>
  </div
</div>

<div class="container tentang" style="padding-left:10px;padding-right:10px;position:relative;
    padding-top: px;">
	<div class="container">
		<div class="tab-content" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div class="row">
					<div class="col-md-6">
						<div id='map' style="max-height:auto; height: 665px;margin-bottom:20px; ">
						</div>
		
					</div>
					<div class="col-md-6">
          <div class="card" style="margin-bottom:10px;">
							<div class="card-body">
								<h6 class="card-title" style="font-family: 'product_sansregular';font-weight:bold;margin-bottom:0px;">Data Kasus COVID-19 Provinsi Bali</h6>
								<p class="text-left" style="font-size:9px;">Pertanggal : {{$tanggalSekarang}} </p
								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th valign="top" style="text-align:center" class="px-0" style="font-family: 'product_sansregular';">No.</th>
												<th valign="top" style="font-family: 'product_sansregular';">Kabupaten</th>
												<th valign="top" style="text-align:center;font-family: 'product_sansregular';">Positif</th>
												<th valign="top" style="text-align:center;font-family: 'product_sansregular';">Sembuh</th>
												<th valign="top" style="text-align:center;font-family: 'product_sansregular';">Dalam Perawatan</th>
												<th valign="top" style="text-align:center;font-family: 'product_sansregular';">Meninggal</th>
											</tr>
										</thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->kabupaten }}</td>
                        <td>
                        <div class="badge badge-pill badge-danger" style="font-size:11px;font-family: 'product_sansregular';">{{ $item->positif }}</td>
                        <td>
                        <div class="badge badge-pill badge-success" style="font-size:11px;font-family: 'product_sansregular';" >{{ $item->sembuh }}</td>
                        <td>
                        <div class="badge badge-pill badge-warning" style="font-size:11px;font-family: 'product_sansregular';" >{{ $item->rawat }}</td>
                        <td>
                        <div class="badge badge-pill badge-secondary" style="font-size:11px;font-family: 'product_sansregular';" >{{ $item->meninggal }}</td>
                        </tr>
                        @endforeach
                    </tbody>
										
									</table>
								</div><br>

							</div>
						</div>
					</div>
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
	
  $(document).ready(function() {
      $('#example').DataTable();
  } );
  
</script>
<script>
  $(document).ready(function () {
    var dataMap=null;
    var colorMap=[
      "e5000d",
      "e71925",
      "ea333d",
      "ec4c55",
      "ef666d",
      "f27f68",
      "f4999e",
      "f7b2b6",
      "f9ccce"
    ];
    var tanggal = $('#tanggalSearch').val();
    console.log(tanggal);
    $.ajax({
      async:false,
      url:'getData',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataMap = response;
      }
    });
    console.log(dataMap);

    $.ajax({
      async:false,
      url:'getPositif',
      type:'get',
      dataType:'json',
      data:{date: tanggal},
      success: function(response){
        dataPos = response;
      }
    });
    console.log(dataPos);
    
    $('#btnGenerateColor').on('click',function(e){
      var colorStart = $('#colorStart').val();
      var colorEnd = $('#colorEnd').val();
      $.ajax({
        async:false,
        url:'/create-pallete',
        type:'get',
        dataType:'json',
        data:{start: colorStart, end:colorEnd},
        success: function(response){
          colorMap = response;
          setMapColor();
        }
      });
      
    });

    var map = L.map('map');
    map.setView(new L.LatLng(-8.374187,115.172922), 10);

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      maxZoom: 17,
      attribution: 'Map data: &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)',
      opacity: 0.90
    });

    OpenTopoMap.addTo(map);
    setMapColor();
    // define variables
    var lastLayer;
    var defStyle = {opacity:'1',color:'#000000',fillOpacity:'0',fillColor:'#CCCCCC'};
    var selStyle = {color:'#0000FF',opacity:'1',fillColor:'#00FF00',fillOpacity:'1'};
    
    function setMapColor(){
      var markerIcon = L.icon({
        iconUrl: '/mar.png',
        iconSize: [40, 40],
      });
      var BADUNG,BULELENG,BANGLI,DENPASAR,GIANYAR,JEMBRANA,KARANGASEM,KLUNGKUNG,TABANAN;
      dataPos.forEach(function(value,index){
        var colorKab = dataPos[index].kabupaten.toUpperCase();
        console.log(colorKab);
        if(colorKab == "BADUNG"){
          BADUNG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="BANGLI"){
          BANGLI = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        } else if(colorKab=="BULELENG"){
          BULELENG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="DENPASAR"){
          DENPASAR = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="GIANYAR"){
          GIANYAR = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab =="JEMBRANA"){
          JEMBRANA = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="KARANGASEM"){
          KARANGASEM = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab=="KLUNGKUNG"){
          KLUNGKUNG = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }else if(colorKab =="TABANAN"){
          TABANAN = {opacity:'1',color:'#000',fillOpacity:'1',fillColor: '#'+colorMap[index]};
        }

      });

    // Instantiate KMZ parser (async)
    var kmzParser = new L.KMZParser({
        onKMZLoaded: function (layer, name) {
          control.addOverlay(layer, name);
          var markers = L.markerClusterGroup();
          var layers = layer.getLayers()[0].getLayers();

            // fetching sub layer
      	  layers.forEach(function(layer, index){
          
          var kab  = layer.feature.properties.NAME_2;
          kab = kab.toUpperCase();
          var prov = layer.feature.properties.NAME_1;
          
          //
          if(!Array.isArray(dataMap) || !dataMap.length == 0 ){
            // set sub layer default style positif covid
            if(kab == 'BADUNG'){
              layer.setStyle(BADUNG);
            }else if(kab == 'BANGLI'){
              layer.setStyle(BANGLI);
            }else if(kab == 'BULELENG'){
              layer.setStyle(BULELENG);
            }else if(kab == 'DENPASAR'){
              layer.setStyle(DENPASAR);
            }else if(kab == 'GIANYAR'){
              layer.setStyle(GIANYAR);
            }else if(kab == 'JEMBRANA'){
              layer.setStyle(JEMBRANA);
            }else if(kab == 'KARANGASEM'){
              layer.setStyle(KARANGASEM);
            }else if(kab == 'KLUNGKUNG'){
              layer.setStyle(KLUNGKUNG);
            }else if(kab == 'TABANAN'){
              layer.setStyle(TABANAN);
            } 


            
            // peparing data format
            var data = '<table width="300">';
                data +='  <tr>';
                data +='    <th colspan="2">Keterangan</th>';
                data +='  </tr>';
              
              
              data +='  <tr>';
              data +='    <td>Kabupaten</td>';
              data +='    <td>: '+kab+'</td>';
              data +='  </tr>';              

              
              data +='  <tr style="color:red">';
              data +='    <td>Positif</td>';
              data +='    <td>: '+dataMap[index].positif+'</td>';
              data +='  </tr>';
              

              data +='  <tr style="color:green">';
              data +='    <td>Sembuh</td>';
              data +='    <td>: '+dataMap[index].sembuh+'</td>';
              data +='  </tr>'; 

              data +='  <tr style="color:black">';
              data +='    <td>Meninggal</td>';
              data +='    <td>: '+dataMap[index].meninggal+'</td>';
              data +='  </tr>';

          
              data +='  <tr style="color:blue">';
              data +='    <td>Dalam Perawatan</td>';
              data +='    <td>: '+dataMap[index].rawat+'</td>';
              data +='  </tr>';               
              
              
            data +='</table>';
    
            if(kab == 'BANGLI'){
              markers.addLayer( 
                L.marker([-8.254251, 115.366936] ,{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );
            }
            else if(kab == 'GIANYAR'){
              markers.addLayer( 
                L.marker([-8.422739, 115.255700] ,{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );

            }else if(kab == 'KLUNGKUNG'){
              markers.addLayer( 
                L.marker([-8.487338, 115.380029] ,{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );

            }else{
              markers.addLayer( 
                L.marker(layer.getBounds().getCenter(),{
                  icon: markerIcon
                }).bindPopup(data).addTo(map)
              );
            }

          }else{
            var data = "Tidak ada Data pada tanggal tersebut"
            layer.setStyle(defStyle);
          }
          layer.bindPopup(data);
      	});
        map.addLayer(markers);
        layer.addTo(map);
        }
    });
  
    // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
    kmzParser.load('bali-kabupaten.kmz');
    // kmzParser.load('https://raruto.github.io/leaflet-kmz/examples/globe.kmz');

    var control = L.control.layers(null, null, {
        collapsed: false
    }).addTo(map);
    $('.leaflet-control-layers').hide();
    }
  });
</script>
</body>
</html>
