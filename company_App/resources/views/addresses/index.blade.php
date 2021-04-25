@extends('home')

@section('main')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet" crossorigin="anonymous">

    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div>
            <a style="margin: 19px;" href="{{ route('addresses.create')}}" class="btn btn-primary">Add new address</a>

        </div>
        <h1 class="display-3">Address</h1>

        <section id="social" class="sectionArea">
            <div class="socialTop">

            </div>
            <div class="socialBody">
                <div class="container2">


                    <div class="col3">
                        <div class="item">
                            <div class="zoom">
                                <p> <a class="btn3">
                                        <html>
                                        <head>
                                            <style type="text/css"> html, body, #mapFrame { width: 100%; height: 400px; margin: 0; padding: 0; } </style>
                                            <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
                                        </head>
                                        <body>

                                        <div id="harita" style="width:100%; height:100%">
                                            <iframe id="mapFrame" src="http://sehirharitasi.ibb.gov.tr/">
                                <p>Your browser doesn't support the features of iframe!</p>
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

                            </body>
                            </html>

                            </a>  </p>

                        </div>
                        <div class="itemText">



                        </div>
                    </div>
                </div>
                <div class="col3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td><b>Latitude</b></td>
                            <td><b>Longitude</b></td>
                            <td colspan = 2><b>Actions</b></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($address as $address)
                            <tr>
                                <td>{{$address->latitude}}</td>
                                <td>{{$address->longitude}}</td>
                                <td>
                                    <a href="{{ route('address.edit',$address->id)}}" > <button class="btn btn-primary" type="submit">Edit</button></a>
                                </td>
                                <td>
                                    <form action="{{ route('address.destroy', $address->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>

                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                                <script src="${contextPath}/resources/js/bootstrap.min.js"></script>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </section>

        @endsection


        <style>
            .socialBody .container {
                justify-content: space-between;
            }


            .col2 {
                width: 33%;
                padding: 10px 10px;
                display:block;
                text-decoration: none;
                letter-spacing: 1px;
                transition: all .5s ease;
            }

            .callBody .container {
                justify-content: space-between;
            }

            .col3 {
                float: right;
                flex-grow: 1;
                width: 50%;
                height: 500px;
                text-align: center;
                padding-left: 0px;
                text-decoration: none;

            }
        </style>
