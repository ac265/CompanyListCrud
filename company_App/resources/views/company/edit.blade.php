@extends('home')
@section('main')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" rel="stylesheet" crossorigin="anonymous">

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a company</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('company.update', $company->id) }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="company_name">Company Name:</label>
                    <input type="text" class="form-control" name="company_name" value={{ $company->company_name }} />
                </div>

                <div class="form-group">
                    <label for="internet_address">Internet Address:</label>
                    <input type="text" class="form-control" name="internet_address" value={{ $company->internet_address }} />
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="${contextPath}/resources/js/bootstrap.min.js"></script>

    </div>
@endsection