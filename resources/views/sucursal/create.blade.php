@extends('layouts.layout')

@section('css')
    <style>
        /* html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      } */
        #map {
            width: 100%;
            height: 400px;
        }

        #coords {
            width: 100%;
        }

    </style>
@endsection

@section('contenido')
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sucursales</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
    </div>

    <div class="container" id="Contenido">
        <div class="row" id="tabla">
            <div class="col-12">
                <div class="row">
                    <h4>Datos de la Sucursal</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form action="{{ route('sucursales.store') }}" method="POST" enctype="multipart/form-data">
                    <!--Método que permite ingresar datos-->
                    @csrf

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                placeholder="Ingrese el nombre de la Sucursal" value="{{ old('name') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Imagen</label>
                            <input type="file" name="imagen" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Inicio de Atención</label>
                            <input type="time" name="inicio_atencion" class="form-control" value="{{ old('time') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Fin de Atención</label>
                            <input type="time" name="fin_atencion" class="form-control" value="{{ old('time') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <div id="centrado">
                                <label for="formbuscador">
                                    <h3>Ubicación</h3>
                                </label>
                            </div>
                            <p class="text-secondary mt-2 mb-3 text-center">Mueve el Pin hacia el lugar correcto</p>
                            <div id="map"></div>
                            <input type="hidden" id="lat" name="latitude" />
                            <input type="hidden" id="lon" name="longitude" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control"
                                placeholder="Ingrese su Dirección" value="{{ old('direction') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Lugar</label>
                            <input type="text" id="sitio" name="sitio" class="form-control" placeholder="Ingrese el lugar"
                                value="{{ old('site') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mt-4">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <button type="reset" class="btn btn-danger">Cancelar</button>
                            <a href="{{ route('sucursales.index') }}" type="button" class="btn btn-secondary">Atrás</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        var marker; //variable del marcador
        var coords = {}; //coordenadas obtenidas con la geolocalización

        //Funcion principal
        initMap = function() {
            //usamos la API para geolocalizar el usuario
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    coords = {
                        lng: position.coords.longitude,
                        lat: position.coords.latitude
                    };
                    setMapa(coords); //pasamos las coordenadas al metodo para crear el mapa


                },
                function(error) {
                    console.log(error);
                });
        }

        function setMapa(coords) {
            //Se crea una nueva instancia del objeto mapa
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: new google.maps.LatLng(coords.lat, coords.lng),

            });

            //Creamos el marcador en el mapa con sus propiedades
            //para nuestro obetivo tenemos que poner el atributo draggable en true
            //position pondremos las mismas coordenas que obtuvimos en la geolocalización
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(coords.lat, coords.lng),

            });
            //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
            //cuando el usuario a soltado el marcador
            marker.addListener('click', toggleBounce);

            marker.addListener('dragend', function(event) {
                //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                document.getElementById("lat").value = this.getPosition().lat();
                document.getElementById("lon").value = this.getPosition().lng();
            });
        }

        //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }

        // Carga de la libreria de google maps 
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
@endsection
