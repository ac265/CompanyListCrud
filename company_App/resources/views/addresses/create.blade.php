@extends('home')

@section('main')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet" crossorigin="anonymous">

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add an address</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="GET" action="/store/{{$company->id}}" >

                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" id="address-input" name="name" class="form-control map-input">
                        <input type="hidden" name="address_latitude" id="address-latitude" value="{{ old('address_latitude', '') }}" />
                        <input type="hidden" name="address_longitude" id="address-longitude" value="{{ old('address_longitude', '') }}" />
                    </div>


                        <style type="text/css"> html, body, #mapFrame { width: 100%; height: 100%; margin: 0; padding: 0; } </style>
                        <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
                    </head>
                    <body>

                    <div id="harita" style="width:750px; height:380px">
                        <iframe id="mapFrame" src="http://sehirharitasi.ibb.gov.tr/">
                            <p>Tarayıcınız iframe özelliklerini desteklemiyor !</p>
                        </iframe>
                    </div>

                    <script>
                        var ibbMAP = new SehirHaritasiAPI({mapFrame:"mapFrame",apiKey:"..."}, function(){
                            ibbMAP.Nearby.Open({
                                lat: 41.01371789571470,
                                lon: 28.95547972584920,
                                type: "eğitim,kamu",
                                distance: 300
                            });
                        });
                    </script>

                    <button type="submit" class="btn btn-primary">Add address</button>
                </form>

                        <div id="address-map-container" style="width:100%;height:400px; ">
                            <div style="width: 100%; height: 100%" id="address-map"></div>
                        <iframe
                            width="750";
                            height="380";
                            frameborder="0"; style="border: 0"
                            src="https://www.google.com/maps/embed/v1/place?key={{ env('GOOGLE_MAPS_API_KEY')}}&q=Space+Needle,Seattle+WA" allowfullscreen>
                        </iframe>


                        <div style="text-decoration:none; overflow:hidden;max-width:100%;width:750px;height:380px;">
                            <div id="embedmap-display" style="height:100%; width:100%;max-width:100%;">
                                <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=ankara&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8">

                                </iframe></div><a class="embedmap-code" href="https://www.embed-map.com" id="grabmaps-authorization">https://www.embed-map.com</a>
                            <style>#embedmap-display img.text-marker{max-width:none!important;background:none!important;}img{max-width:none}</style></div>

                    </div>


            </div>

            <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="${contextPath}/resources/js/bootstrap.min.js"></script>

        </div>
    </div>


@endsection

@section('scripts')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>
@stop

