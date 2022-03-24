<html lang="en">
  <head>
    <title>Home</title>
    <link rel="stylesheet" href=" {{ asset('assets_leaflet/leaflet.css') }}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('plugins/markercluster/MarkerCluster.css') }}"/>
    <link rel="stylesheet" href="{{ asset('plugins/markercluster/MarkerCluster.Default.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    <script type="text/javascript" src="{{ asset('assets_leaflet/leaflet.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/js.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    
    <script type="text/javascript" src="{{ asset('plugins/markercluster/leaflet.markercluster-src.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/leaflet-ajax/leaflet.ajax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/leaflet-polygon-gradient-master/leaflet.polygon.gradient.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/wicket/wicket.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/wicket/wicket-leaflet.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('plugins/turf-master/turf.min.js') }}" ></script>
  </head>
  <body>    

    @if (Auth::check() == 0) 
        <?php $check = "Belum login"; ?> 
          <div class="bg-dark p-1">
            <a href="{{ route('login') }}" class="btn btn-primary ml-3 mx-2 my-2">Login</a>  
            <a href="{{ route('info') }}" class="btn btn-light mx-2 my-2">Info</a> 
          </div>
          <div id="map" style="height: 573px;"></div>                     
        @else
        <?php $check = "Sudah login"; ?> 
        <div class="bg-dark p-1">
          <button class="btn btn-light ml-3 mx-2 my-2" onclick="displayForm1()">Point</button>
          <button class="btn btn-light mx-2 my-2" onclick="displayForm2()">Polygon</button>
          <a href="{{ route('logout') }}" class="btn btn-danger mx-2 my-2">Logout</a>
        </div>

        <div class="p-3 w-50" id="form1" style="display: none;">
          <form action="{{ route('action_individu') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="h5">Data Individu</p>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label>Jenis</label>
                <select class="form-control" name="jenis">
                  <option value="Penderita">Penderita</option>
                  <option value="Suspect">Suspect</option>
                </select>
              </div>
            </div>
            <p class="h6">Biodata</p>
            <hr>
            <input type="hidden" class="form-control" name="id">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama" name="nama">
              </div>
              <div class="form-group col-md-6">
                <label>No KTP</label>
                <input type="text" class="form-control" placeholder="No KTP" name="no_ktp">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-7">
                <label>Alamat</label>
                <textarea class="form-control" rows="3" name="alamat"></textarea>
              </div>
              <div class="form-group col-md-5">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="foto">
              </div>
            </div>
            <p class="h6">Lokasi Karantina</p>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Provinsi</label>
                <input type="text" class="form-control" placeholder="Provinsi" name="provinsi_poi">
              </div>
              <div class="form-group col-md-6">
                <label>Kabupaten/Kota</label>
                <input type="text" class="form-control" placeholder="Kabupaten/Kota" name="kabupaten_kota_poi">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Keluhan Sakit</label>
                <textarea class="form-control" rows="3" name="keluhan_sakit"></textarea>
              </div>
              <div class="form-group col-md-6">
                <label>Riwayat Perjalanan</label>
                <textarea class="form-control" rows="3" name="riwayat_perjalanan"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Geom</label>
                <input type="text" class="form-control" id="geom-point" placeholder="Geom" name="lokasi_geom_poi">
              </div>
            </div>
            <input type="submit" class="btn btn-default mr-2" id="btn-action-poi" name="btn_poi" value="Tambah">
            <input type="submit" class="d-none btn btn-danger mx-2" id="btn-action-hapus-poi" name="btn_poi" value="Hapus">            
          </form>

          <input type="submit" class="d-inline btn btn-warning mr-2" id="btn-action-kosongkan-poi" value="Kosongkan" onclick="reset_input_poi()">
          <input type="submit" class="d-none btn btn-danger mx-2" id="btn-action-cancel-change-poi" value="Batalkan Ubah" onclick="batalkan_ubah_poi()">
        </div>

        {{-- form 2 --}}
        <div class="p-3 w-50" id="form2" style="display: none;">
          <form action="{{ route('action_karantina') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="h5">Lokasi Karantina</p>
            <hr>
            <input type="hidden" class="form-control" name="id_poly">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Kode Provinsi</label>
                <input type="text" class="form-control" placeholder="Kode Provinsi" name="kode_provinsi">
              </div>
              <div class="form-group col-md-6">
                <label>Nama Provinsi</label>
                <input type="text" class="form-control" placeholder="Nama Provinsi" name="nama_provinsi">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Kode Kabupaten</label>
                <input type="text" class="form-control" placeholder="Kode Kabupaten/Kota" name="kode_kabupaten">
              </div>
              <div class="form-group col-md-6">
                <label>Nama Kabupaten</label>
                <input type="text" class="form-control" placeholder="Nama Kabupaten" name="nama_kabupaten">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Geom</label>
                <input type="text" class="form-control" id="geom-polygon" placeholder="Geom" name="lokasi_geom_poly">
              </div>
            </div>

            <input type="submit" class="btn btn-default mr-2" id="btn-action-poly" name="btn_poly" value="Tambah">
            <input type="submit" class="d-none btn btn-danger mx-2" id="btn-action-hapus-poly" value="Hapus">            
          </form>

          <input type="submit" class="d-inline btn btn-warning mr-2" id="btn-action-kosongkan-poly" value="Kosongkan" onclick="reset_input_poly()">
          <input type="submit" class="d-none btn btn-danger mx-2" id="btn-action-cancel-change-poly" value="Batalkan Ubah" onclick="batalkan_ubah_poly()">
        </div>
               
        <div id="map"></div>
      @endif
    
    
    <script type="text/javascript">
      var map=L.map('map').setView([-7.25745 , 112.752087], 13);
      var osm=L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});
      osm.addTo(map);    
      var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });
      var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });
      var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
          maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
      }); 

      var baseMaps = {
			"OpenStreetMap": osm,
			"Google Street":googleStreets,
			"Google Satellite": googleSat,
			"googleHybrid":googleHybrid
      };

      function gradasi(feature){
        return {
          weight:0,
          fillColor:"linearGradient(90deg, green, pink)",
          fillOpacity:0.5
        };
      }

      function transparent(feature) {
        return {
          weight:0,
          fillColor:"transparent",
          fillOpacity:0.0
        };
      }

      function hover(event) {
        var layer = event.target;
  
        layer.bringToBack();

      }

      var kode_provinsi = "";
      var kode_kabupaten = "";
      var nama_provinsi = "";
      var nama_kabupaten = "";
      var arrftr = [];

      // load kabupaten/kota geojson

      function cari() {
        var master_kabupaten_ = <?php echo json_encode($master_kabupaten); ?>;
        var lokasi_karantina_ = <?php echo json_encode($lokasi_karantina); ?>;

        for(var i=0; i < lokasi_karantina_.length; i++)
        {

          master_kabupaten_.forEach(element => {
            if (lokasi_karantina_[i].kode_kabupaten == element.kode_kab){
              
                arrftr.push(lokasi_karantina_[i].kode_kabupaten);

            }
          });
        }
      }

      cari();

      function hitungBerapaKali(arr, prop)
      {
        var counts = 0;
        for(let i =0; i < arr.length; i++){ 
            if (arr[i] == prop){
              counts += 1
            } 
        } 
          
        return counts;
        
      }
      // console.log(arrftr);
      function onEachFeature(feature, layer) {

          if (hitungBerapaKali(arrftr, feature.properties.KODE_KAB) >= 3 && hitungBerapaKali(arrftr, feature.properties.KODE_KAB) < 5) 
          {
            layer.setStyle({fillColor :'linearGradient(90deg, red, pink)'});
          }
          else if (hitungBerapaKali(arrftr, feature.properties.KODE_KAB) >= 5) {
            layer.setStyle({fillColor :'linearGradient(90deg, black, pink)'});
          }
          
          layer.on('click', function(e) {
            kode_provinsi = ''+feature.properties.KODE_PROP;
            kode_kabupaten = ''+feature.properties.KODE_KAB;
            nama_provinsi = ''+feature.properties.NAMA_PROP;
            nama_kabupaten = ''+feature.properties.NAMA_KAB;
          });

      }

      var kabupaten = L.geoJson.ajax("{{ asset('indonesia_kab/indonesia_kab.geojson') }}",{style:gradasi, onEachFeature: onEachFeature}).addTo(map).on({mouseover: hover}); 

      // kabupaten.addTo(map);

      var myIcon = L.icon({
        iconUrl: 'icons/employment.png',
        iconSize: [30, 40],
        iconAnchor: [15, 40],
      }); 

      var myIcon2 = L.icon({
        iconUrl: 'icons/professional.png',
        iconSize: [30, 40],
        iconAnchor: [15, 40],
      }); 

      var myIcon3 = L.icon({
        iconUrl: 'icons/nightlife.png',
        iconSize: [30, 40],
        iconAnchor: [15, 40],
      }); 

      var ubaya= L.marker([ -7.321946 ,112.768093],{icon:myIcon}).bindPopup("Universitas Surabaya");
      var unair= L.marker([ -7.264610966372823 ,112.75851748885523],{icon:myIcon2}).bindPopup("Universitas Airlangga");
      var its= L.marker([ -7.278261363973013 ,112.79351060821111],{icon:myIcon3}).bindPopup("Institut Sepuluh November");

      var univs = L.layerGroup([ubaya, unair, its]);
      var overlayMaps = {"Universitas": univs };

      L.control.layers(baseMaps).addTo(map);

      var check = "{{ $check }}";

      //load semua point dari database
      @for($i = 0; $i < count($data_individu); $i++)
        var geom = "{{  $data_individu[$i]->lokasi_geom }}";

        var wkt = new Wkt.Wkt();
        wkt.read(geom); 

        var jenis_individu = "{{ $data_individu[$i]->jenis }}";

        // untuk membedakan icon individu (penderita atau suspect)
        var feature{{ $i }};
        if (jenis_individu == "Penderita") {
          feature{{ $i }} = wkt.toObject({icon: myIcon});  
        } else {
          feature{{ $i }} = wkt.toObject({icon: myIcon2});  
        }

        feature{{ $i }}.addTo(map); 
         
        feature{{ $i }}.on('click', function (e) { 
            var pop = L.popup();
            pop.setLatLng(e.latlng);
            pop.setContent("<p class='h6 text-center'><b><u>Data Individu</u></b></p><div class='border'><img src='{{ asset('storage/images/'.$data_individu[$i]->foto) }}' class='p-2' style='width:220px; height: 200px;'></div><p><b>Jenis</b>:  {{ $data_individu[$i]->jenis }}</p><p><b>Nama</b>: {{ $data_individu[$i]->nama }}</p><a href='{{ route('view_detail/{id}', ['id'=>$data_individu[$i]->id]) }}' target='_blank'>View detail</a>");
            map.openPopup(pop);
            displayForm1_();
            $("select[name='jenis']").val("{{ $data_individu[$i]->jenis }}");
            $("input[name='id']").val("{{ $data_individu[$i]->id }}");
            $("input[name='nama']").val("{{ $data_individu[$i]->nama }}");
            $("input[name='no_ktp']").val("{{ $data_individu[$i]->no_ktp }}");
            $("textarea[name='alamat']").val("{{ $data_individu[$i]->alamat }}");
            // $("input[name='foto']").val("{{ $data_individu[$i]->foto }}");
            $("input[name='provinsi_poi']").val("{{ $data_individu[$i]->provinsi }}");
            $("input[name='kabupaten_kota_poi']").val("{{ $data_individu[$i]->kabupaten_kota }}");
            $("textarea[name='keluhan_sakit']").val("{{ $data_individu[$i]->keluhan_sakit }}");
            $("textarea[name='riwayat_perjalanan']").val("{{ $data_individu[$i]->riwayat_perjalanan }}");
            $("input[name='lokasi_geom_poi']").val("{{ $data_individu[$i]->lokasi_geom }}");
            $("#btn-action-poi").val("Ubah");
            $("#btn-action-hapus-poi").addClass("d-inline").removeClass("d-none");
            $("#btn-action-cancel-change-poi").addClass("d-inline").removeClass("d-none");
        });  

        function styleTitikLokasi(feature){
         return {
           fillColor: "#343A40",
           weight:0,
           fillOpacity:0.8  
          };
        } 

        // buffer titik lokasi
        if (check == "Belum login")
        {
          var turfDot=feature{{ $i }}.toGeoJSON();
          var buffered1 = turf.buffer(turfDot, 2, {units: 'kilometers'});
          
          //hilangkan point
          map.removeLayer(feature{{ $i }});
          var layerBufferDot = L.geoJSON(buffered1, {style:styleTitikLokasi}).addTo(map); 

        }
      
      @endfor


      function reset_input_poi()
      {
        $("select[name='jenis']").val('Penderita');
        $("input[name='nama']").val('');
        $("input[name='no_ktp']").val('');
        $("textarea[name='alamat']").val('');
        $("input[name='foto']").val('');
        $("input[name='provinsi_poi']").val('');
        $("input[name='kabupaten_kota_poi']").val('');
        $("textarea[name='keluhan_sakit']").val('');
        $("textarea[name='riwayat_perjalanan']").val('');
        $("input[name='lokasi_geom_poi']").val('');
      }

      function reset_input_poly()
      {
        $("input[name='kode_provinsi']").val('');
        $("input[name='nama_provinsi']").val('');
        $("input[name='kode_kabupaten']").val('');
        $("input[name='nama_kabupaten']").val('');
        $("input[name='lokasi_geom_poly']").val('');
      }

      function batalkan_ubah_poi() 
      {
        reset_input_poi();
        $("#btn-action-poi").val("Tambah");
        $("#btn-action-hapus-poi").addClass("d-none").removeClass("d-inline");
        $("#btn-action-cancel-change-poi").addClass("d-none").removeClass("d-inline");
      }

      function batalkan_ubah_poly() 
      {
        reset_input_poly();
        $("#btn-action-poly").val("Tambah");
        $("#btn-action-hapus-poly").addClass("d-none").removeClass("d-inline");
        $("#btn-action-cancel-change-poly").addClass("d-none").removeClass("d-inline");
      }

      if (check == "Sudah login") 
      {
        var drawnItems = new L.FeatureGroup();
          map.addLayer(drawnItems); 
          map.addControl(new L.Control.Draw({
            edit: {
              featureGroup: drawnItems,
              poly: {
                allowIntersection: false
              }
            },
            draw: {
              polygon: {
                allowIntersection: false,
                showArea: true
              }
            }
          }));
      }


      map.on(L.Draw.Event.CREATED, function (e) {
        // $("input[name='kode_kabupaten']").val(kode_kabupaten);
        $("input[name='kode_provinsi']").val(kode_provinsi);
        $("input[name='kode_kabupaten']").val(kode_kabupaten);
        $("input[name='nama_provinsi']").val(nama_provinsi);
        $("input[name='nama_kabupaten']").val(nama_kabupaten);

        var type = e.layerType;
        var layer = e.layer; 

        var shape = layer.toGeoJSON();
        var shape_for_db = JSON.stringify(shape);
        var x = JSON.parse(shape_for_db);

        var res = "";
        if (x['geometry']['type'] == "Point") {
            $('#tipe').val('point');
            res = "POINT("; 
            res += x['geometry']['coordinates'][0] + " " + x['geometry']['coordinates'][1];
            res += ")";
            $('#geom-point').val(res);
        } else if (x['geometry']['type'] == "Polygon") {
            $('#tipe').val('polygon');
            res = "POLYGON((";
            for (var i=0; i<x['geometry']['coordinates'][0].length; i++) {
                                
                if (i == 0) { 
                    res += x['geometry']['coordinates'][0][i][0] + " " + x['geometry']['coordinates'][0][i][1];
                } else {
                    res += "," + x['geometry']['coordinates'][0][i][0] + " " + x['geometry']['coordinates'][0][i][1];
                }
            }
            res += "))";
            $('#geom-polygon').val(res);
        }

        drawnItems.addLayer(layer);
      }); 

      //load semua polygon dari database
      @for($i = 0; $i < count($lokasi_karantina); $i++)
        var geom_poly = "{{  $lokasi_karantina[$i]->lokasi_geom }}";

        var wkt_poly = new Wkt.Wkt();
        wkt_poly.read(geom_poly); 

        var feature_poly_{{ $i }} = wkt_poly.toObject({fillColor: "blue", weight: 5, opacity: 1, color: 'blue', fillOpacity: 0.7});

        feature_poly_{{ $i }}.addTo(map);
        feature_poly_{{ $i }}.on('click', function (e) { 
          
          displayForm2_();
          $("input[name='id_poly']").val("{{ $lokasi_karantina[$i]->id }}");
          $("input[name='kode_provinsi']").val("{{ $lokasi_karantina[$i]->kode_provinsi }}");
          $("input[name='kode_provinsi']").val("{{ $lokasi_karantina[$i]->kode_provinsi }}");
          $("input[name='nama_provinsi']").val("{{ $lokasi_karantina[$i]->nama_provinsi }}");
          $("input[name='kode_kabupaten']").val("{{ $lokasi_karantina[$i]->kode_kabupaten }}");
          $("input[name='nama_kabupaten']").val("{{ $lokasi_karantina[$i]->nama_kabupaten }}");
          $("input[name='lokasi_geom_poly']").val("{{ $lokasi_karantina[$i]->lokasi_geom }}");
          $("#btn-action-poly").val("Ubah");
          $("#btn-action-hapus-poly").addClass("d-inline").removeClass("d-none");
          $("#btn-action-cancel-change-poly").addClass("d-inline").removeClass("d-none");
        });
      @endfor
      
    </script>
  </body>
</html>